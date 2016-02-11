<?php

	require_once( WEBULOUS_INCLUDES_DIR . '/widgets/alert.php' );
	require_once( WEBULOUS_INCLUDES_DIR . '/widgets/button.php' );
	require_once( WEBULOUS_INCLUDES_DIR . '/widgets/cta.php' );
	require_once( WEBULOUS_INCLUDES_DIR . '/widgets/divider.php' );
	require_once( WEBULOUS_INCLUDES_DIR . '/widgets/dropcap.php' );
	require_once( WEBULOUS_INCLUDES_DIR . '/widgets/gap.php' );
	require_once( WEBULOUS_INCLUDES_DIR . '/widgets/googlefont.php' );
	require_once( WEBULOUS_INCLUDES_DIR . '/widgets/heading.php' );
	require_once( WEBULOUS_INCLUDES_DIR . '/widgets/icon-box.php' );
	require_once( WEBULOUS_INCLUDES_DIR . '/widgets/flexslider.php' );
	require_once( WEBULOUS_INCLUDES_DIR . '/widgets/testimonial.php' );
	require_once( WEBULOUS_INCLUDES_DIR . '/widgets/recent-work.php' );
	require_once( WEBULOUS_INCLUDES_DIR . '/widgets/recent-posts.php' );
	require_once( WEBULOUS_INCLUDES_DIR . '/widgets/skill.php' );
	require_once( WEBULOUS_INCLUDES_DIR . '/widgets/social-networks.php' );
	require_once( WEBULOUS_INCLUDES_DIR . '/widgets/soundcloud.php' );
	require_once( WEBULOUS_INCLUDES_DIR . '/widgets/list.php' );
	require_once( WEBULOUS_INCLUDES_DIR . '/widgets/image.php' );
	require_once( WEBULOUS_INCLUDES_DIR . '/widgets/image-box.php' );
	require_once( WEBULOUS_INCLUDES_DIR . '/widgets/ourteam.php' );
	require_once( WEBULOUS_INCLUDES_DIR . '/widgets/quote.php' );
	require_once( WEBULOUS_INCLUDES_DIR . '/widgets/video.php' );

	function webulous_register_widgets(){
		register_widget('Webulous_Alert_Widget');
		register_widget('Webulous_Button_Widget');
		register_widget('Webulous_CircleIcon_Widget');
		register_widget('Webulous_Cta_Widget');
		register_widget('Webulous_Divider_Widget');
		register_widget('Webulous_Dropcap_Widget');
		register_widget('Webulous_Gap_Widget');
		register_widget('Webulous_Googlefont_Widget');
		register_widget('Webulous_Heading_Widget');
		register_widget('Webulous_FlexSlider_Widget');
		register_widget('Webulous_Ourteam_Widget');
		register_widget('Webulous_Testimonial_Widget');	
		register_widget('Webulous_Recent_Work_Widget');	
		register_widget('Webulous_Recent_Posts_Widget');
		register_widget('Webulous_Skill_Widget');
		register_widget('Webulous_Social_Networks_Widget');
		register_widget('Webulous_SoundCloud_Widget');
		register_widget('Webulous_List_Widget');	
		register_widget('Webulous_Image_Widget');
		register_widget('Webulous_Image_Box_Widget');
		register_widget('Webulous_Quote_Widget');
		register_widget('Webulous_Video_Widget');
	}

	add_action( 'widgets_init', 'webulous_register_widgets');