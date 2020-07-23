<?php
/*
* Template Name: Шаблон страницы "Контакты"
*/
get_header();

$options = get_option('true_options');

$viber = get_from_array($options, 'viber');
$telegram = get_from_array($options, 'telegram');
$whatsapp = get_from_array($options, 'whatsapp');

$viber_text = translate_string(get_from_array($options, 'viber_text'));
$telegram_text = translate_string(get_from_array($options, 'telegram_text'));
$whatsapp_text = translate_string(get_from_array($options, 'whatsapp_text'));


$socSvgs = $svgs = ['telegram' => 'Telegram', 'whatsapp' => 'WhatsApp', 'viber' => 'Viber'];
$socials = ['viber' => $viber, 'telegram' => $telegram, 'whatsapp' => $whatsapp];
$socials = array_filter($socials);

$soc_texts = ['viber' => $viber_text, 'telegram' => $telegram_text, 'whatsapp' => $whatsapp_text];

$address = get_from_array($options, 'adress');

$phone = get_from_array($options, 'tel');
$email = get_from_array($options, 'email');
$phoneLink = get_phone_link($phone);
$emailLink = get_email_link($email);

$lang = pll_the_languages(['raw' => 1]);

global $post;
$title = $post->post_title;

$field = get_field('block_contacts');

$contact_img = get_from_array($field, 'contact_img');
$contact_btns = get_array_from_array($field, 'contact_btns');
$map_text = get_from_array($field, 'map_btn_text');


?>
<div class="contact-page" itemscope itemtype="http://schema.org/Organization">
    <div class="container">
        <h1 class="section-title"><?= $title; ?></h1>
        <div class="contacts-row">
            <div class="contacts-col info-col">
                <div class="info-wrap">
                    <?php
                    if ($phone) {
                    ?>
                        <div class="contact-item phone-item btn-wrap">
                            <?= the_hidden_phone($phone, $phoneLink); ?>
                        </div>
                    <?php
                    }

                    if ($socials) {
                    ?>
                        <div class="contact-item socials-list hide-md">
                            <?php
                            foreach ($socials as $key => $soc) {
                                $ico = get_from_array($socSvgs, $key);
                            ?>
                                <div class="social-col">
                                    <a href="<?= $soc; ?>" class="contact-soc-ico hov-opacity gt-social <?= $key; ?>-ico" target="_blank" data-gt-type="<?= $key; ?>">
                                        <?= vnet_get_svg($ico); ?>
                                    </a>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="contact-item socials-btns display-md">
                            <?php
                            foreach ($socials as $key => $soc) {
                                $ico = get_from_array($socSvgs, $key);
                                $text = get_from_array($soc_texts, $key);
                            ?>
                                <div class="btn-wrap">
                                    <a href="<?= $soc; ?>" class="contact-soc-btn btn blue-btn <?= $key; ?>-btn" target="_blank">
                                        <span class="ico">
                                            <?= vnet_get_svg($ico); ?>
                                        </span>
                                        <span class="text">
                                            <?= $text; ?>
                                        </span>
                                    </a>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    <?php
                    }

                    if ($email) {
                    ?>
                        <div class="contact-item email-item">
                            <a href="<?= $emailLink; ?>" class="underline c-blue hov-opacity gt-email" itemprop="email">
                                <?= $email; ?>
                            </a>
                        </div>
                    <?php
                    }

                    if ($contact_btns) {
                    ?>
                        <div class="contact-item modals-btns">
                            <?php
                            foreach ($contact_btns as $btn) {
                                $label = get_from_array($btn, 'btn_text');
                                $link = get_from_array($btn, 'link_btn');
                                if (!$link) continue;
                            ?>
                                <div class="btn-wrap">
                                    <a href="<?= $link; ?>" class="btn blue-btn fw-bold">
                                        <?= $label; ?>
                                    </a>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    <?php
                    }
                    if ($contact_img) {
                        $img = wp_get_attachment_image_url($contact_img, 'full');
                    ?>
                        <div class="contact-item img-item display-md">
                            <img src="<?= $img; ?>" alt="contact image preview">
                        </div>
                    <?php
                    }
                    if ($address) {
                    ?>
                        <div class="contact-item address-item">
                            <address class="address" itemprop="address"><?= $address; ?></address>
                        </div>
                    <?php
                    }
                    if ($map_text) {
                    ?>
                        <div class="contact-item map-item btn-wrap">
                            <a href="#modal_map" class="btn__modal btn blue-btn fw-bold">
                                <?= $map_text; ?>
                            </a>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="contacts-col img-col hide-md">
                <?php
                if ($contact_img) {
                    $img = wp_get_attachment_image_url($contact_img, 'full');
                ?>
                    <img src="<?= $img; ?>" alt="contact image preview">
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php

get_footer();
return;
?>

<main class="contact-page">
    <div class="contact__inner">
        <div class="container">
            <h1 class="h1"><?= get_the_title(); ?></h1>
            <div class="contact__wrapper flex__beetween">
                <div class="contact__info">
                    <div class="contact__call flex__start">
                        <a href="tel:<?= $options['tel'] ?>"><?= $options['tel'] ?></a>
                        <? if($options['telegram']): ?>
                        <a href="<?= $options['telegram'] ?>" target="_blank">
                            <img src="<?= get_template_directory_uri() ?>/assets/images/Telegram.svg" alt="">
                        </a>
                        <? endif; ?>
                        <? if($options['viber']): ?>
                        <a href="<?= $options['viber'] ?>" target="_blank">
                            <img src="<?= get_template_directory_uri() ?>/assets/images/Viber.svg" alt="">
                        </a>
                        <? endif; ?>
                        <? if($options['whatsapp']): ?>
                        <a href="<?= $options['whatsapp'] ?>" target="_blank">
                            <img src="<?= get_template_directory_uri() ?>/assets/images/WhatsApp.svg" alt="">
                        </a>
                        <? endif; ?>
                    </div>
                    <a href="mailto:<?= $options['email'] ?>" class="contact__email"><?= $options['email'] ?></a>
                    <? if(MOBILE): ?>
                    <div class="contact__img__mobile">
                        <img src="<?= get_template_directory_uri() ?>/assets/images/contact_mobile.png" alt="">
                    </div>
                    <? endif; ?>
                    <span>
                        <?= $options['mail_index'] ?>, <?= pll__('Республика Беларусь'); ?>, <br>
                        <!--                        -->
                        <?//= $options['city'] ?>
                        <!--, -->
                        <?//= $options['adress'] ?>
                        <?= pll__('г. Минск, ул. Лазо 16, 3 этаж, офис 44'); ?>
                    </span>
                    <a href="#modal_map" class="btn__modal">
                        <div class="btn_new transition btn__map">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path class="transition" fill-rule="evenodd" clip-rule="evenodd" d="M4 7.8V19L9.09091 16.2L14.9091 19L20 16.2V5L14.9091 7.8L9.09091 5L4 7.8Z" stroke="#0066FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path class="transition" d="M9 5V16" stroke="#0066FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path class="transition" d="M15 8V19" stroke="#0066FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <?= pll__('Посмотреть на карте'); ?>
                        </div>
                    </a>
                </div>
                <? if(!MOBILE): ?>
                <div class="contact__img">
                    <img src="<?= get_template_directory_uri() ?>/assets/images/contact_bg.png" alt="">
                </div>
                <? endif; ?>
            </div>
            <a href="<?= get_permalink(35) ?>" class="link__btn bold"><?= pll__('У вас есть проект для нас?'); ?></a>
            <? if (have_posts()):while (have_posts()):the_post(); ?>
            <? if(get_the_content()): ?>
            <div>
                <? the_content(); ?>
            </div>
            <? endif; ?>
            <? endwhile; endif; ?>
        </div>
    </div>
</main>

<div class="popup__container"></div>
<div class="modal__map transition" id="modal_map"></div>

<? get_footer(); ?>