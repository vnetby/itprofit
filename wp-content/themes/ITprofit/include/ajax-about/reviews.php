<div class="container">
    <h2 class="h2"><?= pll__('Отзывы'); ?></h2>
    <div class="tech__wrapper flex__beetween flex__wrap">
        <? $args = [
            'post_type' => 'reviews-post',
            'posts_per_page' => -1,
            'orderby'   => 'menu_order',
            'order'     => 'ASC',
        ];
        $posts = new WP_Query($args);
        if ($posts->have_posts()) : ?>
            <? while ($posts->have_posts()) : $posts->the_post(); ?>
                <div class="tech__item">
                    <div class="tech__inner">
                        <h4 class="like__h4"><? the_title() ?></h4>
                        <p>“<?= get_the_content() ?>”</p>
                        <? if( has_post_thumbnail() ): ?>
                            <a href="<? the_post_thumbnail_url() ?>" class="fancy_img">
                                <div class="btn__show"><?= pll__('Посмотреть отзыв'); ?></div>
                            </a>
                        <? endif; ?>
                    </div>
                </div>
            <? endwhile;
            wp_reset_postdata(); ?>
        <? endif; ?>
    </div>
</div>
<script>
    fancyImg();
</script>
