<?
add_action( 'init', 'register_service_post_type' );
function register_service_post_type() {

    register_taxonomy('cat-blog', ['post-blog'], [
        'label'                 => 'Категория блога', // определяется параметром $labels->name
        'labels'                => [
            'name'              => 'Категория блога',
            'singular_name'     => 'Категория блога',
            'search_items'      => 'Искать категорию',
            'all_items'         => 'Все категории',
            'parent_item'       => 'Родит. категория',
            'parent_item_colon' => 'Родит. категория:',
            'edit_item'         => 'Ред. категорию',
            'update_item'       => 'Обновить категорию',
            'add_new_item'      => 'Добавить категорию',
            'new_item_name'     => 'Новый категория',
            'menu_name'         => 'Категории блога',
        ],
        'description'           => 'Категории блога', // описание таксономии
        'public'                => true,
        'show_in_nav_menus'     => true, // равен аргументу public
        'show_ui'               => true, // равен аргументу public
        'show_tagcloud'         => false, // равен аргументу show_ui
        'hierarchical'          => true,
        'query_var'             => true,
        '_builtin'              => true,
        'rewrite'               => ['slug'=>'blog-category', 'hierarchical'=>true, 'with_front'=>true, 'feed'=>false ],
        //'rewrite'               => true,
        'show_admin_column'     => true, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
    ] );

    // тип записи - услуги
    register_post_type('post-blog', [
        'label'               => 'Блог',
        'labels'              => [
            'name'          => 'Блог',
            'singular_name' => 'Блог',
            'menu_name'     => 'Блог',
            'all_items'     => 'Все новости',
            'add_new'       => 'Добавить новость',
            'add_new_item'  => 'Добавить новую новость',
            'edit'          => 'Редактировать новость',
            'edit_item'     => 'Редактировать новость',
            'new_item'      => 'Новая новость',
        ],
        'description'         => '',
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_rest'        => false,
        'rest_base'           => '',
        'show_in_menu'        => true,
        'exclude_from_search' => false,
        'capability_type'     => 'post',
        'map_meta_cap'        => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-media-document',
        'hierarchical'        => false,
        'rewrite'             => [ 'slug'=>'blog', 'with_front'=>false, 'feeds' =>true, 'pages'=>true ],
        'has_archive'         => 'blog',
        'query_var'           => true,
        'supports'            => [ 'title', 'editor', 'excerpt', 'thumbnail' ],
        'taxonomies'          => [ 'cat-blog' ],
    ] );

}

require_once (get_template_directory() . '/backend/blog/ajax.php');



