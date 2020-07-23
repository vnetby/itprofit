<?
if (!is_user_logged_in()) {
    add_action( 'wp_ajax_nopriv_ajaxsavefile', 'ajax_save_file' );
    add_action( 'wp_ajax_nopriv_ajaxsendmail', 'ajax_send_mail' );
} else {
    add_action( 'wp_ajax_ajaxsavefile', 'ajax_save_file' );
    add_action( 'wp_ajax_ajaxsendmail', 'ajax_send_mail' );
}

require_once (get_template_directory() . '/backend/mail/saveFile.php');
require_once (get_template_directory() . '/backend/mail/sendMail.php');
