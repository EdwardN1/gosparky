<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'init', 'tchss_enqueue_my_scripts', 0 );

function tchss_enqueue_my_scripts() {

    // Adding Slick Scripts to the Footer
    wp_enqueue_script( 'slick-slider', tchss_PLUGINURI.'/slick-master/slick/slick.min.js', array('jquery'),  '1.0', true);

    //Adding Slick CSS
    wp_enqueue_style( 'slick-css', tchss_PLUGINURI.'/slick-master/slick/slick.css', array(), '1', 'all' );
}