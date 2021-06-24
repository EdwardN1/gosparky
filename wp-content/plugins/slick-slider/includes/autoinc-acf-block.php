<?php
add_filter( 'block_categories', function( $categories, $post ) {
    return array_merge(
        $categories,
        array(
            array(
                'slug' => 'slicksliderblocks',
                'title' => __( 'Slick Slider Blocks', 'slicksliderblocks' ),
            ),
        )
    );
}, 10, 2 );

add_action( 'acf/init', 'register_slick_slider_block' );
function register_slick_slider_block() {

    if ( function_exists( 'acf_register_block_type' ) ) {

        // Register Slick Slider block
        acf_register_block_type( array(
            'name' 					=> 'slick-slider',
            'title' 				=> __( 'Slick Slider' ),
            'description' 			=> __( 'A custom Slick Slider block.' ),
            'category' 				=> 'slicksliderblocks',
            'icon'					=> 'embed-photo',
            'keywords'				=> array( 'slick', 'slider' ),
            'post_types'			=> array( 'post', 'page' ),
            'mode'					=> 'edit',
            // 'align'				=> 'wide',
            'render_template'		=> tchss_PLUGINPATH.'/blocks/block.php',
            // 'render_callback'	=> 'slick_slider_block_render_callback',
            // 'enqueue_style' 		=> get_template_directory_uri() . '/template-parts/blocks/slick-slider/slick-slider.css',
            // 'enqueue_script' 	=> get_template_directory_uri() . '/template-parts/blocks/slick-slider/slick-slider.js',
            // 'enqueue_assets' 	=> 'slick_slider_block_enqueue_assets',
        ));

    }

}