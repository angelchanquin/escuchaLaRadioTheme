jQuery(document).ready(function($) {

  /**
   * When user clicks on button...
   *
   */
  $('#btn-new-user').click( function() {

    /**
     * Prevent default action, so when user clicks button he doesn't navigate away from page
     *
     */
    if (event.preventDefault) {
        event.preventDefault();
    } else {
        event.returnValue = false;
    }

    // If for some reason result field is visible hide it
    $('.result-message').hide();

    // Collect data from inputs
    var reg_nonce = $('#vb_new_user_nonce').val();
    var reg_user  = $('#username').val();
    var reg_pass  = $('#password').val();
    var reg_mail  = $('#email').val();
    var reg_name  = $('#name').val();
    var reg_terms;
    if ($('#terms').is(":checked")) {
      reg_terms = "si";
    } else {
      reg_terms = "no";
    }

    /**
     * AJAX URL where to send data 
     * (from localize_script)
     */
    var ajax_url = vb_reg_vars.vb_ajax_url;

    // Data to send
    data = {
      action: 'register_user',
      nonce: reg_nonce,
      username: reg_user,
      password: reg_pass,
      email: reg_mail,
      name: reg_name,
      terms: reg_terms,
    };

    // Do AJAX request
    $.post( ajax_url, data, function(response) {

      // If we have response
      if( response ) {

        // Hide 'Please wait' indicator
        $('.indicator').hide();

        if( response === '1' ) {
          // If user is created
          $('.result-message').html('Se ha registrado correctamente.'); // Add success message to results div
          $('.result-message').addClass('alert-success'); // Add class success to results div
          $('.result-message').show(); // Show results div
        } else {
          $('.result-message').html( response ); // If there was an error, display it in results div
          $('.result-message').addClass('alert-danger'); // Add class failed to results div
          $('.result-message').show(); // Show results div
        }
      }
    });
    
  });
});

