<?php
/**
 * The template part for displaying offcanvas content
 *
 * For more info: http://jointswp.com/docs/off-canvas-menu/
 */
?>

<div class="off-canvas position-right" id="off-canvas" data-off-canvas>

    <button class="close-button" aria-label="Close menu" type="button" data-close>
        <span aria-hidden="true">&times;</span>
    </button>

    <h2>Main Categories</h2>
    <?php
    $taxonomy = 'product_cat';
    $terms = get_terms(array('taxonomy' => 'product_cat', 'parent' => 0));

    foreach ($terms as $term) {
        $term_link = get_term_link($term, $taxonomy);

        echo '<div class="main-cats"><a class="ccats" href="' . $term_link . '">' . $term->name . '</a></div>';
    }
    ?>
    <h2>Browse Main Categories</h2>
    <?php echo get_product_categories('short-product-category-menu'); ?>

    <?php joints_off_canvas_nav(); ?>

    <?php if (is_active_sidebar('offcanvas')) : ?>

        <?php dynamic_sidebar('offcanvas'); ?>

    <?php endif; ?>

</div>
