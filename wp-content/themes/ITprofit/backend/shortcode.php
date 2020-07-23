<?

function true_url( $atts ) {
    $params = shortcode_atts( [
        'text' => '',
        'url' => site_url(),
    ], $atts );
    return "<a href='{$params['url']}' target='_blank'>{$params['text']}</a>";
}
add_shortcode( 'url', 'true_url' );



/*function image_fancy( $atts ) {
    $params = shortcode_atts( [
        'url' => '',
        'id' => false,
    ], $atts );
    if( $params['id'] ){
        $img_url = get_the_post_thumbnail_url($params['id'], 'full');
        $final_str = "<a href='" . site_url() . "/wp-content/uploads/" . $img_url . "' data-fancybox='gallery'>";
        $final_str .= "<div class='block__img bg__cover' style='background-image: url(" . site_url() . "/wp-content/uploads/" . $img_url . ")' alt=''></div>";
    } else {
        $final_str = "<a href='" . site_url() . "/wp-content/uploads/" . $params['url'] . "' data-fancybox='gallery'>";
        $final_str .= "<div class='block__img bg__cover' style='background-image: url(" . site_url() . "/wp-content/uploads/" . $params['url'] . ")' alt=''></div>";
    }
    $final_str .= "</a>";
    return $final_str;
}
add_shortcode( 'image', 'image_fancy' );*/


/*function custom_block_img( $atts, $shortcode_content = null ) {
    $params = shortcode_atts( [
        'type' => 1,
    ], $atts );
    $final_str = "<div class='block{$params['type']} block__item'>";
    $final_str .= "<div class='container'>";
    $final_str .= do_shortcode($shortcode_content);
    $final_str .= "</div>";
    $final_str .= "</div>";
    return $final_str;
}
add_shortcode( 'block', 'custom_block_img' );

function custom_text( $atts, $content ) {
    return "<div class='block__txt'>" . do_shortcode($content) . "</div>";
}
add_shortcode( 'text', 'custom_text' );*/








// Регистрируем кнопки шорткодов
/*function true_add_mce_button() {
    // проверяем права пользователя - может ли он редактировать посты и страницы
    if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
        return; // если не может, то и кнопка ему не понадобится, в этом случае выходим из функции
    }
    // проверяем, включен ли визуальный редактор у пользователя в настройках (если нет, то и кнопку подключать незачем)
    if ( 'true' == get_user_option( 'rich_editing' ) ) {
        add_filter( 'mce_external_plugins', 'true_add_tinymce_script' );
        add_filter( 'mce_buttons', 'true_register_mce_button' );
    }
}
add_action('admin_head', 'true_add_mce_button');

// В этом функции указываем ссылку на JavaScript-файл кнопки
function true_add_tinymce_script( $plugin_array ) {
    $plugin_array['imageurl_button'] = get_template_directory_uri() . '/assets/js/admin-button.js'; // true_mce_button - идентификатор кнопки
    return $plugin_array;
}

// Регистрируем кнопку в редакторе
function true_register_mce_button( $buttons ) {
    array_push( $buttons, 'imageurl_button' ); // true_mce_button - идентификатор кнопки
    return $buttons;
}*/

