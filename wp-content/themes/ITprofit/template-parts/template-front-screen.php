<?php
$field = get_field('home_first_screen');
if (!$field) return;

$title = get_from_array($field, 'title');
$subtitle = get_from_array($field, 'subtitle');
$btn_text = get_from_array($field, 'btn_text');
$btn_link = get_from_array($field, 'btn_link');
$icons = get_array_from_array($field, 'icons');
$bottom_links = get_array_from_array($field, 'bottom_links');
?>

<section class="design">
  <div class="container column">
    <div class="hidden">
      <?php
      if ($title) {
      ?>
        <h1 class="h1 page-title"><?= $title; ?></h1>
      <?php
      }
      ?>
    </div>
    <?php
    if ($subtitle) {
    ?>
      <div class="hidden">
        <h2 class="page-subtitle"><?= $subtitle; ?></h2>
      </div>
    <?php
    }
    if ($btn_link) {
    ?>
      <div class="hidden btn-row">
        <a href="<?= $btn_link; ?>" class="btn__span">
          <div class="btn_new hidden_btn transition"><?= $btn_text; ?></div>
        </a>
      </div>
    <?php
    }
    ?>
  </div>
  <div class="container info-block-container">
    <div class="info__block">
      <?php
      if ($icons) {
      ?>
        <div class="logos-list">
          <?php
          foreach ($icons as $ico) {
            if (!$ico) continue;
            $ico = wp_get_attachment_image_url($ico, 'full');
            if (!$ico) continue;
          ?>
            <div class="logo-item">
              <img src="<?= $ico; ?>" alt="image">
            </div>
          <?php
          }
          ?>
        </div>
      <?php
      }
      if ($bottom_links) {
      ?>
        <div class="points-list">
          <?php
          foreach ($bottom_links as &$item) {
            $text = get_from_array($item, 'text');
            $link = get_from_array($item, 'link');
            if (!$link) {
          ?>
              <div class="point-item">
                <span class="text"><?= $text; ?></span>
              </div>
            <?php
            } else {
            ?>
              <div class="point-item">
                <a href="<?= $link; ?>" class="blue__txt point-link text"><?= $text; ?></a>
              </div>
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