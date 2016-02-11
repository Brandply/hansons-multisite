<?php
	function flexsliders() {

		register_post_type( 'flexslider', array(
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'flexslider' ),
			'has_archive' => true,
			'hierarchical' => true,
			'menu_position' => 333,
			'menu_icon' => 'dashicons-images-alt',
			'supports' => array( 'title', 'editor', 'thumbnail' ),
			'labels' => array(
				'name' => __( 'Flex Sliders', 'flatonpro' ),
				'singular_name' => __( 'Flex Slider', 'flatonpro' ),
				'add_new' => __( 'Add New Slide', 'flatonpro' ),
				'add_new_item' => __( 'Add New Slide', 'flatonpro' ),
				'edit_item' => __( 'Edit Slide', 'flatonpro' ),
				'new_item' => __( 'New Slide', 'flatonpro' ),
				'all_items' => __( 'All Slides', 'flatonpro' ),
				'view_item' => __( 'View Slide', 'flatonpro' ),
				'search_items' => __( 'Search Slides', 'flatonpro' ),
				'not_found' =>  __( 'No Slides Found', 'flatonpro' ),
				'not_found_in_trash' => __( 'No Slides Found in Trash', 'flatonpro' ),
				'parent_item_colon' => '',
				'menu_name' => 'Flex Sliders',
			)
		) );
	}
	add_action( 'init', 'flexsliders' );

	$flexslider_taxonomy_labels = array(  
		'name' => _x( 'Slide Groups', 'taxonomy general name', 'flatonpro' ),
		'singular_name' => _x( 'Slide Group', 'taxonomy singular name', 'flatonpro' ),
		'search_items' =>  __( 'Search Slide Groups', 'flatonpro' ),
		'all_items' => __( 'All Slide Groups', 'flatonpro' ),
		'parent_item' => __( 'Parent Slide Group', 'flatonpro' ),
		'parent_item_colon' => __( 'Parent Slide Group:', 'flatonpro' ),
		'edit_item' => __( 'Edit Slide Group', 'flatonpro' ), 
		'update_item' => __( 'Update Slide Group', 'flatonpro' ),
		'add_new_item' => __( 'Add New Slide Group', 'flatonpro' ),
		'new_item_name' => __( 'New Slide Group Name', 'flatonpro' ),
		'menu_name' => __( 'Slide Groups', 'flatonpro' ),
	  );
	
	$flexslider_taxonomy_args = array(
		'public' => true, 
		'show_ui' => true,
		'hierarchical' => true,
		'labels' => $flexslider_taxonomy_labels,
		'query_var' => 'flexslider_group'
	);
	
	register_taxonomy( 'flexslider_group', array('flexslider'), $flexslider_taxonomy_args );

	// Change the columns for the edit Flexslider screen
	function change_flexslider_columns( $cols ) {
		$cols = array(
			'cb' => '<input type="checkbox" />',
			'title' => __( 'Slide', 'flatonpro' ),
			'shortcode'     => __( 'Shortcode',  'flatonpro' ),
			'flexslider_group' => __( 'Slide Groups', 'flatonpro' ),
			'date' => __( 'Date', 'flatonpro' )
		);
		return $cols;
	}

	add_filter( 'manage_edit-flexslider_columns', 'change_flexslider_columns' );

	function flexslider_custom_columns( $column, $post_id ) {
		global $post;
		
		switch ( $column) {

			case 'shortcode' :
				$term_list = wp_get_post_terms($post_id, 'flexslider_group', array("fields" => "ids"));
				echo "[flexslider id=" . $term_list[0] . "]";
				break;

			case 'flexslider_group' :
				$terms = get_the_terms( $post_id, 'flexslider_group' );

				/* If terms were found. */
				if ( !empty( $terms ) ) {

					$out = array();

					/* Loop through each term, linking to the 'edit posts' page for the specific term. */
					foreach ( $terms as $term ) {
						$out[] = sprintf( '<a href="%s">%s</a>',
							esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'flexslider_group' => $term->slug ), 'edit.php' ) ),
							esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'flexslider_group', 'display' ) )
						);
					}

					/* Join the terms, separating them with a comma. */
					echo join( ', ', $out );
				}

				/* If no terms were found, output a default message. */
				else {
					_e( 'No Groups', 'flatonpro' );
				}

				break;
		}
	}

	add_action( 'manage_flexslider_posts_custom_column', 'flexslider_custom_columns', 100, 2 );	