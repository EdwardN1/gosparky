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

<?php $master_style_class = ''; ?>
<?php if (have_rows('general_settings', 'option')) : ?>
    <?php while (have_rows('general_settings', 'option')) : the_row();
        $master_style_id = get_sub_field('master_style_id');
        if ($master_style_id != '') {
            $master_style_class = $master_style_id;
        }
    endwhile; ?>
<?php endif; ?>
<body <?php body_class($master_style_class); ?>>

<div class="off-canvas-wrapper">

    <!-- Load off-canvas container. Feel free to remove if not using. -->
    <?php get_template_part('parts/content', 'offcanvas'); ?>

    <div class="off-canvas-content" data-off-canvas-content>

        <header class="header" role="banner">

            <!-- This navs will be applied to the topbar, above all content
                 To see additional nav styles, visit the /parts directory -->
            <?php get_template_part('parts/nav', 'offcanvas-topbar'); ?>

        </header> <!-- end .header -->
        <!--<div class="cli-bar-container cli-style-v2">
            <div class="grid-container">
                <div class="cli-bar-message">
                    We use cookies on our website to give you the most relevant experience by remembering your preferences and repeat visits.
                    By clicking “Accept All”, you consent to the use of ALL the cookies. However, you may visit "Cookie Settings" to provide a controlled consent.
                </div>
                <div class="cli-bar-btn_container">
                    <?php /*echo do_shortcode('[cookie_settings margin="0px 5px 0px 0px"]');*/ ?>
                    <?php /*echo do_shortcode('[cookie_accept_all]');*/ ?>
                </div>
            </div>
        </div>-->

        <div class="show-for-large">
            <div class="page-top grid-container">
                <div class="grid-x">
                    <div class="cell shrink logo">
                        <?php if (have_rows('general_settings', 'option')) : ?>
                            <?php while (have_rows('general_settings', 'option')) : the_row(); ?>
                                <?php $header_logo = get_sub_field('header_logo'); ?>
                                <?php if ($header_logo) : ?>
                                    <a href="/"><img src="<?php echo esc_url($header_logo['url']); ?>"
                                                     alt="<?php echo esc_attr($header_logo['alt']); ?>"/></a>
                                <?php else: ?>
                                    <a href="/"><img
                                                src="<?php echo get_template_directory_uri() . '/assets/images/gosparky-logo.png'; ?>"></a>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <a href="/"><img
                                        src="<?php echo get_template_directory_uri() . '/assets/images/gosparky-logo.png'; ?>"></a>
                        <?php endif; ?>
                    </div>
                    <div class="cell shrink search show-for-large">
                        <?php get_product_search_form(); ?>
                        <!--<img src="<?php /*echo get_template_directory_uri() . '/assets/images/prototype/searchbox.png'; */ ?>">-->
                    </div>
                    <div class="cell auto contact-top text-center">

                        <?php if (have_rows('general_settings', 'option')) : ?>
                            <?php while (have_rows('general_settings', 'option')) : the_row(); ?>
                                <?php $telephone_number = get_sub_field('telephone_number'); ?>
                                <?php $email_address = get_sub_field('email_address'); ?>
                                <?php if ($telephone_number != '') : ?>
                                    <div class="tel"><a
                                                href="tel:<?php echo str_replace(' ', '', $telephone_number); ?>"><?php the_sub_field('telephone_number'); ?></a>
                                    </div>
                                <?php else: ?>
                                    <div class="tel"><a href="tel:08001120090">0800 112 00 90</a></div>
                                <?php endif; ?>
                                <?php if ($email_address != '') : ?>
                                    <div class="email"><a
                                                href="mailto:<?php echo $email_address; ?>"><?php echo $email_address; ?></a>
                                    </div>
                                <?php else: ?>
                                    <div class="email"><a href="mailto:sales@gosparky.co.uk">sales@gosparky.co.uk</a>
                                    </div>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <div class="tel"><a href="tel:08001120090">0800 112 00 90</a></div>
                            <div class="email"><a href="mailto:sales@gosparky.co.uk">sales@gosparky.co.uk</a></div>
                        <?php endif; ?>

                    </div>
                    <div class="cell shrink top-icons">
                        <div class="grid-x">
                            <div class="cell shrink account">
                                <a href="/my-account/">
                                    <?php if (have_rows('general_settings', 'option')) : ?>
                                        <?php while (have_rows('general_settings', 'option')) : the_row(); ?>
                                            <?php $desktop_account_icon = get_sub_field('desktop_account_icon'); ?>
                                            <?php if ($desktop_account_icon) : ?>
                                                <img src="<?php echo esc_url($desktop_account_icon['url']); ?>"
                                                     alt="<?php echo esc_attr($desktop_account_icon['alt']); ?>"/>
                                            <?php else: ?>
                                                <img src="<?php echo get_template_directory_uri() . '/assets/images/svg/account-icon.svg'; ?>">
                                            <?php endif; ?>
                                        <?php endwhile; ?>
                                    <?php else: ?>
                                        <img src="<?php echo get_template_directory_uri() . '/assets/images/svg/account-icon.svg'; ?>">
                                    <?php endif; ?>
                                </a>
                                <a href="/my-account/" class="red-text">My Account</a>
                            </div>
                            <div class="cell shrink cart">
                                <div class="cart-icon-wrapper">
                                    <a href="<?php echo wc_get_cart_url(); ?>">
                                        <?php if (have_rows('general_settings', 'option')) : ?>
                                            <?php while (have_rows('general_settings', 'option')) : the_row(); ?>
                                                <?php $desktop_cart_icon = get_sub_field('desktop_cart_icon'); ?>
                                                <?php if ($desktop_cart_icon) : ?>
                                                    <img src="<?php echo esc_url($desktop_cart_icon['url']); ?>"
                                                         alt="<?php echo esc_attr($desktop_cart_icon['alt']); ?>"/>
                                                <?php else: ?>
                                                    <img src="<?php echo get_template_directory_uri() . '/assets/images//svg/trolley-icon.svg'; ?>">
                                                <?php endif; ?>
                                            <?php endwhile; ?>
                                        <?php else: ?>
                                            <img src="<?php echo get_template_directory_uri() . '/assets/images//svg/trolley-icon.svg'; ?>">
                                        <?php endif; ?>

                                    </a>
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
                <?php if (get_field('mega_menu_style', 'option') == 1): ?>
                    <?php echo get_product_categories('category-mega-menu'); ?>
                <?php else: ?>
                    <?php echo get_product_categories('short-product-category-menu'); ?>
                <?php endif; ?>
            </div>
        </div>

        <div class="hide-for-large">

            <div class="grid-x mobile-menu-bar">
                <div class="cell auto logo">
                    <a data-toggle="off-canvas"><img
                                src="<?php echo get_template_directory_uri() . '/assets/images/svg/hamburger.svg'; ?>"><br>Browse</a>
                </div>
                <div class="cell auto account">
                    <a href="/my-account/"><img
                                src="<?php echo get_template_directory_uri() . '/assets/images/svg/account-icon-white.svg'; ?>"><br>My
                        Account</a>
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
            <div class="mobile-page-top grid-container">
                <div class="search">
                    <?php get_product_search_form(); ?>
                    <!--<img src="<?php /*echo get_template_directory_uri() . '/assets/images/prototype/searchbox.png'; */ ?>">-->
                </div>
            </div>
        </div>

        <?php $show_header_icons_row = get_field('show_header_icons_row', 'option'); ?>

        <?php if ($show_header_icons_row == 1): ?>
            <?php
            $left_h_icon = get_template_directory_uri() . '/assets/images/prototype/chat-icon.png';
            $middle_h_icon = get_template_directory_uri() . '/assets/images/prototype/find-icon.png';
            $right_h_icon = get_template_directory_uri() . '/assets/images/prototype/dpd-icon.png';
            if (have_rows('header_icons', 'option')) {
                while (have_rows('header_icons', 'option')) : the_row();
                    $left_icon = get_sub_field('left_icon');
                    $middle_icon = get_sub_field('middle_icon');
                    $right_icon = get_sub_field('right_icon');
                    if ($left_icon) {
                        $left_h_icon = $left_icon['url'];
                    }
                    if ($right_icon) {
                        $right_h_icon = $right_icon['url'];
                    }
                    if ($middle_icon) {
                        $middle_h_icon = $middle_icon['url'];
                    }
                endwhile;
            }
            ?>
            <div class="header-icons grid-container show-for-large">
                <div class="grid-x">
                    <div class="cell large-auto medium-12 text-center spacer"><img
                                src="<?php echo $left_h_icon; ?>">
                    </div>
                    <div class="cell large-auto medium-12 text-center spacer"><img
                                src="<?php echo $middle_h_icon; ?>">
                    </div>
                    <div class="cell large-auto medium-12 text-center"><img
                                src="<?php echo $right_h_icon; ?>">
                    </div>
                </div>
            </div>

        <?php else: ?>
            <div class="spacer"></div>
        <?php endif; ?>

        <div class="grid-container">
            <?php
            if (!is_front_page()) {
                if (function_exists('yoast_breadcrumb')) {
                    yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
                }
            }
            ?>
            <!--<div class="hide-for-medium">
            <?php /*if (is_product_category()): */ ?>
                <div id="sub-categories">
                    <?php
            /*                    $term_id = get_queried_object_id();
                                $taxonomy = 'product_cat';

                                $terms = get_terms([
                                    'taxonomy' => $taxonomy,
                                    'hide_empty' => true,
                                    'parent' => get_queried_object_id()
                                ]);

                                if(count($terms)>0) {

                                    $output = '<ul class="breadcrumbs"><li class="disabled">Sub Categories</li>';

                                    foreach ($terms as $term) {
                                        $term_link = get_term_link($term, $taxonomy);
                                        $children = get_term_children($term->term_id,$taxonomy);
                                        if(count($children)>0) {
                                            $output .= '<li class="no-spacer">';
                                            $output .= '<ul class="dropdown menu" data-dropdown-menu><li><a href="' . $term_link . '">' . $term->name . '</a>';
                                            $output .= '<ul class="menu">';
                                            foreach ($children as $child_id) {
                                                $child = get_term($child_id);
                                                $child_term_link = get_term_link($child, $taxonomy);
                                                $output .= '<li><a href="' . $child_term_link . '">' . $child->name . '</a></li>';
                                            }
                                            $output .= '</ul>';
                                            $output .= '</li></ul>';
                                            $output .= '</li>';
                                        } else {
                                            $output .= '<li><a href="' . $term_link . '">' . $term->name . '</a></li>';
                                        }
                                        $output .= '';
                                    }

                                    echo $output.'</ul>';
                                }

                                */ ?>
                </div>
            <?php /*endif; */ ?>
            </div>-->


        </div>