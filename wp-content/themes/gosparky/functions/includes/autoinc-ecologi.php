<?php
function gosparky_get_ecologi_impact() {
    $JSON = wp_safe_remote_get('https://public.ecologi.com/users/gosparky/impact');
    if(! is_wp_error( $JSON )) {
        $response = json_decode($JSON,true);
        if(is_array($response)) {
            return $response;
        }
    }
    return false;
}