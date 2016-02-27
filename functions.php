<?php 

function theme_css(){
    wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/bootstrap/css/bootstrap.min.css');
    wp_enqueue_style( 'font_awesome', get_stylesheet_directory_uri() . '/fontawesome/css/font-awesome.min.css');
    wp_enqueue_style( 'main', get_stylesheet_directory_uri() . '/css/styles.css');
    wp_enqueue_style( 'colorbox', get_stylesheet_directory_uri() . '/css/colorbox.css');
    wp_enqueue_style( 'flexslider', get_stylesheet_directory_uri() . '/css/flexslider.css');
    wp_enqueue_style( 'parallaxslider', get_stylesheet_directory_uri() . '/css/parallaxslider.css');
}

function theme_js(){
    wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.custom.js', array(), '', true );
    wp_enqueue_script( 'jquery18', get_template_directory_uri() . '/js/jquery-1.8.1.min.js', array(), '1.8.1', true );
    wp_enqueue_script( 'bootstrapjs', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array(), '', true );
    wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array(), '', true );
    wp_enqueue_script( 'backstretch', get_template_directory_uri() . '/js/jquery.backstretch.min.js', array(), '', true );
    wp_enqueue_script( 'cslider', get_template_directory_uri() . '/js/jquery.cslider.js', array(), '', true );

    wp_enqueue_script( 'my-script', get_template_directory_uri() . '/js/script.js', array(), '', true );
    wp_localize_script( 'my-script', 'constants', localize_vars() );
}

function localize_vars() {
    return array(
        'template_directory' => get_template_directory_uri()
    );
}
 
function register_user(){
  if(isset($_GET['do']) && $_GET['do'] == 'register'):
    $errors = array();
    if(empty($_POST['user'])) 
       $errors[] = 'Please enter a fullname.<br>';
    if(empty($_POST['email'])) 
       $errors[] = 'Please enter a email.<br>';
    if(empty($_POST['pass'])) 
       $errors[] = 'Please enter a password.<br>';
    if(empty($_POST['name'])) 
       $errors[] = 'Please enter your name.<br>';
    $user_login = esc_attr($_POST['user']);
    $user_email = esc_attr($_POST['email']);
    $user_pass = esc_attr($_POST['pass']);
    $user_nicename = esc_attr($_POST['name']);
    $sanitized_user_login = sanitize_user($user_login);
    $user_email = apply_filters('user_registration_email', $user_email);
  
    if(!is_email($user_email)) 
       $errors[] = 'Invalid e-mail.<br>';
    elseif(email_exists($user_email)) 
       $errors[] = 'This email is already registered.<br>';
  
    if(empty($sanitized_user_login) || !validate_username($user_login)) 
       $errors[] = 'Invalid user name.<br>';
    elseif(username_exists($sanitized_user_login)) 
       $errors[] = 'User name already exists.<br>';
  
    if(empty($errors)):
      $user_id = wp_create_user($sanitized_user_login, $user_pass, $user_email);
  
    if(!$user_id):
      $errors[] = 'Registration failed';
    else:
      update_user_option($user_id, 'default_password_nag', true, true);
      wp_new_user_notification($user_id, $user_pass);
      wp_cache_delete ($user_id, 'users');
      wp_cache_delete ($user_login, 'userlogins');
      do_action ('user_register', $user_id);
      $user_data = get_userdata ($user_id);
      if ($user_data !== false) {
         wp_clear_auth_cookie();
         wp_set_auth_cookie ($user_data->ID, true);
         do_action ('wp_login', $user_data->user_login, $user_data);
         // Redirect user.
         wp_redirect ('local');
         exit();
       }
      endif;
    endif;
  
    if(!empty($errors)) 
      define('REGISTRATION_ERROR', serialize($errors));
  endif;
}

add_action('wp_enqueue_scripts', 'theme_css');
add_action('wp_enqueue_scripts', 'theme_js');
add_action('template_redirect', 'register_user');
 
register_nav_menus(array(
    'primary' => __('Menu Principal'),
));
 