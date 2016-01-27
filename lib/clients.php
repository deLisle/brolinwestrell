<?php

// Register Custom Post Type
function clients_post_type() {

	$labels = array(
		'name'                => _x( 'Clients', 'Post Type General Name', 'sage' ),
		'singular_name'       => _x( 'Client', 'Post Type Singular Name', 'sage' ),
		'menu_name'           => __( 'Clients', 'sage' ),
		'name_admin_bar'      => __( 'Clients', 'sage' ),
		'parent_item_colon'   => __( 'Parent Client:', 'sage' ),
		'all_items'           => __( 'All Clients', 'sage' ),
		'add_new_item'        => __( 'Add New Client', 'sage' ),
		'add_new'             => __( 'Add New', 'sage' ),
		'new_item'            => __( 'New Client', 'sage' ),
		'edit_item'           => __( 'Edit Client', 'sage' ),
		'update_item'         => __( 'Update Client', 'sage' ),
		'view_item'           => __( 'View Client', 'sage' ),
		'search_items'        => __( 'Search Client', 'sage' ),
		'not_found'           => __( 'Client not found', 'sage' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'sage' ),
	);
	$args = array(
		'label'               => __( 'clients', 'sage' ),
		'description'         => __( 'Clients', 'sage' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail', 'editor' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 3,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => false,
		'can_export'          => true,
		'has_archive'         => false,		
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => array( 'slug' => 'kunder','with_front'=>false ),
		'capability_type'     => 'page',
	);
	register_post_type( 'client', $args );

	if (class_exists('MultiPostThumbnails')) {
		new MultiPostThumbnails(
			array(
				'label' => 'Logo',
				'id' => 'logo',
				'post_type' => 'client'
			)
		);
	}

}
add_action( 'init', 'clients_post_type', 0 );