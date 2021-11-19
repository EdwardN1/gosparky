<?php
/**
 * Block template file: template-parts/blocks/Block-image-carousel-brands.php
 *
 * Image Carousel Brands Block Template.
 *
 * @var   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'image-carousel-brands-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-image-carousel-brands';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
?>

<style type="text/css">
    <?php echo '#' . $id; ?> {
    /* Add styles that use ACF values here */
    }
</style>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
    <?php
    $data = ' data-fade="false" data-infinite="true" data-draggable="true"';
    if ( get_field( 'arrows' ) == 1 ) : ?>
    <?php $data .= ' data-arrows="true"' ?>
    <?php else : ?>
    <?php $data .= ' data-arrows="false"' ?>
    <?php endif; ?>
    <?php if ( get_field( 'autoplay' ) == 1 ) : ?>
    <?php $data .= ' data-autoplay="true"' ?>
    <?php else : ?>
    <?php $data .= ' data-autoplay="false"' ?>
    <?php endif; ?>
    <?php $data .= ' data-slidestoscroll="'.get_field( 'slides_to_scroll' ).'"'; ?>
    <?php $data .= ' data-slidestoshow="'.get_field( 'slides_to_show' ).'"'; ?>
    <?php $data .= ' data-slidestoshowmedium="'.get_field( 'slides_to_show_medium' ).'"'; ?>
    <?php $data .= ' data-slidestoshowsmall="'.get_field( 'slides_to_show_small' ).'"'; ?>

    <div data-slick class="slick-slider"<?php echo $data;?>>
        <?php if ( have_rows( 'slides' ) ) : ?>
            <?php while ( have_rows( 'slides' ) ) : the_row(); ?>
                <?php $image = get_sub_field( 'image' ); ?>
                <?php if ( $image ) : ?>
                <div class="image-container slide">
                    <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                </div>
                <?php endif; ?>
            <?php endwhile; ?>
        <?php else : ?>
            <?php // no rows found ?>
        <?php endif; ?>
    </div>


</div>