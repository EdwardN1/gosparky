<?php
if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title' => 'Slick Sliders',
        'menu_title' => 'Slick Sliders',
        'menu_slug' => 'acf-slick-sliders',
        'capability' => 'edit_posts',
        'redirect' => false,
        'icon_url' => 'dashicons-embed-photo',
    ));

}