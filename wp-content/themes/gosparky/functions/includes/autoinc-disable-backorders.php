<?php
//add_filter( 'woocommerce_product_backorders_allowed', '__return_false');
add_filter( 'woocommerce_product_backorders_allowed', 'gosparky_backorders_allowed', 10, 3 );
function gosparky_backorders_allowed() {
    return false;
}