jQuery(document).ready(function($) {

    // Perform AJAX login on form submit
    $('form#login').on('submit', function(e){
        $('form#login p.status').show().text(ajax_login_object.loadingmessage);
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: ajax_login_object.ajaxurl,
            data: { 
                'action': 'ajaxlogin', //calls wp_ajax_nopriv_ajaxlogin
                'username': $('form#login #username').val(), 
                'password': $('form#login #password').val(), 
                'security': $('form#login #security').val() },
            success: function(data){
                $('form#login p.status').text(data.message);
                if (data.loggedin == true){
                    document.location.href = ajax_login_object.redirecturl;
                } else {
                    $('.result-message').html( data.message ); // If there was an error, display it in results div
                    $('.result-message').addClass('alert-danger'); // Add class failed to results div
                    $('.result-message').show(); // Show results div
                }
            }
        });
        e.preventDefault();
    });

});