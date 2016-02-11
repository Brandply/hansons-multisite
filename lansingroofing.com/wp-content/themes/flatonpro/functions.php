<?php
/**
 * Webulous functions and definitions
 *
 * @package Webulous
 * @subpackage webulous
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 870; /* pixels */
}

if ( ! function_exists( 'webulous_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function webulous_setup() {

	// Makes theme translation ready
	load_theme_textdomain( 'flatonpro', WEBULOUS_LANGUAGES_DIR );
	
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 250, 200, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'flatonpro' ),
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'webulous_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for Semantic Markup
	$markup = array( 'search-form', 'comment-form', 'comment-list', );
	add_theme_support( 'html5', $markup );


}
endif; // webulous_setup
add_action( 'after_setup_theme', 'webulous_setup' );

/**
 * Defining constants to use through out theme code
 */
	require_once get_template_directory() . '/includes/constants.php';

/**
 * Enqueue Scripts and Styles
 */
	require_once WEBULOUS_INCLUDES_DIR . '/enqueue.php';

/**
 * Implement the Custom Header feature.
 */
require WEBULOUS_INCLUDES_DIR . '/custom-header.php';


// Enable support for Post Formats.
add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
	
/**
 * Custom functions for this theme.
 */
require WEBULOUS_INCLUDES_DIR . '/theme-functions.php';

/**
 * Custom template tags for this theme.
 */
require WEBULOUS_INCLUDES_DIR . '/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require WEBULOUS_INCLUDES_DIR . '/extras.php';

/**
 * Load Theme Options Page
 * This uses Redux Framework Plugin
 */
require_once( WEBULOUS_INCLUDES_DIR . '/load-plugins.php' );
if( class_exists('ReduxFrameworkPlugin')) {
	require_once( WEBULOUS_INCLUDES_DIR . '/theme-options-config.php' );
}

/**
 * Load Pro Theme Features
 */
require_once WEBULOUS_INCLUDES_DIR . '/pro.php';
require_once WEBULOUS_INCLUDES_DIR . '/update.php';

add_theme_support('woocommerce');

remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper');
add_action('woocommerce_before_main_content', 'webulous_output_content_wrapper');

function webulous_output_content_wrapper() {
	echo '<div class="container"><div class="row"><div id="primary" class="content-area sixteen columns">';
}

remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end' );
add_action( 'woocommerce_after_main_content', 'webulous_output_content_wrapper_end' );

function webulous_output_content_wrapper_end () {
	echo "</div>";
}

remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar');