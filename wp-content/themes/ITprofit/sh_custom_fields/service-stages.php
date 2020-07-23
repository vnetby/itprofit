<?
$post_datas_max_2 = 5; // Задаём максимальное число параметров массива.
$namePost_2 = 'services'; // Определяем пост, страницу для которой создаем поле
$nameBox_2 = 'service_stages'; // Название поля

// Добавляем блок кастомного поля на страницу редактирования поста.

add_action('add_meta_boxes', "sh_meta_box_add_124");
function sh_meta_box_add_124() {
    global $namePost_2;
    $boxRandomId = rand(1000, 9999);
    add_meta_box("sh_box_$boxRandomId", __('Этапы', 'admin'), 'sh_meta_box_html_124', $namePost_2, 'normal', 'low');
}

// Формируем форму редактирования в блоке кастомного поля.
function sh_meta_box_html_124($post)
{
    global $post_datas_max_2;
    global $nameBox_2;
    $post_datas_i = 0;
    wp_nonce_field("sh_meta_box_nonce", "meta_box_nonce");

    $html = "<div class='custom_sh_box'>";
    if($post_datas = get_post_meta($post->ID, $nameBox_2, true))
    {
        foreach($post_datas as $data_arr)
        {
            // Если есть значения, то заносим их в форму.
            if(mb_strlen($data_arr['name']) || mb_strlen($data_arr['value']))
            {
                $post_datas_i++;
                $html .= "<div class='flex__start sh_box'>";
                $html .= "<span class='label'>Заголовок</span>";
                $html .= "<input type='text' name='sh_field[" . $nameBox_2 . "_name_$post_datas_i]' id='" . $nameBox_2 . "_name_$post_datas_i' value='" . esc_attr($data_arr['name']) . "' />";
                $html .= "<span class='label'>Текст</span>";
                $html .= "<textarea name='sh_field[" . $nameBox_2 . "_value_$post_datas_i]' id='" . $nameBox_2 . "_value_$post_datas_i'>" . esc_attr($data_arr['value']) . "</textarea>";
                $html .= "</div>";
            }
        }
    }
    // Доформировываем форму пустыми полями.

    $post_datas_i++;
    $html .= "<div class='flex__start sh_box'>";
    $html .= "<span class='label'>Заголовок</span>";
    $html .= "<input type='text' name='sh_field[" . $nameBox_2 . "_name_$post_datas_i]' id='" . $nameBox_2 . "_name_$post_datas_i' value='' />";
    $html .= "<span class='label'>Текст</span>";
    $html .= "<textarea name='sh_field[" . $nameBox_2 . "_value_$post_datas_i]' id='" . $nameBox_2 . "_value_$post_datas_i'></textarea>";
    $html .= "</div>";


    /*while($post_datas_i < $post_datas_max_2)
    {
        $post_datas_i++;
        $html .= "<div class='flex__start sh_box'>";
        $html .= "<span class='label'>Заголовок</span>";
        $html .= "<input type='text' name='sh_field[" . $nameBox_2 . "_name_$post_datas_i]' id='" . $nameBox_2 . "_name_$post_datas_i' value='' />";
        $html .= "<span class='label'>Текст</span>";
        $html .= "<textarea name='sh_field[" . $nameBox_2 . "_value_$post_datas_i]' id='" . $nameBox_2 . "_value_$post_datas_i'></textarea>";
        $html .= "</div>";
    }*/
    $html .= "</div>";
    $html .= "<div class='button_new_form flex__start' data-index='" . ($post_datas_i + 1) . "' data-name='" . $nameBox_2 . "' data-input='text|textarea' data-label='Заголовок|Текст'><span>Добавить</span></div>";
    echo $html;
}

/*function sh_meta_box_html_124($post)
{
    global $post_datas_max_2;
    global $nameBox_2;
    $post_datas_i = 0;
    wp_nonce_field("sh_meta_box_nonce", "meta_box_nonce");

    $html = "<div class='custom_sh_box'>";
    if($post_datas = get_post_meta($post->ID, $nameBox_2, true))
    {
        foreach($post_datas as $data_arr)
        {
            // Если есть значения, то заносим их в форму.
            if(mb_strlen($data_arr['name']) || mb_strlen($data_arr['value']))
            {
                $post_datas_i++;
                $html .= "<div class='column sh_box'>";
                $html .= "<span class='label'>Заголовок</span>";
                $html .= "<input name='sh_field[" . $nameBox_2 . "_name_$post_datas_i]' id='" . $nameBox_2 . "_name_$post_datas_i' value='" . esc_attr($data_arr['name']) . "' />";
                $html .= "<span class='label'>Текст</span>";
                $html .= "<textarea name='sh_field[" . $nameBox_2 . "_value_$post_datas_i]' id='" . $nameBox_2 . "_value_$post_datas_i'>" . esc_attr($data_arr['value']) . "</textarea>";
                $html .= "</div>";
            }
        }
    }
    // Доформировываем форму пустыми полями.
    while($post_datas_i < $post_datas_max_2)
    {
        $post_datas_i++;
        $html .= "<div class='column sh_box'>";
        $html .= "<span class='label'>Заголовок</span>";
        $html .= "<input name='sh_field[" . $nameBox_2 . "_name_$post_datas_i]' id='" . $nameBox_2 . "_name_$post_datas_i' value='' />";
        $html .= "<span class='label'>Текст</span>";
        $html .= "<textarea name='sh_field[" . $nameBox_2 . "_value_$post_datas_i]' id='" . $nameBox_2 . "_value_$post_datas_i'></textarea>";
        $html .= "</div>";
    }
    $html .= "</div>";
    echo $html;
}*/

