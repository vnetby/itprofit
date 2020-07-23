<?
$categoryID = [];
$categories = get_terms([
    'taxonomy' => 'cat-tech',
    'hide_empty' => false,
    'parent' => 0,
]);
if($categories)
{
    foreach ($categories as $cat)
    {
        $categoryID[] = [
            'id' => $cat->term_id,
            'name' => $cat->name
        ];
    }
}
?>
<section class="tech__section">
    <div class="container">
        <h2 class="like__h2"><?= pll__('Технологии'); ?></h2>
        <p><?= get_field('tech_text') ?></p>
        <div class="tech__wrapper flex__beetween flex__wrap">
            <? foreach ($categoryID as $category): ?>
            <div class="tech__item">
                <div class="tech__inner">
                    <span class="like__h3"><?= $category['name'] ?></span>
                    <? $args = [
                            'post_type' => 'tech-post',
                            'posts_per_page' => -1,
                            'orderby'   => 'menu_order',
                            'order'     => 'ASC',
                            'tax_query' => [
                                [
                                    'taxonomy' => 'cat-tech',
                                    'field'    => 'id',
                                    'terms'    => $category['id'],
                                ]
                            ]
                        ];
                        $technologies = new WP_Query($args);
                        if ($technologies->have_posts()) : ?>
                    <div class="tech__images flex__start flex__wrap">
                        <? while ($technologies->have_posts()) : $technologies->the_post(); ?>
                        <div class="tech__img">
                            <img src="<? the_post_thumbnail_url() ?>" alt="<? the_title() ?>" class="tech__icon">
                            <div class="tech__hidden">
                                <span class="tech__hidden__close">
                                    <img src="<?= THEME_URI; ?>/assets/images/close.svg" alt="close ico">
                                </span>
                                <div class="tech-hidden-head">
                                    <div>
                                        <? the_post_thumbnail() ?>
                                    </div>
                                    <h3 class="like__h3">
                                        <? the_title() ?>
                                    </h3>
                                </div>
                                <p><?= get_the_content() ?></p>
                                <a href="#" class="modal__close">
                                    <img src="<?= get_template_directory_uri() ?>/assets/images/close_icon.svg" alt="">
                                </a>
                            </div>
                        </div>
                        <? endwhile;
                                wp_reset_postdata(); ?>
                    </div>
                    <? endif; ?>
                </div>
            </div>
            <? endforeach; ?>
        </div>
    </div>
</section>