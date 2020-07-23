<section class="portfolio__section">
    <div class="container">
        <h2 class="h2"><?= pll__('Наши кейсы'); ?></h2>
        <div class="portfolio__wrapper">

            <? $args = [
                'post_type' => 'post',
                'posts_per_page' => 3,
                'orderby' => 'menu_order',
                'order' => 'ASC',
            ];
            $posts = new WP_Query($args);
            if ($posts->have_posts()) : ?>
            <? while ($posts->have_posts()) : $posts->the_post(); ?>
            <div class="portfolio__item flex__beetween">
                <div class="portfolio__img">
                    <a href="<? the_permalink() ?>">
                        <div class="portfolio__bg bg__cover" style='background-image: url(<?= the_post_thumbnail_url('preview') ?>);'></div>
                    </a>
                </div>
                <div class="portfolio__about">
                    <div class="portfolio__name flex__start">
                        <a href="<? the_permalink() ?>" class="like__h3">
                            <? the_title() ?></a>
                        <? $langVersion = get_field( 'lang' ); ?>
                        <? if($langVersion): ?>
                        <div class="portfolio__lang flex__beetween">
                            <? foreach ($langVersion as $lang) : ?>
                            <img src="<?= get_the_post_thumbnail_url($lang, 'full'); ?>" width="30" alt="">
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
                            <?php
                            $total = count($catPost);
                            $count = 0;
                            foreach ($catPost as $key => $cat) {
                                $count++;
                                $link = get_category_link($cat);
                                $name = get_cat_name($cat);
                                // $name = ucfirst_utf8($name);
                                $name = $count < $total ? $name . ', ' : $name;
                            ?>
                                <a href="<?= $link; ?>"><?= $name; ?></a>
                            <?php
                            }
                            ?>
                        </p>
                    </div>
                    <div class="portfolio__info">
                        <span class="like__h4"><?= pll__('Сфера'); ?>:</span> <br>
                        <p>
                            <?= the_tags('', ', ', ''); ?>
                        </p>
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
        <a href="<? the_permalink( 16 ) ?>">
            <div class="btn_all bold transition"><?= pll__('Остальные проекты'); ?></div>
        </a>
    </div>
</section>