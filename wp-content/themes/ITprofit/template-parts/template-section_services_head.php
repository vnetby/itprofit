    <?php
    $imgSvg = get_field('img_svg');
    $arrImg = [];
    if (!$imgSvg) {
      for ($i = 1; $i <= 4; $i++) {
        $img = get_field("img_$i");
        if ($img) $arrImg[] = $img;
      }
    }
    global $post;
    ?>
    <section class="websites-head">
      <div class="container">
        <?= get_template_part('/include/breadcrumbs'); ?>
        <h1 class="h1">
          <?= the_title() ?>
        </h1>
        <div class="websites-head__wrapper flex__beetween">
          <div class="websites-head__txt">
            <?php
            echo $post->post_content;
            ?>
          </div>
          <div class="websites-head__right">
            <?php

            if ($imgSvg) {
            ?>
              <div class="websites-head__images flex flex__wrap steps-images-wrap">
                <div class="websites-head__img steps-image">
                  <img src="<?= THEME_URI; ?>/assets/images/steps.svg" alt="steps">
                </div>
              </div>
            <?php
            }

            if (count($arrImg) > 0) {
            ?>
              <div class="websites-head__images flex flex__wrap">
                <?php
                foreach ($arrImg as $img) {
                  $url = get_from_array($img, 'url');
                  $fileName = get_from_array($img, 'filename');
                ?>
                  <div class="websites-head__img">
                    <img src="<?= $url; ?>" alt="<?= $fileName; ?>">
                  </div>
                <?php
                }
                ?>
              </div>
            <?php
            }
            ?>

            <? $arrBorderText = [];
                        for ($i = 1; $i <= 3; $i++) {
                            if (get_field("border_text_$i")) {
                                $arrBorderText[] = get_field("border_text_$i");
                            }
                        }
                        if ($arrBorderText) : ?>
            <div class="websites-info__wrapper">
              <? foreach ($arrBorderText as $item): ?>
              <div class="websites-info__item"><?= $item ?></div>
              <? endforeach; ?>
            </div>
            <? endif; ?>

          </div>

        </div>

        <a href="<?= get_permalink(35) ?>">
          <div class="btn_new transition"><?= pll__('Узнать цену и сроки'); ?></div>
        </a>

      </div>
    </section>