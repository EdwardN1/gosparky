<?php
/**
 * Plugin generic functions file
 *
 * @package WP Slick Slider and Image Carousel
 * @since 1.0.0
 */

if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
/**
 * Function to get plugin image sizes array
 * 
 * @package WP Slick Slider and Image Carousel
 * @since 1.2.2
 */
function wpsisac_get_unique() {
    static $unique = 0;
    $unique++;

    // For Elementor & Beaver Builder
    if( ( defined('ELEMENTOR_PLUGIN_BASE') && isset( $_POST['action'] ) && $_POST['action'] == 'elementor_ajax' )
    || ( class_exists('FLBuilderModel') && ! empty( $_POST['fl_builder_data']['action'] ) )
    || ( function_exists('vc_is_inline') && vc_is_inline() ) ) {
        $unique = current_time('timestamp') . '-' . rand();
    }

    return $unique;
}

/**
 * Sanitize Multiple HTML class
 * 
 * @package WP Slick Slider and Image Carousel
 * @since 2.0
 */
function wpsisac_get_sanitize_html_classes($classes, $sep = " ") {
    $return = "";

    if( $classes && !is_array($classes) ) {
        $classes = explode($sep, $classes);
    }

    if( !empty($classes) ) {
        foreach($classes as $class){
            $return .= sanitize_html_class($class) . " ";
        }
        $return = trim( $return );
    }

    return $return;
}

/**
 * Function to clean url
 * 
 * @package WP Slick Slider and Image Carousel
 * @since 1.0.0
 */
function wpsisac_get_clean_url( $url ) {
    return esc_url_raw( trim($url) );
}

/**
 * Function to get post featured image
 * 
 * @package WP Slick Slider and Image Carousel
 * @since 1.2.5
 */
function wpsisac_get_post_featured_image( $post_id = '', $size = 'full') {
    $size   = !empty($size) ? $size : 'full';
    $image  = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), $size );

    if( !empty($image) ) {
        $image = isset($image[0]) ? $image[0] : '';
    }
    return $image;
}


/**
 * Function to get shortcode designs
 * 
 * @package WP Slick Slider and Image Carousel
 * @since 1.2.5
 */
function wpsisac_slider_designs() {
    $design_arr = array(
        'design-1'  => __('Design 1', 'wp-slick-slider-and-image-carousel'),
        'design-2'  => __('Design 2', 'wp-slick-slider-and-image-carousel'),
        'design-3'  => __('Design 3', 'wp-slick-slider-and-image-carousel'),
        'design-4' 	=> __('Design 4', 'wp-slick-slider-and-image-carousel'),
        'design-5' 	=> __('Design 5', 'wp-slick-slider-and-image-carousel'),
        'design-6' 	=> __('Design 6', 'wp-slick-slider-and-image-carousel'),
	);
	return apply_filters('wpsisac_slider_designs', $design_arr );
}