<?php
	
	require_once ( WEBULOUS_INCLUDES_DIR . '/free-to-pro.php' );
	require_once ( WEBULOUS_INCLUDES_DIR . '/pro-theme-functions.php' );

	require_once ( WEBULOUS_INCLUDES_DIR . '/icons.php' );

	// Unlimited Sidebar Generator
	require_once( WEBULOUS_INCLUDES_DIR . '/sidebar-generator.php' );
	require_once( WEBULOUS_INCLUDES_DIR . '/sidebars.php' );

	//Shortcodes and Generator
	require_once( WEBULOUS_INCLUDES_DIR . '/shortcode-generator.php' );
	require_once( WEBULOUS_INCLUDES_DIR . '/shortcodes.php' );
	
	
	require_once( WEBULOUS_INCLUDES_DIR . '/panels.php' );
	require_once( WEBULOUS_INCLUDES_DIR . '/widgets/all.php' );

	// Add Custom Meta Boxes
	require_once( WEBULOUS_INCLUDES_DIR . '/custom-meta-boxes/custom-meta-boxes.php' );

	//Flexslider
	require_once( WEBULOUS_INCLUDES_DIR . '/flexslider.php' );

	// Elastic Slider
	require_once( WEBULOUS_INCLUDES_DIR . '/elasticslider.php' );

	//Portfolio Content Type
	require_once( WEBULOUS_INCLUDES_DIR . '/portfolio.php' );

	//Testimonial Content Type
	require_once( WEBULOUS_INCLUDES_DIR . '/testimonial.php' );

	//Skills Content Type
	require_once( WEBULOUS_INCLUDES_DIR . '/skill.php' );

	//Add Post Views
	require_once( WEBULOUS_INCLUDES_DIR . '/post-views.php' );

	//Add Post Views
	require_once( WEBULOUS_INCLUDES_DIR . '/likes.php' );

	//Add Custom Settings for Flexslider, PrettyPhoto
	require_once( WEBULOUS_INCLUDES_DIR . '/custom.php' );

	//Add Customization Styles Typography, etc
	require_once( WEBULOUS_INCLUDES_DIR . '/customcss.php' );

	remove_action('widgets_init', 'origin_widgets_init');
	remove_action('widgets_init', 'siteorigin_panels_widgets_init');

	// unregister all default WP Widgets
	function webulous_unregister_default_wp_widgets() {
	    unregister_widget('WP_Widget_Links');
	    //unregister_widget('WP_Widget_Meta');
	    unregister_widget('WP_Widget_Recent_Posts');
	    unregister_widget('WP_Widget_Recent_Comments');
	    unregister_widget('WP_Widget_RSS');
	    /*
	    unregister_widget('WP_Widget_Pages');
	    unregister_widget('WP_Widget_Calendar');
	    unregister_widget('WP_Widget_Archives');
	    unregister_widget('WP_Widget_Search');
	    unregister_widget('WP_Widget_Text');
	    unregister_widget('WP_Widget_Categories');
	    unregister_widget('WP_Widget_Tag_Cloud');
	    */
	}
	add_action('widgets_init', 'webulous_unregister_default_wp_widgets', 1);