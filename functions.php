<?php

function susy_wp_title( $title, $sep ) {
  if(is_feed()) {
    return $title;
  }
  global $page, $paged;
  $title .= get_bloginfo('name', 'display');
  $site_description = get_bloginfo('description', 'display');
  if($site_description && (is_home() || is_front_page())) {
    $title .= " $sep $site_description";
  }
  if(($paged >= 2 || $page >= 2) && ! is_404()) {
    $title .= " $sep " . sprintf(__( 'Page %s', '_s'), max($paged, $page));
  }
  return $title;
}
add_filter( 'wp_title', 'susy_wp_title', 10, 2 );
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');
