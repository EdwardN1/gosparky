<?php
/**
 * Block template file: /var/www/clients/client76/web283/web/wp-content/themes/gosparky/parts/blocks/BlockFullWidthCallOut.php
 *
 * Themesparkyfullwidthcallout Block Template.
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'themesparkyfullwidthcallout-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-themesparkyfullwidthcallout full-width-call-out';
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

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($classes); ?>">
    <div class="inner">
        <div class="grid-x">
            <div class="cell auto text-left">
                <h2><?php the_field('heading'); ?></h2>
            </div>
            <?php
            $blank = '';
            if (get_field('open_in_new_tab') == 1) {
                $blank = ' target="_blank"';
            } ?>
            <div class="cell auto text-right">
                <a href="<?php the_field('link'); ?>"<?php echo $blank; ?>><?php the_field('link_description'); ?></a>
            </div>
        </div>
    </div>
</div>