<?php
get_header();
$lang = pll_the_languages(['raw' => 1]);
$pageId = 24;
$language = 'ru';

if ($lang['en']['current_lang']) {
    $pageId = 26;
    $language = 'en';
}

?>

<main class="blog-page" itemscope itemtype="http://schema.org/Blog">
    <div class="blog__page">
        <?php
        vnet_get_template('template-section_blog_categories', ['pageId' => $pageId]);
        $args = [
            'post_type' => 'post-blog',
            'posts_per_page' => -1,
            'orderby'   => 'menu_order',
            'order'     => 'ASC',
        ];
        $getId = get_from_get('id');
        if ($getId) {
            $args['tax_query'] = [
                [
                    'taxonomy' => 'cat-blog',
                    'field'    => 'id',
                    'terms'    => $getId,
                ]
            ];
        }
        $blogs = new WP_Query($args);

        if ($blogs->have_posts()) {
        ?>
            <div class="ajax_container column" itemscope itemtype="http://schema.org/BlogPosting">
                <?php
                while ($blogs->have_posts()) {
                    $blogs->the_post();
                    vnet_get_template('template-section_blog_post');
                }
                ?>
            </div>
        <?php
        }
        ?>
    </div>
</main>

<? get_footer(); ?>