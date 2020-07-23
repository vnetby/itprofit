<?
add_action( 'init', 'register_technology_post_type' );
function register_technology_post_type() {

    register_taxonomy('cat-tech', ['tech-post'], [
        'label'                 => 'Категория технологий', // определяется параметром $labels->name
        'labels'                => [
            'name'              => 'Категория технологий',
            'singular_name'     => 'Категория технологий',
            'search_items'      => 'Искать категорию',
            'all_items'         => 'Все категории',
            'parent_item'       => 'Родит. категория',
            'parent_item_colon' => 'Родит. категория:',
            'edit_item'         => 'Ред. категорию',
            'update_item'       => 'Обновить категорию',
            'add_new_item'      => 'Добавить категорию',
            'new_item_name'     => 'Новый категория',
            'menu_name'         => 'Категории технологий',
        ],
        'description'           => 'Категории технологий', // описание таксономии
        'public'                => true,
        'show_in_nav_menus'     => true, // равен аргументу public
        'show_ui'               => true, // равен аргументу public
        'show_tagcloud'         => false, // равен аргументу show_ui
        'hierarchical'          => true,
        'query_var'             => true,
        '_builtin'              => true,
        'rewrite'               => ['slug'=>'tech-category', 'hierarchical'=>true, 'with_front'=>true, 'feed'=>false ],
        //'rewrite'               => true,
        'show_admin_column'     => true, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
    ] );

    // тип записи - услуги
    register_post_type('tech-post', [
        'label'               => 'Технологии',
        'labels'              => [
            'name'          => 'Технологии',
            'singular_name' => 'Технологии',
            'menu_name'     => 'Технологии',
            'all_items'     => 'Все технологии',
            'add_new'       => 'Добавить технологию',
            'add_new_item'  => 'Добавить новую технологию',
            'edit'          => 'Редактировать технологию',
            'edit_item'     => 'Редактировать технологию',
            'new_item'      => 'Новая технология',
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
        'menu_position'       => 20,
        'menu_icon'           => 'dashicons-laptop',
        'hierarchical'        => false,
        'rewrite'             => [ 'slug'=>'tech-post', 'with_front'=>false, 'feeds' =>true, 'pages'=>true ],
        'has_archive'         => 'blog',
        'query_var'           => true,
        'supports'            => [ 'title', 'editor', 'excerpt', 'thumbnail' ],
        'taxonomies'          => [ 'cat-tech' ],
    ] );

}

/*function taxonomy_link($link, $term, $taxonomy)
{
    if($taxonomy !== 'cat-blog')
        return $link;
    return str_replace('cat-blog/', 'blog/', $link);
}
add_filter( 'term_link', 'taxonomy_link', 10, 3 );*/

/*function taxonomy_rewrite_rule(){
    add_rewrite_rule('cat-blog/?$', 'index.php?cat-blog=?$', 'top');
}
add_action('init', 'taxonomy_rewrite_rule');*/



