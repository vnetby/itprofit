<?php
$pageId = get_from_array($args, 'pageId');

$categories = get_terms([
  'taxonomy'      => 'cat-blog',
  'hide_empty'    => false,
  'parent'        => 0,
]);

$title = get_the_title($pageId);
?>

<section class="categories__section" data-admin>
  <div class="container">
    <h1 class="h1"><?= $title ?></h1>
    <div class="categories__item">
      <?php
      if ($categories) {
        $getId = get_from_get('id');
      ?>
        <div class="categories__wrapper categories__wrapper__blog flex__start flex__wrap">
          <a href="#" data-id="" <?= $getId ? 'class="active"' : ''; ?> itemprop="url">Все</a>
          <?php
          foreach ($categories as &$cat) {
            $termId = get_from_object($cat, 'term_id');
            $isActive = $termId === $getId;
            $name = get_from_object($cat, 'name');
          ?>
            <a href="#" data-id="<?= $termId; ?>" <?= $isActive ? 'class="active"' : ''; ?> itemprop="url">
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
  </div>
</section>