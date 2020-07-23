<?
$post_datas_max_3 = 3; // Задаём максимальное число параметров массива.
$namePost_3 = 'page'; // Определяем пост, страницу для которой создаем поле
$nameBox_3 = 'index_tag'; // Название поля

// Добавляем блок кастомного поля на страницу редактирования поста.

// add_action('add_meta_boxes', "sh_meta_box_add_125");
// function sh_meta_box_add_125() {
//     global $post;
//     global $namePost_3;
//     $boxRandomId = rand(1000, 9999);
//     if(!empty($post))
//     {
//         $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);

//         if( $pageTemplate == 'pages/index.php' )
//         {
//             add_meta_box("sh_box_$boxRandomId", __('Главные тезисы', 'admin'), 'sh_meta_box_html_125', $namePost_3, 'normal', 'high');
//         }

//     }
// }

// Формируем форму редактирования в блоке кастомного поля.
function sh_meta_box_html_125($post)
{
    global $post_datas_max_3;
    global $nameBox_3;
    $post_datas_i = 0;
    wp_nonce_field("sh_meta_box_nonce", "meta_box_nonce");

    $html = "<div class='custom_sh_box'>";
    if($post_datas = get_post_meta($post->ID, $nameBox_3, true))
    {
        foreach($post_datas as $data_arr)
        {
            // Если есть значения, то заносим их в форму.
            if(mb_strlen($data_arr['name']) || mb_strlen($data_arr['value']))
            {
                $post_datas_i++;
                $html .= "<div class='flex__start sh_box'>";
                $html .= "<span class='label'>Заголовок</span>";
                $html .= "<input type='text' name='sh_field[" . $nameBox_3 . "_name_$post_datas_i]' id='" . $nameBox_3 . "_name_$post_datas_i' value='" . esc_attr($data_arr['name']) . "' />";
                $html .= "<span class='label'>Фраза</span>";
                $html .= "<input type='text' name='sh_field[" . $nameBox_3 . "_value_$post_datas_i]' id='" . $nameBox_3 . "_value_$post_datas_i' value='" . esc_attr($data_arr['value']) . "' />";
                $html .= "</div>";
            }
        }
    }
    // Доформировываем форму пустыми полями.
    /*$post_datas_i++;
    $html .= "<div class='flex__start sh_box'>";
    $html .= "<span class='label'>Заголовок</span>";
    $html .= "<input type='text' name='sh_field[" . $nameBox_3 . "_name_$post_datas_i]' id='" . $nameBox_3 . "_name_$post_datas_i' value='' />";
    $html .= "<span class='label'>Фраза</span>";
    $html .= "<input type='text' name='sh_field[" . $nameBox_3 . "_value_$post_datas_i]' id='" . $nameBox_3 . "_value_$post_datas_i' value='' />";
    $html .= "</div>";*/

    while($post_datas_i < $post_datas_max_3)
    {
        $post_datas_i++;
        $html .= "<div class='flex__start sh_box'>";
        $html .= "<span class='label'>Заголовок</span>";
        $html .= "<input name='sh_field[" . $nameBox_3 . "_name_$post_datas_i]' id='" . $nameBox_3 . "_name_$post_datas_i' value='' />";
        $html .= "<span class='label'>Фраза</span>";
        $html .= "<input name='sh_field[" . $nameBox_3 . "_value_$post_datas_i]' id='" . $nameBox_3 . "_value_$post_datas_i' value='' />";
        $html .= "</div>";
    }
    $html .= "</div>";
    //$html .= "<div class='button_new_form flex__start' data-index='" . ($post_datas_i + 1) . "' data-name='" . $nameBox_3 . "' data-input='text|text' data-label='Заголовок|Фраза'><span>Добавить</span></div>";
    echo $html;
}