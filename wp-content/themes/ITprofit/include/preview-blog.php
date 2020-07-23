<section class="blog__section">
    <div class="container">
        <h2 class="h2">Блог</h2>
        <? $args = [
            'post_type' => 'post-blog',
            'posts_per_page' => 3,
            'orderby' => 'menu_order',
            'order' => 'ASC',
        ];
        $blogs = new WP_Query($args);
        if ($blogs->have_posts()) : ?>
            <? while ($blogs->have_posts()) : $blogs->the_post(); ?>
                <div class="blog__item">
                    <a href="<? the_permalink() ?>">
                        <div class="blog__img bg__cover"
                             style='background-image: url(<? the_post_thumbnail_url('preview-blog') ?>);'>
                        </div>
                    </a>
                    <div class="blog_h3"><a href="<? the_permalink() ?>" class="like__h3"><? the_title() ?></a></div>
                    <? $terms = get_the_terms(get_the_ID(), 'cat-blog');
                    if ($terms): ?>
                        <div class="tags__block">
                            <? foreach ($terms as $term): ?>
                                <a class="blue__txt bold" data-id="<?= $term->term_id ?>"
                                   href="javascript:void(0);"><?= $term->name ?></a>
                            <? endforeach; ?>
                        </div>
                    <? endif; ?>
                    <? the_excerpt(); ?>
                </div>
            <? endwhile;
            wp_reset_postdata(); ?>
        <? endif; ?>
    </div>
</section>
