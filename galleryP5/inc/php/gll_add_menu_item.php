<?php
global $current_user;

add_filter( 'wp_nav_menu_items', 'add_gallery_link', 10, 2 );
function add_gallery_link( $items, $args ) {
    $items .= '<li class="menu-item"><a class="menu-link" href="'.get_site_url().'/gallery">Gallery</a></li>';
    return $items;
}
?>