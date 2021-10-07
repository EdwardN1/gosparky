<?php
function remove_max_srcset_image_width($max_width)
{
    return false;
}

add_filter('max_srcset_image_width', 'remove_max_srcset_image_width');
function wdo_disable_srcset($sources)
{
    return false;
}

add_filter('wp_calculate_image_srcset', 'wdo_disable_srcset');