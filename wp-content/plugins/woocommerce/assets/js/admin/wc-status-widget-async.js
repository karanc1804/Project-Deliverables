/**
 * WooCommerce Status Widget Async Loading
 */
jQuery(function($) {
    'use strict';
<<<<<<< HEAD

=======
    
>>>>>>> origin/main
    // Only run on admin dashboard
    if (!$('#wc-status-widget-loading').length) {
        return;
    }
<<<<<<< HEAD

=======
    
>>>>>>> origin/main
    // Load the widget content via AJAX
    function loadStatusWidget() {
        $.ajax({
            url: wc_status_widget_params.ajax_url,
            data: {
                action: 'woocommerce_load_status_widget',
                security: wc_status_widget_params.security
            },
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response && response.success && response.data.content) {
                    $('#wc-status-widget-content').html(response.data.content).show();
                    $('#wc-status-widget-loading').hide();
                } else {
                    showErrorMessage();
                }
            },
            error: function() {
                showErrorMessage();
            }
        });
    }
<<<<<<< HEAD

    function showErrorMessage() {
		const message = wc_status_widget_params.error_message || 'Error loading widget';
        $('#wc-status-widget-loading').html('<p>' + message + '</p>');
    }

    // Start loading the widget after a very short delay
    // This allows the dashboard to render quickly first
    setTimeout(loadStatusWidget, 100);
});
=======
    
    function showErrorMessage() {
        $('#wc-status-widget-loading').html('<p>' + 'Error loading widget' + '</p>');
    }
    
    // Start loading the widget after a very short delay
    // This allows the dashboard to render quickly first
    setTimeout(loadStatusWidget, 100);
});
>>>>>>> origin/main
