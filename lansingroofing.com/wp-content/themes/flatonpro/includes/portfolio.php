<?php
	function portfolios() {

		register_post_type( 'portfolio', array(
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'portfolio' ),
			'has_archive' => true,
			'hierarchical' => true,
			'taxonomies' => array( 'category' ),
			
			'menu_position' => 23,
			'menu_icon' => 'dashicons-format-image',
			'supports' => array( 'title', 'editor', 'thumbnail' ),
			'labels' => array(
				'name' => __( 'Projects', 'flatonpro' ),
				'singular_name' => __( 'Project', 'flatonpro' ),
				'add_new' => __( 'Add New Project', 'flatonpro' ),
				'add_new_item' => __( 'Add New Project', 'flatonpro' ),
				'edit_item' => __( 'Edit Project', 'flatonpro' ),
				'new_item' => __( 'New Project', 'flatonpro' ),
				'all_items' => __( 'All Projects', 'flatonpro' ),
				'view_item' => __( 'View Project', 'flatonpro' ),
				'search_items' => __( 'Search Projects', 'flatonpro' ),
				'not_found' =>  __( 'No Projects Found', 'flatonpro' ),
				'not_found_in_trash' => __( 'No Projects Found in Trash', 'flatonpro' ),
				'parent_item_colon' => '',
				'menu_name' => 'Portfolios',
			)
		) );
	}
	add_action( 'init', 'portfolios' );

	$portfolio_taxonomy_labels = array(  
		'name' => _x( 'Skills', 'taxonomy general name', 'flatonpro' ),
		'singular_name' => _x( 'Skill', 'taxonomy singular name', 'flatonpro' ),
		'search_items' =>  __( 'Search Skills', 'flatonpro' ),
		'all_items' => __( 'All Skills', 'flatonpro' ),
		'parent_item' => __( 'Parent Skill', 'flatonpro' ),
		'parent_item_colon' => __( 'Parent Skill:', 'flatonpro' ),
		'edit_item' => __( 'Edit Skill', 'flatonpro' ), 
		'update_item' => __( 'Update Skill', 'flatonpro' ),
		'add_new_item' => __( 'Add New Skill', 'flatonpro' ),
		'new_item_name' => __( 'New Skill Name', 'flatonpro' ),
		'menu_name' => __( 'Skills', 'flatonpro' ),
	  );
	
	$portfolio_taxonomy_args = array(
		'public' => true, 
		'show_ui' => true,
		'hierarchical' => true,
		'labels' => $portfolio_taxonomy_labels,
		'query_var' => 'skills'
	);
	
	register_taxonomy( 'skills', array('portfolio'), $portfolio_taxonomy_args );

	// Change the columns for the edit portfolio screen
	function change_portfolio_columns( $cols ) {
		$cols = array(
			'cb' => '<input type="checkbox" />',
			'title' => __( 'Skill', 'flatonpro' ),
			'shortcode'     => __( 'Shortcode',  'flatonpro' ),
			'skills' => __( 'Skills', 'flatonpro' ),
			'date' => __( 'Date', 'flatonpro' )
		);
		return $cols;
	}

	add_filter( 'manage_edit-portfolio_columns', 'change_portfolio_columns' );

	function portfolio_custom_columns( $column, $post_id ) {
		global $post;
		
		switch ( $column) {

			case 'shortcode' :
				$term_list = wp_get_post_terms($post_id, 'skills', array("fields" => "ids"));
				echo "[portfolio id=" . $term_list[0] . "]";
				break;

			case 'skills' :
				$terms = get_the_terms( $post_id, 'skills' );

				/* If terms were found. */
				if ( !empty( $terms ) ) {

					$out = array();

					/* Loop through each term, linking to the 'edit posts' page for the specific term. */
					foreach ( $terms as $term ) {
						$out[] = sprintf( '<a href="%s">%s</a>',
							esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'skills' => $term->slug ), 'edit.php' ) ),
							esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'skills', 'display' ) )
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

	add_action( 'manage_portfolio_posts_custom_column', 'portfolio_custom_columns', 100, 2 );