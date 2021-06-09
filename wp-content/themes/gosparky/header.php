<?php
/**
 * The template for displaying the header
 *
 * This is the template that displays all of the <head> section
 *
 */
?>

<!doctype html>

<html class="no-js" <?php language_attributes(); ?>>

<head>
    <meta charset="utf-8">

    <!-- Force IE to use the latest rendering engine available -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta class="foundation-mq">

    <!-- If Site Icon isn't set in customizer -->
    <?php if (!function_exists('has_site_icon') || !has_site_icon()) { ?>
        <!-- Icons & Favicons -->
        <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
        <link href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-icon-touch.png"
              rel="apple-touch-icon"/>
    <?php } ?>

    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<div class="off-canvas-wrapper">

    <!-- Load off-canvas container. Feel free to remove if not using. -->
    <?php get_template_part('parts/content', 'offcanvas'); ?>

    <div class="off-canvas-content" data-off-canvas-content>

        <header class="header" role="banner">

            <!-- This navs will be applied to the topbar, above all content
                 To see additional nav styles, visit the /parts directory -->
            <?php get_template_part('parts/nav', 'offcanvas-topbar'); ?>

        </header> <!-- end .header -->
        <div class="page-top grid-container">
            <div class="grid-x">
                <div class="cell shrink logo">
                    <a href="/"><img
                                src="<?php echo get_template_directory_uri() . '/assets/images/Logo-White-on-Blue.png'; ?>"></a>
                </div>
                <div class="cell shrink search">
                    <img src="<?php echo get_template_directory_uri() . '/assets/images/prototype/searchbox.png'; ?>">
                </div>
                <div class="cell auto contact-top text-center">
                    <img src="<?php echo get_template_directory_uri() . '/assets/images/prototype/contact-top.png'; ?>">
                </div>
                <div class="cell shrink top-icons">
                    <div class="grid-x">
                        <div class="cell shrink"><a href="/my-account/"><img
                                        src="<?php echo get_template_directory_uri() . '/assets/images/prototype/account-icon.png'; ?>"></a></div>
                        <div class="cell shrink"><a href="/cart/"><img
                                        src="<?php echo get_template_directory_uri() . '/assets/images/prototype/basket-icon.png'; ?>"></a></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="category-menu grid-container show-for-medium">
            <?php echo get_product_categories('short-product-category-menu'); ?>
        </div>

        <div class="header-icons grid-container">
            <div class="grid-x">
                <div class="cell auto text-center spacer"><img src="<?php echo get_template_directory_uri() . '/assets/images/prototype/chat-icon.png'; ?>"></div>
                <div class="cell auto text-center spacer"><img src="<?php echo get_template_directory_uri() . '/assets/images/prototype/find-icon.png'; ?>"></div>
                <div class="cell auto text-center"><img src="<?php echo get_template_directory_uri() . '/assets/images/prototype/dpd-icon.png'; ?>"></div>
            </div>
        </div>

        <div class="grid-container">
            <?php
            if ( function_exists('yoast_breadcrumb') ) {
                yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
            }
            ?>
        </div>