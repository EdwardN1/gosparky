<?php
/**
 * Return a list of Product Categories
 */

function get_product_categories($id = '')
{
    if ($id == 'short-product-category-menu') {
        $res = '<ul id="' . $id . '" class="medium-horizontal menu dropdown" data-responsive-menu="accordion medium-dropdown" role="menubar">';
    } else {
        if($id=='off-canvas') {
            $res = '<ul class="vertical menu accordion-menu" data-accordion-menu data-submenu-toggle="true" role="menubar" style="width: 100%">';
        } else {
            $res = '<ul class="medium-horizontal menu dropdown" data-responsive-menu="accordion medium-dropdown" role="menubar">';
        }

    }

    $taxonomy = 'product_cat';
    $orderby = 'name';
    $show_count = 0;      // 1 for yes, 0 for no
    $pad_counts = 0;      // 1 for yes, 0 for no
    $hierarchical = 1;      // 1 for yes, 0 for no
    $title = '';
    $empty = 0;

    $args = array(
        'taxonomy' => $taxonomy,
        'orderby' => $orderby,
        'show_count' => $show_count,
        'pad_counts' => $pad_counts,
        'hierarchical' => $hierarchical,
        'title_li' => $title,
        'hide_empty' => $empty
    );
    $all_categories = get_categories($args);
    $current_category = get_queried_object();
    $current_cat_id = $current_category->term_id;
    //error_log('current category id = '.$current_cat_id);
    foreach ($all_categories as $cat) {
        if (($cat->category_parent == 0) && ($cat->count > 0)) {
            $category_id = $cat->term_id;
            $top_active_class = '';
            if($current_cat_id==$category_id) {
                $top_active_class=' active';
            }

            $args2 = array(
                'taxonomy' => $taxonomy,
                'child_of' => 0,
                'parent' => $category_id,
                'orderby' => $orderby,
                'show_count' => $show_count,
                'pad_counts' => $pad_counts,
                'hierarchical' => $hierarchical,
                'title_li' => $title,
                'hide_empty' => $empty
            );
            $sub_cats = get_categories($args2);

            if ($sub_cats) {
                $text = $cat->name;
                if (str_word_count($text) > 2) {
                    $splitstring1 = substr($text, 0, floor(strlen($text) / 2));
                    $splitstring2 = substr($text, floor(strlen($text) / 2));

                    if (substr($splitstring1, 0, -1) != ' ' and substr($splitstring2, 0, 1) != ' ') {
                        $middle = strlen($splitstring1) + strpos($splitstring2, ' ') + 1;
                    } else {
                        $middle = strrpos(substr($text, 0, floor(strlen($text) / 2)), ' ') + 1;
                    }

                    $string1 = substr($text, 0, $middle);
                    $string2 = substr($text, $middle);
                    $linkDesc = $string1 . '<br>' . $string2;
                } else {
                    $linkDesc = str_replace(' ', '<br>', $text);
                }
                $res .= '<li class="menu-item'.$top_active_class.'"><a href="' . get_term_link($cat->slug, 'product_cat') . '">' . $linkDesc . '</a>';
                $top_active_class = '';

            }
            if ($sub_cats) {
                $res .= '<ul class="menu submenu is-dropdown-menu vertical">';
                foreach ($sub_cats as $sub_category) {
                    $sub_category_id = $sub_category->term_id;
                    if($sub_category_id==$current_cat_id) {
                        $top_active_class=' active';
                    }
                    $res .= '<li class="menu-item menu-item-type-taxonomy'.$top_active_class.'">' . '<a href="' . get_term_link($sub_category->slug, 'product_cat') . '">' . $sub_category->name . '</a></li>';
                    $top_active_class='';
                }
                $res .= '</ul>';
            }
            $res .= '</li>';
        }
    }

    $res .= '</ul>';

    return $res;
}