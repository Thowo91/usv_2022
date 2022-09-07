<?php

define('THEMEDIR', get_stylesheet_directory_uri());
define('ASSETS', THEMEDIR . '/assets');
define('CSS', ASSETS . '/css');
define('JS', ASSETS . '/js');
define('IMG', ASSETS . '/img');

function add_usv_scripts()
{
    wp_enqueue_style('bootstrap', CSS . '/bootstrap.min.css', [], null);
    wp_enqueue_script('bootstrap', JS . '/bootstrap.bundle.min.js');
    
    wp_enqueue_style('fontawesome', ASSETS. '/fontawesome/css/all.css', [], null );
    
    wp_enqueue_style('fonts', ASSETS. '/fonts/fonts.css', [], null );
    
    wp_enqueue_style('usv-style', THEMEDIR . '/style.css', [], null);
}

add_action('wp_enqueue_scripts', 'add_usv_scripts');

/**
 * Sets up theme defaults and registers support for WordPress features.
 */
function usv() {
    // Add default posts and comments RSS feed links to head
    add_theme_support( 'automatic-feed-links' );

    // Add support for Post Formats
    add_theme_support( 'post-formats', ['aside', 'gallery', 'quote', 'video', 'status'] );

    register_nav_menus([
        'header-nav' => 'Kopfzeilen-Navigation',
        'footer-nav' => 'Footer-Navigation',
    ]);
}

add_action( 'after_setup_theme', 'usv' );

function register_navwalker(){
    require_once get_template_directory() . '/assets/inc/class-wp-bootstrap-navwalker.php';
}
add_action('after_setup_theme', 'register_navwalker');

function usv_widgets_init() {
	register_sidebar([
		'name'          => 'Home-Sidebar',
		'id'            => 'sidebar-home',
		'description'   => 'Navigation für die Hauptseite',
		'before_widget' => '<aside class="sidebar-widget">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	]);
}

add_action( 'widgets_init', 'usv_widgets_init' );

?>