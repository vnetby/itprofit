<?php
if (!is_user_logged_in()) {
    add_action('wp_ajax_nopriv_ajaxmap', 'ajax_map_frame');
    add_action('wp_ajax_nopriv_ajaxblog', 'ajax_blog');
    add_action('wp_ajax_nopriv_ajaxabout', 'ajax_about');
    add_action('wp_ajax_nopriv_ajaxportfolio', 'ajax_portfolio');
} else {
    add_action('wp_ajax_ajaxmap', 'ajax_map_frame');
    add_action('wp_ajax_ajaxblog', 'ajax_blog');
    add_action('wp_ajax_ajaxabout', 'ajax_about');
    add_action('wp_ajax_ajaxportfolio', 'ajax_portfolio');
}

function ajax_map_frame()
{
    $options = get_option('true_options');

    if ($_POST['frame'] == 'yes') {
        echo $options["map"];
    }

    die;
}


function ajax_about()
{

    if ($_GET['id']) {
        $name = $_GET['name'];
        $content = require_once(get_template_directory() . "/include/ajax-about/$name.php");
        return $content;
    }

    die;
}

function ajax_portfolio()
{
    $args = get_portfolio_filter_args();
    vnet_get_template('template-portfolio-projects-list', $args);
    exit;
}
