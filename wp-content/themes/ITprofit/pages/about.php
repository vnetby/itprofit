<?
/*
* Template Name: Шаблон страницы "О компании"
*/
define('VSEO_PAGE_ABOUT', true); // Используется для генерации json_ld (class-vnet-seo)

get_header();

?>

<main class="about-page">
    <div class="about__inner">
        <section class="categories__section">
            <div class="container">
                <h1 class="h1">
                    <? the_title() ?>
                </h1>
                <div class="categories__item" id="about_top">
                    <div class="categories__wrapper about-tabs__btn flex__start flex__wrap">
                        <a href="#about-us__block" class="active" data-id="1" data-name="about-us"><?= pll__('О нас'); ?></a>
                        <a href="#how-to-work__block" data-id="2" data-name="how-to-work"><?= pll__('Как мы работаем'); ?></a>
                        <a href="#vacancies__block" data-id="3" data-name="vacancies"><?= pll__('Вакансии'); ?></a>
                        <a href="#awards__block" data-id="4" data-name="awards"><?= pll__('Награды'); ?></a>
                        <a href="#reviews__block" data-id="5" data-name="reviews"><?= pll__('Отзывы'); ?></a>
                        <a href="#clients__block" data-id="6" data-name="clients"><?= pll__('Клиенты'); ?></a>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="about__tabs__inner">
        <div class='about__tabs__item' id="about-us__block" data-id="1">
            <section class="about__section">
                <div class="container">
                    <h2 class="like__h2"><?= pll__('О нас'); ?></h2>
                    <div class="editor-content">
                        <? if (have_posts()):while (have_posts()):the_post(); ?>
                        <? if(get_the_content()): ?>
                        <? the_content(); ?>
                        <? endif; ?>
                        <? endwhile; endif; ?>
                    </div>
                </div>
            </section>

            <? get_template_part( '/include/awards' ); ?>

            <section class="clients__section">
                <div class="container">
                    <h2 class="like__h2"><?= pll__('Клиенты'); ?></h2>

                    <? get_template_part( '/include/clients' ); ?>

                    <a href="#about_top" data-id="6" class="scroll_top">
                        <div class="btn_all transition bold"><?= pll__('Все клиенты'); ?> </div>
                    </a>
                </div>
            </section>

            <section class="team__section">
                <div class="container">
                    <h2 class="like__h2"><?= pll__('Команда'); ?></h2>
                    <p><?= get_field('team_text') ?></p>
                </div>
            </section>

            <?php
            get_template_part('/include/technology');
            get_template_part('/include/work_models');
            get_template_part('/include/commercial');
            ?>

        </div>
        <div class='about__tabs__item' id="how-to-work__block" data-id="2"></div>
        <div class="about__tabs__item" id="vacancies__block" data-id="3"></div>
        <div class="about__tabs__item" id="awards__block" data-id="4"></div>
        <div class="about__tabs__item" id="reviews__block" data-id="5"></div>
        <div class="about__tabs__item" id="clients__block" data-id="6"></div>
    </div>
</main>

<? get_footer(); ?>