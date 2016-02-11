<?php
	/* Defining directory PATH Constants */
	define( 'WEBULOUS_PARENT_DIR', get_template_directory() );
	define( 'WEBULOUS_CHILD_DIR', get_stylesheet_directory() );
	define( 'WEBULOUS_INCLUDES_DIR', WEBULOUS_PARENT_DIR. '/includes' );

	/** Defining URL Constants */
	define( 'WEBULOUS_PARENT_URL', get_template_directory_uri() );
	define( 'WEBULOUS_CHILD_URL', get_stylesheet_directory_uri() );
	define( 'WEBULOUS_INCLUDES_URL', WEBULOUS_PARENT_URL . '/includes' );
	define('FS_METHOD', 'direct'); 

	/* 
	Check for language directory setup in Child Theme
	If not present, use parent theme's languages dir
	*/
	if ( ! defined( 'WEBULOUS_LANGUAGES_URL' ) ) /** So we can predefine to child theme */
		define( 'WEBULOUS_LANGUAGES_URL', WEBULOUS_PARENT_URL . '/languages' );

	if ( ! defined( 'WEBULOUS_LANGUAGES_DIR' ) ) /** So we can predefine to child theme */
		define( 'WEBULOUS_LANGUAGES_DIR', WEBULOUS_PARENT_DIR . '/languages' );