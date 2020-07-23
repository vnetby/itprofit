<div class="clients__wrapper">
    <? $args = [
        'post_type' => 'clients-post',
        'posts_per_page' => 8,
        'orderby' => 'menu_order',
        'order' => 'ASC',
    ];
    $posts = new WP_Query($args);
    if ($posts->have_posts()) : ?>
    <? while ($posts->have_posts()) : $posts->the_post(); ?>
    <div class="clients-col">
        <a href="https://<?= get_field('link') ?>" target="_blank" rel="nofollow">
            <? the_post_thumbnail() ?>
        </a>
    </div>
    <? endwhile;
        wp_reset_postdata(); ?>
    <? endif; ?>
</div>