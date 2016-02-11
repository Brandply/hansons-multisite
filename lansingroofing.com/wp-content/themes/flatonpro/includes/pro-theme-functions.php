<?php
/**
 * @param $icon
 * @return string
 */
function webulous_icon_get_name($icon){
	$name = str_replace('fa-', '', $icon);
	$name = str_replace('-', ' ', $name);
	$name = ucwords($name);
	return $name;
}

$fa_icons = array(
		'fa-adjust' => 'fa-adjust',
		'fa-anchor' => 'fa-anchor',
		'fa-archive' => 'fa-archive',
		'fa-arrows' => 'fa-arrows',
		'fa-arrows-h' => 'fa-arrows-h',
		'fa-arrows-v' => 'fa-arrows-v',
		'fa-asterisk' => 'fa-asterisk',
		'fa-ban' => 'fa-ban',
		'fa-bar-chart-o' => 'fa-bar-chart-o',
		'fa-barcode' => 'fa-barcode',
		'fa-bars' => 'fa-bars',
		'fa-beer' => 'fa-beer',
		'fa-bell' => 'fa-bell',
		'fa-bell-o' => 'fa-bell-o',
		'fa-bolt' => 'fa-bolt',
		'fa-book' => 'fa-book',
		'fa-bookmark' => 'fa-bookmark',
		'fa-bookmark-o' => 'fa-bookmark-o',
		'fa-briefcase' => 'fa-briefcase',
		'fa-bug' => 'fa-bug',
		'fa-building-o' => 'fa-building-o',
		'fa-bullhorn' => 'fa-bullhorn',
		'fa-bullseye' => 'fa-bullseye',
		'fa-calendar' => 'fa-calendar',
		'fa-calendar-o' => 'fa-calendar-o',
		'fa-camera' => 'fa-camera',
		'fa-camera-retro' => 'fa-camera-retro',
		'fa-caret-square-o-down' => 'fa-caret-square-o-down',
		'fa-caret-square-o-left' => 'fa-caret-square-o-left',
		'fa-caret-square-o-right' => 'fa-caret-square-o-right',
		'fa-caret-square-o-up' => 'fa-caret-square-o-up',
		'fa-certificate' => 'fa-certificate',
		'fa-check' => 'fa-check',
		'fa-check-circle' => 'fa-check-circle',
		'fa-check-circle-o' => 'fa-check-circle-o',
		'fa-check-square' => 'fa-check-square',
		'fa-check-square-o' => 'fa-check-square-o',
		'fa-circle' => 'fa-circle',
		'fa-circle-o' => 'fa-circle-o',
		'fa-clock-o' => 'fa-clock-o',
		'fa-cloud' => 'fa-cloud',
		'fa-cloud-download' => 'fa-cloud-download',
		'fa-cloud-upload' => 'fa-cloud-upload',
		'fa-code' => 'fa-code',
		'fa-code-fork' => 'fa-code-fork',
		'fa-coffee' => 'fa-coffee',
		'fa-cog' => 'fa-cog',
		'fa-cogs' => 'fa-cogs',
		'fa-comment' => 'fa-comment',
		'fa-comment-o' => 'fa-comment-o',
		'fa-comments' => 'fa-comments',
		'fa-comments-o' => 'fa-comments-o',
		'fa-compass' => 'fa-compass',
		'fa-credit-card' => 'fa-credit-card',
		'fa-crop' => 'fa-crop',
		'fa-crosshairs' => 'fa-crosshairs',
		'fa-cutlery' => 'fa-cutlery',
		'fa-dashboard (alias)' => 'fa-dashboard (alias)',
		'fa-desktop' => 'fa-desktop',
		'fa-dot-circle-o' => 'fa-dot-circle-o',
		'fa-download' => 'fa-download',
		'fa-edit (alias)' => 'fa-edit (alias)',
		'fa-ellipsis-h' => 'fa-ellipsis-h',
		'fa-ellipsis-v' => 'fa-ellipsis-v',
		'fa-envelope' => 'fa-envelope',
		'fa-envelope-o' => 'fa-envelope-o',
		'fa-eraser' => 'fa-eraser',
		'fa-exchange' => 'fa-exchange',
		'fa-exclamation' => 'fa-exclamation',
		'fa-exclamation-circle' => 'fa-exclamation-circle',
		'fa-exclamation-triangle' => 'fa-exclamation-triangle',
		'fa-external-link' => 'fa-external-link',
		'fa-external-link-square' => 'fa-external-link-square',
		'fa-eye' => 'fa-eye',
		'fa-eye-slash' => 'fa-eye-slash',
		'fa-female' => 'fa-female',
		'fa-fighter-jet' => 'fa-fighter-jet',
		'fa-film' => 'fa-film',
		'fa-filter' => 'fa-filter',
		'fa-fire' => 'fa-fire',
		'fa-fire-extinguisher' => 'fa-fire-extinguisher',
		'fa-flag' => 'fa-flag',
		'fa-flag-checkered' => 'fa-flag-checkered',
		'fa-flag-o' => 'fa-flag-o',
		'fa-flash (alias)' => 'fa-flash (alias)',
		'fa-flask' => 'fa-flask',
		'fa-folder' => 'fa-folder',
		'fa-folder-o' => 'fa-folder-o',
		'fa-folder-open' => 'fa-folder-open',
		'fa-folder-open-o' => 'fa-folder-open-o',
		'fa-frown-o' => 'fa-frown-o',
		'fa-gamepad' => 'fa-gamepad',
		'fa-gavel' => 'fa-gavel',
		'fa-gear (alias)' => 'fa-gear (alias)',
		'fa-gears (alias)' => 'fa-gears (alias)',
		'fa-gift' => 'fa-gift',
		'fa-glass' => 'fa-glass',
		'fa-globe' => 'fa-globe',
		'fa-group (alias)' => 'fa-group (alias)',
		'fa-hdd-o' => 'fa-hdd-o',
		'fa-headphones' => 'fa-headphones',
		'fa-heart' => 'fa-heart',
		'fa-heart-o' => 'fa-heart-o',
		'fa-home' => 'fa-home',
		'fa-inbox' => 'fa-inbox',
		'fa-info' => 'fa-info',
		'fa-info-circle' => 'fa-info-circle',
		'fa-key' => 'fa-key',
		'fa-keyboard-o' => 'fa-keyboard-o',
		'fa-laptop' => 'fa-laptop',
		'fa-leaf' => 'fa-leaf',
		'fa-legal (alias)' => 'fa-legal (alias)',
		'fa-lemon-o' => 'fa-lemon-o',
		'fa-level-down' => 'fa-level-down',
		'fa-level-up' => 'fa-level-up',
		'fa-lightbulb-o' => 'fa-lightbulb-o',
		'fa-location-arrow' => 'fa-location-arrow',
		'fa-lock' => 'fa-lock',
		'fa-magic' => 'fa-magic',
		'fa-magnet' => 'fa-magnet',
		'fa-mail-forward (alias)' => 'fa-mail-forward (alias)',
		'fa-mail-reply (alias)' => 'fa-mail-reply (alias)',
		'fa-mail-reply-all' => 'fa-mail-reply-all',
		'fa-male' => 'fa-male',
		'fa-map-marker' => 'fa-map-marker',
		'fa-meh-o' => 'fa-meh-o',
		'fa-microphone' => 'fa-microphone',
		'fa-microphone-slash' => 'fa-microphone-slash',
		'fa-minus' => 'fa-minus',
		'fa-minus-circle' => 'fa-minus-circle',
		'fa-minus-square' => 'fa-minus-square',
		'fa-minus-square-o' => 'fa-minus-square-o',
		'fa-mobile' => 'fa-mobile',
		'fa-mobile-phone (alias)' => 'fa-mobile-phone (alias)',
		'fa-money' => 'fa-money',
		'fa-moon-o' => 'fa-moon-o',
		'fa-music' => 'fa-music',
		'fa-pencil' => 'fa-pencil',
		'fa-pencil-square' => 'fa-pencil-square',
		'fa-pencil-square-o' => 'fa-pencil-square-o',
		'fa-phone' => 'fa-phone',
		'fa-phone-square' => 'fa-phone-square',
		'fa-picture-o' => 'fa-picture-o',
		'fa-plane' => 'fa-plane',
		'fa-plus' => 'fa-plus',
		'fa-plus-circle' => 'fa-plus-circle',
		'fa-plus-square' => 'fa-plus-square',
		'fa-plus-square-o' => 'fa-plus-square-o',
		'fa-power-off' => 'fa-power-off',
		'fa-print' => 'fa-print',
		'fa-puzzle-piece' => 'fa-puzzle-piece',
		'fa-qrcode' => 'fa-qrcode',
		'fa-question' => 'fa-question',
		'fa-question-circle' => 'fa-question-circle',
		'fa-quote-left' => 'fa-quote-left',
		'fa-quote-right' => 'fa-quote-right',
		'fa-random' => 'fa-random',
		'fa-refresh' => 'fa-refresh',
		'fa-reply' => 'fa-reply',
		'fa-reply-all' => 'fa-reply-all',
		'fa-retweet' => 'fa-retweet',
		'fa-road' => 'fa-road',
		'fa-rocket' => 'fa-rocket',
		'fa-rss' => 'fa-rss',
		'fa-rss-square' => 'fa-rss-square',
		'fa-search' => 'fa-search',
		'fa-search-minus' => 'fa-search-minus',
		'fa-search-plus' => 'fa-search-plus',
		'fa-share' => 'fa-share',
		'fa-share-square' => 'fa-share-square',
		'fa-share-square-o' => 'fa-share-square-o',
		'fa-shield' => 'fa-shield',
		'fa-shopping-cart' => 'fa-shopping-cart',
		'fa-sign-in' => 'fa-sign-in',
		'fa-sign-out' => 'fa-sign-out',
		'fa-signal' => 'fa-signal',
		'fa-sitemap' => 'fa-sitemap',
		'fa-smile-o' => 'fa-smile-o',
		'fa-sort' => 'fa-sort',
		'fa-sort-alpha-asc' => 'fa-sort-alpha-asc',
		'fa-sort-alpha-desc' => 'fa-sort-alpha-desc',
		'fa-sort-amount-asc' => 'fa-sort-amount-asc',
		'fa-sort-amount-desc' => 'fa-sort-amount-desc',
		'fa-sort-asc' => 'fa-sort-asc',
		'fa-sort-desc' => 'fa-sort-desc',
		'fa-sort-down (alias)' => 'fa-sort-down (alias)',
		'fa-sort-numeric-asc' => 'fa-sort-numeric-asc',
		'fa-sort-numeric-desc' => 'fa-sort-numeric-desc',
		'fa-sort-up (alias)' => 'fa-sort-up (alias)',
		'fa-spinner' => 'fa-spinner',
		'fa-square' => 'fa-square',
		'fa-square-o' => 'fa-square-o',
		'fa-star' => 'fa-star',
		'fa-star-half' => 'fa-star-half',
		'fa-star-half-empty (alias)' => 'fa-star-half-empty (alias)',
		'fa-star-half-full (alias)' => 'fa-star-half-full (alias)',
		'fa-star-half-o' => 'fa-star-half-o',
		'fa-star-o' => 'fa-star-o',
		'fa-subscript' => 'fa-subscript',
		'fa-suitcase' => 'fa-suitcase',
		'fa-sun-o' => 'fa-sun-o',
		'fa-superscript' => 'fa-superscript',
		'fa-tablet' => 'fa-tablet',
		'fa-tachometer' => 'fa-tachometer',
		'fa-tag' => 'fa-tag',
		'fa-tags' => 'fa-tags',
		'fa-tasks' => 'fa-tasks',
		'fa-terminal' => 'fa-terminal',
		'fa-thumb-tack' => 'fa-thumb-tack',
		'fa-thumbs-down' => 'fa-thumbs-down',
		'fa-thumbs-o-down' => 'fa-thumbs-o-down',
		'fa-thumbs-o-up' => 'fa-thumbs-o-up',
		'fa-thumbs-up' => 'fa-thumbs-up',
		'fa-ticket' => 'fa-ticket',
		'fa-times' => 'fa-times',
		'fa-times-circle' => 'fa-times-circle',
		'fa-times-circle-o' => 'fa-times-circle-o',
		'fa-tint' => 'fa-tint',
		'fa-toggle-down (alias)' => 'fa-toggle-down (alias)',
		'fa-toggle-left (alias)' => 'fa-toggle-left (alias)',
		'fa-toggle-right (alias)' => 'fa-toggle-right (alias)',
		'fa-toggle-up (alias)' => 'fa-toggle-up (alias)',
		'fa-trash-o' => 'fa-trash-o',
		'fa-trophy' => 'fa-trophy',
		'fa-truck' => 'fa-truck',
		'fa-umbrella' => 'fa-umbrella',
		'fa-unlock' => 'fa-unlock',
		'fa-unlock-alt' => 'fa-unlock-alt',
		'fa-unsorted (alias)' => 'fa-unsorted (alias)',
		'fa-upload' => 'fa-upload',
		'fa-user' => 'fa-user',
		'fa-users' => 'fa-users',
		'fa-video-camera' => 'fa-video-camera',
		'fa-volume-down' => 'fa-volume-down',
		'fa-volume-off' => 'fa-volume-off',
		'fa-volume-up' => 'fa-volume-up',
		'fa-warning (alias)' => 'fa-warning (alias)',
		'fa-wheelchair' => 'fa-wheelchair',
		'fa-wrench' => 'fa-wrench',
		'fa-check-square' => 'fa-check-square',
		'fa-check-square-o' => 'fa-check-square-o',
		'fa-circle' => 'fa-circle',
		'fa-circle-o' => 'fa-circle-o',
		'fa-dot-circle-o' => 'fa-dot-circle-o',
		'fa-minus-square' => 'fa-minus-square',
		'fa-minus-square-o' => 'fa-minus-square-o',
		'fa-plus-square' => 'fa-plus-square',
		'fa-plus-square-o' => 'fa-plus-square-o',
		'fa-square' => 'fa-square',
		'fa-square-o' => 'fa-square-o',	
		'fa-bitcoin (alias)' => 'fa-bitcoin (alias)',
		'fa-btc' => 'fa-btc',
		'fa-cny (alias)' => 'fa-cny (alias)',
		'fa-dollar (alias)' => 'fa-dollar (alias)',
		'fa-eur' => 'fa-eur',
		'fa-euro (alias)' => 'fa-euro (alias)',
		'fa-gbp' => 'fa-gbp',
		'fa-inr' => 'fa-inr',
		'fa-jpy' => 'fa-jpy',
		'fa-krw' => 'fa-krw',
		'fa-money' => 'fa-money',
		'fa-rmb (alias)' => 'fa-rmb (alias)',
		'fa-rouble (alias)' => 'fa-rouble (alias)',
		'fa-rub' => 'fa-rub',
		'fa-ruble (alias)' => 'fa-ruble (alias)',
		'fa-rupee (alias)' => 'fa-rupee (alias)',
		'fa-try' => 'fa-try',
		'fa-turkish-lira (alias)' => 'fa-turkish-lira (alias)',
		'fa-usd' => 'fa-usd',
		'fa-won (alias)' => 'fa-won (alias)',
		'fa-yen (alias)' => 'fa-yen (alias)',	
		'fa-align-center' => 'fa-align-center',
		'fa-align-justify' => 'fa-align-justify',
		'fa-align-left' => 'fa-align-left',
		'fa-align-right' => 'fa-align-right',
		'fa-bold' => 'fa-bold',
		'fa-chain (alias)' => 'fa-chain (alias)',
		'fa-chain-broken' => 'fa-chain-broken',
		'fa-clipboard' => 'fa-clipboard',
		'fa-columns' => 'fa-columns',
		'fa-copy (alias)' => 'fa-copy (alias)',
		'fa-cut (alias)' => 'fa-cut (alias)',
		'fa-dedent (alias)' => 'fa-dedent (alias)',
		'fa-eraser' => 'fa-eraser',
		'fa-file' => 'fa-file',
		'fa-file-o' => 'fa-file-o',
		'fa-file-text' => 'fa-file-text',
		'fa-file-text-o' => 'fa-file-text-o',
		'fa-files-o' => 'fa-files-o',
		'fa-floppy-o' => 'fa-floppy-o',
		'fa-font' => 'fa-font',
		'fa-indent' => 'fa-indent',
		'fa-italic' => 'fa-italic',
		'fa-link' => 'fa-link',
		'fa-list' => 'fa-list',
		'fa-list-alt' => 'fa-list-alt',
		'fa-list-ol' => 'fa-list-ol',
		'fa-list-ul' => 'fa-list-ul',
		'fa-outdent' => 'fa-outdent',
		'fa-paperclip' => 'fa-paperclip',
		'fa-paste (alias)' => 'fa-paste (alias)',
		'fa-repeat' => 'fa-repeat',
		'fa-rotate-left (alias)' => 'fa-rotate-left (alias)',
		'fa-rotate-right (alias)' => 'fa-rotate-right (alias)',
		'fa-save (alias)' => 'fa-save (alias)',
		'fa-scissors' => 'fa-scissors',
		'fa-strikethrough' => 'fa-strikethrough',
		'fa-table' => 'fa-table',
		'fa-text-height' => 'fa-text-height',
		'fa-text-width' => 'fa-text-width',
		'fa-th' => 'fa-th',
		'fa-th-large' => 'fa-th-large',
		'fa-th-list' => 'fa-th-list',
		'fa-underline' => 'fa-underline',
		'fa-undo' => 'fa-undo',
		'fa-unlink (alias)' => 'fa-unlink (alias)',
		'fa-angle-double-down' => 'fa-angle-double-down',
		'fa-angle-double-left' => 'fa-angle-double-left',
		'fa-angle-double-right' => 'fa-angle-double-right',
		'fa-angle-double-up' => 'fa-angle-double-up',
		'fa-angle-down' => 'fa-angle-down',
		'fa-angle-left' => 'fa-angle-left',
		'fa-angle-right' => 'fa-angle-right',
		'fa-angle-up' => 'fa-angle-up',
		'fa-arrow-circle-down' => 'fa-arrow-circle-down',
		'fa-arrow-circle-left' => 'fa-arrow-circle-left',
		'fa-arrow-circle-o-down' => 'fa-arrow-circle-o-down',
		'fa-arrow-circle-o-left' => 'fa-arrow-circle-o-left',
		'fa-arrow-circle-o-right' => 'fa-arrow-circle-o-right',
		'fa-arrow-circle-o-up' => 'fa-arrow-circle-o-up',
		'fa-arrow-circle-right' => 'fa-arrow-circle-right',
		'fa-arrow-circle-up' => 'fa-arrow-circle-up',
		'fa-arrow-down' => 'fa-arrow-down',
		'fa-arrow-left' => 'fa-arrow-left',
		'fa-arrow-right' => 'fa-arrow-right',
		'fa-arrow-up' => 'fa-arrow-up',
		'fa-arrows' => 'fa-arrows',
		'fa-arrows-alt' => 'fa-arrows-alt',
		'fa-arrows-h' => 'fa-arrows-h',
		'fa-arrows-v' => 'fa-arrows-v',
		'fa-caret-down' => 'fa-caret-down',
		'fa-caret-left' => 'fa-caret-left',
		'fa-caret-right' => 'fa-caret-right',
		'fa-caret-square-o-down' => 'fa-caret-square-o-down',
		'fa-caret-square-o-left' => 'fa-caret-square-o-left',
		'fa-caret-square-o-right' => 'fa-caret-square-o-right',
		'fa-caret-square-o-up' => 'fa-caret-square-o-up',
		'fa-caret-up' => 'fa-caret-up',
		'fa-chevron-circle-down' => 'fa-chevron-circle-down',
		'fa-chevron-circle-left' => 'fa-chevron-circle-left',
		'fa-chevron-circle-right' => 'fa-chevron-circle-right',
		'fa-chevron-circle-up' => 'fa-chevron-circle-up',
		'fa-chevron-down' => 'fa-chevron-down',
		'fa-chevron-left' => 'fa-chevron-left',
		'fa-chevron-right' => 'fa-chevron-right',
		'fa-chevron-up' => 'fa-chevron-up',
		'fa-hand-o-down' => 'fa-hand-o-down',
		'fa-hand-o-left' => 'fa-hand-o-left',
		'fa-hand-o-right' => 'fa-hand-o-right',
		'fa-hand-o-up' => 'fa-hand-o-up',
		'fa-long-arrow-down' => 'fa-long-arrow-down',
		'fa-long-arrow-left' => 'fa-long-arrow-left',
		'fa-long-arrow-right' => 'fa-long-arrow-right',
		'fa-long-arrow-up' => 'fa-long-arrow-up',
		'fa-toggle-down (alias)' => 'fa-toggle-down (alias)',
		'fa-toggle-left (alias)' => 'fa-toggle-left (alias)',
		'fa-toggle-right (alias)' => 'fa-toggle-right (alias)',
		'fa-toggle-up (alias)' => 'fa-toggle-up (alias)',
		'fa-arrows-alt' => 'fa-arrows-alt',
		'fa-backward' => 'fa-backward',
		'fa-compress' => 'fa-compress',
		'fa-eject' => 'fa-eject',
		'fa-expand' => 'fa-expand',
		'fa-fast-backward' => 'fa-fast-backward',
		'fa-fast-forward' => 'fa-fast-forward',
		'fa-forward' => 'fa-forward',
		'fa-pause' => 'fa-pause',
		'fa-play' => 'fa-play',
		'fa-play-circle' => 'fa-play-circle',
		'fa-play-circle-o' => 'fa-play-circle-o',
		'fa-step-backward' => 'fa-step-backward',
		'fa-step-forward' => 'fa-step-forward',
		'fa-stop' => 'fa-stop',
		'fa-youtube-play' => 'fa-youtube-play',
		'fa-adn' => 'fa-adn',
		'fa-android' => 'fa-android',
		'fa-apple' => 'fa-apple',
		'fa-bitbucket' => 'fa-bitbucket',
		'fa-bitbucket-square' => 'fa-bitbucket-square',
		'fa-bitcoin (alias)' => 'fa-bitcoin (alias)',
		'fa-btc' => 'fa-btc',
		'fa-css3' => 'fa-css3',
		'fa-dribbble' => 'fa-dribbble',
		'fa-dropbox' => 'fa-dropbox',
		'fa-facebook' => 'fa-facebook',
		'fa-facebook-square' => 'fa-facebook-square',
		'fa-flickr' => 'fa-flickr',
		'fa-foursquare' => 'fa-foursquare',
		'fa-github' => 'fa-github',
		'fa-github-alt' => 'fa-github-alt',
		'fa-github-square' => 'fa-github-square',
		'fa-gittip' => 'fa-gittip',
		'fa-google-plus' => 'fa-google-plus',
		'fa-google-plus-square' => 'fa-google-plus-square',
		'fa-html5' => 'fa-html5',
		'fa-instagram' => 'fa-instagram',
		'fa-linkedin' => 'fa-linkedin',
		'fa-linkedin-square' => 'fa-linkedin-square',
		'fa-linux' => 'fa-linux',
		'fa-maxcdn' => 'fa-maxcdn',
		'fa-pagelines' => 'fa-pagelines',
		'fa-pinterest' => 'fa-pinterest',
		'fa-pinterest-square' => 'fa-pinterest-square',
		'fa-renren' => 'fa-renren',
		'fa-skype' => 'fa-skype',
		'fa-stack-exchange' => 'fa-stack-exchange',
		'fa-stack-overflow' => 'fa-stack-overflow',
		'fa-trello' => 'fa-trello',
		'fa-tumblr' => 'fa-tumblr',
		'fa-tumblr-square' => 'fa-tumblr-square',
		'fa-twitter' => 'fa-twitter',
		'fa-twitter-square' => 'fa-twitter-square',
		'fa-vimeo-square' => 'fa-vimeo-square',
		'fa-vk' => 'fa-vk',
		'fa-weibo' => 'fa-weibo',
		'fa-windows' => 'fa-windows',
		'fa-xing' => 'fa-xing',
		'fa-xing-square' => 'fa-xing-square',
		'fa-youtube' => 'fa-youtube',
		'fa-youtube-play' => 'fa-youtube-play',
		'fa-youtube-square' => 'fa-youtube-square',
		'fa-ambulance' => 'fa-ambulance',
		'fa-h-square' => 'fa-h-square',
		'fa-hospital-o' => 'fa-hospital-o',
		'fa-medkit' => 'fa-medkit',
		'fa-plus-square' => 'fa-plus-square',
		'fa-stethoscope' => 'fa-stethoscope',
		'fa-user-md' => 'fa-user-md',
		'fa-wheelchair' => 'fa-wheelchair',
);

add_image_size( 'recent-work', 290 , 250, array( 'left', 'top' ) );
add_image_size( 'portfolio1col', 1200 , 450, array( 'left', 'top' ) );
add_image_size( 'portfolio2col', 600 , 450, array( 'left', 'top' ) );
add_image_size( 'portfolio2colsidebar', 372 , 248, array( 'left', 'top' ) );
add_image_size( 'portfolio3col', 400 , 272, array( 'left', 'top' ) );
add_image_size( 'portfolio4col', 300 , 200, array( 'left', 'top' ) );
add_image_size( 'about', 450 , 250, array( 'left', 'top' ) );
add_image_size( 'team', 250 , 250, array( 'left', 'top' ) );
add_image_size( 'blog-large', 800 , 300, array( 'left', 'top' ) );
add_image_size( 'blog-full-width', 1200 , 350, array( 'left', 'top' ) );

	function webulous_content_limit( $limit = 0 ) {
		
		global $webulous_options;
		$excerpt_length = isset( $webulous_options['excerpt-length'] ) ? $webulous_options['excerpt-length'] : 0;
		$limit = ($limit != 0) ? $limit : $excerpt_length;
		if( $excerpt_length == 0 ) {
			global $more;
			$more = 0;
			$content = apply_filters( 'the_content', get_the_content('Read More') );
			$content = str_replace( ']]>', ']]&gt;', $content );			
			return $content;
		}

		$content = explode(' ', get_the_content(), $limit);
		if (count($content)>=$limit) {
			array_pop($content);
			$content = implode(" ",$content) . '...'; //.' &#91;...&#93;';
		} else {
			$content = implode(" ",$content);
		}	
		$content = preg_replace('/\[.+\]/','', $content);
		$content = apply_filters('the_content', $content); 
		$content = str_replace(']]>', ']]&gt;', $content);
		$content = strip_shortcodes( strip_tags( $content ) );
		return $content;
	}

	// Related Posts Function (call using webulous_related_posts(); ) /NecessarY/ May be write a shortcode?
	function webulous_related_posts() {
		echo '<ul id="webulous-related-posts">';
		global $post;
		$tags = wp_get_post_tags($post->ID);
		$tag_arr = '';
		if($tags) {
			foreach($tags as $tag) { $tag_arr .= $tag->slug . ','; }
	        $args = array(
	        	'tag' => $tag_arr,
	        	'numberposts' => 5, /* you can change this to show more */
	        	'post__not_in' => array($post->ID)
	     	);
	        $related_posts = get_posts($args);
	        if($related_posts) {
	        	foreach ($related_posts as $post) : setup_postdata($post); ?>
		           	<li class="related_post">
		           		<a class="entry-unrelated" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('recent-work'); ?></a>
		           		<a class="entry-unrelated" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
		           	</li>
		        <?php endforeach; }
		    else { ?>
	            <?php echo '<li class="no_related_post">' . __( 'No Related Posts Yet!', 'flatonpro' ) . '</li>'; ?>
			<?php }
		}
		wp_reset_query();
		echo '<li class="no_related_post">' . __( 'No Related Posts Yet!', 'flatonpro' ) . '</li>';
		echo '</ul>';
	}