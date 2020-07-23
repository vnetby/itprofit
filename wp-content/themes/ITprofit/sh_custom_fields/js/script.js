jQuery(function () {

jQuery('.button_new_form').on('click',
    function (e) {
        e.preventDefault();
        let button = jQuery(this);
        let container = jQuery(this).parent().find('.custom_sh_box');
        let index = jQuery(this).data('index');
        let nameField = jQuery(this).data('name');
        let input = jQuery(this).data('input');
        let label = jQuery(this).data('label');

        jQuery.ajax({
            type: 'POST',
            url: ajax_object.ajaxurl,
            data: {
                action: 'ajaxfield', //calls wp_ajax_nopriv_{'action'}
                index: index,
                name: nameField,
                input: input,
                label: label
            },
            success: (html) => {
                jQuery(container).append(html);
                jQuery(button).data('index', (index + 1));
            }
        });
    }
);

});
