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

    wp_register_script('vb_reg_script', get_template_directory_uri() . '/js/ajax-registration.js', array('jquery'), null, true);
    wp_enqueue_script('vb_reg_script');
    wp_localize_script( 'vb_reg_script', 'vb_reg_vars', array(
        'vb_ajax_url' => admin_url( 'admin-ajax.php' ),
        )
    );
}
function localize_vars() {
    return array(
        'template_directory' => get_template_directory_uri()
    );
}

function ajax_login_init(){
    wp_register_script('ajax-login-script', get_template_directory_uri() . '/js/ajax-login-script.js', array('jquery') , '', true);
    wp_enqueue_script('ajax-login-script');
    wp_localize_script( 'ajax-login-script', 'ajax_login_object', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'redirecturl' => home_url(),
        'loadingmessage' => __('Sending user info, please wait...')
    ));
    // Enable the user with no privileges to run ajax_login() in AJAX
    add_action( 'wp_ajax_nopriv_ajaxlogin', 'ajax_login' );
}
function ajax_login(){
    // First check the nonce, if it fails the function will break
    check_ajax_referer( 'ajax-login-nonce', 'security' );
    // Nonce is checked, get the POST data and sign user on
    $info = array();
    $info['user_login'] = $_POST['username'];
    $info['user_password'] = $_POST['password'];
    $info['remember'] = true;
    $user_signon = wp_signon( $info, false );
    if ( is_wp_error($user_signon) ){
        echo json_encode(array('loggedin'=>false, 'message'=>__('Usuario o contraseña incorrectos.')));
    } else {
        echo json_encode(array('loggedin'=>true, 'message'=>__('Inicio de sesión exitoso...')));
    }
    die();
}

function vb_reg_new_user()
{
    // Verify nonce
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'vb_new_user'))
        die('Ooops, something went wrong, please try again later');

    // Post values
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $terms = $_POST['terms'];

    /**
     * IMPORTANT: You should make server side validation here!
     *
     */

    $userdata = array(
        'user_login' => $username,
        'user_pass' => $password,
        'user_email' => $email,
        'first_name' => $name,
    );

    if (empty($name)) {
        echo "Ingrese su nombre por favor.";
        die();
    }
    if (empty($email)) {
        echo "El email no puede ser vacío.";
        die();
    }
    if (email_exists($email)) {
        echo "Este email ya está en uso.";
        die();
    }
    if (4 > strlen($username)) {
        echo "El nombre de usuario debe tener una longitud mayor de 4 caracteres.";
        die();
    }
    if (username_exists($username)) {
        echo "Este nombre de usuario ya existe.";
        die();
    }
    if (empty($password)) {
        echo "El campo de la contraseña no puede estar vacío.";
        die();
    }
    if (5 > strlen($password)) {
        echo "La contraseña debe ser mayor a 5 caracteres.";
        die();
    }
    if ($terms == "no") {
        echo "Debes aceptar los terminos y condiciones.";
        die();
    }

    $user_id = wp_insert_user( $userdata ) ;
    //On success
    if( !is_wp_error($user_id) ) {
        echo '1';
    } else {
        echo $user_id->get_error_message();
    }
    die();
}

add_action('wp_ajax_register_user', 'vb_reg_new_user');
add_action('wp_ajax_nopriv_register_user', 'vb_reg_new_user');

add_action('wp_enqueue_scripts', 'theme_css');
add_action('wp_enqueue_scripts', 'theme_js');

if (!is_user_logged_in()) {
    add_action('init', 'ajax_login_init');
}else {
    show_admin_bar( false );
}
register_nav_menus(array(
    'primary' => __('Menu Principal'),
    'logged' => __('Menu Loggeado'),
));