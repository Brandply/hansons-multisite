<?php
	function webulous_create_shortcode() {
		if ( function_exists('add_meta_box') ) {  
			add_meta_box( 'shortcode_metabox', 'Create Shortcode', 'webulous_sc_options', 'page', 'normal', 'high' );
			add_meta_box( 'shortcode_metabox', 'Create Shortcode', 'webulous_sc_options', 'post', 'normal', 'high' );  
		}
	}

	// Add Shortcode Metaboxe to post types
	add_action('admin_menu', 'webulous_create_shortcode');

	// Shortcode Options
	function webulous_sc_options() {
		$icons = array(
					'none' => 'none',
					'fa-glass' => 'fa-glass',
					'fa-music' => 'fa-music',
					'fa-search' => 'fa-search',
					'fa-envelope-o' => 'fa-envelope-o',
					'fa-heart' => 'fa-heart',
					'fa-star' => 'fa-star',
					'fa-star-o' => 'fa-star-o',
					'fa-user' => 'fa-user',
					'fa-film' => 'fa-film',
					'fa-th-large' => 'fa-th-large',
					'fa-th' => 'fa-th',
					'fa-th-list' => 'fa-th-list',
					'fa-check' => 'fa-check',
					'fa-times' => 'fa-times',
					'fa-search-plus' => 'fa-search-plus',
					'fa-search-minus' => 'fa-search-minus',
					'fa-power-off' => 'fa-power-off',
					'fa-signal' => 'fa-signal',
					'fa-cog' => 'fa-cog',
					'fa-trash-o' => 'fa-trash-o',
					'fa-home' => 'fa-home',
					'fa-file-o' => 'fa-file-o',
					'fa-clock-o' => 'fa-clock-o',
					'fa-road' => 'fa-road',
					'fa-download' => 'fa-download',
					'fa-arrow-circle-o-down' => 'fa-arrow-circle-o-down',
					'fa-arrow-circle-o-up' => 'fa-arrow-circle-o-up',
					'fa-inbox' => 'fa-inbox',
					'fa-play-circle-o' => 'fa-play-circle-o',
					'fa-repeat' => 'fa-repeat',
					'fa-refresh' => 'fa-refresh',
					'fa-list-alt' => 'fa-list-alt',
					'fa-lock' => 'fa-lock',
					'fa-flag' => 'fa-flag',
					'fa-headphones' => 'fa-headphones',
					'fa-volume-off' => 'fa-volume-off',
					'fa-volume-down' => 'fa-volume-down',
					'fa-volume-up' => 'fa-volume-up',
					'fa-qrcode' => 'fa-qrcode',
					'fa-barcode' => 'fa-barcode',
					'fa-tag' => 'fa-tag',
					'fa-tags' => 'fa-tags',
					'fa-book' => 'fa-book',
					'fa-bookmark' => 'fa-bookmark',
					'fa-print' => 'fa-print',
					'fa-camera' => 'fa-camera',
					'fa-font' => 'fa-font',
					'fa-bold' => 'fa-bold',
					'fa-italic' => 'fa-italic',
					'fa-text-height' => 'fa-text-height',
					'fa-text-width' => 'fa-text-width',
					'fa-align-left' => 'fa-align-left',
					'fa-align-center' => 'fa-align-center',
					'fa-align-right' => 'fa-align-right',
					'fa-align-justify' => 'fa-align-justify',
					'fa-list' => 'fa-list',
					'fa-outdent' => 'fa-outdent',
					'fa-indent' => 'fa-indent',
					'fa-video-camera' => 'fa-video-camera',
					'fa-picture-o' => 'fa-picture-o',
					'fa-pencil' => 'fa-pencil',
					'fa-map-marker' => 'fa-map-marker',
					'fa-adjust' => 'fa-adjust',
					'fa-tint' => 'fa-tint',
					'fa-pencil-square-o' => 'fa-pencil-square-o',
					'fa-share-square-o' => 'fa-share-square-o',
					'fa-check-square-o' => 'fa-check-square-o',
					'fa-arrows' => 'fa-arrows',
					'fa-step-backward' => 'fa-step-backward',
					'fa-fast-backward' => 'fa-fast-backward',
					'fa-backward' => 'fa-backward',
					'fa-play' => 'fa-play',
					'fa-pause' => 'fa-pause',
					'fa-stop' => 'fa-stop',
					'fa-forward' => 'fa-forward',
					'fa-fast-forward' => 'fa-fast-forward',
					'fa-step-forward' => 'fa-step-forward',
					'fa-eject' => 'fa-eject',
					'fa-chevron-left' => 'fa-chevron-left',
					'fa-chevron-right' => 'fa-chevron-right',
					'fa-plus-circle' => 'fa-plus-circle',
					'fa-minus-circle' => 'fa-minus-circle',
					'fa-times-circle' => 'fa-times-circle',
					'fa-check-circle' => 'fa-check-circle',
					'fa-question-circle' => 'fa-question-circle',
					'fa-info-circle' => 'fa-info-circle',
					'fa-crosshairs' => 'fa-crosshairs',
					'fa-times-circle-o' => 'fa-times-circle-o',
					'fa-check-circle-o' => 'fa-check-circle-o',
					'fa-ban' => 'fa-ban',
					'fa-arrow-left' => 'fa-arrow-left',
					'fa-arrow-right' => 'fa-arrow-right',
					'fa-arrow-up' => 'fa-arrow-up',
					'fa-arrow-down' => 'fa-arrow-down',
					'fa-share' => 'fa-share',
					'fa-expand' => 'fa-expand',
					'fa-compress' => 'fa-compress',
					'fa-plus' => 'fa-plus',
					'fa-minus' => 'fa-minus',
					'fa-asterisk' => 'fa-asterisk',
					'fa-exclamation-circle' => 'fa-exclamation-circle',
					'fa-gift' => 'fa-gift',
					'fa-leaf' => 'fa-leaf',
					'fa-fire' => 'fa-fire',
					'fa-eye' => 'fa-eye',
					'fa-eye-slash' => 'fa-eye-slash',
					'fa-exclamation-triangle' => 'fa-exclamation-triangle',
					'fa-plane' => 'fa-plane',
					'fa-calendar' => 'fa-calendar',
					'fa-random' => 'fa-random',
					'fa-comment' => 'fa-comment',
					'fa-magnet' => 'fa-magnet',
					'fa-chevron-up' => 'fa-chevron-up',
					'fa-chevron-down' => 'fa-chevron-down',
					'fa-retweet' => 'fa-retweet',
					'fa-shopping-cart' => 'fa-shopping-cart',
					'fa-folder' => 'fa-folder',
					'fa-folder-open' => 'fa-folder-open',
					'fa-arrows-v' => 'fa-arrows-v',
					'fa-arrows-h' => 'fa-arrows-h',
					'fa-bar-chart-o' => 'fa-bar-chart-o',
					'fa-twitter-square' => 'fa-twitter-square',
					'fa-facebook-square' => 'fa-facebook-square',
					'fa-camera-retro' => 'fa-camera-retro',
					'fa-key' => 'fa-key',
					'fa-cogs' => 'fa-cogs',
					'fa-comments' => 'fa-comments',
					'fa-thumbs-o-up' => 'fa-thumbs-o-up',
					'fa-thumbs-o-down' => 'fa-thumbs-o-down',
					'fa-star-half' => 'fa-star-half',
					'fa-heart-o' => 'fa-heart-o',
					'fa-sign-out' => 'fa-sign-out',
					'fa-linkedin-square' => 'fa-linkedin-square',
					'fa-thumb-tack' => 'fa-thumb-tack',
					'fa-external-link' => 'fa-external-link',
					'fa-sign-in' => 'fa-sign-in',
					'fa-trophy' => 'fa-trophy',
					'fa-github-square' => 'fa-github-square',
					'fa-upload' => 'fa-upload',
					'fa-lemon-o' => 'fa-lemon-o',
					'fa-phone' => 'fa-phone',
					'fa-square-o' => 'fa-square-o',
					'fa-bookmark-o' => 'fa-bookmark-o',
					'fa-phone-square' => 'fa-phone-square',
					'fa-twitter' => 'fa-twitter',
					'fa-facebook' => 'fa-facebook',
					'fa-github' => 'fa-github',
					'fa-unlock' => 'fa-unlock',
					'fa-credit-card' => 'fa-credit-card',
					'fa-rss' => 'fa-rss',
					'fa-hdd-o' => 'fa-hdd-o',
					'fa-bullhorn' => 'fa-bullhorn',
					'fa-bell' => 'fa-bell',
					'fa-certificate' => 'fa-certificate',
					'fa-hand-o-right' => 'fa-hand-o-right',
					'fa-hand-o-left' => 'fa-hand-o-left',
					'fa-hand-o-up' => 'fa-hand-o-up',
					'fa-hand-o-down' => 'fa-hand-o-down',
					'fa-arrow-circle-left' => 'fa-arrow-circle-left',
					'fa-arrow-circle-right' => 'fa-arrow-circle-right',
					'fa-arrow-circle-up' => 'fa-arrow-circle-up',
					'fa-arrow-circle-down' => 'fa-arrow-circle-down',
					'fa-globe' => 'fa-globe',
					'fa-wrench' => 'fa-wrench',
					'fa-tasks' => 'fa-tasks',
					'fa-filter' => 'fa-filter',
					'fa-briefcase' => 'fa-briefcase',
					'fa-arrows-alt' => 'fa-arrows-alt',
					'fa-users' => 'fa-users',
					'fa-link' => 'fa-link',
					'fa-cloud' => 'fa-cloud',
					'fa-flask' => 'fa-flask',
					'fa-scissors' => 'fa-scissors',
					'fa-files-o' => 'fa-files-o',
					'fa-paperclip' => 'fa-paperclip',
					'fa-floppy-o' => 'fa-floppy-o',
					'fa-square' => 'fa-square',
					'fa-bars' => 'fa-bars',
					'fa-list-ul' => 'fa-list-ul',
					'fa-list-ol' => 'fa-list-ol',
					'fa-strikethrough' => 'fa-strikethrough',
					'fa-underline' => 'fa-underline',
					'fa-table' => 'fa-table',
					'fa-magic' => 'fa-magic',
					'fa-truck' => 'fa-truck',
					'fa-pinterest' => 'fa-pinterest',
					'fa-pinterest-square' => 'fa-pinterest-square',
					'fa-google-plus-square' => 'fa-google-plus-square',
					'fa-google-plus' => 'fa-google-plus',
					'fa-money' => 'fa-money',
					'fa-caret-down' => 'fa-caret-down',
					'fa-caret-up' => 'fa-caret-up',
					'fa-caret-left' => 'fa-caret-left',
					'fa-caret-right' => 'fa-caret-right',
					'fa-columns' => 'fa-columns',
					'fa-sort' => 'fa-sort',
					'fa-sort-asc' => 'fa-sort-asc',
					'fa-sort-desc' => 'fa-sort-desc',
					'fa-envelope' => 'fa-envelope',
					'fa-linkedin' => 'fa-linkedin',
					'fa-undo' => 'fa-undo',
					'fa-gavel' => 'fa-gavel',
					'fa-tachometer' => 'fa-tachometer',
					'fa-comment-o' => 'fa-comment-o',
					'fa-comments-o' => 'fa-comments-o',
					'fa-bolt' => 'fa-bolt',
					'fa-sitemap' => 'fa-sitemap',
					'fa-umbrella' => 'fa-umbrella',
					'fa-clipboard' => 'fa-clipboard',
					'fa-lightbulb-o' => 'fa-lightbulb-o',
					'fa-exchange' => 'fa-exchange',
					'fa-cloud-download' => 'fa-cloud-download',
					'fa-cloud-upload' => 'fa-cloud-upload',
					'fa-user-md' => 'fa-user-md',
					'fa-stethoscope' => 'fa-stethoscope',
					'fa-suitcase' => 'fa-suitcase',
					'fa-bell-o' => 'fa-bell-o',
					'fa-coffee' => 'fa-coffee',
					'fa-cutlery' => 'fa-cutlery',
					'fa-file-text-o' => 'fa-file-text-o',
					'fa-building-o' => 'fa-building-o',
					'fa-hospital-o' => 'fa-hospital-o',
					'fa-ambulance' => 'fa-ambulance',
					'fa-medkit' => 'fa-medkit',
					'fa-fighter-jet' => 'fa-fighter-jet',
					'fa-beer' => 'fa-beer',
					'fa-h-square' => 'fa-h-square',
					'fa-plus-square' => 'fa-plus-square',
					'fa-angle-double-left' => 'fa-angle-double-left',
					'fa-angle-double-right' => 'fa-angle-double-right',
					'fa-angle-double-up' => 'fa-angle-double-up',
					'fa-angle-double-down' => 'fa-angle-double-down',
					'fa-angle-left' => 'fa-angle-left',
					'fa-angle-right' => 'fa-angle-right',
					'fa-angle-up' => 'fa-angle-up',
					'fa-angle-down' => 'fa-angle-down',
					'fa-desktop' => 'fa-desktop',
					'fa-laptop' => 'fa-laptop',
					'fa-tablet' => 'fa-tablet',
					'fa-mobile' => 'fa-mobile',
					'fa-circle-o' => 'fa-circle-o',
					'fa-quote-left' => 'fa-quote-left',
					'fa-quote-right' => 'fa-quote-right',
					'fa-spinner' => 'fa-spinner',
					'fa-circle' => 'fa-circle',
					'fa-reply' => 'fa-reply',
					'fa-github-alt' => 'fa-github-alt',
					'fa-folder-o' => 'fa-folder-o',
					'fa-folder-open-o' => 'fa-folder-open-o',
					'fa-smile-o' => 'fa-smile-o',
					'fa-frown-o' => 'fa-frown-o',
					'fa-meh-o' => 'fa-meh-o',
					'fa-gamepad' => 'fa-gamepad',
					'fa-keyboard-o' => 'fa-keyboard-o',
					'fa-flag-o' => 'fa-flag-o',
					'fa-flag-checkered' => 'fa-flag-checkered',
					'fa-terminal' => 'fa-terminal',
					'fa-code' => 'fa-code',
					'fa-reply-all' => 'fa-reply-all',
					'fa-mail-reply-all' => 'fa-mail-reply-all',
					'fa-star-half-o' => 'fa-star-half-o',
					'fa-location-arrow' => 'fa-location-arrow',
					'fa-crop' => 'fa-crop',
					'fa-code-fork' => 'fa-code-fork',
					'fa-chain-broken' => 'fa-chain-broken',
					'fa-question' => 'fa-question',
					'fa-info' => 'fa-info',
					'fa-exclamation' => 'fa-exclamation',
					'fa-superscript' => 'fa-superscript',
					'fa-subscript' => 'fa-subscript',
					'fa-eraser' => 'fa-eraser',
					'fa-puzzle-piece' => 'fa-puzzle-piece',
					'fa-microphone' => 'fa-microphone',
					'fa-microphone-slash' => 'fa-microphone-slash',
					'fa-shield' => 'fa-shield',
					'fa-calendar-o' => 'fa-calendar-o',
					'fa-fire-extinguisher' => 'fa-fire-extinguisher',
					'fa-rocket' => 'fa-rocket',
					'fa-maxcdn' => 'fa-maxcdn',
					'fa-chevron-circle-left' => 'fa-chevron-circle-left',
					'fa-chevron-circle-right' => 'fa-chevron-circle-right',
					'fa-chevron-circle-up' => 'fa-chevron-circle-up',
					'fa-chevron-circle-down' => 'fa-chevron-circle-down',
					'fa-html5' => 'fa-html5',
					'fa-css3' => 'fa-css3',
					'fa-anchor' => 'fa-anchor',
					'fa-unlock-alt' => 'fa-unlock-alt',
					'fa-bullseye' => 'fa-bullseye',
					'fa-ellipsis-h' => 'fa-ellipsis-h',
					'fa-ellipsis-v' => 'fa-ellipsis-v',
					'fa-rss-square' => 'fa-rss-square',
					'fa-play-circle' => 'fa-play-circle',
					'fa-ticket' => 'fa-ticket',
					'fa-minus-square' => 'fa-minus-square',
					'fa-minus-square-o' => 'fa-minus-square-o',
					'fa-level-up' => 'fa-level-up',
					'fa-level-down' => 'fa-level-down',
					'fa-check-square' => 'fa-check-square',
					'fa-pencil-square' => 'fa-pencil-square',
					'fa-external-link-square' => 'fa-external-link-square',
					'fa-share-square' => 'fa-share-square',
					'fa-compass' => 'fa-compass',
					'fa-caret-square-o-down' => 'fa-caret-square-o-down',
					'fa-caret-square-o-up' => 'fa-caret-square-o-up',
					'fa-caret-square-o-right' => 'fa-caret-square-o-right',
					'fa-eur' => 'fa-eur',
					'fa-gbp' => 'fa-gbp',
					'fa-inr' => 'fa-inr',
					'fa-jpy' => 'fa-jpy',
					'fa-rub' => 'fa-rub',
					'fa-krw' => 'fa-krw',
					'fa-btc' => 'fa-btc',
					'fa-file' => 'fa-file',
					'fa-file-text' => 'fa-file-text',
					'fa-sort-alpha-asc' => 'fa-sort-alpha-asc',
					'fa-sort-alpha-desc' => 'fa-sort-alpha-desc',
					'fa-sort-amount-asc' => 'fa-sort-amount-asc',
					'fa-sort-amount-desc' => 'fa-sort-amount-desc',
					'fa-sort-numeric-asc' => 'fa-sort-numeric-asc',
					'fa-sort-numeric-desc' => 'fa-sort-numeric-desc',
					'fa-thumbs-up' => 'fa-thumbs-up',
					'fa-thumbs-down' => 'fa-thumbs-down',
					'fa-youtube-square' => 'fa-youtube-square',
					'fa-youtube' => 'fa-youtube',
					'fa-xing' => 'fa-xing',
					'fa-xing-square' => 'fa-xing-square',
					'fa-youtube-play' => 'fa-youtube-play',
					'fa-dropbox' => 'fa-dropbox',
					'fa-stack-overflow' => 'fa-stack-overflow',
					'fa-instagram' => 'fa-instagram',
					'fa-flickr' => 'fa-flickr',
					'fa-adn' => 'fa-adn',
					'fa-bitbucket' => 'fa-bitbucket',
					'fa-bitbucket-square' => 'fa-bitbucket-square',
					'fa-tumblr' => 'fa-tumblr',
					'fa-tumblr-square' => 'fa-tumblr-square',
					'fa-long-arrow-down' => 'fa-long-arrow-down',
					'fa-long-arrow-up' => 'fa-long-arrow-up',
					'fa-long-arrow-left' => 'fa-long-arrow-left',
					'fa-long-arrow-right' => 'fa-long-arrow-right',
					'fa-apple' => 'fa-apple',
					'fa-windows' => 'fa-windows',
					'fa-android' => 'fa-android',
					'fa-linux' => 'fa-linux',
					'fa-dribbble' => 'fa-dribbble',
					'fa-skype' => 'fa-skype',
					'fa-foursquare' => 'fa-foursquare',
					'fa-trello' => 'fa-trello',
					'fa-female' => 'fa-female',
					'fa-male' => 'fa-male',
					'fa-gittip' => 'fa-gittip',
					'fa-sun-o' => 'fa-sun-o',
					'fa-moon-o' => 'fa-moon-o',
					'fa-archive' => 'fa-archive',
					'fa-bug' => 'fa-bug',
					'fa-vk' => 'fa-vk',
					'fa-weibo' => 'fa-weibo',
					'fa-renren' => 'fa-renren',
					'fa-pagelines' => 'fa-pagelines',
					'fa-stack-exchange' => 'fa-stack-exchange',
					'fa-arrow-circle-o-right' => 'fa-arrow-circle-o-right',
					'fa-arrow-circle-o-left' => 'fa-arrow-circle-o-left',
					'fa-caret-square-o-left' => 'fa-caret-square-o-left',
					'fa-dot-circle-o' => 'fa-dot-circle-o',
					'fa-wheelchair' => 'fa-wheelchair',
					'fa-vimeo-square' => 'fa-vimeo-square',
					'fa-try' => 'fa-try',
					'fa-plus-square-o' => 'fa-plus-square-o',
				);
		$shortcodes = array(

			/* Accordion */
			'accordion' => array(
				'attr' => array(
					'content_repeat' => 'text',
				),
				'desc' => array(
					'content_repeat' => '',
				),
				'values' => array(
					'content_repeat' => 3,
				),
				'content' => true,
			),

			/* Alert */
			'alert' => array(
				'attr' => array(
					'type' => 'select',
					'close' => 'select',
				),
				'desc' => array(
					'type' => 'Select type of alert box',
					'close' => 'Need close option for alert box?',
				),
				'content' => true,
				'type_options' => array(
					"notice" => "Notice",
					"warning" => "Warning",
					"success" => "Success",
					"error" => "Error",
					"info" => "Info",
				),
				'close_options' => array(
					0 => "Yes",
					1 => "No",
				),
			),

			/* Icon */
			'icon' => array(
				'attr' => array(
					'icon' => 'select',
					'size' => 'select',
					//'align' => 'select',
				),
				'desc' => array(
					'icon' => 'Select icon',
					'size' => 'Select size of Icon',
					//'align' => 'Select icon alignment'
				),
				'icon_options' => $icons,
				'size_options' => array(
					'' => 'normal',
					'lg' => 'lg',
					'2x' => '2x',
					'3x' => '3x',
					'4x' => '4x',
					'5x' => '5x',
				),
				/*
				'align_options' => array(
					'text-left' => 'Left Align',
					'text-center' => 'Center Align',
					'text-right' => 'Right Align',
				),
				*/
				'content' => false,
			),

			/* Button */
			'button' => array(
				'attr' => array(
					'link' => 'text',
					'target' => 'select',
					'color' => 'select',
					'size' => 'select',
				),
				'desc' => array(
					'button_text' => 'Enter Link Text',
					'link' => 'Enter URL for button',
					'target' => 'Open in',
					'color' => 'Select color of button',
					'size' => 'Select size of button',
				),
				'target_options' => array(
					'_self' => '_self',
					'_blank' => '_blank',
				),
				'color_options' => array(
 				'btn' => 'Normal',
 				'btn-primary' => 'Blue',
 				'btn-danger' => 'Red',
 				'btn-warning' => 'Yellow',
 				'btn-success' => 'Green',
 				'btn-info' => 'Light Blue',
 				'btn-inverse' => 'Black'
				),
				'size_options' => array(
					'btn-mini' => 'Mini',
					'btn-small' => 'Small',
					'btn-normal' => 'Normal',
					'btn-large' => 'Large',
				),
				'content' => true,
				'content_text' => 'Button Text',
			),

			/* cta */
			'cta' => array(
				'attr' => array(
					'title' => 'text',
					'url' => 'text',
					'anchor_text' => 'text',
				),
				'desc' => array(
					'title' => 'Enter title for call to action',
					'url' => 'Enter URL of CTA Button',
					'anchor_text' => 'Enter Call To Action Button Text',
				),
				'content' => true,
			),

			/* clear */
			'clear' => array(
				'attr' => array(),
				'desc' => array(),
				'content' => false,
			),

			/* Divider */
			'divider' => array(
				'attr' => array(
					'style' => 'select'
				),
				'desc' => array(
					'style' => 'Select style of divider'
				),
				'style_options' => array(
					'solid' => 'solid',
					'dotted' => 'dotted',
					'dashed' => 'dashed',
					'shadow' => 'shadow',
					'fancy' => 'fancy',
				),
				'content' => false,
			),

			/* Dropcap */
			'dropcap' => array(
				'attr' => array(
					'style' => 'select'
				),
				'desc' => array(
					'style' => 'Select style of dropcap'
				),
				'style_options' => array(
					'default' => 'default',
					'circle' => 'circle',
					'box' => 'box',
					'book' => 'book',
				),
				'content' => true,
			),			

			/* Gap */
			'gap' => array(
				'attr' => array(
					'height' => 'text'
				),
				'desc' => array(
					'height' => 'Enter height of Gap (number only)'
				),
				'content' => false,
			),

			/* Google Font  */
			'googlefont' => array(
				'attr' => array(
					'font_family' => 'text',
					'size' => 'text',
					'weights' => 'text',
					'weight' => 'text',
				),
				'desc' => array(
					'font_family' => 'Enter name of Google Web Font',
					'size' => 'Enter size of font (in numbers only)',
					'weights' => 'Enter weights of font (comma separated, ex. 400,800)',
					'weight' => 'Enter weight to use',
				),
				'content' => true,
			),
			

			/* Headline */
			'headline' => array(
				'attr' => array(
					'level' => 'select',
					'type' => 'select',
					'align' => 'select',
				),
				'desc' => array(
					'level' => 'Select Headline Level',
					'type' => 'Select Headline Type',
					'align' => 'Select alignment',
				),
				'level_options' => array(
					1 => 'Level 1',
					2 => 'Level 2',
					3 => 'Level 3',
					4 => 'Level 4',
					5 => 'Level 5',
					6 => 'Level 6',
				),
				'type_options' => array(
					'normal' => 'Normal',
					'seperator' => 'Separator',
				),

				'align_options' => array(
					'tleft' => 'Left',
					'tright' => 'Right',
					'tcenter' => 'Center'
				),
				'content' => true,
			),

			/* Highlight */
			'highlight' => array(
				'attr' => array(
					'color' => 'select',
					'bgcolor' => 'select',
				),
				'desc' => array(
					'color' => 'Select Font Color',
					'bgcolor' => 'Select Highlight Color'
				),
				'color_options' => array(
					'red' => 'red',
					'green' => 'green',
					'blue' => 'blue',
				),
				'bgcolor_options' => array(
					'cyan' => 'cyan',
					'yellow' => 'yellow',
					'magenta' => 'magenta',
					'black' => 'black',
				),
				'content' => true,
			),

			/* Our Team */
			'ourteam' => array(
				'attr' => array(
					'title' => 'text',
					'designation' => 'text',
					'image_url' => 'text',
					'linkedin' => 'text',
					'google' => 'text',
					'twitter' => 'text',
					'facebook' => 'text',
				),
				'desc' => array(
					'title' => 'Enter name of team member',
					'designation' => 'Enter designation of team member',
					'image_url' => 'Enter URL of team member image',
					'linkedin' => 'Enter LinkedIn URL',
					'google' => 'Enter Google Plus URL',
					'twitter' => 'Enter Twitter URL',
					'facebook' => 'Enter Facebook URL',
				),
				'content' => true,
			),

			/* Icon Content Box 
			'icon_content_box' => array(
				'attr' => array(
					'title' => 'text',
					'icon' => 'select',
					'background' => 'select',
					'size' => 'select',
					'align' => 'select',
				),
				'desc' => array(
					'title' => 'Enter Content Title',
					'icon' => 'Select Icon',
					'background' => 'Select icon background',
					'size' => 'Select Icon size',
					'align' => 'Select icon alignment',
				),
				'icon_options' => $icons,
				'background_options' => array(
					'' => 'None',
					'icon-check-empty' => 'Empty Sqare',
					'icon-sign-blank' => 'Solid Square',
					'icon-circle-blank' => 'Empty Cirlce',
					'icon-circle' => 'Solid Circle',
				),
				'size_options' => array(
					'' => 'Normal',
					'icon-large' => 'Large',
					'icon-2x' => '2x',
					'icon-3x' => '3x',
					'icon-4x' => '4x',
				),
				'align_options' => array(
					'text-left' => 'Left Align',
					'text-center' => 'Center Align'
				),				
				'content' => true,
			),
			*/

			/* Lists 
			'list' => array(
				'attr' => array(
					'content_repeat' => 'text',
					'type' => 'select',
					'bullet' => 'select',
				),
				'desc' => array(
					'content_repeat' => 'How many list items?',
					'type' => 'Select style of list',
					'bullet' => 'Select bullet icon',
				),
				'type_options' => array(
					'ul' => 'Unordered List',
					'ol' => 'Ordered List',
				),
				'bullet_options' => $icons,
				'values' => array(
					'content_repeat' => 1,
				),
				'content' => true,
			),
			*/

			/* Skill 
			'skill' => array(
				'attr' => array(
					'percentage' => 'text',
				),
				'desc' => array(
					'percentage' => 'Enter Percentage (numbers only)',
				),
				'content' => true,
			),
			*/

			/* Soundcloud */
			'soundcloud' => array(
				'attr' => array(
					'url' => 'text',
					'width' => 'text',
					'height' => 'text',
					'comments' => 'select',
					'auto_play' => 'select',
					'color' => 'text',
				),
				'desc' => array(
					'url' => 'Enter URL of soundcloud file',
					'width' => 'Enter Width (Numerals Only)',
					'height' => 'Enter Height (Numerals Only)',
					'comments' => 'Show Comments?',
					'auto_play' => 'Auto Play?',
					'color' => 'Enter Colour as HexCode',
				),
				'comments_options' => array(
					false => "No",
					true => "Yes",
				),
				'auto_play_options' => array(
					false => "No",
					true => "Yes",
				),
				'content' => false,
			),

			/* Quote */
			'quote' => array(
				'attr' => array(
					'align' => 'select',
				),
				'desc' => array(
					'align' => 'Select alignment of pull quote',
				),
				'align_options' => array(
					'none' => 'Normal Blockquote',
					'left' => 'Pull Left',
					'right' => 'Pull Right',
				),
				'content' => true,
			),

			/* Tabs */
			'tabs' => array(
				'attr' => array(
					'type' => 'select',
					'content_repeat' => 'text',
				),
				'desc' => array(
					'type' => 'Select tabs design type',
					'content_repeat' => '',
				),
				'type_options' => array(
					'normal' => 'Normal',
					'center' => 'Center',
				),
				'values' => array(
					'content_repeat' => 3,
				),
				'content' => true,
			),

			/* Testimonial 
			'testimonial' => array(
				'attr' => array(
					'name' => 'text',
					'company' => 'text'
				),
				'desc' => array(
					'name' => 'Enter Clients Name',
					'company' => 'Enter Company Name',
				),
				'content' => true,
			),
			*/

			/* Toggle */
			'toggle' => array(
				'attr' => array(
					'title' => 'text',
					'open' => 'select',
					'type' => 'select'
				),
				'desc' => array(
					'title' => 'Enter Title',
					'open' => 'Default State of content',
					'type' => 'Type of toggle switch',
				),
				'open_options' => array(
					0 => 'Close',
					1 => 'Open',
				),
				'type_options' => array(
					'normal' => 'Normal',
					'polygon' => 'Polygon',
				),
				'content' => true,
			),

			/* Tooltip */
			'tooltip' => array(
				'attr' => array(
					'tip' => 'text',
					'pos' => 'select',
				),
				'desc' => array(
					'tip' => 'Enter Tooltip',
					'pos' => 'Select Position of Tooltip'
				),
				'pos_options' => array( 
					'left' => 'Left',
					'right' => 'Right',
					'top' => 'Top',
					'bottom' => 'Bottom',
				),
				'content' => true,
			),

			/* Video */
			'video' => array(
				'attr' => array(
					'type' => 'select',
					'video_id' => 'text',
					'height' => 'text',
					'width' => 'text',

				),
				'desc' => array(
					'type' => 'Select type of video',
					'video_id' => 'Enter Video ID',
					'height' => 'Video Height in pixels (numbers only)',
					'width' => 'Video Width in pixels (numbers only)',
				),
				'type_options' => array(
					'youtube' => 'YouTube',
					'vimeo' => 'Vimeo',
				),
				'content' => false,
			),

			/* Recent Posts */
			'recent_posts' => array(
				'attr' => array(
					'count' => 'text',
				),
				'desc' => array(
					'count' => 'Enter no. of posts to be displayed',
				),
				'content' => false,
			),

		);
	?>

	<style type="text/css">
		.webulous_shortcode_widget label {
			margin-top: 10px;
			font-weight: bold;
			display: block;
		}

		.webulous_shortcode_widget .button {
			margin: 10px 0;
		}

		.webulous_shortcode_widget .sc_field_wrapper {
			display: none;
		}
	</style>

	<script>
	function nl2br (str, is_xhtml) {   
		var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';    
		return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1'+ breakTag +'$2');
	}

	jQuery(document).ready(function(){ 

		// Upon shortcode selection show appropriate fields
		jQuery('#webulous_shortcode_select').change(function() {
	  		var target = jQuery(this).val();
	  		jQuery('.sc_field_wrapper').hide()
	  		jQuery('#div_'+target).fadeIn()
		});

		// Set custom no of content fields
		jQuery('.content_repeat').blur(function() {
			var times = jQuery(this).val();
			var shortcode_name = jQuery(this).attr('name');
			jQuery('#'+shortcode_name+'_content_wrapper').empty();
			if(isNaN(times)) {
				times = 1;
			}
			for(count=1;count<=times;count++) {
				if(shortcode_name == 'accordion' || shortcode_name == 'tabs' ) {
					jQuery('#'+shortcode_name+'_content_wrapper')
					.append("<div class='group'><label for='" + shortcode_name + "_content_title_" + count +"'>Title #"+ count + ":</label><input id='" + shortcode_name + "_content_title_" + count + "' class='widefat content_title' value='' type='text'><label for='" + shortcode_name + "_content_" + count +"'>Content #"+ count + ":</label><textarea id='" + shortcode_name + "_content_" + count + "' rows='3' class='widefat content'></textarea></div>");
				} else {
					if( shortcode_name == 'list' ) {
						jQuery('#'+shortcode_name+'_content_wrapper')
						.append("<div class='group'><label for='" + shortcode_name + "_content_title_" + count +"'>Title #"+ count + ":</label><input id='" + shortcode_name + "_content_title_" + count + "' class='widefat content_title' value='' type='text'></div>");
					} 
				}
/*
				else {
					jQuery('#'+shortcode_name+'_content_wrapper')
					.append("<div class='group'>");
					jQuery('#'+shortcode_name+'_content_wrapper .group')
					.append("<label for='" + shortcode_name + "_content_" + count +"'>Content #"+ count + ":</label>")
					.append("<textarea id='" + shortcode_name + "_content_" + count + "' rows='3' class='widefat content'></textarea>");
				}				 */
			}
				
		});
		
		// Create Shortcode	
		jQuery('.shortcode_button').click(function() { 
			var target = jQuery(this).attr('id');
			var create_shortcode = '';
			//console.log(target);

			// We use switch statement to make different type of shortcodes, 
			// like accordion, layout col. options, etc
			switch(target) {
				case 'accordion' :
					create_shortcode+= '['+target+'_group]';
					jQuery('#'+target+'_content_wrapper .group').each(function() {
						create_shortcode+= '['+target+' ';
						create_shortcode+= 'title="'+jQuery('.content_title', this).val()+'"]';
						console.log(jQuery('.content_title', this));
						create_shortcode+= jQuery('.content', this).val();
						create_shortcode+= '[/'+target+']';
					});
					create_shortcode+= '[/'+target+'_group]';
					break;
				case 'tabs' :
					create_shortcode+= '['+target+'_group';
		  			jQuery('#'+target+'_attr_wrapper .attr').each(function() {
	  					if( jQuery(this).attr('name') != undefined ) {
	  						create_shortcode+= ' '+jQuery(this).attr('name')+'="'+jQuery(this).val()+'"]';	
	  					}						
					});
					jQuery('#'+target+'_content_wrapper .group').each(function() {
						create_shortcode+= '['+target+' ';
						create_shortcode+= 'title="'+jQuery('.content_title', this).val()+'"]';
						console.log(jQuery('.content_title', this));
						create_shortcode+= jQuery('.content', this).val();
						create_shortcode+= '[/'+target+']';
					});
					create_shortcode+= '[/'+target+'_group]';
					break;

				case 'list' :
					create_shortcode+= '['+target+' type="'+jQuery('#'+target+'_select').val()+'"]';
					jQuery('#'+target+'_content_wrapper .group').each(function() {
						create_shortcode+= '['+target+'_item bullet="' + jQuery('select[name*="bullet"]').val() + '"]';
						create_shortcode+= jQuery('.content_title', this).val();
						create_shortcode+= '[/'+target+'_item]';
					});
					create_shortcode+= '[/'+target+']';
					break;

				case 'two_column_layout' :
					create_shortcode += '[one_half]';
					create_shortcode += jQuery('#'+target+'_content_1').val();
					create_shortcode += '[/one_half]';

					create_shortcode += '[one_half_last]';
					create_shortcode += jQuery('#'+target+'_content_2').val();
					create_shortcode += '[/one_half_last]';
					break;

				case 'three_column_layout' :
					create_shortcode += '[one_third]';
					create_shortcode += jQuery('#'+target+'_content_1').val();
					create_shortcode += '[/one_third]';

					create_shortcode += '[one_third]';
					create_shortcode += jQuery('#'+target+'_content_2').val();
					create_shortcode += '[/one_third]';

					create_shortcode += '[one_third_last]';
					create_shortcode += jQuery('#'+target+'_content_3').val();
					create_shortcode += '[/one_third_last]';
					break;

				case 'four_column_layout' :
					create_shortcode += '[one_fourth]';
					create_shortcode += jQuery('#'+target+'_content_1').val();
					create_shortcode += '[/one_fourth]';

					create_shortcode += '[one_fourth]';
					create_shortcode += jQuery('#'+target+'_content_2').val();
					create_shortcode += '[/one_fourth]';

					create_shortcode += '[one_fourth]';
					create_shortcode += jQuery('#'+target+'_content_3').val();
					create_shortcode += '[/one_fourth]';

					create_shortcode += '[one_fourth_last]';
					create_shortcode += jQuery('#'+target+'_content_4').val();
					create_shortcode += '[/one_fourth_last]';
					break;

				case 'five_column_layout' :
					create_shortcode += '[one_fifth]';
					create_shortcode += jQuery('#'+target+'_content_1').val();
					create_shortcode += '[/one_fifth]';

					create_shortcode += '[one_fifth]';
					create_shortcode += jQuery('#'+target+'_content_2').val();
					create_shortcode += '[/one_fifth]';
					
					create_shortcode += '[one_fifth]';
					create_shortcode += jQuery('#'+target+'_content_3').val();
					create_shortcode += '[/one_fifth]';

					create_shortcode += '[one_fifth]';
					create_shortcode += jQuery('#'+target+'_content_4').val();
					create_shortcode += '[/one_fifth]';

					create_shortcode += '[one_fifth_last]';
					create_shortcode += jQuery('#'+target+'_content_5').val();
					create_shortcode += '[/one_fifth_last]';
					break;

				case 'six_column_layout' :
					create_shortcode += '[one_sixth]';
					create_shortcode += jQuery('#'+target+'_content_1').val();
					create_shortcode += '[/one_sixth]';

					create_shortcode += '[one_sixth]';
					create_shortcode += jQuery('#'+target+'_content_2').val();
					create_shortcode += '[/one_sixth]';
					
					create_shortcode += '[one_sixth]';
					create_shortcode += jQuery('#'+target+'_content_3').val();
					create_shortcode += '[/one_sixth]';

					create_shortcode += '[one_sixth]';
					create_shortcode += jQuery('#'+target+'_content_4').val();
					create_shortcode += '[/one_sixth]';

					create_shortcode += '[one_sixth]';
					create_shortcode += jQuery('#'+target+'_content_5').val();
					create_shortcode += '[/one_sixth]';

					create_shortcode += '[one_sixth_last]';
					create_shortcode += jQuery('#'+target+'_content_6').val();
					create_shortcode += '[/one_sixth_last]';
					break;

				case 'six_column_layout' :
					create_shortcode += '[one_sixth]';
					create_shortcode += jQuery('#'+target+'_content_1').val();
					create_shortcode += '[/one_sixth]';

					create_shortcode += '[one_sixth]';
					create_shortcode += jQuery('#'+target+'_content_2').val();
					create_shortcode += '[/one_sixth]';
					
					create_shortcode += '[one_sixth]';
					create_shortcode += jQuery('#'+target+'_content_3').val();
					create_shortcode += '[/one_sixth]';

					create_shortcode += '[one_sixth]';
					create_shortcode += jQuery('#'+target+'_content_4').val();
					create_shortcode += '[/one_sixth]';

					create_shortcode += '[one_sixth]';
					create_shortcode += jQuery('#'+target+'_content_5').val();
					create_shortcode += '[/one_sixth]';

					create_shortcode += '[one_sixth_last]';
					create_shortcode += jQuery('#'+target+'_content_6').val();
					create_shortcode += '[/one_sixth_last]';
					break;

				case 'one_third_two_third_layout' :
					create_shortcode += '[one_third]';
					create_shortcode += jQuery('#'+target+'_content_1').val();
					create_shortcode += '[/one_third]';

					create_shortcode += '[two_third_last]';
					create_shortcode += jQuery('#'+target+'_content_2').val();
					create_shortcode += '[/two_third_last]';

					break;

				case 'two_third_one_third_layout' :
					create_shortcode += '[two_third]';
					create_shortcode += jQuery('#'+target+'_content_1').val();
					create_shortcode += '[/two_third]';

					create_shortcode += '[one_third_last]';
					create_shortcode += jQuery('#'+target+'_content_2').val();
					create_shortcode += '[/one_third_last]';

					break;

				case 'one_fourth_three_fourth_layout' :
					create_shortcode += '[one_fourth]';
					create_shortcode += jQuery('#'+target+'_content_1').val();
					create_shortcode += '[/one_fourth]';

					create_shortcode += '[three_fourth_last]';
					create_shortcode += jQuery('#'+target+'_content_2').val();
					create_shortcode += '[/three_fourth_last]';

					break;

				case 'three_fourth_one_fourth_layout' :
					create_shortcode += '[three_fourth]';
					create_shortcode += jQuery('#'+target+'_content_1').val();
					create_shortcode += '[/three_fourth]';

					create_shortcode += '[one_fourth_last]';
					create_shortcode += jQuery('#'+target+'_content_2').val();
					create_shortcode += '[/one_fourth_last]';

					break;

				case 'one_fourth_one_fourth_one_half_layout' :
					create_shortcode += '[one_fourth]';
					create_shortcode += jQuery('#'+target+'_content_1').val();
					create_shortcode += '[/one_fourth]';

					create_shortcode += '[one_fourth]';
					create_shortcode += jQuery('#'+target+'_content_2').val();
					create_shortcode += '[/one_fourth]';

					create_shortcode += '[one_half_last]';
					create_shortcode += jQuery('#'+target+'_content_3').val();
					create_shortcode += '[/one_half_last]';

					break;

				case 'one_fourth_one_half_one_fourth_layout' :
					create_shortcode += '[one_fourth]';
					create_shortcode += jQuery('#'+target+'_content_1').val();
					create_shortcode += '[/one_fourth]';

					create_shortcode += '[one_half]';
					create_shortcode += jQuery('#'+target+'_content_2').val();
					create_shortcode += '[/one_half]';

					create_shortcode += '[one_fourth_last]';
					create_shortcode += jQuery('#'+target+'_content_3').val();
					create_shortcode += '[/one_fourth_last]';

					break;

				case 'one_half_one_fourth_one_fourth_layout' :
					create_shortcode += '[one_half]';
					create_shortcode += jQuery('#'+target+'_content_1').val();
					create_shortcode += '[/one_half]';

					create_shortcode += '[one_fourth]';
					create_shortcode += jQuery('#'+target+'_content_2').val();
					create_shortcode += '[/one_fourth]';

					create_shortcode += '[one_fourth_last]';
					create_shortcode += jQuery('#'+target+'_content_3').val();
					create_shortcode += '[/one_fourth_last]';

					break;

				case 'four_fifth_one_fifth_layout' :
					create_shortcode += '[four_fifth]';
					create_shortcode += jQuery('#'+target+'_content_1').val();
					create_shortcode += '[/four_fifth]';

					create_shortcode += '[one_fifth_last]';
					create_shortcode += jQuery('#'+target+'_content_2').val();
					create_shortcode += '[/one_fifth_last]';

					break;

				case 'one_fifth_four_fifth_layout' :
					create_shortcode += '[one_fifth]';
					create_shortcode += jQuery('#'+target+'_content_1').val();
					create_shortcode += '[/one_fifth]';

					create_shortcode += '[four_fifth_last]';
					create_shortcode += jQuery('#'+target+'_content_2').val();
					create_shortcode += '[/four_fifth_last]';

					break;

				case 'two_fifth_three_fifth_layout' :
					create_shortcode += '[two_fifth]';
					create_shortcode += jQuery('#'+target+'_content_1').val();
					create_shortcode += '[/two_fifth]';

					create_shortcode += '[three_fifth_last]';
					create_shortcode += jQuery('#'+target+'_content_2').val();
					create_shortcode += '[/three_fifth_last]';

					break;

				case 'one_sixth_five_sixth_layout' :
					create_shortcode += '[one_sixth]';
					create_shortcode += jQuery('#'+target+'_content_1').val();
					create_shortcode += '[/one_sixth]';

					create_shortcode += '[five_sixth_last]';
					create_shortcode += jQuery('#'+target+'_content_2').val();
					create_shortcode += '[/five_sixth_last]';

					break;

				case 'five_sixth_one_sixth_layout' :
					create_shortcode += '[five_sixth]';
					create_shortcode += jQuery('#'+target+'_content_1').val();
					create_shortcode += '[/five_sixth]';

					create_shortcode += '[one_sixth_last]';
					create_shortcode += jQuery('#'+target+'_content_2').val();
					create_shortcode += '[/one_sixth_last]';

					break;

				case 'one_sixth_one_sixth_one_sixth_one_half_layout' :
					create_shortcode += '[one_sixth]';
					create_shortcode += jQuery('#'+target+'_content_1').val();
					create_shortcode += '[/one_sixth]';

					create_shortcode += '[one_sixth]';
					create_shortcode += jQuery('#'+target+'_content_2').val();
					create_shortcode += '[/one_sixth]';

					create_shortcode += '[one_sixth]';
					create_shortcode += jQuery('#'+target+'_content_3').val();
					create_shortcode += '[/one_sixth]';

					create_shortcode += '[one_half_last]';
					create_shortcode += jQuery('#'+target+'_content_4').val();
					create_shortcode += '[/one_half_last]';

					break;

				//	All simple shortcodes are generated here
				//	i.e. shortcode, attributes and single content
				default :
		  		create_shortcode+= '['+target;
		  		
		  		if(jQuery('#'+target+'_attr_wrapper .attr').length > 0) {
		  			jQuery('#'+target+'_attr_wrapper .attr').each(function() {
		  					if( jQuery(this).attr('name') != undefined ) {
		  						create_shortcode+= ' '+jQuery(this).attr('name')+'="'+jQuery(this).val()+'"';	
		  					}
		  					console.log(jQuery(this).attr('name'));
							
						});
					}
					create_shortcode+= ']';
					if(jQuery('#'+target+'_content').length > 0) {
	  				create_shortcode+= jQuery('#'+target+'_content').val()+'[/'+target+']';
	  				create_shortcode+= '\n';
	  			}
			}		
  		
  		jQuery('#'+target+'_code').val(create_shortcode);
		});

		// When clicked on shortcode field, select it to copy.
		jQuery('.code_area').click(function() { 
			document.getElementById(jQuery(this).attr('id')).focus();
			document.getElementById(jQuery(this).attr('id')).select();
		});

		// Insert shortcode into TinyMCE editor
		jQuery(".insert_shortcode_button").click(function() { 
			var target = jQuery(this).attr('id')
			var current_code = jQuery('#'+target+'_code').val();
			tinyMCE.activeEditor.selection.setContent(nl2br(current_code));
		});

		function format(icon) {
		    var originalOption = icon.element;
		    return '<i class="fa ' + jQuery(originalOption).data('icon') + '"></i> &nbsp;' + icon.text;
		}
		jQuery('#icon_select').select2({
	    width: "100%",
	    formatResult: format
		});

	});

	</script>

	<div class="webulous_shortcode_widget">
	<?php if(!empty($shortcodes)) : ?>
		<p>Select short code from dropdown, enter option values and click "Create Shortcode".</p>
		<p>Full list of <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">Icons</a></p>
		<select id="webulous_shortcode_select" class="widefat">
			<option value="">None</option>			

		<?php foreach($shortcodes as $shortcode_name => $shortcode) : ?>
			<option value="<?php echo $shortcode_name; ?>"><?php echo ucwords(str_replace('_', ' ', $shortcode_name)); ?></option>	
		<?php endforeach; ?>
		</select>

		
	<?php 
			foreach($shortcodes as $shortcode_name => $shortcode) :
	?>
		<div id="div_<?php echo $shortcode_name; ?>" class="sc_field_wrapper">
			<div class="sc_fields">
		<?php
			if( isset( $shortcode['attr']['content_repeat'] ) && $shortcode['attr']['content_repeat'] ) :
		?>
				<label for="content_repeat">No. of Content Fields (should be number value)</label>
				<input type="text" class="content_repeat" name="<?php echo $shortcode_name; ?>" value="<?php echo $shortcode['values']['content_repeat']; ?>" />
		<?php
			endif;

				if(isset($shortcode['attr']) && !empty($shortcode['attr'])) : ?>
					<div id="<?php echo $shortcode_name; ?>_attr_wrapper">

					<?php 
						foreach($shortcode['attr'] as $attr => $type) : 
							if($attr != 'content_repeat') : ?>
						<label for="<?php echo $shortcode_name; ?>"><?php echo $shortcode['desc'][$attr]; ?>:</label>
															
					<?php
						switch($type) :
							case 'text':
							
					?>
							<input type="text" id="<?php echo $shortcode_name; ?>_text" class="attr widefat" name="<?php echo $attr; ?>"/>
					<?php
							break;
									
							case 'select':
					?>
							<select id="<?php echo $shortcode_name; ?>_select" class="attr widefat" name="<?php echo $attr; ?>">
							<?php 
								if(isset($shortcode[$attr . '_options']) && !empty($shortcode[$attr . '_options'])) :
									foreach($shortcode[$attr . '_options'] as $select_key => $option) :
							?>
								<option value="<?php echo $select_key; ?>" 
								<?php if($shortcode_name == 'icon') {
									echo 'data-icon="' . $select_key .'"';
								}
								?>
								><?php echo $option; ?></option>
							<?php	
									endforeach;
								endif;
							?>							
										
							</select>
								
					<?php
							break;
						endswitch;
						endif;
					endforeach;
					?>
					
							</div>
					
					<?php
						endif;
					if( isset( $shortcode['values']['content_repeat'] ) && !empty( $shortcode['values']['content_repeat'] ) ) :
					?>
					<div id="<?php echo $shortcode_name; ?>_content_wrapper">
 					<?php for( $i=1; $i<=$shortcode['values']['content_repeat']; $i++ ) : ?>
						<div class="group">
						<?php if($shortcode_name == 'accordion' || $shortcode_name == 'tabs') : ?>
							<label for="<?php echo $shortcode_name; ?>_content_title_<?php echo $i; ?>">Title #<?php echo $i; ?>:</label>
							<input type="text" id="<?php echo $shortcode_name; ?>_content_title_<?php echo $i; ?>" class="content_title widefat" value="" />
						<?php endif; ?>
							<label for="<?php echo $shortcode_name; ?>_content_<?php echo $i; ?>">Content #<?php echo $i; ?>:</label>
							<textarea class="widefat content" rows="3" id="<?php echo $shortcode_name; ?>_content_<?php echo $i; ?>"></textarea>
						</div>
					<?php endfor; ?>
					</div>
					<?php else : 
						if(isset($shortcode['content']) && $shortcode['content']) :
							if(isset($shortcode['content_text'])) :
								$content_text = $shortcode['content_text'];
							else :
								$content_text = 'Your Content';
							endif;
					?>

						<label for="<?php echo $shortcode_name; ?>"><?php echo $content_text; ?>:</label>
						<textarea id="<?php echo $shortcode_name; ?>_content"  rows="3" class="widefat"></textarea>
					<?php
						endif;
					endif; 
					?>
					
					<input type="button" id="<?php echo $shortcode_name; ?>" value="Create Shortcode" class="button shortcode_button"/>
					
					
					<label for="<?php echo $shortcode_name; ?>_code">Shortcode:</label>
					<textarea id="<?php echo $shortcode_name; ?>_code" rows="3" readonly="readonly" class="code_area widefat"></textarea>
					
					<input type="button" id="<?php echo $shortcode_name; ?>" value="Insert into Editor" class="button insert_shortcode_button"/>
					
					</div>
					
				</div>
		
		<?php
				endforeach;
			endif;
		?>
		
	</div>
<?php
 }