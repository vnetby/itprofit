<?
add_action('init', 'register_post_awards'); // Использовать функцию только внутри хука init
add_action('init', 'register_post_clients');
add_action('init', 'register_post_reviews');
add_action('init', 'register_post_vacancies');
add_action('init', 'register_post_work');
add_action('init', 'register_post_service');
add_action('init', 'register_post_lang');

function register_post_awards()
{
    $labels = [
        'name' => 'Награды',
        'singular_name' => 'Награды', // админ панель Добавить->Функцию
        'add_new' => 'Добавить награду',
        'add_new_item' => 'Добавить новую награду', // заголовок тега <title>
        'edit_item' => 'Редактировать награду',
        'new_item' => 'Новая награда',
        'all_items' => 'Все награды',
        'view_item' => 'Просмотр награды на сайте',
        'search_items' => 'Искать награды',
        'not_found' => 'Награды не найдено.',
        'not_found_in_trash' => 'В корзине нет наград.',
        'menu_name' => 'Награды' // ссылка в меню в админке
    ];
    $args = [
        'labels' => $labels,
        'public' => true,
        'publicly_queryable'  => true,
        'show_ui' => true, // показывать интерфейс в админке
        'show_in_menu' => true,
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'has_archive' => true,
        'query_var'  => true,
        'hierarchical' => false,
        'menu_icon' => 'dashicons-awards', // иконка в меню
        'menu_position' => 20, // порядок в меню
        'supports' => ['title', 'editor', 'excerpt', 'thumbnail']
    ];
    register_post_type('awards-post', $args);
}

function register_post_clients()
{
    $labels = array(
        'name' => 'Клиенты',
        'singular_name' => 'Клиенты', // админ панель Добавить->Функцию
        'add_new' => 'Добавить клиента',
        'add_new_item' => 'Добавить нового клиента', // заголовок тега <title>
        'edit_item' => 'Редактировать клиента',
        'new_item' => 'Новый клиент',
        'all_items' => 'Все клиенты',
        'view_item' => 'Просмотр клиентов на сайте',
        'search_items' => 'Искать клиента',
        'not_found' => 'Клиенты не найдено.',
        'not_found_in_trash' => 'В корзине нет клиентов.',
        'menu_name' => 'Клиенты' // ссылка в меню в админке
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable'  => true,
        'show_ui' => true, // показывать интерфейс в админке
        'show_in_menu' => true,
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'has_archive' => true,
        'query_var'  => true,
        'hierarchical' => false,
        'menu_icon' => 'dashicons-universal-access-alt', // иконка в меню
        'menu_position' => 20, // порядок в меню
        'supports' => array('title', 'editor', 'author', 'thumbnail')
    );
    register_post_type('clients-post', $args);
}

function register_post_vacancies()
{
    $labels = array(
        'name' => 'Вакансии',
        'singular_name' => 'Вакансии', // админ панель Добавить->Функцию
        'add_new' => 'Добавить вакансию',
        'add_new_item' => 'Добавить новую вакансию', // заголовок тега <title>
        'edit_item' => 'Редактировать вакансию',
        'new_item' => 'Новая вакансия',
        'all_items' => 'Все вакансии',
        'view_item' => 'Просмотр вакансий на сайте',
        'search_items' => 'Искать вакансию',
        'not_found' => 'Вакансии не найдено.',
        'not_found_in_trash' => 'В корзине нет вакансий.',
        'menu_name' => 'Вакансии' // ссылка в меню в админке
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable'  => true,
        'show_ui' => true, // показывать интерфейс в админке
        'show_in_menu' => true,
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'has_archive' => true,
        'query_var'  => true,
        'hierarchical' => false,
        'menu_icon' => 'dashicons-hammer', // иконка в меню
        'menu_position' => 20, // порядок в меню
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail')
    );
    register_post_type('vacancies-post', $args);
}
function register_post_reviews()
{
    $labels = array(
        'name' => 'Отзывы',
        'singular_name' => 'Отзывы', // админ панель Добавить->Функцию
        'add_new' => 'Добавить отзыв',
        'add_new_item' => 'Добавить новый отзыв', // заголовок тега <title>
        'edit_item' => 'Редактировать отзыв',
        'new_item' => 'Новый отзыв',
        'all_items' => 'Все отзывы',
        'view_item' => 'Просмотр отзывов на сайте',
        'search_items' => 'Искать отзыв',
        'not_found' => 'Отзывы не найдено.',
        'not_found_in_trash' => 'В корзине нет отзывов.',
        'menu_name' => 'Отзывы' // ссылка в меню в админке
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable'  => true,
        'show_ui' => true, // показывать интерфейс в админке
        'show_in_menu' => true,
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'has_archive' => true,
        'query_var'  => true,
        'hierarchical' => false,
        'menu_icon' => 'dashicons-format-aside', // иконка в меню
        'menu_position' => 20, // порядок в меню
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail')
    );
    register_post_type('reviews-post', $args);
}

function register_post_work()
{
    $labels = array(
        'name' => 'Как мы работает',
        'singular_name' => 'Как мы работает', // админ панель Добавить->Функцию
        'add_new' => 'Добавить вид работы',
        'add_new_item' => 'Добавить новый  вид работы', // заголовок тега <title>
        'edit_item' => 'Редактировать  вид работы',
        'new_item' => 'Новый  вид работы',
        'all_items' => 'Все  виды работы',
        'view_item' => 'Просмотр вид работ на сайте',
        'search_items' => 'Искать виды работ',
        'not_found' => 'Видов работ не найдено.',
        'not_found_in_trash' => 'В корзине нет работ.',
        'menu_name' => 'Как мы работает' // ссылка в меню в админке
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable'  => true,
        'show_ui' => true, // показывать интерфейс в админке
        'show_in_menu' => true,
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'has_archive' => true,
        'query_var'  => true,
        'hierarchical' => false,
        'menu_icon' => 'dashicons-chart-area', // иконка в меню
        'menu_position' => 20, // порядок в меню
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail')
    );
    register_post_type('work-post', $args);
}

function register_post_service()
{
    $labels = array(
        'name' => 'Услуги',
        'singular_name' => 'Услуги', // админ панель Добавить->Функцию
        'add_new' => 'Добавить услугу',
        'add_new_item' => 'Добавить новую услугу', // заголовок тега <title>
        'edit_item' => 'Редактировать услугу',
        'new_item' => 'Новая услуга',
        'all_items' => 'Все услуги',
        'view_item' => 'Просмотр услуг на сайте',
        'search_items' => 'Искать услугу',
        'not_found' => 'Услуг не найдено.',
        'not_found_in_trash' => 'В корзине нет услуг.',
        'menu_name' => 'Услуги' // ссылка в меню в админке
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable'  => true,
        'show_ui' => true, // показывать интерфейс в админке
        'show_in_menu' => true,
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'has_archive' => true,
        'query_var'  => true,
        'hierarchical' => false,
        'menu_icon' => 'dashicons-cart', // иконка в меню
        'menu_position' => 20, // порядок в меню
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail')
    );
    register_post_type('services', $args);
}

function register_post_lang()
{
    $labels = [
        'name' => 'Языковые версии',
        'singular_name' => 'Языковые версии', // админ панель Добавить->Функцию
        'add_new' => 'Добавить языковую версию',
        'add_new_item' => 'Добавить языковую версию', // заголовок тега <title>
        'edit_item' => 'Редактировать языковую версию',
        'new_item' => 'Новая языковая версия',
        'all_items' => 'Все языковые версии',
        'view_item' => 'Просмотр языковых версий на сайте',
        'search_items' => 'Искать языковую версию',
        'not_found' => 'Языковые версии не найдено.',
        'not_found_in_trash' => 'В корзине нет языковых версий.',
        'menu_name' => 'Языковые версии' // ссылка в меню в админке
    ];
    $args = [
        'labels' => $labels,
        'public' => true,
        'publicly_queryable'  => true,
        'show_ui' => true, // показывать интерфейс в админке
        'show_in_menu' => true,
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'has_archive' => true,
        'query_var'  => true,
        'hierarchical' => false,
        'menu_icon' => 'dashicons-admin-site-alt', // иконка в меню
        'menu_position' => 20, // порядок в меню
        'supports' => ['title', 'editor', 'thumbnail']
    ];
    register_post_type('lang-post', $args);
}

