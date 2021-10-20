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

// Add custom checkout field: woocommerce_review_order_before_submit
add_action( 'woocommerce_after_order_notes', 'gosparky_installation_checkout_field' );
function gosparky_installation_checkout_field() {
    echo '<div id="gosparky_installation_checkout_field" style="border: 1px solid #d0d0d0; padding: 1em; background-color: #eaeaea;">';

    woocommerce_form_field( 'gosparky_installation_checkout_field', array(
        'type'      => 'checkbox',
        'class'     => array('input-checkbox'),
        'label'     => __('Would you like us to Install your Product?'),
    ),  WC()->checkout->get_value( 'gosparky_installation_checkout_field' ) );
    echo '<p>Simply tick to say you would like our installation service and we will pass this onto our provisioning team who will be in contact</p>';
    echo '</div>';
}

// Save the custom checkout field in the order meta, when checkbox has been checked
add_action( 'woocommerce_checkout_update_order_meta', 'gosparky_installation_checkout_field_update_order_meta', 10, 1 );
function gosparky_installation_checkout_field_update_order_meta( $order_id ) {

    if ( ! empty( $_POST['gosparky_installation_checkout_field'] ) )
        update_post_meta( $order_id, 'gosparky_installation_checkout_field', $_POST['gosparky_installation_checkout_field'] );
}

// Display the custom field result on the order edit page (backend) when checkbox has been checked
add_action( 'woocommerce_admin_order_data_after_billing_address', 'display_gosparky_installation_field_on_order_edit_pages', 10, 1 );
function display_gosparky_installation_field_on_order_edit_pages( $order ){
    $my_field_name = get_post_meta( $order->get_id(), 'gosparky_installation_checkout_field', true );
    if( $my_field_name == 1 )
        echo '<p><strong>Installation: </strong> <span style="color:red;">Is requested</span></p>';
}