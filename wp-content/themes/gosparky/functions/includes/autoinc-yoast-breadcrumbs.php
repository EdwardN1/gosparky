<?php
// Hook to the filter
add_filter('wpseo_breadcrumb_links', 'gosparky_breadcrumbs');
// $links are the current breadcrumbs
function gosparky_breadcrumbs($links) {
    $retLinks = array();
    foreach ($links as $link) {
        $retLink = $link;
        $retLink['text'] = ltrim($retLink['text'],'*');
        $retLinks[] = $retLink;
    }
    return $retLinks;
}