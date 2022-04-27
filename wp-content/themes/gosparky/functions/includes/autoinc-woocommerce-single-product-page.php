<?php


add_filter('woocommerce_loop_add_to_cart_link','woocommerce_loop_add_to_cart_link_override',10,2);

function woocommerce_loop_add_to_cart_link_override($link,$product) {
    $is_in_stock = true;

    $currentTaxIDs= $product->get_category_ids();
    $POACats = get_field('poa_categories','option');
    foreach ($POACats as $POACat) {
        foreach ($currentTaxIDs as $currentTaxID) {
            if($currentTaxID==$POACat) $is_in_stock = false;
        }
    }

    if(!$is_in_stock) {
        return "";
    }

    return $link;
}


add_filter('woocommerce_get_price_html', 'get_price_html_override', 100, 2);

function get_price_html_override($price, $product)
{
    $price_excl_tax = wc_get_price_excluding_tax($product);
    $price_incl_tax = wc_get_price_including_tax($product);
    if (!$price_excl_tax) $price_excl_tax = 0;
    if (!$price_incl_tax) $price_incl_tax = 0;
    $currentTaxID = get_queried_object()->term_id;
    $POACats = get_field('poa_categories','option');
    foreach ($POACats as $POACat) {
        if($POACat==$currentTaxID) $price_excl_tax = 0;
    }
    if ($price_excl_tax == 0) {
        ob_start();
        ?>
        <span class="woocommerce-Price-amount amount">
        <span>
            <span class="ex-tax" style="display: none;">POA</span>
            <span class="inc-tax" style="display: none;">POA</span>
        </span>
    </span>
        <?php
        $output = ob_get_clean();

    } else {


        ob_start();
        ?>
        <span class="woocommerce-Price-amount amount">
        <span>
            <span class="woocommerce-Price-currencySymbol"><?php echo get_woocommerce_currency_symbol(); ?></span>
            <span class="ex-tax" style="display: none;"><?php echo number_format($price_excl_tax, 2); ?></span>
            <span class="inc-tax" style="display: none;"><?php echo number_format($price_incl_tax, 2); ?></span>
        </span>
    </span>
        <?php
        $output = ob_get_clean();
    }
    return $output;
}

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
    $price_excl_tax = wc_get_price_excluding_tax($product);
    $currentTaxIDs= $product->get_category_ids();
    $POACats = get_field('poa_categories','option');
    foreach ($POACats as $POACat) {
        foreach ($currentTaxIDs as $currentTaxID) {
            if($POACat==$currentTaxID) $price_excl_tax = 0;
        }
    }
    if ((!$price_excl_tax) || ($price_excl_tax == 0)) {
        ?>
        <p class="price"><span class="only">POA</span><span class="vat">Call for price</span> </p>
        <?php
    } else {
        ?>
        <p class="<?php echo esc_attr(apply_filters('woocommerce_product_price_class', 'price')); ?>">
            <span class="only">ONLY</span>
            <span class="display-price"><?php echo $product->get_price_html(); ?></span>
            <span class="vat ex-tax" style="display: none;">Excl.VAT</span><span class="vat inc-tax"
                                                                                 style="display: none;">Incl.VAT</span>
        </p>
        <?php
    }
}

add_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart_override', 50);

function woocommerce_template_single_add_to_cart_override()
{
    global $product;

    if (!$product->is_purchasable()) {
        return;
    }

    echo wc_get_stock_html($product);

    $is_in_stock = $product->is_in_stock();

    $currentTaxIDs= $product->get_category_ids();
    $POACats = get_field('poa_categories','option');
    foreach ($POACats as $POACat) {
        foreach ($currentTaxIDs as $currentTaxID) {
            if($POACat==$currentTaxID) $is_in_stock = false;
        }
    }

    if ($is_in_stock) : ?>

        <?php do_action('woocommerce_before_add_to_cart_form'); ?>


        <form class="cart"
              action="<?php echo esc_url(apply_filters('woocommerce_add_to_cart_form_action', $product->get_permalink())); ?>"
              method="post" enctype='multipart/form-data'>
            <?php do_action('woocommerce_before_add_to_cart_button'); ?>
            <div class="grid-x">
                <div class="cell shrink">
                    <button class="btn minus1" style="font-size: 26px"
                            onclick="document.querySelector('.quantity .qty').stepDown()">-
                    </button>
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
                    <button class="btn plus1" style="font-size: 26px"
                            onclick="document.querySelector('.quantity .qty').stepUp()">+
                    </button>
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
                buttons[i].addEventListener('click', function (e) {
                    e.preventDefault();
                });
            }
        </script>
        <?php do_action('woocommerce_after_add_to_cart_form'); ?>

    <?php endif;
}

add_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 55);

remove_all_actions('woocommerce_after_add_to_cart_quantity');

add_action('woocommerce_before_single_product_summary', 'woocommerce_open_single_product_summary', 5);
add_action('woocommerce_after_single_product_summary', 'woocommerce_close_single_product_summary', 10);

function woocommerce_open_single_product_summary()
{
    ?>
    <div class="begin-single-product-summary">
        <?php
        }

        function woocommerce_close_single_product_summary()
        {
        ?>
        <div class="clear"></div>
    </div>
    <?php
}