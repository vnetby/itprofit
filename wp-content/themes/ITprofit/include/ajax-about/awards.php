<div class="container">
    <h2 class="h2"><?= pll__('Награды'); ?></h2>
    <div class="leaders__wrapper flex__beetween flex__wrap">

        <? $args = [
            'post_type' => 'awards-post',
            'posts_per_page' => -1,
            'orderby'   => 'menu_order',
            'order'     => 'ASC',
        ];
        $posts = new WP_Query($args);
        if ($posts->have_posts()) : ?>
                <? while ($posts->have_posts()) : $posts->the_post(); ?>
                    <div class="leaders__item flex__start">
                        <div class="leaders__img">
                            <? the_post_thumbnail() ?>
                        </div>
                        <div class="leaders__txt bold">
                            <?= get_the_excerpt() ?>
                        </div>
                    </div>
                <? endwhile;
                wp_reset_postdata(); ?>
        <? endif; ?>

    </div>
</div>
