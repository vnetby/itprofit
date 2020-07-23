<div class="container">
    <h2 class="h2"><?= pll__('Вакансии'); ?></h2>
    <p>“Выражаем благодарность команде Seobility за эффективное сотрудничество.
        Для нас важен 100% результат, и мы рады, что не ошиблись с выбором компании для продвижения нашего бизнеса в интернете.”</p>
    <div class="tech__wrapper flex__beetween flex__wrap">
        <? $args = [
            'post_type' => 'vacancies-post',
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
                        <?= get_the_content() ?>
                    </div>
                </div>
            <? endwhile;
            wp_reset_postdata(); ?>
        <? endif; ?>

    </div>
</div>
