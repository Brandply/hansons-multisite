<?php
	function testimonials() {

		register_post_type( 'testimonial', array(
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'testimonial' ),
			'has_archive' => true,
			'hierarchical' => true,
			//'taxonomies' => array( 'category' ),
			
			'menu_position' => 23,
			'menu_icon'           => 'dashicons-businessman',
			'supports' => array( 'title', 'thumbnail' ),
			'labels' => array(
				'name' => __( 'Testimonials', 'flatonpro' ),
				'singular_name' => __( 'Testimonial', 'flatonpro' ),
				'add_new' => __( 'Add New Testimonial', 'flatonpro' ),
				'add_new_item' => __( 'Add New Testimonial', 'flatonpro' ),
				'edit_item' => __( 'Edit Testimonial', 'flatonpro' ),
				'new_item' => __( 'New Testimonial', 'flatonpro' ),
				'all_items' => __( 'All Testimonials', 'flatonpro' ),
				'view_item' => __( 'View Testimonial', 'flatonpro' ),
				'search_items' => __( 'Search Testimonials', 'flatonpro' ),
				'not_found' =>  __( 'No Testimonials Found', 'flatonpro' ),
				'not_found_in_trash' => __( 'No Testimonials Found in Trash', 'flatonpro' ),
				'parent_item_colon' => '',
				'menu_name' => 'Testimonials',
			)
		) );
	}
	add_action( 'init', 'testimonials' );

	