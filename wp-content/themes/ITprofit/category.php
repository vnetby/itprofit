<? get_header();
$c = get_category(get_query_var('cat'), OBJECT);
?>
<main>
    <div class="portfolio__page">
        <section class="categories__section">
            <div class="container">
                <h1 class="h1"><?= $c->name ?></h1>
                <div class="categories__item">
                    <p class="gray__txt"><?= pll__('Тип проекта'); ?>:</p>
                    <div class="categories__wrapper flex__start flex__wrap posts">
                        <? $categories = get_categories( [
                            'taxonomy'     => 'category',
                            'type'         => 'post',
                            'child_of'     => 0,
                            'orderby'      => 'menu_order',
                            'order'        => 'ASC',
                            'hide_empty'   => false,
                            'hierarchical' => 1,
                            'exclude'      => [1,7],
                        ] );
                        foreach ($categories as $cat): ?>
                            <a <? if( $cat->term_id == $c->term_id ): ?>class="active"<? endif; ?>
                                    href="/portfolio/<?= $cat->slug ?>"
                                    data-type="cat"
                                    data-id="<?= $cat->term_id ?>"
                            ><?= $cat->name ?></a>
                        <? endforeach; ?>
                    </div>
                </div>
                <div class="categories__item">
                    <p class="gray__txt"><?= pll__('Сфера'); ?>:</p>
                    <div class="categories__wrapper flex__start flex__wrap posts">
                        <? $tags = get_categories( [
                            'taxonomy'     => 'post_tag',
                            'type'         => 'post',
                            'child_of'     => 0,
                            'orderby'      => 'menu_order',
                            'order'        => 'ASC',
                            'hide_empty'   => false,
                            'hierarchical' => 1,
                        ] );
                        foreach ($tags as $tag): ?>
                            <a href="<?= $tag->slug ?>" data-type="tag" data-id="<?= $tag->term_id ?>"><?= $tag->name ?></a>
                        <? endforeach; ?>
                    </div>
                </div>
                <div class="categories__item">
                    <p class="gray__txt"><?= pll__('Фильтр'); ?>:</p>
                    <div class="categories__wrapper flex__start flex__wrap posts">
                        <a href="#" data-type="all" data-all="y"><?= pll__('Все'); ?></a>
                        <a href="#" data-type="all" data-all="n" class="active"><?= pll__('Топ'); ?> 10</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="portfolio__section">
            <div class="container">
                <div class="portfolio__wrapper">
                    <? $args = [
                        'post_type' => 'post',
                        'posts_per_page' => 10,
                        'orderby' => 'menu_order',
                        'order' => 'ASC',
                        'category__in' => $c->term_id
                    ];
                    $posts = new WP_Query($args);
                    if ($posts->have_posts()) : ?>
                        <? while ($posts->have_posts()) : $posts->the_post(); ?>
                            <div class="portfolio__item flex__beetween">
                                <div class="portfolio__img">
                                    <a href="<? the_permalink() ?>">
                                        <div class="portfolio__bg bg__cover" style='background: url(<?= the_post_thumbnail_url( 'preview' ) ?>);'></div>
                                    </a>
                                </div>
                                <div class="portfolio__about">
                                    <div class="portfolio__name flex__start">
                                        <a href="<? the_permalink() ?>" class="like__h3"><? the_title() ?></a>
                                        <? $langVersion = get_field( 'lang' ); ?>
                                        <? if($langVersion): ?>
                                            <div class="portfolio__lang flex__beetween">
                                                <? foreach ($langVersion as $lang) : ?>
                                                    <img src="<?= get_the_post_thumbnail_url( $lang, 'full' ); ?>" width="30" alt="">
                                                <? endforeach; ?>
                                            </div>
                                        <? endif; ?>
                                    </div>
                                    <div class="portfolio__info">
                                        <? $args = [
                                            'fields' => 'ids',
                                            'orderby' => 'menu_order',
                                            'order' => 'ASC',
                                        ];
                                        $catPost = wp_get_post_categories( get_the_ID(), $args ); ?>
                                        <span class="like__h4"><?= pll__('Тип проекта'); ?>:</span> <br>
                                        <p>
                                            <? foreach ($catPost as $key => $cat ): ?>
                                                <? if($key != 0): ?>, <? endif; ?>
                                                <a href="<?= get_category_link($cat) ?>"><?= get_cat_name($cat) ?></a>
                                            <? endforeach; ?>
                                        </p>
                                    </div>
                                    <div class="portfolio__info">
                                        <span class="like__h4"><?= pll__('Сфера'); ?>:</span> <br>
                                        <p><? the_tags( '', ' , ', '' ); ?></p>
                                    </div>
                                    <div class="btn__portfolio">
                                        <span><?= get_the_excerpt() ?></span>
                                    </div>

                                </div>
                            </div>
                        <? endwhile;
                        wp_reset_postdata(); ?>
                    <? endif; ?>
                </div>
            </div>
        </section>

    </div>
</main>
<? get_footer(); ?>
