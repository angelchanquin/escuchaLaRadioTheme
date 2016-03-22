/**
 * Created by achanquin on 3/21/16.
 */
jQuery(document).ready(function($) {

    /**
     * When user clicks on button...
     *
     */
    $('.btnFavorite').click( function() {
        /**
         * Prevent default action, so when user clicks button he doesn't navigate away from page
         *
         */
        if (event.preventDefault) {
            event.preventDefault();
        } else {
            event.returnValue = false;
        }
        var rId = $(this).attr('radio-id');
        /**
         * AJAX URL where to send data
         * (from localize_script)
         */
        var ajax_url = vb_fav_vars.vb_ajax_url;
        var agregado = false;
        var eliminado = false;
        var button = $(this);

        // Data to send
        var data = {
            action: 'add_favorite',
            radio: rId,
        };
        // Do AJAX request
        $.post( ajax_url, data, function(response) {
            // If we have response
            if( response == '-1') {
                window.location.assign('/wordpress/iniciar');
            } else if ( response == '1') {
                button.addClass('btn-primary');
            } else if ( response == '2' ) {
                button.removeClass('btn-primary');
            }
        });
    });
});