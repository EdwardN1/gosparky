<?php
/**
 * Block template file: /var/www/clients/client76/web288/web/wp-content/themes/gosparky/parts/blocks/Block-featured-products-carousel.php
 *
 * Featured Products Carousel Block Block Template.
 *
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 * @var   array $block The block settings and attributes.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'featured-products-carousel-block-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-featured-products-carousel-block';
if (!empty($block['className'])) {
    $classes .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $classes .= ' align' . $block['align'];
}
?>

    <style type="text/css">
        <?php echo '#' . $id; ?>
        {
        /* Add styles that use ACF values here */
        }
    </style>
<?php $select_products_urls = get_field('select_products'); ?>
<?php if ($select_products_urls) : ?>
    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($classes); ?>">
        <?php
        $data = ' data-fade="false" data-infinite="true" data-draggable="true"';
        $data .= ' data-arrows="false"';
        $data .= ' data-autoplay="true"';

        $data .= ' data-slidestoscroll="1"';
        $data .= ' data-slidestoshow="4"';
        $data .= ' data-slidestoshowmedium="2"';
        $data .= ' data-slidestoshowsmall="1"';
        ?>
        <h2>Featured Products</h2>
        <div data-slick class="slick-slider"<?php echo $data; ?>>
            <?php foreach ($select_products_urls as $select_products_url) : ?>
                <?php $postID = url_to_postid($select_products_url); ?>
                <?php if ($postID > 0): ?>
                    <?php
                    $product = wc_get_product($postID);
                    $price = $product->get_price();
                    $post_thumbnail_id = $product->get_image_id();
                    $size = 'shop_catalog';
                    $image_size = apply_filters( 'single_product_archive_thumbnail_size', $size );
                    $image = get_the_post_thumbnail($postID, $image_size);
                    $sku = $product->get_sku();
                    $title = $product->get_name();
                    ?>
                    <div class="featured-product-container slide">
                        <div class="featured-product-slide">
                            <div class="img-wrap">
                                <a href="<?php echo esc_url($select_products_url); ?>">
                                    <?php echo $image;?>
                                </a>
                            </div>
                            <div class="product-title"><a href="<?php echo esc_url($select_products_url); ?>"><?php echo $title;?></a></div>
                            <div class="product-price"><a href="<?php echo esc_url($select_products_url); ?>">£<?php echo number_format($price,2);?></a></div>
                            <div class="add-to-cart">
                                <a href="?add-to-cart=<?php echo $postID;?>" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="<?php echo $postID;?>" data-product_sku="<?php echo $sku;?>" aria-label="Add “<?php echo $title;?>” to your basket" rel="nofollow">Add to basket</a>
                            </div>
                            <div class="buy-now">
                                <a href="<?php echo wc_get_checkout_url();?>?add-to-cart=<?php echo $postID;?>&amp;quantity=1" id="aqbp_quick_buy_shop_btn" data-quantity="1" class="button product_type_simple add_to_cart_button" data-product_id="<?php echo $postID;?>" data-product_sku="<?php echo $sku;?>" aria-label="Add <?php echo $title;?> to your cart" rel="nofollow">BUY NOW</a>
                            </div>
                        </div>
                    </div>
                <?php endif;; ?>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>