<?php
$posts = new WP_Query($args);
if ($posts->have_posts()) {
  while ($posts->have_posts()) {

    $posts->the_post();


    global $post;



    $langVersion = get_field('lang');
    $title = $post->post_title;
    $link = get_permalink();

    $img = get_the_post_thumbnail_url($post->ID, 'preview');

    $catArgs = [
      'fields' => 'ids',
      'orderby' => 'menu_order',
      'order' => 'ASC',
    ];


    $catPost = wp_get_post_categories($post->ID, $catArgs);






?>
    <article class="portfolio__item flex__beetween" itemprop="blogPosts" itemscope itemtype="http://schema.org/BlogPosting">
      <div class=" portfolio__img">
        <a href="<?= $link; ?>">
          <div class="portfolio__bg bg__cover">
            <?php
            if ($img) {
            ?>
              <img src="<?= $img; ?>" alt="service image image" itemprop="image">
            <?php
            }
            ?>
          </div>
        </a>
      </div>
      <div class="portfolio__about">
        <div class="portfolio__name flex__start">
          <h3 itemprop="name">
            <a href="<?= $link; ?>" class="like__h3" itemprop="url"><?= $title; ?></a>
          </h3>
          <?php

          if ($langVersion) {
          ?>
            <div class="portfolio__lang flex__beetween">
              <?php
              foreach ($langVersion as $lang) {
              ?>
                <img src="<?= get_the_post_thumbnail_url($lang, 'full'); ?>" width="30" alt="image">
              <?php
              }
              ?>
            </div>
          <?php
          }
          ?>
        </div>
        <div class="portfolio__info">
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
        <div class="btn__portfolio" itemprop="description">
          <span><?= get_the_excerpt() ?></span>
        </div>

      </div>
    </article>
  <?php
  }
  wp_reset_postdata();
} else {
  ?>
  <p><?= pll__('По Вашему запросу ничего не найдено'); ?></p>
<?php
}
wp_reset_query();
?>