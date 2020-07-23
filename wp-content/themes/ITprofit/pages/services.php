<?
/*
* Template Name: Шаблон страницы "Услуги и цены"
*/
define('VSEO_PAGE_SERVICES', true); // Используется для генерации json_ld (class-vnet-seo)
get_header(); ?>

<main class="services-page">
    <div class="container">
        <h1 class="h1">
            <? the_title() ?>
        </h1>
    </div>

    <section class="advantages_section">
        <div class="container">
            <div class="advantages__wrapper flex__beetween flex__wrap">
                <? $args = [
                    'post_type' => 'services',
                    'posts_per_page' => -1,
                    'orderby' => 'menu_order',
                    'order' => 'ASC',
                ];
                $posts = new WP_Query($args);
                if ($posts->have_posts()) : ?>
                <? while ($posts->have_posts()) : $posts->the_post(); ?>
                <a href="<? the_permalink() ?>" class="advantages__item transition">
                    <div class="title"><span class="like__h3">
                            <? the_title() ?></span></div>
                    <? $arrBorderText = [];
                            for ($i = 1; $i <= 3; $i++) {
                                if (get_field("border_text_$i")) {
                                    $arrBorderText[] = get_field("border_text_$i");
                                }
                            }
                            if ($arrBorderText) : ?>
                    <span class="gray__txt">
                        <? foreach ($arrBorderText as $key => $item): ?>
                        <? if ($key != 0): ?><br>
                        <? endif; ?><?= $item ?>
                        <? endforeach; ?>
                    </span>
                    <? endif; ?>
                    <p><?= get_the_excerpt() ?></p>
                    <?php
                    $nombre_format_francais = number_format(get_field('price'), 0, '', ' ');
                    ?>
                    <span class="like__h4 service-midle-price">Средняя стоимость: <span class="blue__txt price"><?= $nombre_format_francais ?> USD</span></span>
                </a>
                <? endwhile;
                    wp_reset_postdata(); ?>
                <? endif; ?>
            </div>
            <? if(get_the_content()): ?>
            <div>
                <? the_content(); ?>
            </div>
            <? endif; ?>
        </div>
    </section>


</main>

<? get_footer(); ?>