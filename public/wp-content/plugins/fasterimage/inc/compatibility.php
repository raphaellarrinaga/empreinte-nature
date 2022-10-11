<?php

// Remove accents from images urls
add_filter('sanitize_file_name', 'remove_accents' );

// Add compatibility with Yoast WordPress SEO for Open Graph
add_filter('wpseo_opengraph_image', 'fasterimage_wpseo_opengraph_fix', 9999);
function fasterimage_wpseo_opengraph_fix($img) {
    $img = removeFasterImageDomain($img);

    return $img;
}