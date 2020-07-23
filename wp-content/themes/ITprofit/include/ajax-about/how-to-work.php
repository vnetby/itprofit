<div class="container">
    <h2 class="h2"><?= pll__('Как мы работаем'); ?></h2>
    <div class="work__inner">
        <? $args = [
            'post_type' => 'work-post',
            'posts_per_page' => -1,
            'orderby'   => 'menu_order',
            'order'     => 'ASC',
        ];
        $posts = new WP_Query($args);
        if ($posts->have_posts()) :
            $index = 1; ?>
            <? while ($posts->have_posts()) : $posts->the_post(); ?>
            <div class="work__item">
                <div class="work__item__title flex__start">
                    <div class="work__item__number"><?= $index ?></div>
                    <span class="like__h3"><? the_title() ?></span>
                </div>
                <?= get_the_content() ?>
                <? if( has_post_thumbnail() ): ?>
                    <a href="<? the_post_thumbnail_url() ?>" class="fancy_img">
                        <div class="btn__show">
                            <?= get_field('button_text') ?>
                        </div>
                    </a>
                <? endif; ?>
            </div>
            <? $index++; endwhile;
            wp_reset_postdata(); ?>
        <? endif; ?>
    </div>
    <a href="<?= get_permalink(35) ?>">
        <div class="btn_new transition"><?= pll__('Оценить проект'); ?></div>
    </a>
</div>
<script>
    fancyImg();
</script>
