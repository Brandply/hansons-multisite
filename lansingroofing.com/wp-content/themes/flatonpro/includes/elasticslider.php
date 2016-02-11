<?php
	function elasticsliders() {

		register_post_type( 'elasticslider', array(
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'elasticslider' ),
			'has_archive' => true,
			'hierarchical' => true,
			'menu_position' => 334,
			'menu_icon' => 'dashicons-images-alt2',
			'supports' => array( 'title', 'thumbnail' ),
			'labels' => array(
				'name' => __( 'Elastic Sliders', 'flatonpro' ),
				'singular_name' => __( 'Elastic Slider', 'flatonpro' ),
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
				'menu_name' => 'Elastic Sliders',
			)
		) );
	}
	add_action( 'init', 'elasticsliders' );

	$elasticslider_taxonomy_labels = array(  
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
	
	$elasticslider_taxonomy_args = array(
		'public' => true, 
		'show_ui' => true,
		'hierarchical' => true,
		'labels' => $elasticslider_taxonomy_labels,
		'query_var' => 'elasticslider_group',
	);
	
	register_taxonomy( 'elasticslider_group', array('elasticslider'), $elasticslider_taxonomy_args );

	// Change the columns for the edit elasticslider screen
	function change_elasticslider_columns( $cols ) {
		$cols = array(
			'cb' => '<input type="checkbox" />',
			'title' => __( 'Slide', 'flatonpro' ),
			'shortcode'     => __( 'Shortcode',  'flatonpro' ),
			'elasticslider_group' => __( 'Slide Groups', 'flatonpro' ),
			'date' => __( 'Date', 'flatonpro' )
		);
		return $cols;
	}

	add_filter( "manage_edit-elasticslider_columns", "change_elasticslider_columns" );

	function elasticslider_custom_columns( $column, $post_id ) {
		global $post;
		
		switch ( $column) {

			case 'shortcode' :
				$term_list = wp_get_post_terms($post_id, 'elasticslider_group', array("fields" => "ids"));
				echo "[elasticslider id=" . $term_list[0] . "]";
				break;

			case 'elasticslider_group' :
				$terms = get_the_terms( $post_id, 'elasticslider_group' );

				/* If terms were found. */
				if ( !empty( $terms ) ) {

					$out = array();

					/* Loop through each term, linking to the 'edit posts' page for the specific term. */
					foreach ( $terms as $term ) {
						$out[] = sprintf( '<a href="%s">%s</a>',
							esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'elasticslider_group' => $term->slug ), 'edit.php' ) ),
							esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'elasticslider_group', 'display' ) )
						);
					}

					/* Join the terms, separating them with a comma. */
					echo join( ', ', $out );
				}

				/* If no terms were found, output a default message. */
				else {
					_e( 'No Groups' );
				}

				break;
		}
	}

	add_action( "manage_elasticslider_posts_custom_column", "elasticslider_custom_columns", 100, 2 );	