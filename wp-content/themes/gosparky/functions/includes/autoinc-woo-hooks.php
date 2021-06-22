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

add_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 50);
add_action('woocommerce_before_add_to_cart_quantity', 'woocommerce_before_add_to_cart_quantity_minus_btn', 10);
add_action('woocommerce_after_add_to_cart_quantity', 'woocommerce_before_add_to_cart_quantity_plus_btn', 10);

function woocommerce_before_add_to_cart_quantity_minus_btn()
{
    ?>
    <button class="btn minus1">-</button>
    <?php
}

function woocommerce_before_add_to_cart_quantity_plus_btn()
{
    ?>
    <button class="btn plus1">+</button>
    <?php

}

add_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 55);

remove_all_actions('woocommerce_after_add_to_cart_quantity');
