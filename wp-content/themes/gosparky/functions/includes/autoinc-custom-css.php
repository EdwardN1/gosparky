<?php
add_action('acf/save_post', 'gosparky_update_custom_css', 30);

function gosparky_update_custom_css()
{
    $screen = get_current_screen();
    if (strpos($screen->id, "acf-theme-settings") == true) {
        $filename = get_template_directory() . '/assets/styles/custom-css.css';
        if (!file_exists($filename)) :
            touch($filename);
        endif;
        if (file_exists($filename)) :
            $custom_css = get_field('custom_css', 'option');
            if ($custom_css) {
                file_put_contents($filename, $custom_css);
            } else {
                file_put_contents($filename, '');
            }
        endif;
    }
}