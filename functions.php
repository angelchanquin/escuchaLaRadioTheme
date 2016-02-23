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

add_action('wp_enqueue_scripts', 'theme_css');
add_action('wp_enqueue_scripts', 'theme_js');

register_nav_menus(array(
    'primary' => __('Menu Principal'),
));
 