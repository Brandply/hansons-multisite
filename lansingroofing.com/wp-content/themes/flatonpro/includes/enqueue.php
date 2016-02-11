<?php
/**
 * Enqueue scripts and styles.
 */
function webulous_scripts() {
	wp_enqueue_style( 'flaton-font-bitter', '//fonts.googleapis.com/css?family=Bitter:400,700');
	wp_enqueue_style( 'flaton-font-source-sans-pro', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,600');
	wp_enqueue_style( 'webulous-skeleton', WEBULOUS_PARENT_URL . '/css/skeleton.css' );
	wp_enqueue_style( 'webulous-elusive', WEBULOUS_PARENT_URL . '/css/elusive-webfont.css' );
	wp_enqueue_style( 'webulous-fontawesome', WEBULOUS_PARENT_URL . '/css/font-awesome.min.css' );
	wp_enqueue_style( 'webulous-eislide', WEBULOUS_PARENT_URL . '/css/eislide.css' );
	wp_enqueue_style( 'webulous-flexslider', WEBULOUS_PARENT_URL . '/css/flexslider.css' );
	wp_enqueue_style( 'webulous-slicknav', WEBULOUS_PARENT_URL . '/css/slicknav.css' );
	wp_enqueue_style( 'webulous-prettycss', WEBULOUS_PARENT_URL . '/css/prettyPhoto.css' );

	global $webulous_options;
	if( isset( $webulous_options['color'] ) ) {
		switch ($webulous_options['color']) {
			case '2':
				wp_enqueue_style( 'webulous-blue', WEBULOUS_PARENT_URL . '/css/blue.css' );
				break;
			case '3':
				wp_enqueue_style( 'webulous-green', WEBULOUS_PARENT_URL . '/css/green.css');
				break;
			case '4':
				wp_enqueue_style( 'webulous-purple', WEBULOUS_PARENT_URL . '/css/purple.css' );
				break;
			case '6':
				wp_enqueue_style( 'webulous-red', WEBULOUS_PARENT_URL . '/css/red.css' );
				break;
			case '7':
				wp_enqueue_style( 'webulous-yellow', WEBULOUS_PARENT_URL . '/css/yellow.css' );
				break;
			case '8':
				wp_enqueue_style( 'webulous-free-blue', WEBULOUS_PARENT_URL . '/css/free-blue.css' );
				break;
			case '9':
				wp_enqueue_style( 'webulous-free-green', WEBULOUS_PARENT_URL . '/css/free-green.css' );
				break;
			default:
				wp_enqueue_style( 'webulous-default', WEBULOUS_PARENT_URL . '/css/default.css' );
				break;
		}		
	} else {
		wp_enqueue_style( 'webulous-default', WEBULOUS_PARENT_URL . '/css/default.css' );
	}

	wp_enqueue_style( 'webulous-style', get_stylesheet_uri() );

	wp_enqueue_script( 'webulous-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'webulous-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_enqueue_script( 'webulous-flexsliderjs', WEBULOUS_PARENT_URL . '/js/jquery.flexslider-min.js', array('jquery'), '2.2.2', true );
	wp_enqueue_script( 'webulous-easing', WEBULOUS_PARENT_URL . '/js/jquery.easing.1.3.js', array('jquery'), '1.3', true );
	wp_enqueue_script( 'webulous-elasti', WEBULOUS_PARENT_URL . '/js/jquery.eislideshow.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'webulous-raphael', WEBULOUS_PARENT_URL . '/js/raphael.min.js', array('jquery'), '2.1.0', true );
	wp_enqueue_script( 'webulous-images-loaded', WEBULOUS_PARENT_URL . '/js/imagesloaded.pkgd.min.js', array('jquery'), '2.0.0', true );
	wp_enqueue_script( 'webulous-isotope', WEBULOUS_PARENT_URL . '/js/isotope.pkgd.min.js', array('jquery'), '2.0.0', true );
	wp_enqueue_script( 'webulous-slicknav', WEBULOUS_PARENT_URL . '/js/jquery.slicknav.min.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'webulous-prettyphoto', WEBULOUS_PARENT_URL . '/js/jquery.prettyPhoto.js', array('jquery'), '3.1.5', true );
	wp_enqueue_script( 'jquery-ui-accordion', false, array('jquery'));
	wp_enqueue_script( 'jquery-ui-tabs', false, array('jquery'));

	
	
	wp_enqueue_script( 'webulous-custom', WEBULOUS_PARENT_URL . '/js/custom.js', array('jquery'), '1.0', true );	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	global $webulous_options;
	if( isset($webulous_options['animate']) && $webulous_options['animate'] && is_front_page() ) {
		wp_enqueue_style( 'webulous-animate', WEBULOUS_PARENT_URL . '/css/animated.css' );
		wp_enqueue_style( 'webulous-animations', WEBULOUS_PARENT_URL . '/css/animations.css' );
		wp_enqueue_script( 'webulous-animatejs', WEBULOUS_PARENT_URL . '/js/animate.js', array('jquery'), '1.0', true );	
	}
}
add_action( 'wp_enqueue_scripts', 'webulous_scripts' );

function webulous_admin_scripts() {
	wp_enqueue_style( 'webulous-fontawesome', WEBULOUS_PARENT_URL . '/css/font-awesome.min.css' );
	wp_enqueue_style( 'webulous-select2css', WEBULOUS_PARENT_URL . '/css/select2.css' );
	wp_enqueue_script( 'webulous-select2', WEBULOUS_PARENT_URL . '/js/select2.min.js' );
	wp_enqueue_script( 'webulous-admincustom', WEBULOUS_PARENT_URL . '/js/admin-custom.js' );


} // end custom_register_admin_scripts
add_action( 'admin_enqueue_scripts', 'webulous_admin_scripts', 999 );