<?php
if ( function_exists( 'acf_add_options_page' ) ) {

    acf_add_options_page( array(
        'page_title'	=> 'Theme Settings',
        'menu_title'	=> 'Theme Settings',
        'menu_slug' 	=> 'acf-theme-settings',
        'capability'	=> 'edit_posts',
        'redirect'		=> false,
    ));

}