<?php
$args = get_field('service_popular_tags');
if (!is_array($args)) return;

$title = get_from_array($args, 'title');
$desc = get_from_array($args, 'desc');
$tags_tags = get_array_from_array($args, 'tags_tags');
$tags_cats = get_array_from_array($args, 'tags_cats');

?>


<section class="tags__section" data-admin>
  <div class="container">
    <div class="popular__tags">
      <?php
      if ($title) {
      ?>
        <h2 class="h2"><?= $title; ?></h2>
      <?php
      }
      if ($desc) {
      ?>
        <p><?= $desc; ?></p>
      <?php
      }
      if ($tags_tags || $tags_cats) {
      ?>
        <div class="btn__wrapper flex__start flex__wrap">
          <?php
          if ($tags_tags) {
            foreach ($tags_tags as &$tag_id) {
              $term = get_term($tag_id, 'post_tag');
              $name = get_from_object($term, 'name');
              $link = get_term_link($term, 'post_tag');
          ?>
              <a href="<?= $link; ?>">
                <div class="btn_new transition"><?= $name; ?></div>
              </a>
            <?php
            }
          }
          if ($tags_cats) {
            foreach ($tags_cats as &$tag_id) {
              $term = get_term($tag_id, 'category');
              $name = get_from_object($term, 'name');
              $link = get_term_link($term, 'category');
            ?>
              <a href="<?= $link; ?>">
                <div class="btn_new transition"><?= $name; ?></div>
              </a>
          <?php
            }
          }
          ?>
        </div>
      <?php
      }
      ?>
    </div>
  </div>
</section>