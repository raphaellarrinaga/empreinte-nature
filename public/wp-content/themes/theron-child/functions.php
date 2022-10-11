
<?php 
     function collection_post_type() {

	$labels = array(
		'name'                => _x( 'Collections', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Collections', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Collections', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Collections:', 'text_domain' ),
		'all_items'           => __( 'All Collections', 'text_domain' ),
		'view_item'           => __( 'View Collections', 'text_domain' ),
		'add_new_item'        => __( 'Add New Collections', 'text_domain' ),
		'add_new'             => __( 'New Collections', 'text_domain' ),
		'edit_item'           => __( 'Edit Collections', 'text_domain' ),
		'update_item'         => __( 'Update Collections', 'text_domain' ),
		'search_items'        => __( 'Search Collections', 'text_domain' ),
		'not_found'           => __( 'No Collections found', 'text_domain' ),
		'not_found_in_trash'  => __( 'No Collections found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'Collections', 'text_domain' ),
		'description'         => __( 'Collections information pages', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'custom-fields', ),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'collection', $args );

}

// Hook into the 'init' action
add_action( 'init', 'collection_post_type', 0 );

?>