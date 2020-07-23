<section class="section__about dom-tabs" data-breakpoint-min="992">
  <div class="container js-accordion">
    <div class="about__inner">
      <div class="about__choose">
        <?php
        $arrButton = [];
        $arrText = [];
        for ($i = 1; $i <= 3; $i++) {
          if (get_field("button_$i")) {
            $arrButton[] = get_field("button_$i");
          }
          if (get_field("text_$i")) {
            $arrText[] = get_field("text_$i");
          }
        }

        if ($arrButton) {
          foreach ($arrButton as $i => $item) {
        ?>
            <div>
              <a href="#about<?= ($i + 1) ?>" class="link__about tab-link link2 like__h2 js-accordion-link<?= $i === 0 ? ' active first-tab-link' : ''; ?>" data-breakpoint-max="992" data-target="#collapseContent<?= $i; ?>">
                <?= $item ?>
                <span class="collapse-ico"></span>
              </a>
              <div class="collapse-body display-md<?= $i === 0 ? ' active' : ''; ?>" id="collapseContent<?= $i; ?>">
                <div class="content">
                  <?php
                  if (isset($arrText[$i])) {
                    echo $arrText[$i];
                  }
                  ?>
                </div>
              </div>
            </div>
        <?php
          }
        }
        ?>
      </div>
      <div class="parent__txt hide-md">
        <?php
        if ($arrText) {
          foreach ($arrText as $i => $item) {
        ?>
            <div class="about__txt tab<?= $i === 0 ? ' active first-tab-content' : ''; ?>" id='about<?= ($i + 1) ?>'>
              <?= $item ?>
            </div>
        <?php
          }
        }
        ?>
      </div>
    </div>
  </div>
</section>