<?php
$link = get_permalink();
$title = get_the_title();
$img = get_the_post_thumbnail_url(null, 'preview-blog');
$id = get_the_ID();

$terms = get_the_terms($id, 'cat-blog');

?>

<article class="blog__section">
  <div class="container">
    <div class="blog__item">
      <a href="<?= $link; ?>" itemprop="url">
        <div class="blog__img bg__cover">
          <?php
          if ($img) {
          ?>
            <img src="<?= $img; ?>" alt="article image" itemprop="image">
          <?php
          }
          ?>
        </div>
      </a>
    </div>
    <div class="blog_h3">
      <a href="<?= $link; ?>" class="like__h3" itemprop="name">
        <?= $title; ?>
      </a>
    </div>
    <?php
    if ($terms) {
    ?>
      <div class="tags__block">
        <?php
        foreach ($terms as &$term) {
        ?>
          <a class="blue__txt bold" data-id="<?= $term->term_id ?>" href="javascript:void(0);"><?= $term->name ?></a>
        <?php
        }
        ?>
      </div>
    <?php
    }
    the_excerpt();
    ?>
  </div>
</article>