<?php
/**
 * Block template file: template-parts/blocks/slick-slider.php
 *
 * Slick Slider Block Template.
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'slick-slider-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-slick-slider';
if (!empty($block['className'])) {
    $classes .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $classes .= ' align' . $block['align'];
}
?>

<?php
$block_slider_id = get_field('id');
if ($block_slider_id != '') {
    $id = $block_slider_id;
}
$slider_name = get_field('slider_name');
$slider_classes = get_field('slider_classes');
if ($slider_classes != '') {
    $classes .= ' ' . $slider_classes;
}
$slider_styles = get_field('slider_styles');
if ($slider_styles != '') {
    $slider_styles = ' style="' . $slider_styles . '"';
};

$adaptiveheight = true;
$arrows = true;
$autoplay = false;
$autoplayspeed = 3000;
$dots = false;
$draggable = true;
$fade = false;
$infinite = true;
$pauseonhover = true;
$slidestoscroll = 1;
$slidestoshow = 1;
$speed = 300;
?>

<?php if (have_rows('sliders', 'option')) : ?>
    <?php $block_content = ''; ?>
    <?php
    while (have_rows('sliders', 'option')) : the_row();
        if ($block_content == '') {
            $name = get_sub_field('name');
            if ($name == $slider_name) {
                if(get_sub_field('adaptiveheight')!=1) {
                    $adaptiveheight = 'false';
                } else {
                    $adaptiveheight = 'true';
                }
                if(get_sub_field('arrows')!=1) {
                    $arrows = 'false';
                } else {
                    $arrows = 'true';
                }
                if(get_sub_field('autoplay')!=1) {
                    $autoplay = 'false';
                } else {
                    $autoplay = 'true';
                }
                $autoplayspeed = get_sub_field('autoplayspeed');
                if(get_sub_field('dots')!=1) {
                    $dots = 'false';
                } else {
                    $dots = 'true';
                }
                if(get_sub_field('draggable')!=1) {
                    $draggable = 'false';
                } else {
                    $draggable = 'true';
                }
                if(get_sub_field('fade')!=1) {
                    $fade = 'false';
                } else {
                    $fade = 'true';
                }
                if(get_sub_field('infinite')!=1) {
                    $infinite = 'false';
                } else {
                    $infinite = 'true';
                }
                if(get_sub_field('pauseonhover')!=1) {
                    $pauseonhover = 'false';
                } else {
                    $pauseonhover = 'true';
                }
                $slidestoscroll = get_sub_field('slidestoscroll');
                $slidestoshow = get_sub_field('slidestoshow');
                $speed = get_sub_field('speed');
                if (have_rows('slides')) :
                    $block_content = '<div id="slick-container' . $block['id'] . '">';
                    while (have_rows('slides')) : the_row();
                        $slide_type = get_sub_field('type');
                        if ($slide_type == 'Image') {
                            $slide_image = get_sub_field('image');
                            $slide_image_link = get_sub_field('image_link');
                            $slide_image_link_description = get_sub_field('image_link_description');
                            $block_content .= '<div class="slider-slide"><div class="slide-wrapper"><div class="slide-content">';
                            if ($slide_image_link_description == '') $block_content .= '<a href="' . esc_url($slide_image_link) . '">';
                            $block_content .= '<img src="' . $slide_image['url'] . '" alt="' . $slide_image['alt'] . '" />';
                            if (get_sub_field('image_heading') != '') {
                                $block_content .= '<div class="slide-heading">' . get_sub_field('image_heading') . '</div>';
                            }
                            if (get_sub_field('image_description') != '') {
                                $block_content .= '<div class="slide-description">' . get_sub_field('image_description') . '</div>';
                            }
                            if ($slide_image_link_description == '') {
                                $block_content .= '</a>';
                            } else {
                                $block_content .= '<a href="' . esc_url($slide_image_link) . '">' . $slide_image_link_description . '</a>';
                            }
                            $block_content .= '</div></div></div>';
                        } else {
                            $block_content .= '<div class="slide"><div class="slide-wrapper"><div class="slide-content">' . get_sub_field('content') . '</div></div></div>';
                        }
                    endwhile;
                    $block_content .= '</div>';
                endif;
            }
        }
    endwhile;
    if ($block_content != '') {
        ?>
        <style type="text/css">



            <?php echo '#' . $id; ?>
            {
            /* Add styles that use ACF values here */
            }
        </style>

        <script>


            jQuery(document).ready(function ($) {
                $('#<?php echo "slick-container" . $block['id'];?>').slick({
                    adaptiveheight: <?php echo $adaptiveheight;?>,
                    arrows: <?php echo $arrows;?>,
                    autoplay: <?php echo $autoplay;?>,
                    autoplayspeed: <?php echo $autoplayspeed;?>,
                    dots: <?php echo $dots;?>,
                    draggable: <?php echo $draggable;?>,
                    fade: <?php echo $fade;?>,
                    infinite: <?php echo $infinite;?>,
                    pauseonhover: <?php echo $pauseonhover;?>,
                    slidestoscroll: <?php echo $slidestoscroll;?>,
                    slidestoshow: <?php echo $slidestoshow;?>,
                    <?php
                    if($slidestoshow>1) {
                        echo 'variableWidth:true,';
                    }
                    ?>
                    /*/!*speed: <?php echo $speed;?>*!/*/
                });

            });
        </script>


        <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($classes); ?>"<?php echo $slider_styles; ?>>
            <?php echo $block_content; ?>
        </div>
        <?php
    }
endif; ?>