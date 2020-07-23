<?php

$lang = pll_the_languages(['raw' => 1]);
$commercial = 'commercial';
if ($lang['en']['current_lang']) $commercial = 'commercial_en';

$field = get_field('about_get_offer');
if (!$field) return;

$title = get_from_array($field, 'title');
$desc = get_from_array($field, 'desc');
$btn_text = get_from_array($field, 'btn_text');
$link = get_from_array($field, 'link');
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