<?php

/**
 * Шапка статьи блога
 */

$id = get_the_ID();
$title = get_the_title();
$readTime = get_field('blog_read_time');
$author = get_field('blog_author');

$terms = get_the_terms($id, 'cat-blog');

?>

<section class="section section-blog-art-head">
  <div class="container">
    <div class="breadcrumbs-row">
      <?php
      get_template_part('/include/breadcrumbs');
      ?>
    </div>
    <h1 class="art-title" itemprop="name">
      <?= $title; ?>
    </h1>
    <div class="art-meta">
      <?php
      if ($readTime) {
      ?>
        <div class="time-reading">
          <span class="label"><?= pll__('Время на чтение:'); ?></span>
          <span class="value fw-bold"><?= $readTime; ?></span>
        </div>
      <?php
      }
      if ($terms) {
      ?>
        <div class="tags__block">
          <?php
          foreach ($terms as &$term) {
            $termId = get_from_object($term, 'term_id');
            $name = get_from_object($term, 'name');
            $termLink = get_term_link($termId, 'cat-blog');
          ?>
            <a class="blue__txt bold" data-id="<?= $termId; ?>" href="<?= $termLink; ?>">
              <?= $name; ?>
            </a>
          <?php
          }
          ?>
        </div>
      <?php
      }
      ?>
    </div>
    <div class="art-head-bottom">
      <div class="art-summary">
        <div class="summary-list js-art-summary">
          <?= do_shortcode('[lwptoc]'); ?>
        </div>
      </div>

      <?php
      if ($author) {
        $authorThumb = get_the_post_thumbnail_url($author->ID, 'medium');
        $authorTitle = get_the_title($author->ID);
        $authorProfile = get_field('author_profile', $author->ID);
        $position = get_from_array($authorProfile, 'position');
      ?>
        <div class="athor-block">
          <div class="avatar">
            <img src="<?= $authorThumb; ?>" alt="author avatar">
          </div>
          <div class="content fs-20 c-gray">
            <div class="content-row">
              <?= $authorTitle; ?>
            </div>
            <div class="content-row">
              <?= $position; ?>
            </div>
          </div>
        </div>
      <?php
      }
      ?>
    </div>
  </div>
</section>