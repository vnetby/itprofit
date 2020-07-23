<?
require (dirname(__FILE__) . '/include/_globals.php');

require (THEME_PATH . '/include/_global-functions.php'); // Набор простых вспомагательных функций
require (THEME_PATH . '/include/register_post_types.php');
require (THEME_PATH . '/backend/menu-option.php'); // Основные параметры сайта
require (THEME_PATH . '/backend/custom-post.php'); // Простые кастомные посты
require (THEME_PATH . '/backend/shortcode.php'); // Шорткоды
require (THEME_PATH . '/backend/lang.php'); // Языковые строки
require (THEME_PATH . '/backend/ajax.php'); // AJAX-запросы
require (THEME_PATH . '/backend/post-technology.php'); // Тип поста - Технологии
require (THEME_PATH . '/backend/blog/create.php'); // Тип поста - Блог
require (THEME_PATH . '/sh_custom_fields/index.php'); //свой плагин для создания множественных полей
require (THEME_PATH . '/backend/mail/ajax.php'); // обработка Формы обратной связи

require (THEME_PATH . '/include/class-vnet-seo.php');
new Vnet_Seo;

require (THEME_PATH . '/backend/mobile-detect.php');



/* Переменные определения мобильных и планшетных устройств */
$detect = new Mobile_Detect;
define("MOBILE", $detect->isMobile());
define("TABLET", $detect->isTablet());

$pll = new PLL_WPSEO;
// remove_action('wpseo_opengraph', [$pll, 'wpseo_ogp'], 2);
// if (class_exists('PLL_WPSEO')) {
// }

//action
//add_action('after_setup_theme','footer_enqueue_scripts');
add_action( 'wp_enqueue_scripts', 'jquery_script_method' );
// add_action( 'wp_head', 'style_theme' );
add_action( 'wp_head', 'script_theme' );
add_action('after_setup_theme', 'my_menu' );
add_action('admin_init', 'remove_posts_supports');

add_action( 'init', 'my_theme_add_editor_styles' );
add_filter( 'tiny_mce_before_init', 'set_editor_settings', 99 );
add_action( 'after_wp_tiny_mce', 'theme_after_wp_tiny_mce' );
add_action('wp_enqueue_scripts', 'remove_recaptcha_script');

add_theme_support( 'post-thumbnails', [ 'post', 'page', 'post-blog', 'awards-post', 'clients-post', 'reviews-post', 'vacancies-post', 'work-post', 'tech-post', 'services', 'lang-post', 'authors' ] );

//filter
add_filter( 'deprecated_function_trigger_error', '__return_false' );
//Cниппет, который добавит асинхронную загрузку для скриптов, подключенных через wp_enqueue_script():
add_filter('script_loader_tag', 'add_async_attribute', 10, 2);

add_filter('wpcf7_ajax_json_echo', 'pll_wpcf_response');

wpcf7_add_shortcode('privacy_police_url', 'wpcf7_custom_shortcode_handler', true);


//function

function my_menu(){
    register_nav_menus([
        'main'     => 'Главное меню',
        'first_foot'    => 'Меню подвал 1',
        'second_foot'    => 'Меню подвал 2'
      ]);
    add_theme_support( 'title-tag' );
}

function style_theme() {
    // wp_enqueue_style( 'style', get_stylesheet_uri() );
    // wp_enqueue_style( 'min', THEME_URI . '/css/libs.min.css' );
    // wp_enqueue_style( 'main', THEME_URI . '/css/main.min.css', 'min', null );
}

function script_theme() {
    $upload_dir = wp_upload_dir();
    wp_enqueue_script( 'main', THEME_URI . '/js/common.js', 'jquery', null, 1 );
    wp_enqueue_script( 'ajax', THEME_URI . '/js/ajax.js', 'jquery', null, 1 );
    wp_localize_script( 'main', 'ajax_object', [
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'redirecturl' => $_SERVER['REQUEST_URI'],
        'templateurl' => THEME_URI,
        'prevarrow' => pll__('Предыдущий проект'),
        'nextarrow' => pll__('Следующий проект'),
        'upload' => $upload_dir['baseurl']
    ]);
    if ( is_page( [ 35, 36 ] ) )
    {
        wp_enqueue_script( 'mail', THEME_URI . '/js/mail.js', 'jquery', null,1 );
    }
}

function jquery_script_method() {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', THEME_URI . '/js/scripts.min.js', false, null, 1 );
    wp_enqueue_script( 'jquery' );
}

/*function footer_enqueue_scripts(){
    remove_action('wp_head','wp_print_scripts');
    remove_action('wp_head','wp_print_head_scripts',9);
    remove_action('wp_head','wp_enqueue_scripts',1);
    add_action('wp_footer','wp_print_scripts',5);
    add_action('wp_footer','wp_enqueue_scripts',5);
    add_action('wp_footer','wp_print_head_scripts',5);
}*/

if(function_exists('add_image_size')){
    add_image_size('preview-blog',1200,490,true);
    add_image_size('preview',570,570,true);
}



function add_async_attribute($tag, $handle)
{
    if(!is_admin()){
        if ('jquery-core' == $handle) {
            return $tag;
        }
        return str_replace(' src', ' defer src', $tag);
    }else{
        return $tag;
    }
}





function set_editor_settings( $init ) {
	// $block_formats = array(
	// 	'Paragraph=p',
	// 	'Heading 1=h1',
	// 	'Heading 2=h2',
	// 	'Heading 3=h3',
	// 	'Heading 4=h4',
	// 	'Heading 5=h5',
	// 	'Heading 6=h6',
	// 	'Якорь=content',
	// 	'Preformatted=pre',
	// 	'Code=code',
	// );
    // $init['block_formats'] = implode( ';', $block_formats );
    $init['valid_children']="*[*]";
    $init['valid_elements']="*[*]";
    $init['extended_valid_elements']="*[*]";
	return $init;
}



function theme_after_wp_tiny_mce() {
    ?>
        <script>
            jQuery( document ).on( 'tinymce-editor-init', function( event, editor ) {
                tinymce.activeEditor.formatter.register( 'content', {
                    block : 'div',
                    classes : 'content-anchor'
                } );
            } );
        </script>
    <?php
    }
    


function _debug ($var) {
    ob_start();
    print_r($var);
    $var = ob_get_clean();
    file_put_contents(dirname(__FILE__) . '/__DEBUG', $var);
}




function my_theme_add_editor_styles () {
    add_editor_style( THEME_URI . '/css/editor-style.css' );
}





function remove_posts_supports () {
    remove_post_type_support('authors', 'editor');
    // remove_post_type_support('authors', 'title');
    remove_post_type_support('authors', 'author');
    remove_post_type_support('authors', 'trackbacks');
    remove_post_type_support('authors', 'excerpt');
    remove_post_type_support('authors', 'comments');
    remove_post_type_support('authors', 'revisions');
    remove_post_type_support('authors', 'page-attributes');
    remove_post_type_support('authors', 'post-formats');
}


// add_filter('user_can_richedit', 'disable_wyswyg_to_preserve_my_markup');
// function disable_wyswyg_to_preserve_my_markup( $default ){
// //   if( get_post_type() === 'post') return false;
// return true;
//   return $default;
// }






function vnet_get_first_post ($type = 'post') {
    $posts = get_posts([
        'numberposts' => 1,
        'post_type' => $type
    ]);
    return get_from_array($posts, 0);
}



function vnet_get_last_post ($type = 'post') {
    $posts = wp_get_recent_posts(['numberposts' => 1, 'post_type' => $type]);
    return get_from_array($posts, 0);
}




function get_phone_link($phone)
{
  $phone = 'tel://+' . preg_replace("/[^\d]+/", "", $phone);
  return $phone;
}



function get_email_link($email)
{
  $email = 'mailto://' . preg_replace("/[\s]+/", "", $email);
  return $email;
}




function get_contact_url () {
    return get_permalink(35);
}





/**
 * Формируем массив аргументов для WP_Query
 */
function get_portfolio_filter_args () {
    $per_page = -1;
    $all = get_from_request('all');
    if ($all === 'n') {
        $per_page = 5;
    }
    $args = [
        'post_type' => 'post',
        'posts_per_page' => $per_page,
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'suppress_filters' => true
    ];
    $cats = get_from_request('cat');
    $tags = get_from_request('tag');
    if ($cats) {
        $args['category__in'] = is_array($cats) ? $cats : explode(',',$cats);
    }
    if ($tags) {
        $args['tag__in'] = is_array($tags) ? $tags : explode(',',$tags);
    }
    return $args;
}











function pll_wpcf_response($items)
{
    $current_lang = get_from_request('current_lang');

    set_wpcf_pll_message($items, $current_lang);
    set_wpcf_pll_invalid_fields($items, $current_lang);

    return $items;
}






function set_wpcf_pll_message(&$items, $current_lang)
{
    $mess = get_from_array($items, 'message');
    if (!$mess) return;
    $items['message'] =  translate_string($mess, $current_lang);
}






function get_recaptcha_script_src($siteKey)
{
  $url = add_query_arg(
    [
      'render' => $siteKey,
    ],
    'https://www.google.com/recaptcha/api.js'
  );
  return $url;
}






function set_wpcf_pll_invalid_fields(&$items, $current_lang)
{
    if (!isset($items['invalidFields'])) return;

    foreach ($items['invalidFields'] as &$item) {
        $mess = get_from_array($item, 'message');
        if (!$mess) continue;
        $item['message'] = translate_string($mess, $current_lang);
    }
}






function get_wpcf7_recaptcha_site_key()
{
  $service = WPCF7_RECAPTCHA::get_instance();
  if (!$service->is_active()) return false;
  return $service->get_sitekey();
}






function get_wpcf7_recaptcha_actions()
{
  return apply_filters(
    'wpcf7_recaptcha_actions',
    array(
      'homepage' => 'homepage',
      'contactform' => 'contactform',
    )
  );
}





function remove_recaptcha_script () {
    wp_deregister_script('google-recaptcha');
}






function get_wpcf_validate_msg () {
    global $wpdb;

    $transform_keys = [
        'invalid_required' => 'required',
        'upload_file_type_invalid' => 'notAllowedFileFormat',
        'requiredFile' => 'required',
        'invalid_email' => 'invalidEmail'
    ];
    
    $table = $wpdb->prefix . 'posts';
    $meta_table = $wpdb->prefix . 'postmeta';

    $query = "SELECT `ID`, `meta_value` FROM $table INNER JOIN $meta_table ON $table.ID = $meta_table.post_id WHERE `post_type` LIKE 'wpcf7_contact_form' AND `meta_key` LIKE '_messages' LIMIT 1";

    $res = $wpdb->get_results($query);

    if (!$res || is_wp_error($res)) return;

    $res = get_from_array($res, 0);

    $res->meta_value = unserialize($res->meta_value);

    $real_res = [];

    foreach ($res->meta_value as $key => $msg) {
        if (!isset($transform_keys[$key])) continue;
        $real_res[$transform_keys[$key]] = translate_string($msg);
    }

    return $real_res;
}






function the_hidden_phone ($phone, $phone_link, $btn_class = false, $nums = 11) {
    $btn_class = $btn_class ? $btn_class : 'btn blue-btn fw-bold';
    $btn_class .= ' js-hidden-phone gt-phone';
    ?>
    <a href="<?= $phone_link; ?>" class="<?= $btn_class; ?>" itemprop="telephone">
        <span class="text">
            <?php
            $phone = str_split($phone);

            $count = 0;
            foreach ($phone as $num) {
                if (!preg_match('/[\d]/', $num)) {
                    echo $num;
                    continue;
                }
                $count++;
                if ($count < $nums) {
                    echo $num;
                    continue;
                }
                if ($count === $nums) {
                    echo '<span class="hidden-char">' . $num . '</span>';
                    continue;
                }
                echo '<span>' . $num . '</span>';
            }
            ?>
        </span>
        <span class="show-ico">
            <?= vnet_get_svg('yey'); ?>
        </span>
    </a>
    <?php
}








function wpcf7_custom_shortcode_handler ($tag) {
    return PRIVACY_URL;
}