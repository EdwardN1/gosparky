<?php
function gosparky_get_ecologi_impact() {
    $JSON = wp_safe_remote_get('https://public.ecologi.com/users/gosparky/impact');
    //error_log(print_r($JSON['body'],true));
    if(! is_wp_error( $JSON )) {
        $response = json_decode($JSON['body'],true);
        if(is_array($response)) {
            return $response;
        }
    }
    return false;
}