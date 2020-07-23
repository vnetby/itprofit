<?php
$field = get_field('about_work_models');
if (!$field) return;


$title = get_from_array($field, 'title');
$models = get_from_array($field, 'models', []);
?>

<section class="model-work-section">
  <div class="container">
    <?php
    if ($title) {
    ?>
      <h2 class="like__h2 block-title"><?= $title; ?></h2>
    <?php
    }
    ?>
    <div class="models-list">
      <?php
      foreach ($models as $model) {
        $title = get_from_array($model, 'title');
        $desc = get_from_array($model, 'desc');
      ?>
        <div class="model-col">
          <div class="model-item">
            <?php
            if ($title) {
            ?>
              <h3 class="like__h3 model-title"><?= $title; ?></h3>
            <?php
            }
            if ($desc) {
            ?>
              <div class="model-desc">
                <?= $desc; ?>
              </div>
            <?php
            }
            ?>
          </div>
        </div>
      <?php
      }
      ?>
    </div>
    <?php

    ?>

  </div>
</section>