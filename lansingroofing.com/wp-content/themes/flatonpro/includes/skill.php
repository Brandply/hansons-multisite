<?php
	function skills() {

		register_post_type( 'skill', array(
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'skill' ),
			'has_archive' => true,
			'hierarchical' => true,
			'taxonomies' => array( 'category' ),
			
			'menu_icon'           => 'dashicons-admin-tools',
			'supports' => array( 'title' ),
			'labels' => array(
				'name' => __( 'Skills', 'flatonpro' ),
				'singular_name' => __( 'Skill', 'flatonpro' ),
				'add_new' => __( 'Add New Skill', 'flatonpro' ),
				'add_new_item' => __( 'Add New Skill', 'flatonpro' ),
				'edit_item' => __( 'Edit Skill', 'flatonpro' ),
				'new_item' => __( 'New Skill', 'flatonpro' ),
				'all_items' => __( 'All Skills', 'flatonpro' ),
				'view_item' => __( 'View Skill', 'flatonpro' ),
				'search_items' => __( 'Search Skills', 'flatonpro' ),
				'not_found' =>  __( 'No Skills Found', 'flatonpro' ),
				'not_found_in_trash' => __( 'No Skills Found in Trash', 'flatonpro' ),
				'parent_item_colon' => '',
				'menu_name' => 'Skills',
			)
		) );
	}
	add_action( 'init', 'skills' );

	