<?php
add_action('woocommerce_before_shop_loop', 'gosparky_open_div', 5);
add_action('woocommerce_after_shop_loop', 'gosparky_close_div', 15);

function gosparky_woo_featured_products()
{
    ob_start();

    $term = get_queried_object();
    $category_id = empty($term->term_id) ? 0 : $term->term_id;

    $meta_query = WC()->query->get_meta_query();
    $tax_query = WC()->query->get_tax_query();

    $tax_query[] = array(
        'taxonomy' => 'product_visibility',
        'field' => 'name',
        'terms' => 'featured',
        'operator' => 'IN',
    );

    $tax_query[] = array(
        'taxonomy' => 'product_cat',
        'field' => 'id',
        'terms' => $category_id
    );

    $args = array(
        'post_type' => 'product',
        'post_status' => 'publish',
        'ignore_sticky_posts' => 1,
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'ASC',
        'meta_query' => $meta_query,
        'tax_query' => $tax_query,
    );

    $loop = new WP_Query($args);
    if ($loop->have_posts()):
        $data = ' data-fade="false" data-infinite="true" data-draggable="true"';
        $data .= ' data-arrows="false"';
        $data .= ' data-autoplay="true"';

        $data .= ' data-slidestoscroll="1"';
        $data .= ' data-slidestoshow="4"';
        $data .= ' data-slidestoshowmedium="2"';
        $data .= ' data-slidestoshowsmall="1"';
        ?>
        <div class="block-featured-products-carousel-block">
            <h2>Featured Products</h2>
            <div data-slick class="slick-slider"<?php echo $data; ?>>
                <?php
                while ($loop->have_posts()) : $loop->the_post();
                    $this_product = wc_get_product($loop->post->ID);
                    $price = $this_product->get_price();
                    $post_thumbnail_id = $this_product->get_image_id();
                    $size = 'shop_catalog';
                    $image_size = apply_filters('single_product_archive_thumbnail_size', $size);
                    $image = get_the_post_thumbnail($loop->post->ID, $image_size);
                    $sku = $this_product->get_sku();
                    $title = $this_product->get_name();
                    ?>

                    <div class="featured-product-container slide">
                        <div class="featured-product-slide">
                            <div class="img-wrap">
                                <a href="<?php echo get_permalink($loop->post->ID) ?>">
                                    <?php echo $image; ?>
                                </a>
                            </div>
                            <div class="product-title"><a
                                        href="<?php echo get_permalink($loop->post->ID); ?>"><?php echo $title; ?></a>
                            </div>
                            <div class="product-price"><a
                                        href="<?php echo get_permalink($loop->post->ID); ?>">£<?php echo number_format($price, 2); ?></a>
                            </div>
                            <div class="add-to-cart">
                                <a href="?add-to-cart=<?php echo $loop->post->ID; ?>" data-quantity="1"
                                   class="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                   data-product_id="<?php echo $loop->post->ID; ?>"
                                   data-product_sku="<?php echo $sku; ?>"
                                   aria-label="Add “<?php echo $title; ?>” to your basket" rel="nofollow">Add to
                                    basket</a>
                            </div>
                            <div class="buy-now">
                                <a href="<?php echo wc_get_checkout_url(); ?>?add-to-cart=<?php echo $loop->post->ID; ?>&amp;quantity=1"
                                   id="aqbp_quick_buy_shop_btn" data-quantity="1"
                                   class="button product_type_simple add_to_cart_button"
                                   data-product_id="<?php echo $loop->post->ID; ?>"
                                   data-product_sku="<?php echo $sku; ?>"
                                   aria-label="Add <?php echo $title; ?> to your cart" rel="nofollow">BUY NOW</a>
                            </div>
                        </div>
                    </div>

                <?php
                endwhile;
                ?>
            </div>
        </div>
    <?php
    endif;
    wp_reset_query();

    return ob_get_clean();
}

function gosparky_open_div()
{
    echo '<div class="grid-x">';
    echo '<div class="gosparky-filter cell large-2 medium-3 show-for-medium">' . gosparky_vertical_filter() . '</div>';
    echo '<div class="gosparky-archive cell large-10 medium-9 small-12">';
    //echo gosparky_woo_featured_products();

}

function gosparky_close_div()
{
    echo '</div>';
    echo '</div>';
}

function gosparky_vertical_filter()
{
    $term_id = get_queried_object_id();
    $taxonomy = 'product_cat';

    $terms = get_terms([
        'taxonomy' => $taxonomy,
        'hide_empty' => true,
        'parent' => get_queried_object_id()
    ]);

    if (count($terms) > 0) {

        $output = '<ul class="vertical menu accordion-menu" data-accordion-menu data-submenu-toggle="true">';

        foreach ($terms as $term) {
            $term_link = get_term_link($term, $taxonomy);
            $children = get_term_children($term->term_id, $taxonomy);
            if (count($children) > 0) {
                $output .= '<li class="has-children">';
                $output .= '<a href="' . $term_link . '">' . $term->name . '</a>';
                $output .= '<ul class="menu vertical nested">';
                foreach ($children as $child_id) {
                    $child = get_term($child_id);
                    $child_term_link = get_term_link($child, $taxonomy);
                    $output .= '<li><a href="' . $child_term_link . '">' . $child->name . '</a></li>';
                }
                $output .= '</ul>';
                $output .= '</li>';
            } else {
                $output .= '<li><a href="' . $term_link . '">' . $term->name . '</a></li>';
            }
            $output .= '';
        }

        return $output . '</ul>';
    }

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
            do_action('woocommerce_before_shop_loop_item');

            /**
             * Hook: woocommerce_before_shop_loop_item_title.
             *
             * @hooked woocommerce_show_product_loop_sale_flash - 10
             * @hooked woocommerce_template_loop_product_thumbnail - 10
             */
            do_action('woocommerce_before_shop_loop_item_title');

            /**
             * Hook: woocommerce_shop_loop_item_title.
             *
             * @hooked woocommerce_template_loop_product_title - 10
             */
            do_action('woocommerce_shop_loop_item_title');

            /**
             * Hook: woocommerce_after_shop_loop_item_title.
             *
             * @hooked woocommerce_template_loop_rating - 5
             * @hooked woocommerce_template_loop_price - 10
             */
            do_action('woocommerce_after_shop_loop_item_title');

            /**
             * Hook: woocommerce_after_shop_loop_item.
             *
             * @hooked woocommerce_template_loop_product_link_close - 5
             * @hooked woocommerce_template_loop_add_to_cart - 10
             */
            do_action('woocommerce_after_shop_loop_item');
            echo '</div>';
            return;
        }
    }
    load_template($located, false);
}

// wrap images
add_action('woocommerce_before_shop_loop_item_title', 'gosparky_add_img_wrapper_start', 5, 2);
function gosparky_add_img_wrapper_start()
{
    echo '<div class="archive-img-wrap">';
}

add_action('woocommerce_before_shop_loop_item_title', 'gosparky_add_img_wrapper_close', 12, 2);
function gosparky_add_img_wrapper_close()
{
    echo '</div>';
}
