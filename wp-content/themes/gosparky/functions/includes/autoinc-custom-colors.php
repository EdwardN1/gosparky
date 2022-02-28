<?php
add_action('acf/save_post', 'gosparky_update_colours_css', 20);

function gosparky_update_colours_css()
{
    $screen = get_current_screen();
    if (strpos($screen->id, "acf-theme-settings") == true) {
        $filename = get_template_directory() . '/assets/styles/colours.css';
        //error_log($filename);
        if (file_exists($filename)) :
            $file_content = file_get_contents($filename);
            $output_file_name = get_template_directory() . '/assets/styles/custom_colours.css';
            if (have_rows('theme_colours', 'option')) :
                while (have_rows('theme_colours', 'option')) : the_row();
                    $background = get_sub_field('background');
                    $border = get_sub_field('border');
                    $alert = get_sub_field('alert');
                    $primary = get_sub_field('primary');
                    $primary_dark = get_sub_field('primary_dark');
                    $primary_medium = get_sub_field('primary_medium');
                    $primary_light = get_sub_field('primary_light');
                    $gray = get_sub_field('gray');
                    $dark_grey = get_sub_field('dark_grey');
                    $light_grey = get_sub_field('light_grey');
                    $yellow = get_sub_field('yellow');
                    $dark_yellow = get_sub_field('dark_yellow');
                    $reg = '/^#[a-f0-9]{6}$/i';
                    if (preg_match($reg, $background)) $file_content = str_replace('#fefefe', $background, $file_content);
                    if (preg_match($reg, $border)) $file_content = str_replace('#0a0a0a', $border, $file_content);
                    if (preg_match($reg, $alert)) $file_content = str_replace('#ed1c24', $alert, $file_content);
                    if (preg_match($reg, $primary)) $file_content = str_replace('#293871', $primary, $file_content);
                    if (preg_match($reg, $primary_dark)) $file_content = str_replace('#0f102f', $primary_dark, $file_content);
                    if (preg_match($reg, $primary_medium)) $file_content = str_replace('#2f59a7', $primary_medium, $file_content);
                    if (preg_match($reg, $primary_light)) $file_content = str_replace('#4c82e2', $primary_light, $file_content);
                    if (preg_match($reg, $gray)) $file_content = str_replace('#999999', $gray, $file_content);
                    if (preg_match($reg, $dark_grey)) $file_content = str_replace('#707070', $dark_grey, $file_content);
                    if (preg_match($reg, $yellow)) $file_content = str_replace('#e3e4e5', $yellow, $file_content);
                    if (preg_match($reg, $light_grey)) $file_content = str_replace('#f6db35', $light_grey, $file_content);
                    if (preg_match($reg, $dark_yellow)) $file_content = str_replace('#FF9900', $dark_yellow, $file_content);
                    if ($primary) {
                        $account_icon_pn = get_template_directory() . '/assets/images/svg/account-icon.svg';
                        file_put_contents($account_icon_pn, account_svg($primary));
                        $trolley_icon_pn = get_template_directory() . '/assets/images/svg/trolley-icon.svg';
                        file_put_contents($trolley_icon_pn, account_svg($primary));
                    }
                endwhile;
            endif;
            if (have_rows('font_colours', 'option')) :
                while (have_rows('font_colours', 'option')) : the_row();
                    $a_colour = get_sub_field('links');
                    $a_hover_color = get_sub_field('link_hover');
                    $highlighted_text = get_sub_field('highlighted_text');
                    if ($a_colour) {
                        $file_content .= 'a{color:' . $a_colour . '}';
                    }
                    if ($a_hover_color) {
                        $file_content .= 'a:hover{color:' . $a_hover_color . '}';
                    }
                    if ($highlighted_text) {
                        $file_content .= '.woocommerce.single-product .product .product_title{color:' . $highlighted_text . '}';
                        $file_content .= '.woocommerce.single-product .price .display-price{color:' . $highlighted_text . '}';
                        $file_content .= '.woocommerce.single-product .price .only{color:' . $highlighted_text . '}';
                        $file_content .= '.gosparky-archive>.products .price, .related.products>.products .price{color:' . $highlighted_text . '}';
                        $file_content .= '.woocommerce.single-product .price .vat{color:' . $highlighted_text . '}';
                    }

                endwhile;
            endif;
            file_put_contents($output_file_name, $file_content);
            //error_log($file_content);
        endif;
    }
}

function account_svg($colour)
{
    $svg = '<?xml version="1.0" encoding="utf-8"?>
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 26.28 24.39">
    <defs>
        <style>.cls-1{fill:none;}.cls-2{clip-path:url(#clip-path);}.cls-3{fill:' . $colour . ';}</style>
        <clipPath id="clip-path" transform="translate(-946.52 -527.72)">
            <rect class="cls-1" x="946.52" y="527.72" width="26.28" height="24.39"/>
        </clipPath>
    </defs>
    <g id="Layer_1" data-name="Layer 1">
        <g class="cls-2">
            <path class="cls-3" d="M954.09,535v0c0,4,2.51,7.22,5.61,7.22s5.6-3.23,5.6-7.22v0Z"
                  transform="translate(-946.52 -527.72)"/>
            <path class="cls-3"
                  d="M954.09,535H965.3v0c0-4-2.51-7.22-5.61-7.22s-5.6,3.23-5.6,7.22Zm18.71,17.14s0-9.89-5.94-9.89h-3.94l-3.26,6.6-3.25-6.6h-3.94c-6,0-6,9.89-6,9.89Z"
                  transform="translate(-946.52 -527.72)"/>
        </g>
    </g>
    <g id="Layer_2" data-name="Layer 2">
        <rect class="cls-3" x="7.74" y="7.28" width="10.99" height="0.67"/>
    </g>
</svg>';
    return $svg;
}

function trolley_svg($colour) {
    $svg = '<?xml version="1.0" encoding="utf-8"?>
<svg id="Layer_2" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
     viewBox="0 0 26 23.09">
    <defs>
        <style>.cls-1{fill:none;}.cls-2{clip-path:url(#clip-path);}.cls-3{fill:'.$colour.';}</style>
        <clipPath id="clip-path" transform="translate(-948.43 -538.37)">
            <rect class="cls-1" x="948.43" y="538.37" width="26" height="23.09"/>
        </clipPath>
    </defs>
    <g class="cls-2">
        <path class="cls-3"
              d="M954.64,541.78l-.89-3.41h-4.24a1,1,0,0,0-.11,2.06h2.8l.34,1.35h0l2.74,10.7,1.15,5.12,14.72,0V555.5H958.06l-.52-2.26h14l2.94-11.47Z"
              transform="translate(-948.43 -538.37)"/>
        <path class="cls-3" d="M958,557.94a1.76,1.76,0,1,1-1.77,1.76,1.76,1.76,0,0,1,1.77-1.76"
              transform="translate(-948.43 -538.37)"/>
        <path class="cls-3" d="M969.59,557.94a1.76,1.76,0,1,1-1.76,1.76,1.76,1.76,0,0,1,1.76-1.76"
              transform="translate(-948.43 -538.37)"/>
    </g>
</svg>';
    return $svg;
}