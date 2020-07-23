<?php
$args = get_field('service_adv');
if (!is_array($args)) return;
?>
<section class="advantages_section" data-admin>
  <div class="container">
    <div class="advantages__wrapper flex__beetween flex__wrap">
      <?php
      foreach ($args as &$item) {
        $title = get_from_array($item, 'title');
        $desc = get_from_array($item, 'desc');
        if (!$title || !$desc) continue;
      ?>
        <div class="advantages__item transition">
          <div class="title">
            <span class="like__h3"><?= $title; ?></span>
          </div>
          <p><?= $desc; ?></p>
        </div>
      <?php
      }
      ?>
    </div>
  </div>
</section>