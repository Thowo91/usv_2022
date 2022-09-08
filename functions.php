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

    // Loads JavaScript for Email Cloaking
    wp_enqueue_script('cloak', JS . '/cloak.js', ['jquery'], null, true );

}

add_action('wp_enqueue_scripts', 'add_usv_scripts');

/**
 * Sets up theme defaults and registers support for WordPress features.
 */
function usv() {
    // Add default posts and comments RSS feed links to head
    add_theme_support( 'automatic-feed-links' );

    // Add support for Post Formats
    add_theme_support('post-formats', ['aside', 'gallery', 'quote', 'video', 'status']);

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

/*
* Let WordPress manage the document title.
* By adding theme support, we declare that this theme does not use a
* hard-coded <title> tag in the document head, and expect WordPress to
* provide it for us.
*/
add_theme_support( 'title-tag' );

/**
* Creates a nicely formatted and more specific title element text for output
* in head of document, based on current view.
* @param $title string
* @param $sep string
* @return string
*/
function usv_wp_title( $title, $sep ) {
global $paged, $page;

if ( is_feed() ) {
   return $title;
}

// Add the site name.
$title .= get_bloginfo( 'name' );

// Add a page number if necessary.
if ( $paged >= 2 || $page >= 2 ) {
   $title = "$title $sep " . sprintf( __( 'Seite %s', 'usv' ), max( $paged, $page ) );
}

return $title;
}

add_filter('wp_title', 'usv_wp_title', 10, 2);

// Add Shortcode
function email_cloaking_shortcode($atts) {

	// Attributes
	extract( shortcode_atts(
			[
				'pre'     => '',
				'suf'     => '',
				'dom'     => '',
				'display' => ''
            ], $atts )
	);

	// Code
	return '<span class="cloakMail" data-pre="' . $pre . '" data-suf="' . $suf . '" data-dom="' . $dom . '" data-display="' . $display . '">' . $display . '</span><noscript><br>"Diese E-Mail-Adresse ist vor Spambots geschützt! Zur Anzeige muss JavaScript eingeschaltet sein!"</noscript>';
}

add_shortcode('mail', 'email_cloaking_shortcode');

?>