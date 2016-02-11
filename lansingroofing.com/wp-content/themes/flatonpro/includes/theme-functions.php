<?php
/**
 * Theme Functions
 *
 * Various functions to use through out site such as breadcrumb, pagination, etc
 *
 * @package Webulous
 *
 * @since 1.0
 *
 */

	// cleaning up excerpt
	add_filter('excerpt_more', 'webulous_excerpt_more');

	// This removes the annoying […] to a Read More link
	function webulous_excerpt_more($excerpt) {
		global $post;
		// edit here if you like
		return '<p class="readmore"><a href="'. get_permalink($post->ID) . '" title="Read '.get_the_title($post->ID).'">Read more &raquo;</a></p>';
	}

	function webulous_excerpt_length( $length ) {
		return 20;
	}
	add_filter( 'excerpt_length', 'webulous_excerpt_length', 999 );

	add_action( 'wp_head', 'webulous_custom_css' );

	function webulous_custom_css() {
		global $webulous_options;
		if( isset( $webulous_options['custom-css'] ) ) {
			$custom_css = '<style type="text/css">' . $webulous_options['custom-css'] . '</style>';
			echo $custom_css;
		}
	}

	add_action( 'wp_footer', 'webulous_custom_js', 99 );
	
	function webulous_custom_js() {
		global $webulous_options;
		if( isset( $webulous_options['custom-js'] ) ) {
			$custom_js = '<script type="text/javascript">' . "\n\r";
	 		$custom_js .= $webulous_options['custom-js'];
	 		$custom_js .=  "\n\r";
	 		$custom_js .= '</script>';
	 		echo $custom_js;
		}
	}