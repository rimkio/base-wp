<?php

/**
 * Use this file to register any custom post types you wish to create.
 */
if ( ! function_exists( 'flip_base_create_custom_post_type' ) ) {
	// Register Custom Post Type
	function flip_base_create_custom_post_type() {
		register_post_type( 'services', array(
			'label'               => __( 'Services', 'flip_base' ),
			'description'         => __( 'Services', 'flip_base' ),
			//'labels'                => $labels,
			'supports'            => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'excerpt' ),
			'taxonomies'          => array( '' ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => false,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
			'show_in_rest'        => true,
		) );
	}

	add_action( 'init', 'flip_base_create_custom_post_type', 0 ); // Register Custom Taxonomy
}

if ( ! function_exists( 'flip_base_create_custom_taxonomy' ) ) {
	function flip_base_create_custom_taxonomy() {
	}

	add_action( 'init', 'flip_base_create_custom_taxonomy', 0 );
}
