<?php
add_filter('get_product_search_form', 'woo_custom_product_searchform');
function woo_custom_product_searchform($form)
{

    $form = '<form role="search" method="get" id="searchform" action="' . esc_url(home_url('/')) . '">
 <div class="search-wrapper">
 <label class="screen-reader-text" for="s">' . __('What are you looking for...', 'woocommerce') . '</label>
 <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="' . __('What are you looking for...', 'woocommerce') . '" /><input type="submit" id="searchsubmit" value="' . esc_attr__('Search', 'woocommerce') . '" />
 <input type="hidden" name="post_type" value="product" />
 </div>
 </form>';

    return $form;

}