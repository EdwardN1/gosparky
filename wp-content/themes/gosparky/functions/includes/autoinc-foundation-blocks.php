<?php

/**
 *
 * ================== Foundation Block Category =======================
 *
 */

add_filter('block_categories', 'reorderBlocks', 99, 2);

function reorderBlocks($categories, $post)
{
    $retCats = array();
    $ritzBlocks = array(
        'slug' => 'foundationblocks',
        'title' => __('Foundation Blocks', 'foundationblocks'),
    );
    $retCats[0] = $ritzBlocks;
    foreach ($categories as $category) {
        $retCats[] = $category;
    }
    return $retCats;
}

add_filter( 'block_categories', function( $categories, $post ) {
    return array_merge(
        $categories,
        array(
            array(
                'slug' => 'foundationblocks',
                'title' => __( 'Foundation Blocks', 'foundationblocks' ),
            ),
        )
    );
}, 10, 2 );

/**
 *
 * =======================Full Width Call Out ==============
 *
 */

add_action( 'acf/init', 'register_full_width_call_out' );
function register_full_width_call_out() {

    if ( function_exists( 'acf_register_block_type' ) ) {

        // Register LockettsSlider block
        acf_register_block_type( array(
            'name' 					=> 'ThemeSparkyFullWidthCallOut',
            'title' 				=> __( 'ThemeSparkyFullWidthCallOut' ),
            'description' 			=> __( 'A full width bar call out with heading and link.' ),
            'category' 				=> 'foundationblocks',
            'icon'					=> 'minus',
            'keywords'				=> array( 'fullwidth','callout' ),
            'post_types'			=> array( 'post', 'page' ),
            'mode'					=> 'edit',
            // 'align'				=> 'wide',
            'render_template'		=> get_template_directory() . '/parts/blocks/BlockFullWidthCallOut.php',
            // 'render_callback'	=> 'foundationOrbit_block_render_callback',
            // 'enqueue_style' 		=> get_template_directory_uri() . '/template-parts/blocks/foundationOrbit/foundationOrbit.css',
            // 'enqueue_script' 	=> get_template_directory_uri() . '/template-parts/blocks/foundationOrbit/foundationOrbit.js',
            // 'enqueue_assets' 	=> 'foundationOrbit_block_enqueue_assets',
        ));

    }

}

/**
 *
 * ======================= Orbit =======================
 *
 */

add_action( 'acf/init', 'register_foundation_orbit_block' );
function register_foundation_orbit_block() {

    if ( function_exists( 'acf_register_block_type' ) ) {

        // Register LockettsSlider block
        acf_register_block_type( array(
            'name' 					=> 'foundationOrbit',
            'title' 				=> __( 'foundationOrbit' ),
            'description' 			=> __( 'An image and content carousel with animation support and many customizable options.' ),
            'category' 				=> 'foundationblocks',
            'icon'					=> 'embed-photo',
            'keywords'				=> array( 'foundation','orbit','carousel','slider' ),
            'post_types'			=> array( 'post', 'page' ),
            'mode'					=> 'edit',
            // 'align'				=> 'wide',
            'render_template'		=> get_template_directory() . '/parts/blocks/BlockFoundationOrbit.php',
            // 'render_callback'	=> 'foundationOrbit_block_render_callback',
            // 'enqueue_style' 		=> get_template_directory_uri() . '/template-parts/blocks/foundationOrbit/foundationOrbit.css',
            // 'enqueue_script' 	=> get_template_directory_uri() . '/template-parts/blocks/foundationOrbit/foundationOrbit.js',
            // 'enqueue_assets' 	=> 'foundationOrbit_block_enqueue_assets',
        ));

    }

}

/**
 *
 * ======================= Grid XY =======================
 *
 */

add_action( 'acf/init', 'register_foundation_xy_grid_block' );
function register_foundation_xy_grid_block() {

    if ( function_exists( 'acf_register_block_type' ) ) {

        // Register foundation xy grid block
        acf_register_block_type( array(
            'name' 					=> 'foundation-xy-grid',
            'title' 				=> __( 'foundation xy grid' ),
            'description' 			=> __( 'A custom foundation xy grid block.' ),
            'category' 				=> 'foundationblocks',
            'icon'					=> 'layout',
            'keywords'				=> array( 'foundation', 'xy', 'grid' ),
            'post_types'			=> array( 'post', 'page' ),
            'mode'					=> 'edit',
            // 'align'				=> 'wide',
            'render_template'		=> get_template_directory() . '/parts/blocks/BlockFoundationGridXY.php',
            // 'render_callback'	=> 'foundation_xy_grid_block_render_callback',
            // 'enqueue_style' 		=> get_template_directory_uri() . '/template-parts/blocks/foundation-xy-grid/foundation-xy-grid.css',
            // 'enqueue_script' 	=> get_template_directory_uri() . '/template-parts/blocks/foundation-xy-grid/foundation-xy-grid.js',
            // 'enqueue_assets' 	=> 'foundation_xy_grid_block_enqueue_assets',
        ));

    }

}

/**
 *
 * ======================= Image Carousel Brands' =======================
 *
 */

add_action( 'acf/init', 'register_image_carousel_brands_block' );
function register_image_carousel_brands_block() {

    if ( function_exists( 'acf_register_block_type' ) ) {

        // Register Image Carousel Brands block
        acf_register_block_type( array(
            'name' 					=> 'image-carousel-brands',
            'title' 				=> __( 'Image Carousel Brands' ),
            'description' 			=> __( 'A custom Image Carousel Brands block.' ),
            'category' 				=> 'foundationblocks',
            'icon'					=> 'layout',
            'keywords'				=> array( 'image', 'carousel', 'brands' ),
            'post_types'			=> array( 'post', 'page' ),
            'mode'					=> 'edit',
            // 'align'				=> 'wide',
            'render_template'		=> get_template_directory() . '/parts/blocks/Block-image-carousel-brands.php',
            // 'render_callback'	=> 'image_carousel_brands_block_render_callback',
            // 'enqueue_style' 		=> get_template_directory_uri() . '/template-parts/blocks/image-carousel-brands/image-carousel-brands.css',
            // 'enqueue_script' 	=> get_template_directory_uri() . '/template-parts/blocks/image-carousel-brands/image-carousel-brands.js',
            // 'enqueue_assets' 	=> 'image_carousel_brands_block_enqueue_assets',
        ));

    }

}