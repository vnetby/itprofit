<?php 
get_header(); 
global $post;
$img = get_the_post_thumbnail_url($post, 'full');
?>

<main class="portfolio-inner" itemscope itemtype="http://schema.org/Article">
    <div class="head__bg bg__cover">
        <?php
        if ($img) {
            ?>
            <img src="<?= $img; ?>" alt="article image" itemprop="image">
            <?php
        }
        ?>
    </div>
    <section class="info__block">
        <div class="container">
            <? get_template_part( '/include/breadcrumbs' ); ?>
            <div class="portfolio__about">
                <div class="portfolio__name flex__start">
                    <h1 class="like__h1" itemprop="headline"><?= the_title() ?></h1>
                    <? $langVersion = get_field( 'lang' ); ?>
                    <? if($langVersion): ?>
                    <div class="portfolio__lang flex__beetween">
                        <? foreach ($langVersion as $lang) : ?>
                        <img src="<?= get_the_post_thumbnail_url($lang, 'full'); ?>" width="30" alt="">
                        <? endforeach; ?>
                    </div>
                    <? endif; ?>
                </div>
                <div class="portfolio-info__wrapper flex__beetween">
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
                            <? the_tags( '', ', ', '' ); ?>
                        </p>
                    </div>
                </div>

                <div class="btn__portfolio">
                    <span><?= get_the_excerpt() ?></span>
                </div>
                <div class="info__txt">
                    <h2 class="h2"><?= pll__('Задача'); ?></h2>
                    <p><?= get_field('task'); ?></p>
                </div>
                <div class="info__txt">
                    <h2 class="h2"><?= pll__('Решение'); ?></h2>
                    <div class="editor-content">
                        <?= get_field('decision'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <article itemprop="articleBody">

        <? $max_i = 6;
    $arrBlocks = [];
    for($i = 1; $i <= $max_i; $i++){
        $arrBlocks[$i]['type'] = get_field( "type_$i" );
        $arrBlocks[$i]['image'] = get_field( "image_$i" );
        $arrBlocks[$i]['image_dop'] = get_field( "image_dop_$i" );
        $arrBlocks[$i]['text'] = get_field( "text_$i" );
    }

    foreach ($arrBlocks as $block): ?>
        <div class="block<?= $block['type'] ?> block__item">
            <? switch ($block["type"]):
                case '1' : ?>
            <div class="container">
                <a href="<?= $block["image"]["url"] ?>" data-fancybox='gallery'>
                    <div class="block__img bg__cover" style='background-image: url(<?= $block["image"]["url"] ?>);'></div>
                </a>
                <? if($block["text"]): ?>
                <div class="block__txt"><?= $block["text"] ?></div>
                <? endif; ?>
            </div>
            <? break;
                    case '2': ?>
            <a href="<?= $block["image"]["url"] ?>" data-fancybox='gallery'>
                <div class="block__img bg__cover" style='background-image: url(<?= $block["image"]["url"] ?>);'></div>
            </a>
            <? if($block["text"]): ?>
            <div class="container">
                <div class="block__txt"><?= $block["text"] ?></div>
            </div>
            <? endif; ?>
            <? break;
                    case '3': ?>
            <div class="container">
                <div class="block__wrapper flex__beetween">
                    <a href="<?= $block["image"]["url"] ?>" data-fancybox='gallery'>
                        <div class="block__img bg__cover" style='background-image: url(<?= $block["image"]["url"] ?>);'></div>
                    </a>
                    <a href="<?= $block["image_dop"]["url"] ?>" data-fancybox='gallery'>
                        <div class="block__img bg__cover" style='background-image: url(<?= $block["image_dop"]["url"] ?>);'></div>
                    </a>
                </div>
                <? if($block["text"]): ?>
                <div class="block__txt"><?= $block["text"] ?></div>
                <? endif; ?>
            </div>
            <? break;
                    case '4': ?>
            <div class="container">
                <a href="<?= $block["image"]["url"] ?>" data-fancybox='gallery'>
                    <div class="block__img bg__cover" style='background-image: url(<?= $block["image"]["url"] ?>);'></div>
                </a>
                <? if($block["text"]): ?>
                <div class="block__txt"><?= $block["text"] ?></div>
                <? endif; ?>
            </div>
            <? break;
                    case '5': ?>
            <div class="container">
                <div class="block__wrapper flex__beetween">
                    <a href="<?= $block["image"]["url"] ?>" data-fancybox='gallery'>
                        <div class="block__img bg__cover" style='background-image: url(<?= $block["image"]["url"] ?>);'></div>
                    </a>
                    <? if($block["text"]): ?>
                    <div class="block__txt"><?= $block["text"] ?></div>
                    <? endif; ?>
                </div>
            </div>
            <? break;
                    case '6': ?>
            <div class="container">
                <div class="block__wrapper flex__beetween">
                    <a href="<?= $block["image"]["url"] ?>" data-fancybox='gallery'>
                        <div class="block__img bg__cover" style='background-image: url(<?= $block["image"]["url"] ?>);'></div>
                    </a>
                    <? if($block["text"]): ?>
                    <div class="block__txt"><?= $block["text"] ?></div>
                    <? endif; ?>
                </div>
            </div>
            <? break;
                    endswitch; ?>
        </div>
        <? endforeach; ?>

        <? if (have_posts()):while (have_posts()):the_post(); ?>
        <? the_content(); ?>
        <? endwhile; endif; ?>
    </article>

    <div class="container flex__beetween">
        <?
        $next = get_previous_post();
        $next = $next ? $next : vnet_get_first_post('post');
        $prev = get_next_post();
        $prev = $prev ? $prev : vnet_get_last_post('post');
        ?>
        <? if($prev): ?>
        <a href="<?= get_permalink($prev); ?>" class="next__block">
            <div class="btn_new transition"><?= pll__('Предыдущий проект'); ?></div>
        </a>
        <? endif; ?>
        <? if($next): ?>
        <a href="<?= get_permalink($next); ?>" class="next__block">
            <div class="btn_new transition"><?= pll__('Следующий проект'); ?></div>
        </a>
        <? endif; ?>
    </div>
</main>

<? get_footer(); ?>