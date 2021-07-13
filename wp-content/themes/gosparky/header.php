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
        <div class="show-for-large">
            <div class="page-top grid-container">
                <div class="grid-x">
                    <div class="cell shrink logo">
                        <a href="/"><img
                                    src="<?php echo get_template_directory_uri() . '/assets/images/Logo-White-on-Blue.png'; ?>"></a>
                    </div>
                    <div class="cell shrink search show-for-large">
                        <?php get_product_search_form(); ?>
                        <!--<img src="<?php /*echo get_template_directory_uri() . '/assets/images/prototype/searchbox.png'; */ ?>">-->
                    </div>
                    <div class="cell auto contact-top text-center">
                        <div class="tel"><a href="tel:08001120090">0800 112 00 90</a></div>
                        <div class="email"><a href="mailto:sales@gosparky.co.uk">sales@gosparky.co.uk</a></div>
                        <!--<img src="<?php /*echo get_template_directory_uri() . '/assets/images/prototype/contact-top.png'; */ ?>">-->
                    </div>
                    <div class="cell shrink top-icons">
                        <div class="grid-x">
                            <div class="cell shrink account">
                                <a href="/my-account/"><img
                                            src="<?php echo get_template_directory_uri() . '/assets/images/svg/account-icon.svg'; ?>"></a>
                                <a href="/my-account/" class="red-text">My Account</a>
                            </div>
                            <div class="cell shrink cart">
                                <div class="cart-icon-wrapper">
                                    <a href="<?php echo wc_get_cart_url(); ?>"><img
                                                src="<?php echo get_template_directory_uri() . '/assets/images//svg/trolley-icon.svg'; ?>"></a>
                                    <a class="cart-customlocation" href="<?php echo wc_get_cart_url(); ?>"
                                       title="<?php _e('View your shopping cart'); ?>">
                                        <span class="cart-total"><?php echo WC()->cart->get_cart_total(); ?></span>
                                        <span class="cart-items"><?php echo sprintf(_n('%d item', '%d items', WC()->cart->get_cart_contents_count()), WC()->cart->get_cart_contents_count()); ?></span>

                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="category-menu grid-container">
                <?php echo get_product_categories('short-product-category-menu'); ?>
            </div>
        </div>

        <div class="hide-for-large">
            <div class="mobile-page-top grid-container">
                <div class="grid-x">
                    <div class="cell shrink logo">
                        <a href="/"><img
                                    src="<?php echo get_template_directory_uri() . '/assets/images/Logo-White-on-Blue.png'; ?>"></a>
                    </div>
                    <div class="cell auto search">
                        <?php get_product_search_form(); ?>
                        <!--<img src="<?php /*echo get_template_directory_uri() . '/assets/images/prototype/searchbox.png'; */ ?>">-->
                    </div>
                </div>
            </div>
            <div class="grid-x mobile-menu-bar">
                <div class="cell auto logo">
                    <a data-toggle="off-canvas"><img src="<?php echo get_template_directory_uri() . '/assets/images/svg/hamburger.svg'; ?>"><br>Browse</a>
                </div>
                <div class="cell auto account">
                    <a href="/my-account/"><img
                                src="<?php echo get_template_directory_uri() . '/assets/images/svg/account-icon-white.svg'; ?>"><br>My Account</a>
                </div>
                <div class="cell auto cart">
                    <a href="<?php echo wc_get_cart_url(); ?>"><img
                                src="<?php echo get_template_directory_uri() . '/assets/images//svg/trolley-icon-white.svg'; ?>"></a><br>
                    <a class="cart-customlocation" href="<?php echo wc_get_cart_url(); ?>"
                       title="<?php _e('View your shopping cart'); ?>">
                        <span class="cart-total"><?php echo WC()->cart->get_cart_total(); ?></span>
                        <span class="cart-items"><?php echo sprintf(_n('%d item', '%d items', WC()->cart->get_cart_contents_count()), WC()->cart->get_cart_contents_count()); ?></span>

                    </a>
                </div>
            </div>
        </div>

        <div class="header-icons grid-container">
            <div class="grid-x">
                <div class="cell large-auto medium-12 text-center spacer"><img
                            src="<?php echo get_template_directory_uri() . '/assets/images/prototype/chat-icon.png'; ?>">
                </div>
                <div class="cell large-auto medium-12 text-center spacer"><img
                            src="<?php echo get_template_directory_uri() . '/assets/images/prototype/find-icon.png'; ?>">
                </div>
                <div class="cell large-auto medium-12 text-center"><img
                            src="<?php echo get_template_directory_uri() . '/assets/images/prototype/dpd-icon.png'; ?>">
                </div>
            </div>
        </div>

        <div class="grid-container">
            <?php
            if (!is_front_page()) {
                if (function_exists('yoast_breadcrumb')) {
                    yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
                }
            }
            ?>
        </div>