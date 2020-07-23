<?php
define('VSEO_SINGLE_SERVICE', true); // Используется для генерации json_ld (class-vnet-seo)
get_header();
?>
<main class="websites-page">
    <?php
    vnet_get_template('template-section_services_head');
    vnet_get_template('template-section_service_adv');
    vnet_get_template('template-section_service_tags');
    vnet_get_template('template-section_services_stages');
    vnet_get_template('template-section_services_bonuses');
    // vnet_get_template('template-section_services_clients');
    vnet_get_template('template-section_serices_portfolio');
    vnet_get_template('template-service_commercial');
    ?>
</main>

<?php
get_footer();
?>