<?php
/**
 * Block template file: /var/www/clients/client76/web288/web/wp-content/themes/gosparkyparts/blocks/ecologi-block.php
 *
 * Ecologi Block Block Template.
 *
 * @var array $block The block settings and attributes.
 * @var string $content The block inner HTML (empty).
 * @var bool $is_preview True during AJAX preview.
 * @var   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'ecologi-block-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-ecologi-block';
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
    <?php $ecologi = gosparky_get_ecologi_impact(); ?>
    <?php $carbonOffset = $ecologi['carbonOffset'];?>
    <?php if($carbonOffset==0) {$carbonOffset = $ecologi['trees'] * 5;} ?>
    <?php $ecologi_background_image = get_field('ecologi_background_image', 'option'); ?>
    <div class="grid-container footer-ecologi-background-row" style="padding-left: 0; padding-right: 0;">
        <img src="<?php echo esc_url($ecologi_background_image['url']); ?>"
             alt="<?php echo esc_attr($ecologi_background_image['alt']); ?>"/>
        <div class="tree-data">
            <div class="grid-x">
                <div class="cell auto"></div>
                <div class="cell tree shrink"><img
                            src="<?php echo get_template_directory_uri() . '/assets/images/tree.png'; ?>"></div>
                <div class="cell trees shrink text-right"><?php echo (string)$ecologi['trees']; ?></div>
                <div class="cell trees-planted shrink"><img
                            src="<?php echo get_template_directory_uri() . '/assets/images/trees-planted.png'; ?>">
                </div>
                <div class="cell co2 shrink"><img
                            src="<?php echo get_template_directory_uri() . '/assets/images/co2.png'; ?>"></div>
                <div class="cell carbonOffset shrink text-right"><?php echo $carbonOffset; ?>kg</div>
                <div class="cell carbon-captured shrink"><img
                            src="<?php echo get_template_directory_uri() . '/assets/images/carbon-captured.png'; ?>">
                </div>
                <div class="cell auto"></div>
            </div>
        </div>
    </div>
</div>