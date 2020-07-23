<?php
error_reporting(E_WARNING | E_ERROR);
?>
<!DOCTYPE html>
<html <? language_attributes(); ?>>

<head>
    <meta http-equiv="Content-Type" content="<?= get_bloginfo('html_type') ?>; charset=<?= get_bloginfo('charset') ?>" />
    <link rel="apple-touch-icon" sizes="180x180" href="<?= THEME_URI ?>/assets/images/favicon/apple-touch-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="48x48" href="<?= THEME_URI ?>/assets/images/favicon/favicon.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#e00e43">
    <meta name="apple-mobile-web-app-title" content="<?= $_SERVER["SERVER_NAME"] ?>">
    <meta name="application-name" content="<?= $_SERVER["SERVER_NAME"] ?>">
    <meta name="theme-color" content="#ffffff">
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <?php
    wp_head();
    ?>
    <link rel="stylesheet" href="<?= THEME_URI; ?>/assets/libs/intl-tel-input/intlTelInput.min.css">

    <link rel="stylesheet" href="<?= THEME_URI; ?>/css/libs.min.css">
    <link rel="stylesheet" href="<?= THEME_URI; ?>/css/main.min.css">

    <link rel="stylesheet" href="<?= THEME_URI; ?>/css/head.min.css">
    <link rel="stylesheet" href="<?= THEME_URI; ?>/css/index.min.css">
    <?php
    $validateMsg = get_wpcf_validate_msg();

    $siteKey = get_wpcf7_recaptcha_site_key();
    $wpcf7RecaptchaActions = get_wpcf7_recaptcha_actions();
    ?>
    <script>
        window.back_dates = {
            SRC: '<?= THEME_URI; ?>'
        };
        back_dates.validateMsg = JSON.parse('<?= json_encode($validateMsg); ?>');
        <?php
        if ($siteKey) {
        ?>
            back_dates.recaptchaSrc = '<?= get_recaptcha_script_src($siteKey); ?>';
            back_dates.recaptchaSiteKey = '<?= $siteKey; ?>';
        <?php
        }
        ?>
    </script>

    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-5BGHBS5');
    </script>
    <!-- End Google Tag Manager -->
    <?php
    ?>
</head>


<body>
    <script src="<?= THEME_URI; ?>/js/head.min.js"></script>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5BGHBS5" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <div class="site-wrap">
        <?php
        vnet_get_template('template-header');
        vnet_get_template('template-mail_block');
        ?>