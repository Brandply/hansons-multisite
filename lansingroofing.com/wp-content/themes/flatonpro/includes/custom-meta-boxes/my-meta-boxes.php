<?php
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */

function cmb_sample_metaboxes( array $meta_boxes ) {

	// Example of all available fields
	/*
	$fields = array(
		
		array( 'id' => 'field-1',  'name' => 'Text input field', 'type' => 'text' ),
		array( 'id' => 'field-2', 'name' => 'Read-only text input field', 'type' => 'text', 'readonly' => true, 'default' => 'READ ONLY' ),
 		array( 'id' => 'field-3', 'name' => 'Repeatable text input field', 'type' => 'text', 'repeatable' => true, 'repeatable_min' => 5, 'repeatable_max' => 5 ),

		array( 'id' => 'field-4',  'name' => 'Small text input field', 'type' => 'text_small' ),
		array( 'id' => 'field-5',  'name' => 'URL field', 'type' => 'url' ),
		
		array( 'id' => 'field-6',  'name' => 'Radio input field', 'type' => 'radio', 'options' => array( 'Option 1', 'Option 2' ) ),
		array( 'id' => 'field-7',  'name' => 'Checkbox field', 'type' => 'checkbox' ),
		
		array( 'id' => 'field-8',  'name' => 'WYSIWYG field', 'type' => 'wysiwyg', 'options' => array( 'editor_height' => '100' ) ),

		array( 'id' => 'field-9',  'name' => 'Textarea field', 'type' => 'textarea' ),
		array( 'id' => 'field-10',  'name' => 'Code textarea field', 'type' => 'textarea_code' ),

		array( 'id' => 'field-11', 'name' => 'File field', 'type' => 'file', 'file_type' => 'image', 'repeatable' => 1, 'sortable' => 1 ),
		array( 'id' => 'field-12', 'name' => 'Image upload field', 'type' => 'image', 'repeatable' => false ),
		
		array( 'id' => 'field-13', 'name' => 'Select field', 'type' => 'select', 'options' => array( 'option-1' => 'Option 1', 'option-2' => 'Option 2', 'option-3' => 'Option 3' ), 'allow_none' => true ),
		array( 'id' => 'field-14', 'name' => 'Select field', 'type' => 'select', 'options' => array( 'option-1' => 'Option 1', 'option-2' => 'Option 2', 'option-3' => 'Option 3' ), 'multiple' => true ),
		array( 'id' => 'field-15', 'name' => 'Select taxonomy field', 'type' => 'taxonomy_select',  'taxonomy' => 'category' ),
		array( 'id' => 'field-16', 'name' => 'Post select field', 'type' => 'post_select', 'use_ajax' => false, 'query' => array( 'showposts' => -1 ) ),
		array( 'id' => 'field-17', 'name' => 'Post select field (AJAX)', 'type' => 'post_select', 'use_ajax' => true, 'query' => array( 'showposts' => -1 ) ),
		
		array( 'id' => 'field-18', 'name' => 'Date input field', 'type' => 'date' ),
		array( 'id' => 'field-19', 'name' => 'Time input field', 'type' => 'time' ),
		array( 'id' => 'field-20', 'name' => 'Date (unix) input field', 'type' => 'date_unix' ),
		array( 'id' => 'field-21', 'name' => 'Date & Time (unix) input field', 'type' => 'datetime_unix' ),
		
		array( 'id' => 'field-22', 'name' => 'Color', 'type' => 'colorpicker' ),
		array( 'id' => 'field-23', 'name' => 'Oembed field', 'type' => 'oembed' ),

		array( 'id' => 'field-24', 'name' => 'Title Field', 'type' => 'title' ),
	);

	$meta_boxes[] = array(
		'title' => 'CMB Test - all fields',
		'pages' => 'post',
		'fields' => $fields
	);

	// Examples of Groups and Columns

	$groups_and_cols = array(
		array( 'id' => 'gac-1',  'name' => 'Text input field', 'type' => 'text', 'cols' => 3 ),
		array( 'id' => 'gac-2',  'name' => 'Text input field', 'type' => 'text', 'cols' => 3 ),
		array( 'id' => 'gac-3',  'name' => 'Text input field', 'type' => 'text', 'cols' => 3 ),
		array( 'id' => 'gac-31',  'name' => 'Text input field', 'type' => 'text', 'cols' => 3 ),
		array( 'id' => 'gac-4', 'name' => 'Group (4 columns)', 'type' => 'group', 'cols' => 4, 'fields' => array(
			array( 'id' => 'gac-4-f-1',  'name' => 'Textarea field', 'type' => 'textarea' )
		) ),
		array( 'id' => 'gac-5', 'name' => 'Group (8 columns)', 'type' => 'group', 'cols' => 8, 'fields' => array(
			array( 'id' => 'gac-4-f-1',  'name' => 'Text input field', 'type' => 'text' ),
			array( 'id' => 'gac-4-f-2',  'name' => 'Text input field', 'type' => 'text' ),
		) ),
	);

	$meta_boxes[] = array(
		'title' => 'Groups and Columns',
		'pages' => 'post',
		'fields' => $groups_and_cols
	);

	// Example of repeatable group. Using all fields.
	// For this example, copy fields from $fields, update I
	$group_fields = $fields;
	foreach ( $group_fields as &$field ) {
		$field['id'] = str_replace( 'field', 'gfield', $field['id'] );
	}
	

	$meta_boxes[] = array(
		'title' => 'CMB Test - group (all fields)',
		'pages' => 'post',
		'fields' => array(
			array( 
				'id' => 'gp', 
				'name' => 'Repeatable Group', 
				'type' => 'group', 
				'repeatable' => true,
				'sortable' => true,
				'fields' => $group_fields
			)
		)
	);
	
	*/

	$fields = array(
		array( 'id' => 'catpion',  'name' => 'Caption Text', 'type' => 'text' ),
		array( 'id' => 'data-transition', 'name' => 'Select Transition', 'type' => 'select', 
			'options' => array( "fade" => "Fade",
								"wipeLeft" => "Wipe Left",
								"wipeRight" => "Wipe Right",
								"wipeUp" => "Wipe Up",
								"wipeDown" => "Wipe Down",
								"expandLeft" => "Expand Left",
								"expandRight" => "Expand Right",
								"expandUp" => "Expand Up",
								"expandDown" => "Expand Down" ), 
			'allow_none' => false, 'cols' => 3 ),
		array( 'id' => 'data-easing', 'name' => 'Select Easing', 'type' => 'select', 
			'options' => array( "linear" => "linear",
								"swing" => "swing",
								"easeInQuad" => "easeInQuad",
								"easeOutQuad" => "easeOutQuad",
								"easeInOutQuad" => "easeInOutQuad",
								"easeInCubic" => "easeInCubic",
								"easeOutCubic" => "easeOutCubic",
								"easeInOutCubic" => "easeInOutCubic",
								"easeInQuart" => "easeInQuart",
								"EaseOutQuart" => "EaseOutQuart",
								"easeInOutQuart" => "easeInOutQuart",
								"easeInQuint" => "easeInQuint",
								"easeOutQuint" => "easeOutQuint",
								"easeInOutQuint" => "easeInOutQuint",
								"easeInExpo" => "easeInExpo",
								"easeOutExpo" => "easeOutExpo",
								"easeInOutExpo" => "easeInOutExpo",
								"easeInSine" => "easeInSine",
								"easeOutSine" => "easeOutSine",
								"easeInOutSine" => "easeInOutSine",
								"easeInCirc" => "easeInCirc",
								"easeOutCirc" => "easeOutCirc",
								"easeInOutCirc" => "easeInOutCirc",
								"easeInElastic" => "easeInElastic",
								"easeOutElastic" => "easeOutElastic",
								"easeInOutElastic" => "easeInOutElastic",
								"easeInBack" => "easeInBack",
								"easeOutBack" => "easeOutBack",
								"easeInOutBack" => "easeInOutBack",
								"easeInBounce" => "easeInBounce",
								"easeOutBounce" => "easeOutBounce",
								"easeInOutBounce" => "easeInOutBounce" ), 
			'allow_none' => false, 'cols' => 3 ),
		array( 'id' => 'data-x',  'name' => 'x position in pixels', 'type' => 'text', 'cols' => 3 ),
		array( 'id' => 'data-y',  'name' => 'y position in pixels', 'type' => 'text', 'cols' => 3 ),
		array( 'id' => 'data-width',  'name' => 'Caption width in pixel, if not set will get the source caption width.', 'type' => 'text', 'cols' => 6 ),
		array( 'id' => 'data-height',  'name' => 'Caption width in pixel, if not set will get the source caption height.', 'type' => 'text', 'cols' => 6 ),
	);

	$meta_boxes[] = array(
		'title' => 'Captions',
		'pages' => 'iviewslider',
		'fields' => array(
			array( 'id' => 'video-type', 'name' => 'Select Video Type', 'type' => 'select', 'options' => array( 'vimeo' => 'Vimeo', 'youtube' => 'YouTube' ), 'allow_none' => true, 'cols' => 4 ),
			array( 'id' => 'video',  'name' => 'Video ID', 'type' => 'text', 'cols' => 4 ),
			array( 'id' => 'data-transition', 'name' => 'Select Transition', 'type' => 'select', 
			'options' => array( "fade" => "Fade",
								"wipeLeft" => "Wipe Left",
								"wipeRight" => "Wipe Right",
								"wipeUp" => "Wipe Up",
								"wipeDown" => "Wipe Down",
								"expandLeft" => "Expand Left",
								"expandRight" => "Expand Right",
								"expandUp" => "Expand Up",
								"expandDown" => "Expand Down" ), 
			'allow_none' => false, 'cols' => 4 ),
			array( 'id' => 'data-x',  'name' => 'x position in pixels', 'type' => 'text', 'cols' => 3 ),
			array( 'id' => 'data-y',  'name' => 'y position in pixels', 'type' => 'text', 'cols' => 3 ),
			array( 'id' => 'data-width',  'name' => 'Width', 'type' => 'text', 'cols' => 3 ),
			array( 'id' => 'data-height',  'name' => 'Height', 'type' => 'text', 'cols' => 3 ),
			array(
				'id' => 'cg',
				'name' => 'Caption Settings',
				'type' => 'group',
				'repeatable' => true,
				'sortable' => true,
				'fields' => $fields
			)
		)
	);

	$portfolio_fields = array(
		array( 'id' => 'portfolio_content_width', 'name' => 'Content', 'type' => 'select', 
			'options' => array( "full_width" => "Full Width",
								"half_width" => "Half Width"), 
			'allow_none' => 'false'
			),
		array( 'id' => 'portfolio_video_type', 'name' => 'Video Type', 'type' => 'select', 
			'options' => array( "youtube" => "YouTube",
								"vimeo" => "Vimeo"), 
			'allow_none' => 'true',
			'cols' => 6,
			),
		array( 'id' => 'portfolio_video_id',  'name' => 'Video ID', 'type' => 'text', 'cols' => 6 ),
		array( 'id' => 'portfolio_project_url',  'name' => 'Project URL', 'type' => 'text', 'cols' => 6 ),
		array( 'id' => 'portfolio_project_link_text',  'name' => 'Project Link Text', 'type' => 'text', 'cols' => 6 ),
	);

	$meta_boxes[] = array(
		'title' => 'Project',
		'pages' => 'portfolio',
		'fields' => $portfolio_fields
	);

	$eislide_fields = array(
		array( 'id' => 'title1',  'name' => 'Title #1', 'type' => 'text' ),
		array( 'id' => 'title2',  'name' => 'Title #2', 'type' => 'text' ),
	);

	$meta_boxes[] = array(
		'title' => 'Caption',
		'pages' => 'elasticslider',
		'fields' => $eislide_fields
	);

	$testimonial_fields = array(
		array( 'id' => 'testimonial_client_name', 'name' => 'Client Name', 'type' => 'text' ),
		array( 'id' => 'testimonial_text', 'name' => 'Testimonial', 'type' => 'textarea' ),
		array( 'id' => 'testimonial_company_name', 'name' => 'Company Name', 'type' => 'text' ),
	);

	$meta_boxes[] = array(
		'title' => 'Company Name',
		'pages' => 'testimonial',
		'fields' => $testimonial_fields,
	);

	global $fa_icons;

	$skill_fields = array(
		array( 'id' => 'skill_percentage', 'name' => 'Percentage', 'type' => 'select',
			'options' => array( '' => 'None',
								'0' => '0%',
								'5' => '5%',
								'10' => '10%',
								'15' => '15%',
								'20' => '20%',
								'25' => '25%',
								'30' => '30%',
								'35' => '35%',
								'40' => '40%',
								'45' => '45%',
								'50' => '50%',
								'55' => '55%',
								'60' => '60%',
								'65' => '65%',
								'70' => '70%',
								'75' => '75%',
								'80' => '80%',
								'85' => '85%',
								'90' => '90%',
								'95' => '95%',
								'100' => '100%',
			),
		),
		array( 'id' => 'skill_icon', 'name' => 'Icon', 'type' => 'select', 'options' => $fa_icons, 'allow_none' => true ),
	);

	$meta_boxes[] = array(
		'title' => 'Skill Details',
		'pages' => 'skill',
		'fields' => $skill_fields,
	);

	// Adding Full Width option to single posts
	$meta_boxes[] = array(
		'title' => 'Layout Option',
		'pages' => 'post',
		'fields' => array( array( 'id' => 'full-width-post',  'name' => 'Full Width Layout', 'type' => 'checkbox' )),
	);

	// Adding Slider Option for Pages
	$meta_boxes[] = array(
		'title' => 'Slider',
		'pages' => 'page',
		'context' => 'side',
		'fields' => array( array( 'id' => '_slider-shortcode',  'name' => 'Slider Shortcode', 'type' => 'text' )),
	);	

	return $meta_boxes;

}
add_filter( 'cmb_meta_boxes', 'cmb_sample_metaboxes' );
