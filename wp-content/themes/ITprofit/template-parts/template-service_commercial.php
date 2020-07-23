<?php
$args = get_field('commercial_offer');
if (!is_array($args)) return;

$display = get_from_array($args, 'display');
if (!$display) return;

$title = get_from_array($args, 'title');
$desc = get_from_array($args, 'desc');

if (!$title && !$desc) return;

$link = get_from_array($args, 'link');
$btn_text = get_from_array($args, 'btn_text');
?>

<section class="get__offer">
  <div class="container">
    <div class="get__offer__inner">
      <?php
      if ($title) {
      ?>
        <h2 class="like__h3 block-title"><?= $title; ?></h2>
      <?php
      }
      if ($desc) {
      ?>
        <div class="block-desc">
          <?= $desc; ?>
        </div>
      <?php
      }
      if ($link) {
      ?>
        <a href="<?= $link; ?>">
          <div class="btn_new transition"><?= $btn_text; ?></div>
        </a>
      <?php
      }
      ?>

    </div>
  </div>
</section>