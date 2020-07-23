<div class="container">
    <h2 class="h2"><?= pll__('Клиенты'); ?></h2>
    <div class="clients__wrapper">
        <? $args = [
            'post_type' => 'clients-post',
            'posts_per_page' => -1,
            'orderby'   => 'menu_order',
            'order'     => 'ASC',
        ];
        $clients = new WP_Query($args);
        if ($clients->have_posts()) : ?>
        <? while ($clients->have_posts()) : $clients->the_post(); ?>
        <div class="clients-col">
            <a href="https://<?= get_field('link') ?>" target="_blank" rel="nofollow">
                <? the_post_thumbnail() ?>
            </a>
        </div>
        <? endwhile;
            wp_reset_postdata(); ?>
        <? endif; ?>
    </div>
</div>