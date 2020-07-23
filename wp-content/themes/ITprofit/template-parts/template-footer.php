<?php
$options = get_option('true_options');

$lang = pll_the_languages(['raw' => 1]);

$phone = get_from_array($options, 'tel');
$email = get_from_array($options, 'email');
$phoneLink = get_phone_link($phone);
$emailLink = get_email_link($email);

$address = get_from_array($options, 'adress');

$signature = get_from_array($options, 'signature');

$viber = get_from_array($options, 'viber');
$telegram = get_from_array($options, 'telegram');
$whatsapp = get_from_array($options, 'whatsapp');
?>



<footer class="footer">
  <div class="container">
    <div class="footer-row menu-foot-row">
      <div class="foot-col menu-col">
        <?php
        wp_nav_menu([
          'theme_location'  => 'first_foot',
          'menu'            => '',
          'container'       => 'div',
          'container_class' => '',
          'container_id'    => '',
          'menu_class'      => 'footer-menu',
          'menu_id'         => '',
          'echo'            => true,
          'fallback_cb'     => 'wp_page_menu',
          'before'          => '',
          'after'           => '',
          'link_before'     => '',
          'link_after'      => '',
          'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
          'depth'           => 0,
          'walker'          => '',
        ]);
        ?>
      </div>
      <div class="foot-col menu-col">
        <?php
        wp_nav_menu([
          'theme_location'  => 'second_foot',
          'menu'            => '',
          'container'       => 'div',
          'container_class' => '',
          'container_id'    => '',
          'menu_class'      => 'footer-menu',
          'menu_id'         => '',
          'echo'            => true,
          'fallback_cb'     => 'wp_page_menu',
          'before'          => '',
          'after'           => '',
          'link_before'     => '',
          'link_after'      => '',
          'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
          'depth'           => 0,
          'walker'          => '',
        ]);
        ?>
      </div>
      <div class="foot-col contacts-col">
        <div class="languages-wrap">
          <a href="<?= $lang['ru']['url'] ?>" class="language__btn <? if($lang['ru']['current_lang']): ?>active__btn<? endif; ?>">Ru</a>
          <a href="<?= $lang['en']['url'] ?>" class="language__btn <? if($lang['en']['current_lang']): ?>active__btn<? endif; ?>">En</a>
        </div>
        <ul class="networks">
          <?php
          if ($viber) {
          ?>
            <li>
              <a href="<?= $viber; ?>" target="_blank" class="foot-soc-ico viber-ico gt-social" data-gt-type="viber">
                <?= vnet_get_svg('viber-light'); ?>
              </a>
            </li>
          <?php
          }
          if ($telegram) {
          ?>
            <li>
              <a href="<?= $telegram ?>" target="_blank" class="foot-soc-ico telegram-ico gt-social" data-gt-type="telegram">
                <?= vnet_get_svg('telegram-light'); ?>
              </a>
            </li>
          <?php
          }
          if ($whatsapp) {
          ?>
            <li>
              <a href="<?= $whatsapp ?>" target="_blank" class="foot-soc-ico whatsapp-ico gt-social" data-gt-type="whatsapp">
                <?= vnet_get_svg('whatsapp-light'); ?>
              </a>
            </li>
          <?php
          }

          ?>
        </ul>
        <div class="contacts-block">
          <?php
          if ($phone) {
          ?>
            <div class="contact-row">
              <?= the_hidden_phone($phone, $phoneLink, 'phone-link'); ?>
            </div>
          <?php
          }
          if ($email) {
          ?>
            <div class="contact-row">
              <a href="<?= $emailLink; ?>" class="gt-email"><?= $email; ?></a>
            </div>
          <?php
          }
          ?>
        </div>
        <div class="btn-row">
          <a href="<?= get_contact_url(); ?>" class="btn btn-border-fff min-220">
            <span class="text"><?= pll__('Связаться с нами'); ?></span>
          </a>
        </div>
        <div class="police-link-wrap">
          <a href="<?= PRIVACY_URL; ?>" class="hov-opacity"><?= pll__('Политика конфиденциальности'); ?></a>
        </div>
      </div>
    </div>
    <div class="footer-row bottom-row">
      <div class="foot-col address-col">
        <?php
        if ($address) {
        ?>
          <address><?= $address; ?></address>
        <?php
        }
        if ($signature) {
        ?>
          <div class="signature"><?= $signature; ?></div>
        <?php
        }
        ?>
      </div>
      <div class="foot-col copyrights-col">
        <div class="bottom-logo">
          <img src="<?= THEME_URI; ?>/assets/images/ITprofit.svg" class="foot-logo" alt="logo">
        </div>
        <div class="bottom-copy">
          <span class="copy-1">itprofit&copy; <?= date("Y"); ?></span>
          <span class="copy-2"><?= pll__('Все права защищены'); ?></span>
        </div>
      </div>
    </div>
  </div>
</footer>