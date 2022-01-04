<?php
add_action('acf/save_post', 'gosparky_update_colours_css', 20);

function gosparky_update_colours_css()
{
    $screen = get_current_screen();
    if (strpos($screen->id, "acf-theme-settings") == true) {
        $filename = get_template_directory() . '/assets/styles/colours.css';
        error_log($filename);
        if (file_exists($filename)) :
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
                    $file_content=file_get_contents($filename);
                    $output_file_name = get_template_directory() . '/assets/styles/custom_colours.css';
                    $reg = '/^#[a-f0-9]{6}$/i';
                    if(preg_match($reg,$background)) $file_content = str_replace('#fefefe',$background,$file_content);
                    if(preg_match($reg,$border)) $file_content = str_replace('#0a0a0a',$border,$file_content);
                    if(preg_match($reg,$alert)) $file_content = str_replace('#ed1c24',$alert,$file_content);
                    if(preg_match($reg,$primary)) $file_content = str_replace('#293871',$primary,$file_content);
                    if(preg_match($reg,$primary_dark)) $file_content = str_replace('#0f102f',$primary_dark,$file_content);
                    if(preg_match($reg,$primary_medium)) $file_content = str_replace('#2f59a7',$primary_medium,$file_content);
                    if(preg_match($reg,$primary_light)) $file_content = str_replace('#4c82e2',$primary_light,$file_content);
                    if(preg_match($reg,$gray)) $file_content = str_replace('#999999',$gray,$file_content);
                    if(preg_match($reg,$dark_grey)) $file_content = str_replace('#707070',$dark_grey,$file_content);
                    if(preg_match($reg,$yellow)) $file_content = str_replace('#e3e4e5',$yellow,$file_content);
                    if(preg_match($reg,$light_grey)) $file_content = str_replace('#f6db35',$light_grey,$file_content);
                    if(preg_match($reg,$dark_yellow)) $file_content = str_replace('#FF9900',$dark_yellow,$file_content);
                    file_put_contents($output_file_name,$file_content);
                    error_log($file_content);
                endwhile;
            endif;
        endif;
    }
}