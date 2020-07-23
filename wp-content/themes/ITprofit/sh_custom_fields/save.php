<?

// Сохраняем кастомное поле при сохранении поста.
add_action( 'save_post', 'sh_meta_box_save' );
function sh_meta_box_save( $post_id )
{
    global $nameBox_1;
    global $nameBox_2;
    global $nameBox_3;
    $arrNameField = [ $nameBox_1, $nameBox_2, $nameBox_3 ];


    $post_datas_i = 0;
    $post_datas_rec_i = 0;

    // Bail if we're doing an auto save
    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    // if our nonce isn't there, or we can't verify it, bail
    if(!isset($_POST["meta_box_nonce"]) || !wp_verify_nonce($_POST["meta_box_nonce"], "sh_meta_box_nonce")) return;

    // if our current user can't edit this post, bail
    if(!current_user_can('edit_post', $post_id)) return;

    // Массив для фильтрации записываемых данных. В данном примере допустима запись тегов ссылок.
    $allowed = [ 'a' => [ 'href' => [] ] ];

    //while($post_datas_i <= $max_counter_data)
    while($post_datas_i <= count($_POST['sh_field']))
    {
        $post_datas_i++;
        if((isset($_POST['sh_field'])))
        {
            foreach ($arrNameField as $key => $fieldName)
            {
                $post_datas_rec[$fieldName][$post_datas_rec_i]['name'] = isset($_POST['sh_field'][$fieldName.'_name_'.$post_datas_i]) && mb_strlen($_POST['sh_field'][$fieldName.'_name_'.$post_datas_i]) ? wp_kses($_POST['sh_field'][$fieldName.'_name_'.$post_datas_i], $allowed) : '';
                $post_datas_rec[$fieldName][$post_datas_rec_i]['value'] = isset($_POST['sh_field'][$fieldName.'_value_'.$post_datas_i]) && mb_strlen($_POST['sh_field'][$fieldName.'_value_'.$post_datas_i]) ? wp_kses($_POST['sh_field'][$fieldName.'_value_'.$post_datas_i], $allowed) : '';
            }
        }
        $post_datas_rec_i++;
    }

    // Если массив собрался, то записываем.
    if(isset($post_datas_rec))
    {
        foreach ($arrNameField as $key => $fieldName)
        {
            update_post_meta($post_id, $fieldName, $post_datas_rec[$fieldName]);
        }
    }
}