<?php

// Register Custom Post Type
function employee_portfolios_post_type() {

	$labels = array(
		'name'                => _x( 'Employee Portfolios', 'Post Type General Name', 'sage' ),
		'singular_name'       => _x( 'Employee Portfolio', 'Post Type Singular Name', 'sage' ),
		'menu_name'           => __( 'Employee Portfolios', 'sage' ),
		'name_admin_bar'      => __( 'Employee Portfolios', 'sage' ),
		'parent_item_colon'   => __( 'Parent Employee Portfolio:', 'sage' ),
		'all_items'           => __( 'All Employee Portfolios', 'sage' ),
		'add_new_item'        => __( 'Add New Employee Portfolio', 'sage' ),
		'add_new'             => __( 'Add New', 'sage' ),
		'new_item'            => __( 'New Employee Portfolio', 'sage' ),
		'edit_item'           => __( 'Edit Employee Portfolio', 'sage' ),
		'update_item'         => __( 'Update Employee Portfolio', 'sage' ),
		'view_item'           => __( 'View Employee Portfolio', 'sage' ),
		'search_items'        => __( 'Search Employee Portfolio', 'sage' ),
		'not_found'           => __( 'Employee Portfolio not found', 'sage' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'sage' ),
	);
	$args = array(
		'label'               => __( 'Employee Portfolios', 'sage' ),
		'description'         => __( 'Employee Portfolios', 'sage' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail', 'editor', 'custom-fields' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => false,
		'can_export'          => true,
		'has_archive'         => false,		
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => false,
		'capability_type'     => 'page',
	);
	register_post_type( 'employee_portfolios', $args );

}
add_action( 'init', 'employee_portfolios_post_type', 0 );