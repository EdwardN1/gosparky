<?php
add_filter( 'woocommerce_checkout_fields' , 'gosparky_change_order_notes_placeholder' );
function gosparky_change_order_notes_placeholder( $fields ) {
    $checkout_notes_label = get_field('checkout_notes_label','option');
    if($checkout_notes_label != '') {
        $fields['order']['order_comments']['placeholder'] = _x($checkout_notes_label, 'placeholder', 'woocommerce');
        $fields['order']['order_comments']['label'] = 'Order Notes: '.$checkout_notes_label;
    }
    return $fields;
}