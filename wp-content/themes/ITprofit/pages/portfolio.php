<?php
/*
* Template Name: Шаблон страницы "Портфолио"
*/
get_header();
?>

<main itemscope itemtype="http://schema.org/Blog">
    <div class="portfolio__page">
        <section class="categories__section">
            <div class="container">
                <h1 class="h1">
                    <?= the_title() ?>
                </h1>
                <div class="categories__item">
                    <p class="gray__txt"><?= pll__('Тип проекта'); ?>:</p>
                    <div class="categories__wrapper flex__start flex__wrap posts">
                        <?php
                        $categories = get_categories([
                            'taxonomy'     => 'category',
                            'type'         => 'post',
                            'child_of'     => 0,
                            'orderby'      => 'menu_order',
                            'order'        => 'ASC',
                            'hide_empty'   => false,
                            'hierarchical' => 1,
                            'exclude'      => [1, 7],
                        ]);
                        $get_cats = get_from_get('cat', '');
                        $get_cats = explode(',', $get_cats);
                        foreach ($categories as &$cat) {
                            $is_active = in_array($cat->term_id, $get_cats);
                        ?>
                            <a href="/portfolio/<?= $cat->slug ?>" data-type="cat" data-id="<?= $cat->term_id ?>" class="<?= $is_active ? 'active' : ''; ?>"><?= $cat->name ?></a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="categories__item">
                    <p class="gray__txt"><?= pll__('Сфера'); ?>:</p>
                    <div class="categories__wrapper flex__start flex__wrap posts">
                        <?php
                        $tags = get_categories([
                            'taxonomy'     => 'post_tag',
                            'type'         => 'post',
                            'child_of'     => 0,
                            'orderby'      => 'menu_order',
                            'order'        => 'ASC',
                            'hide_empty'   => false,
                            'hierarchical' => 1,
                        ]);
                        $get_tags = get_from_get('tag', '');
                        $get_tags = explode(',', $get_tags);
                        foreach ($tags as &$tag) {
                            $is_active = in_array($tag->term_id, $get_tags);
                        ?>
                            <a href="<?= $tag->slug ?>" data-type="tag" data-id="<?= $tag->term_id ?>" class="<?= $is_active ? 'active' : ''; ?>"><?= $tag->name ?></a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="categories__item">
                    <p class="gray__txt"><?= pll__('Фильтр'); ?>:</p>
                    <div class="categories__wrapper flex__start flex__wrap posts">
                        <?php
                        $get_all = get_from_get('all', 'y');
                        ?>
                        <a href="#" data-type="all" data-all="y" class="<?= $get_all === 'y' ? 'active' : ''; ?>"><?= pll__('Все'); ?></a>
                        <a href="#" data-type="all" data-all="n" class="<?= $get_all === 'n' ? 'active' : ''; ?>"><?= pll__('Топ'); ?> 5</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="portfolio__section">
            <div class="container">
                <div class="portfolio__wrapper" itemscope itemtype="http://schema.org/Blog">
                    <?php
                    $args = get_portfolio_filter_args();
                    vnet_get_template('template-portfolio-projects-list', $args);
                    ?>
                </div>
                <?php
                $content = get_the_content();
                if ($content) {
                ?>
                    <div><?= $content; ?></div>
                <?php
                }
                ?>
            </div>
        </section>


    </div>
</main>
<?php
get_footer();
?>