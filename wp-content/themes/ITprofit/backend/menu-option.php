<?
$true_page = 'myparameters.php'; // это часть URL страницы, рекомендую использовать строковое значение, т.к. в данном случае не будет зависимости от того, в какой файл вы всё это вставите

/*
 * Функция, добавляющая страницу в пункт меню Настройки
 */
function true_options() {
    global $true_page;
    add_menu_page( 'Параметры', 'Параметры', 'manage_options', $true_page, 'true_option_page');
}
add_action('admin_menu', 'true_options');

/**
 * Возвратная функция (Callback)
 */
function true_option_page(){
    global $true_page;
    ?>
<div class="wrap">
    <h2>Дополнительные параметры сайта</h2>
    <form method="post" enctype="multipart/form-data" action="options.php">
        <?
        settings_fields('true_options'); // меняем под себя только здесь (название настроек)
        do_settings_sections($true_page);
        ?>
        <p class="submit">
            <input type="submit" class="button-primary" value="<? _e('Save Changes') ?>" />
        </p>
    </form>
</div>
<?
}

/*
 * Регистрируем настройки
 * Мои настройки будут храниться в базе под названием true_options (это также видно в предыдущей функции)
 */
function true_option_settings() {
    global $true_page;
    // Присваиваем функцию валидации ( true_validate_settings() ). Вы найдете её ниже
    register_setting( 'true_options', 'true_options', 'true_validate_settings' ); // true_options

    // Добавляем секцию
    add_settings_section( 'section_contact', 'Контакты', '', $true_page );
    add_settings_section( 'section_info', 'Информация по сайту', '', $true_page );

    // Создадим поля в секции "Контакты"

    $true_field_params = [
        'type'      => 'text', // тип
        'id'        => 'tel',
        'desc'      => 'Введите телефон организации', // описание
    ];
    add_settings_field( 'tel', 'Телефон организации', 'true_option_display_settings', $true_page, 'section_contact', $true_field_params );

    $true_field_params = [
        'type'      => 'text', // тип
        'id'        => 'email',
        'desc'      => 'Введите email организации', // описание
    ];
    add_settings_field( 'email', 'Email организации', 'true_option_display_settings', $true_page, 'section_contact', $true_field_params );

    $true_field_params = [
        'type'      => 'text', // тип
        'id'        => 'mail_index',
        'desc'      => 'Введите почтовый индекс', // описание
    ];
    add_settings_field( 'mail_index', 'Почтовый индекс', 'true_option_display_settings', $true_page, 'section_contact', $true_field_params );

    $true_field_params = [
        'type'      => 'text', // тип
        'id'        => 'city',
        'desc'      => 'Введите город организации', // описание
    ];
    add_settings_field( 'city', 'Город организации', 'true_option_display_settings', $true_page, 'section_contact', $true_field_params );

    $true_field_params = [
        'type'      => 'text', // тип
        'id'        => 'adress',
        'desc'      => 'Введите адрес организации', // описание
    ];
    add_settings_field( 'adress', 'Адрес организации', 'true_option_display_settings', $true_page, 'section_contact', $true_field_params );

    $true_field_params = [
        'type'      => 'text', // тип
        'id'        => 'signature',
        'desc'      => 'Подпись компании (выводится в подвале под адресом)', // описание
    ];
    add_settings_field( 'signature', 'Подпись компании', 'true_option_display_settings', $true_page, 'section_contact', $true_field_params );

    $true_field_params = [
        'type'      => 'text', // тип
        'id'        => 'instagram',
        'desc'      => 'Введите ссылку на Instagram', // описание
    ];
    add_settings_field( 'instagram', 'Ссылка на Instagram', 'true_option_display_settings', $true_page, 'section_contact', $true_field_params );


    $true_field_params = [
        'type'      => 'text', // тип
        'id'        => 'facebook',
        'desc'      => 'Введите ссылку на Facebook', // описание
    ];
    add_settings_field( 'facebook', 'Ссылка на Facebook', 'true_option_display_settings', $true_page, 'section_contact', $true_field_params );

    $true_field_params = [
        'type'      => 'text', // тип
        'id'        => 'vk',
        'desc'      => 'Введите ссылку на VK', // описание
    ];
    add_settings_field( 'vk', 'Ссылка на VK', 'true_option_display_settings', $true_page, 'section_contact', $true_field_params );

    $true_field_params = [
        'type'      => 'text', // тип
        'id'        => 'telegram',
        'desc'      => 'Введите ссылку на Telegram', // описание
    ];
    add_settings_field( 'telegram', 'Ссылка на Telegram', 'true_option_display_settings', $true_page, 'section_contact', $true_field_params );

    $true_field_params = [
        'type'      => 'text', // тип
        'id'        => 'telegram_text',
        'desc'      => 'Выведется на мобильной версии страницы контаткы', // описание
    ];
    add_settings_field( 'temlegram_text', 'Текст кнопки Telegram', 'true_option_display_settings', $true_page, 'section_contact', $true_field_params );


    $true_field_params = [
        'type'      => 'text', // тип
        'id'        => 'viber',
        'desc'      => 'Введите ссылку на Viber', // описание
    ];
    add_settings_field( 'viber', 'Ссылка на Viber', 'true_option_display_settings', $true_page, 'section_contact', $true_field_params );

    $true_field_params = [
        'type'      => 'text', // тип
        'id'        => 'viber_text',
        'desc'      => 'Выведется на мобильной версии страницы контаткы', // описание
    ];
    add_settings_field( 'viber_text', 'Текст кнопки Viber', 'true_option_display_settings', $true_page, 'section_contact', $true_field_params );


    $true_field_params = [
        'type'      => 'text', // тип
        'id'        => 'whatsapp',
        'desc'      => 'Введите ссылку на WhatsApp', // описание
    ];
    add_settings_field( 'whatsapp', 'Ссылка на WhatsApp', 'true_option_display_settings', $true_page, 'section_contact', $true_field_params );

    $true_field_params = [
        'type'      => 'text', // тип
        'id'        => 'whatsapp_text',
        'desc'      => 'Выведется на мобильной версии страницы контаткы', // описание
    ];
    add_settings_field( 'whatsapp_text', 'Текст кнопки WhatsApp', 'true_option_display_settings', $true_page, 'section_contact', $true_field_params );


    $true_field_params = array(
        'type'      => 'textarea',
        'id'        => 'map',
        'desc'      => 'вставьте iframe с картой'
    );
    add_settings_field( 'map', 'Iframe на странице контактов', 'true_option_display_settings', $true_page, 'section_contact', $true_field_params );


    // Создадим поля в секции "Информация по сайту"

    $true_field_params = array(
        'type'      => 'textarea',
        'id'        => 'commercial',
        'desc'      => 'Текст коммерческого предложения'
    );
    add_settings_field( 'commercial', 'Коммерческое предложение', 'true_option_display_settings', $true_page, 'section_info', $true_field_params );

    $true_field_params = array(
        'type'      => 'textarea',
        'id'        => 'commercial_en',
        'desc'      => 'Текст коммерческого предложения (en)'
    );
    add_settings_field( 'commercial_en', 'Коммерческое предложение (en)', 'true_option_display_settings', $true_page, 'section_info', $true_field_params );


    // Создадим textarea в первой секции
    /*$true_field_params = array(
        'type'      => 'textarea',
        'id'        => 'my_textarea',
        'desc'      => 'Пример большого текстового поля.'
    );
    add_settings_field( 'my_textarea_field', 'Большое текстовое поле', 'true_option_display_settings', $true_page, 'true_section_1', $true_field_params );*/

    // Добавляем вторую секцию настроек

/*    add_settings_section( 'true_section_2', 'Другие поля ввода', '', $true_page );

    // Создадим чекбокс
    $true_field_params = array(
        'type'      => 'checkbox',
        'id'        => 'video_checkbox',
        'desc'      => 'Если выбрать, то будет видео, иначе картинка или gif'
    );
    add_settings_field( 'video_checkbox', 'Видео на главной странице', 'true_option_display_settings', $true_page, 'true_section_2', $true_field_params );*/

    // Создадим выпадающий список
    /*$true_field_params = array(
        'type'      => 'select',
        'id'        => 'my_select',
        'desc'      => 'Пример выпадающего списка.',
        'vals'		=> array( 'val1' => 'Значение 1', 'val2' => 'Значение 2', 'val3' => 'Значение 3')
    );
    add_settings_field( 'my_select_field', 'Выпадающий список', 'true_option_display_settings', $true_page, 'true_section_2', $true_field_params );*/

    // Создадим радио-кнопку
    /*$true_field_params = array(
        'type'      => 'radio',
        'id'      => 'my_radio',
        'vals'		=> array( 'val1' => 'Значение 1', 'val2' => 'Значение 2', 'val3' => 'Значение 3')
    );
    add_settings_field( 'my_radio', 'Радио кнопки', 'true_option_display_settings', $true_page, 'true_section_2', $true_field_params );*/

}
add_action( 'admin_init', 'true_option_settings' );

/*
 * Функция отображения полей ввода
 * Здесь задаётся HTML и PHP, выводящий поля
 */
function true_option_display_settings($args) {
    extract( $args );

    $option_name = 'true_options';

    $o = get_option( $option_name );
    switch ( $type ) {
        case 'text':
            $o[$id] = esc_attr( stripslashes($o[$id]) );
            echo "<input class='regular-text' type='text' id='$id' name='" . $option_name . "[$id]' value='$o[$id]' />";
            echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";
            break;
        case 'textarea':
            $o[$id] = esc_attr( stripslashes($o[$id]) );
            echo "<textarea class='code large-text' cols='30' rows='5' type='text' id='$id' name='" . $option_name . "[$id]'>$o[$id]</textarea>";
            echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";
            break;
        case 'checkbox':
            $checked = ($o[$id] == 'on') ? " checked='checked'" :  '';
            echo "<label><input type='checkbox' id='$id' name='" . $option_name . "[$id]' $checked /> ";
            echo ($desc != '') ? $desc : "";
            echo "</label>";
            break;
        case 'select':
            echo "<select id='$id' name='" . $option_name . "[$id]'>";
            foreach($vals as $v=>$l){
                $selected = ($o[$id] == $v) ? "selected='selected'" : '';
                echo "<option value='$v' $selected>$l</option>";
            }
            echo ($desc != '') ? $desc : "";
            echo "</select>";
            break;
        case 'radio':
            echo "<fieldset>";
            foreach($vals as $v=>$l){
                $checked = ($o[$id] == $v) ? "checked='checked'" : '';
                echo "<label><input type='radio' name='" . $option_name . "[$id]' value='$v' $checked />$l</label><br />";
            }
            echo "</fieldset>";
            break;
    }
}

/*
 * Функция проверки правильности вводимых полей
 */
function true_validate_settings($input) {
    foreach($input as $k => $v) {
        $valid_input[$k] = trim($v);

        /* Вы можете включить в эту функцию различные проверки значений, например
        if(! задаем условие ) { // если не выполняется
            $valid_input[$k] = ''; // тогда присваиваем значению пустую строку
        }
        */
    }
    return $valid_input;
}