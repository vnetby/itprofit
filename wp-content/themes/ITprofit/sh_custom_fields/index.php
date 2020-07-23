<?
add_action('admin_head', 'my_style_admin');
add_action('admin_head', 'my_script_admin');
if ( is_admin() ) {
    add_action( 'wp_ajax_ajaxfield', 'sh_ajax_field' );
}
//Стили для админки
function my_style_admin(){
    wp_enqueue_style( "sh-admin-style" , get_template_directory_uri() . "/sh_custom_fields/css/style-admin.css");
}
function my_script_admin() {
    wp_enqueue_script( 'sh-admin-script', get_template_directory_uri() . '/sh_custom_fields/js/script.js', 'jquery', null, 1 );
    wp_localize_script( 'sh-admin-script', 'ajax_object', [
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
    ]);
}

// DEPRECATED
// require_once (get_template_directory() . '/sh_custom_fields/service-stages.php');
// require_once (get_template_directory() . '/sh_custom_fields/service-tags-block.php');


require_once (get_template_directory() . '/sh_custom_fields/index-block.php');
require_once (get_template_directory() . '/sh_custom_fields/save.php');


function sh_get_field( $field, $id = false )
{
    $postID = $id ? $id : get_the_ID();
    return get_post_meta( $postID, $field, true );
}

function sh_ajax_field() {
    if($_POST['index']){
        $labels = explode("|", $_POST['label']);
        $inputs = explode("|", $_POST['input']);
        //$counter = count($input);

        $html = "<div class='flex__start sh_box'>";

        foreach ($inputs as $key => $input ){
            switch ($input){
                case 'text':
                    $html .= "<span class='label'>$labels[$key]</span>";
                    $html .= "<input type='text' name='sh_field[" . $_POST["name"] . "_name_" . $_POST['index'] . "]' id='" . $_POST["name"] . "_name_" . $_POST["index"] . "' value='' />";
                    break;
                case 'textarea':
                    $html .= "<span class='label'>$labels[$key]</span>";
                    $html .= "<textarea name='sh_field[" . $_POST["name"] . "_value_" . $_POST['index'] . "]' id='" . $_POST["name"] . "_value_" . $_POST['index'] . "'></textarea>";
                    break;
            }
        }

        $html .= "</div>";
        echo $html;
    }

    die;
}