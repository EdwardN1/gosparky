<?php
function gosparky_get_ecologi_impact() {
    $JSON = wp_safe_remote_get('https://public.ecologi.com/users/gosparky/impact');
    //error_log(print_r($JSON['body'],true));
    if(! is_wp_error( $JSON )) {
        $response = json_decode($JSON['body'],true);
        if(is_array($response)) {
            return $response;
        }
    }
    return false;
}

add_action( 'acf/init', 'register_ecologi_block_block' );
function register_ecologi_block_block() {

    if ( function_exists( 'acf_register_block_type' ) ) {

        // Register Ecologi Block block
        acf_register_block_type( array(
            'name' 					=> 'ecologi-block',
            'title' 				=> __( 'Ecologi Block' ),
            'description' 			=> __( 'A custom Ecologi Block.' ),
            'category' 				=> 'formatting',
            'icon'					=> 'layout',
            'keywords'				=> array( 'ecologi', 'block' ),
            'post_types'			=> array( 'post', 'page' ),
            'mode'					=> 'auto',
            // 'align'				=> 'wide',
            'render_template'		=> get_template_directory() . '/parts/blocks/ecologi-block.php',
            // 'render_callback'	=> 'ecologi_block_block_render_callback',
            // 'enqueue_style' 		=> get_template_directory_uri() . '/template-parts/blocks/ecologi-block/ecologi-block.css',
            // 'enqueue_script' 	=> get_template_directory_uri() . '/template-parts/blocks/ecologi-block/ecologi-block.js',
            // 'enqueue_assets' 	=> 'ecologi_block_block_enqueue_assets',
        ));

    }

}