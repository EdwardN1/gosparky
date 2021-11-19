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
        $data .= ' data-arrows="true"';
        $data .= ' data-autoplay="true"';

        $data .= ' data-slidestoscroll="1"';
        $data .= ' data-slidestoshow="4"';
        $data .= ' data-slidestoshowmedium="2"';
        $data .= ' data-slidestoshowsmall="1"';
        ?>
        <div data-slick class="slick-slider"<?php echo $data; ?>>
            <?php foreach ($select_products_urls as $select_products_url) : ?>
                <?php $postID = url_to_postid($select_products_url); ?>
                <?php if ($postID > 0): ?>
                    <?php
                    $image = get_post_thumbnail($postID, 'full');
                    $title = get_the_title($postID);
                    $product = wc_get_product( $postID );
                    $price = $product->get_price();
                    ?>
                    <div class="featured-product-container slide">
                        <a href="<?php echo esc_url($select_products_url); ?>"><?php echo esc_html($select_products_url); ?></a>
                    </div>
                <?php endif;; ?>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>