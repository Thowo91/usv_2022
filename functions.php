<?php

define('THEMEDIR', get_stylesheet_directory_uri());
define('ASSETS', THEMEDIR . '/assets');
define('CSS', ASSETS . '/css');
define('JS', ASSETS . '/js');

function add_usv_scripts()
{
    wp_enqueue_style('bootstrap', CSS . '/bootstrap.min.css', [], null);
    wp_enqueue_script('bootstrap', JS . '/bootstrap.bundle.min.js');
    
    wp_enqueue_style('fontawesome', ASSETS. '/fontawesome/css/all.css', [], null );
    
    wp_enqueue_style('fonts', ASSETS. '/fonts/fonts.css', [], null );
    
    wp_enqueue_style('usv-style', THEMEDIR . '/style.css', [], null);
}

add_action('wp_enqueue_scripts', 'add_usv_scripts');


?>