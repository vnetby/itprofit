<?php
/*
* Template Name: Шаблон главной страницы
*/
get_header();
?>
<main class="front-main">
    <?php
    vnet_get_template('template-front-screen');
    get_template_part('/include/services');
    // get_template_part('/include/index-about');
    vnet_get_template('template-index_about');
    get_template_part('/include/portfolio');
    get_template_part('/include/preview-blog');
    // get_template_part('/include/commercial');
    vnet_get_template('template-service_commercial');
    ?>
</main>
<? get_footer(); ?>