<?php


add_action( 'init', function(){


	$labels = array(
		'name'                  => _x( 'modalers', 'Post Type General Name', 'modaler' ),
		'singular_name'         => _x( 'modaler', 'Post Type Singular Name', 'modaler' ),
		'menu_name'             => __( 'Modaler', 'modaler' ),
		'name_admin_bar'        => __( 'Modaler', 'modaler' ),
		'archives'              => __( 'Item Archives', 'modaler' ),
		'attributes'            => __( 'Item Attributes', 'modaler' ),
		'parent_item_colon'     => __( 'Parent Item:', 'modaler' ),
		'all_items'             => __( 'All Items', 'modaler' ),
		'add_new_item'          => __( 'Add New Item', 'modaler' ),
		'add_new'               => __( 'Add New', 'modaler' ),
		'new_item'              => __( 'New Item', 'modaler' ),
		'edit_item'             => __( 'Edit Item', 'modaler' ),
		'update_item'           => __( 'Update Item', 'modaler' ),
		'view_item'             => __( 'View Item', 'modaler' ),
		'view_items'            => __( 'View Items', 'modaler' ),
		'search_items'          => __( 'Search Item', 'modaler' ),
		'not_found'             => __( 'Not found', 'modaler' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'modaler' ),
		'featured_image'        => __( 'Featured Image', 'modaler' ),
		'set_featured_image'    => __( 'Set featured image', 'modaler' ),
		'remove_featured_image' => __( 'Remove featured image', 'modaler' ),
		'use_featured_image'    => __( 'Use as featured image', 'modaler' ),
		'insert_into_item'      => __( 'Insert into item', 'modaler' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'modaler' ),
		'items_list'            => __( 'Items list', 'modaler' ),
		'items_list_navigation' => __( 'Items list navigation', 'modaler' ),
		'filter_items_list'     => __( 'Filter items list', 'modaler' ),
	);
	$args = array(
		'label'                 => __( 'modaler', 'modaler' ),
		'description'           => __( 'modaler desc', 'modaler' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'revisions', 'custom-fields' ),
		'hierarchical'          => false,
		'public'                => false,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 80,
		'show_in_admin_bar'     => false,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'modaler', $args );


  $fields = array( 'image', 'position', 'facebook', 'github', 'xing', 'linkedin' );

foreach ( $fields as $field ) {

			register_post_meta(
				'modaler',
				$field,
				[
					'type'         => 'string',
					'single'       => true,
					'default'      => '',
					'show_in_rest' => true
				] );
}

} );

