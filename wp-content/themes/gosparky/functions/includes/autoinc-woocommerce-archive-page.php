<?php
add_action('woocommerce_before_shop_loop', 'gosparky_open_div', 5);
add_action('woocommerce_after_shop_loop', 'gosparky_close_div', 15);

function gosparky_open_div()
{
    echo '<div class="gosparky-archive">';
}

function gosparky_close_div()
{
    echo '</div>';
}

/*remove_all_actions('woocommerce_before_shop_loop_item');
remove_all_actions('woocommerce_before_shop_loop_item_title');
remove_all_actions('woocommerce_shop_loop_item_title');
remove_all_actions('woocommerce_after_shop_loop_item_title');
remove_all_actions('woocommerce_after_shop_loop_item');*/

add_filter('woocommerce_product_loop_start', 'gosparky_product_loop_start');

function gosparky_product_loop_start()
{
    echo '<div class="products grid-x grid-margin-x grid-margin-y grid-padding-x">';
}

add_filter('woocommerce_product_loop_end', 'gosparky_product_loop_end');

function gosparky_product_loop_end()
{
    echo '</div>';
}

add_filter('wc_get_template_part', 'gosparky_content_product', 10, 3);

function gosparky_content_product($located, $template_name, $slug)
{
    global $product;

// Ensure visibility.
    if (empty($product) || !$product->is_visible()) {
        return;
    }

    if ($template_name == 'content') {
        if ($slug == 'product') {
            echo '<div class="small-12 medium-6 large-3 cell">';
            /**
             * Hook: woocommerce_before_shop_loop_item.
             *
             * @hooked woocommerce_template_loop_product_link_open - 10
             */
            do_action( 'woocommerce_before_shop_loop_item' );

            /**
             * Hook: woocommerce_before_shop_loop_item_title.
             *
             * @hooked woocommerce_show_product_loop_sale_flash - 10
             * @hooked woocommerce_template_loop_product_thumbnail - 10
             */
            do_action( 'woocommerce_before_shop_loop_item_title' );

            /**
             * Hook: woocommerce_shop_loop_item_title.
             *
             * @hooked woocommerce_template_loop_product_title - 10
             */
            do_action( 'woocommerce_shop_loop_item_title' );

            /**
             * Hook: woocommerce_after_shop_loop_item_title.
             *
             * @hooked woocommerce_template_loop_rating - 5
             * @hooked woocommerce_template_loop_price - 10
             */
            do_action( 'woocommerce_after_shop_loop_item_title' );

            /**
             * Hook: woocommerce_after_shop_loop_item.
             *
             * @hooked woocommerce_template_loop_product_link_close - 5
             * @hooked woocommerce_template_loop_add_to_cart - 10
             */
            do_action( 'woocommerce_after_shop_loop_item' );
            echo '</div>';
            return;
        }
    }
    load_template($located,false);
}