<?php
/**
 * Hook: woocommerce_single_product_summary.
 *
 * @hooked woocommerce_template_single_title - 5
 * @hooked woocommerce_template_single_rating - 10
 * @hooked woocommerce_template_single_price - 10
 * @hooked woocommerce_template_single_excerpt - 20
 * @hooked woocommerce_template_single_add_to_cart - 30
 * @hooked woocommerce_template_single_meta - 40
 * @hooked woocommerce_template_single_sharing - 50
 * @hooked WC_Structured_Data::generate_product_data() - 60
 */

remove_all_actions('woocommerce_single_product_summary');
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 10);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 20);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta_override', 30);

function woocommerce_template_single_meta_override()
{
    global $product;
    ?>
    <div class="product_meta">

        <?php do_action('woocommerce_product_meta_start'); ?>

        <?php if (wc_product_sku_enabled() && ($product->get_sku() || $product->is_type('variable'))) : ?>

            <span class="sku_wrapper"><?php esc_html_e('Part Number:', 'woocommerce'); ?> <span
                        class="sku"><?php echo ($sku = $product->get_sku()) ? $sku : esc_html__('N/A', 'woocommerce'); ?></span></span>

        <?php endif; ?>

        <?php echo wc_get_product_category_list($product->get_id(), ', ', '<span class="posted_in">' . _n('Category:', 'Categories:', count($product->get_category_ids()), 'woocommerce') . ' ', '</span>'); ?>

        <?php echo wc_get_product_tag_list($product->get_id(), ', ', '<span class="tagged_as">' . _n('Tag:', 'Tags:', count($product->get_tag_ids()), 'woocommerce') . ' ', '</span>'); ?>

        <?php do_action('woocommerce_product_meta_end'); ?>

    </div>
    <?php
}

add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price_override', 40);

function woocommerce_template_single_price_override()
{
    global $product;

    ?>
    <p class="<?php echo esc_attr(apply_filters('woocommerce_product_price_class', 'price')); ?>">
        <span class="only">ONLY</span>
        <span class="display-price"><?php echo $product->get_price_html(); ?></span>
        <span class="vat">Excl.VAT</span>
    </p>
    <?php
}

/*add_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 50);
add_action('woocommerce_before_add_to_cart_quantity', 'woocommerce_before_add_to_cart_quantity_minus_btn', 10);
add_action('woocommerce_after_add_to_cart_quantity', 'woocommerce_before_add_to_cart_quantity_plus_btn', 20);

function woocommerce_before_add_to_cart_quantity_minus_btn()
{
    */ ?><!--
    <button class="btn minus1" style="font-size: 26px">-</button>
    <?php
/*}

function woocommerce_before_add_to_cart_quantity_plus_btn()
{
    */ ?>
    <button class="btn plus1" style="font-size: 26px">+</button>
    --><?php
/*
}*/

add_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart_override', 50);

function woocommerce_template_single_add_to_cart_override()
{
    global $product;

    if (!$product->is_purchasable()) {
        return;
    }

    echo wc_get_stock_html($product); // WPCS: XSS ok.

    if ($product->is_in_stock()) : ?>

        <?php do_action('woocommerce_before_add_to_cart_form'); ?>


        <form class="cart"
              action="<?php echo esc_url(apply_filters('woocommerce_add_to_cart_form_action', $product->get_permalink())); ?>"
              method="post" enctype='multipart/form-data'>
            <?php do_action('woocommerce_before_add_to_cart_button'); ?>
            <div class="grid-x">
                <div class="cell shrink">
                    <button class="btn minus1" style="font-size: 26px" onclick="document.querySelector('.quantity .qty').stepDown()">-</button>
                </div>
                <div class="cell shrink">
                    <?php
                    do_action('woocommerce_before_add_to_cart_quantity');

                    woocommerce_quantity_input(
                        array(
                            'min_value' => apply_filters('woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product),
                            'max_value' => apply_filters('woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product),
                            'input_value' => isset($_POST['quantity']) ? wc_stock_amount(wp_unslash($_POST['quantity'])) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
                        )
                    );

                    do_action('woocommerce_after_add_to_cart_quantity');
                    ?>
                </div>
                <div class="cell shrink">
                    <button class="btn plus1" style="font-size: 26px" onclick="document.querySelector('.quantity .qty').stepUp()">+</button>
                </div>
                <div class="cell auto">
                    <button type="submit" name="add-to-cart" value="<?php echo esc_attr($product->get_id()); ?>"
                            class="single_add_to_cart_button button alt"><?php echo esc_html($product->single_add_to_cart_text()); ?></button>
                </div>
            </div>
            <?php do_action('woocommerce_after_add_to_cart_button'); ?>
        </form>
        <script>
            var buttons = document.querySelectorAll('.btn');
            for (i = 0; i < buttons.length; i++) {
                buttons[i].addEventListener('click', function(e) {
                    e.preventDefault();
                });
            }
        </script>
        <?php do_action('woocommerce_after_add_to_cart_form'); ?>

    <?php endif;
}

add_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 55);

remove_all_actions('woocommerce_after_add_to_cart_quantity');
