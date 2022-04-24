<?php
function site_scripts() {
  global $wp_styles; // Call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way
        
    // Adding scripts file in the footer
    wp_enqueue_script( 'site-js', get_template_directory_uri() . '/assets/scripts/scripts.js', array( 'jquery' ), filemtime(get_template_directory() . '/assets/scripts/js'), true );
    wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/vendor/slick-1.8.1/slick/slick.min.js', array( 'site-js' ), filemtime(get_template_directory() . '/vendor/slick-1.8.1/slick/slick.min.js'), true );
    wp_enqueue_script( 'ritz-js', get_template_directory_uri() . '/assets/scripts/sparky.js', array( 'slick-js' ), filemtime(get_template_directory() . '/assets/scripts/sparky.js'), true );
    //wp_enqueue_script( 'js-cookies', 'https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js', array( 'jquery' ), filemtime(get_template_directory() . '/assets/scripts/js'), true );
   
    // Register main stylesheet
    wp_enqueue_style( 'slick-css', get_template_directory_uri() . '/vendor/slick-1.8.1/slick/slick.css', array(), filemtime(get_template_directory() . '/vendor/slick-1.8.1/slick/slick.css'), 'all' );
    wp_enqueue_style( 'site-css', get_template_directory_uri() . '/assets/styles/style.css', array(), filemtime(get_template_directory() . '/assets/styles/style.css'), 'all' );
    $filename = get_template_directory().'/assets/styles/custom_colours.css';
    $filename2 = get_template_directory().'/assets/styles/custom-css.css';
    if(file_exists($filename)) {
        wp_enqueue_style( 'custom-colours-css', get_template_directory_uri() . '/assets/styles/custom_colours.css', array('site-css'), filemtime(get_template_directory() . '/assets/styles/custom_colours.css'), 'all' );
        if(file_exists($filename2)) {
            wp_enqueue_style( 'custom-css', get_template_directory_uri() . '/assets/styles/custom-css.css', array('custom-colours-css'), filemtime(get_template_directory() . '/assets/styles/custom-css.css'), 'all' );
        }
    } else {
        if(file_exists($filename2)) {
            wp_enqueue_style( 'custom-css', get_template_directory_uri() . '/assets/styles/custom-css.css', array('site-css'), filemtime(get_template_directory() . '/assets/styles/custom-css.css'), 'all' );
        }
    }


    // Comment reply script for threaded comments
    if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
      wp_enqueue_script( 'comment-reply' );
    }
}
add_action('wp_enqueue_scripts', 'site_scripts', 999);