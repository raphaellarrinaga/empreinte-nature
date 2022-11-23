<?php
/*
 * Plugin Name:       Nature plugins
 * Description:       Custom implementation for Empreinte Nature.
*/

// Add "Jadins" custom Post Type
// Set in french to avoid extra work since we don't translate the website
// @see https://www.digital.ink/blog/wordpress-custom-post-types/
add_action( 'init', 'nature_plugins_create_cpts' );
function nature_plugins_create_cpts() {
  register_post_type( 'jardins',
    array(
      'labels' => array(
        'name' => __( 'Jardins' ),
        'singular_name' => __( 'Jardins' ),
        'add_new_item' => __( 'Add New Jardins' )
      ),
      'public' => true,
      'has_archive' => true,
      'menu_icon' => 'dashicons-palmtree',
      'rewrite' => array('slug' => 'jardins'),
      'menu_position' => 20,
      'supports' => array( 'title', 'editor', 'author','thumbnail', 'excerpt' )
    )
  );
}
