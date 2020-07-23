<?php

$projectArr = get_field('project');
if (!$projectArr) return;

?>
<section class="portfolio__section portfolio__slider">
  <div class="container">

    <div class="portfolio__wrapper">
      <? foreach ($projectArr as $item ): ?>
      <div class="portfolio__item flex__beetween">
        <div class="portfolio__img">
          <a href="<? the_permalink( $item ) ?>">
            <div class="portfolio__bg bg__cover" style='background-image: url(<?= get_the_post_thumbnail_url($item, 'preview') ?>);'></div>
          </a>
        </div>
        <div class="portfolio__about">
          <div class="portfolio__name flex__start">
            <a href="<? the_permalink( $item ) ?>" class="like__h3"><?= get_the_title($item) ?></a>
            <? $langVersion = get_field( 'lang', $item ); ?>
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
                                    'fields' => 'names',
                                    'orderby' => 'menu_order',
                                    'order' => 'ASC',
                                ];
                                $catPost = wp_get_post_categories( $item, $args ); ?>
            <span class="like__h4"><?= pll__('Тип проекта'); ?>:</span> <br>
            <p><?= implode(', ', $catPost) ?></p>
          </div>
          <div class="portfolio__info">
            <span class="like__h4"><?= pll__('Сфера'); ?>:</span> <br>
            <? $tags = get_the_tags( $item ); ?>
            <p>
              <? foreach ($tags as $key => $tag): ?>
              <? if($key != 0): ?>,
              <? endif; ?>
              <?= $tag->name ?>
              <? endforeach; ?>
            </p>
          </div>
          <div class="btn__portfolio">
            <span><?= get_the_excerpt($item) ?></span>
          </div>

        </div>
      </div>
      <? endforeach; ?>

    </div>
    <div class="arrows__block flex__beetween"></div>
  </div>
</section>