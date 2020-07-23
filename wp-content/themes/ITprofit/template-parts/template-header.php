<?php
$options = get_option('true_options');
$lang = pll_the_languages(['raw' => 1]);
?>

<header id="header" class="header">
  <div class="header__wrapper flex__beetween transition">
    <div class="logo__header">
      <? if(!is_front_page()): ?>
      <a href="<?= home_url(); ?>">
        <img src="<?= THEME_URI; ?>/assets/images/ITprofit.svg" class="logo__img" alt="logo">
      </a>
      <? else: ?>
      <span><img src="<?= THEME_URI ?>/assets/images/ITprofit.svg" class="logo__img" alt="logo"></span>
      <? endif; ?>
    </div>
    <div class="navigation flex__beetween">
      <div class="language flex__beetween">
        <a href="<?= $lang['ru']['url'] ?>" class="language__btn <? if($lang['ru']['current_lang']): ?>active__btn<? endif; ?>">Ru</a>
        <a href="<?= $lang['en']['url'] ?>" class="language__btn <? if($lang['en']['current_lang']): ?>active__btn<? endif; ?>">En</a>
      </div>
      <? wp_nav_menu([
                    'theme_location' => 'main',
                    'container' => null,
                    'menu_class' => 'menu flex__beetween',
                    'menu_id' => ''
                ]); ?>
    </div>

  </div>

  <div class="mobile__header">
    <div class="container">
      <div class="mobile__header__wrapper flex__beetween transition">

        <? if($_SERVER["REQUEST_URI"] != '/'): ?>
        <a href="<?= home_url(); ?>"><img src="<?= THEME_URI ?>/assets/images/ITprofit.svg" height="24" class="logo__img" alt="logo"></a>
        <? else: ?>
        <span><img src="<?= THEME_URI ?>/assets/images/ITprofit.svg" height="24" class="logo__img" alt="logo"></span>
        <? endif; ?>

        <div class="language flex__beetween">
          <a href="<?= $lang['ru']['url'] ?>" class="language__btn <? if($lang['en']['current_lang']): ?>disabled<? endif; ?>">Ru</a>
          <a href="<?= $lang['en']['url'] ?>" class="language__btn <? if($lang['ru']['current_lang']): ?>disabled<? endif; ?>">En</a>
        </div>

        <!-- <div class="hamburger">
          <img src="<?= THEME_URI ?>/assets/images/line.svg" class="first__line" alt="hamburger">
          <img src="<?= THEME_URI ?>/assets/images/line.svg" class="second__line" alt="hamburger">
        </div> -->

        <div class="hamburger hamburger--squeeze js-hamburger">
          <div class="hamburger-box">
            <div class="hamburger-inner"></div>
          </div>
        </div>

      </div>
    </div>

  </div>
  <div class="mobile__menu">
    <div class="container">

      <? wp_nav_menu([
                    'theme_location' => 'main',
                    'container' => null,
                    'menu_class' => 'menu',
                    'menu_id' => ''
                ]); ?>

      <div class="info__block">
        <a href="mailto:<?= $options['email'] ?>" class="gt-email"><span><?= $options['email'] ?></span></a> <br>
        <a href="tel:<?= $options['tel'] ?>" class="gt-phone"><span><?= $options['tel'] ?></span></a>
      </div>

    </div>
  </div>

</header>