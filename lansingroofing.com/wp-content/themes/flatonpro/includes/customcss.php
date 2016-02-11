<?php
function webulous_styles_custom() {
	global $webulous_options; 
	$primary_color = isset($webulous_options['primary_color']) ? $webulous_options['primary_color'] : '';
	$secondary_color = isset($webulous_options['secondary_color']) ? $webulous_options['secondary_color'] : '';
	if( isset($webulous_options['custom-typography']) && $webulous_options['custom-typography'] ) : ?>

<!-- Custom CSS Codes
========================================================= -->
<style type="text/css" media="screen">   
	<?php
		$custom_fonts = array();
		if( $webulous_options['bd-typography']['google'] ) :
			if( ! in_array( $webulous_options['bd-typography']['font-family'], $custom_fonts ) ) :
				$custom_fonts[] = $webulous_options['bd-typography']['font-family'];
			endif;
			if( ! in_array( $webulous_options['nav-typography']['font-family'], $custom_fonts ) ) :
				$custom_fonts[] = $webulous_options['nav-typography']['font-family'];
			endif;
			if( ! in_array( $webulous_options['h1-typography']['font-family'], $custom_fonts ) ) :
				$custom_fonts[] = $webulous_options['h1-typography']['font-family'];
			endif;
			if( ! in_array( $webulous_options['h2-typography']['font-family'], $custom_fonts ) ) :
				$custom_fonts[] = $webulous_options['h2-typography']['font-family'];
			endif;
			if( ! in_array( $webulous_options['h3-typography']['font-family'], $custom_fonts ) ) :
				$custom_fonts[] = $webulous_options['h3-typography']['font-family'];
			endif;
			if( ! in_array( $webulous_options['h4-typography']['font-family'], $custom_fonts ) ) :
				$custom_fonts[] = $webulous_options['h4-typography']['font-family'];
			endif;
			if( ! in_array( $webulous_options['h5-typography']['font-family'], $custom_fonts ) ) :
				$custom_fonts[] = $webulous_options['h5-typography']['font-family'];
			endif;
			if( ! in_array( $webulous_options['h6-typography']['font-family'], $custom_fonts ) ) :
				$custom_fonts[] = $webulous_options['h6-typography']['font-family'];
			endif;
		endif;
	?>

	body{ font-family: "<?php echo $webulous_options['bd-typography']['font-family']; ?>", sans-serif; font-size: <?php echo $webulous_options['bd-typography']['font-size']; ?>; font-weight: <?php echo $webulous_options['bd-typography']['font-weight']; ?>; color: <?php echo $webulous_options['bd-typography']['color']; ?>; }
	.main-navigation ul { font-family: "<?php echo $webulous_options['nav-typography']['font-family']; ?>", sans-serif; font-size: <?php echo $webulous_options['nav-typography']['font-size']; ?>; font-weight: <?php echo $webulous_options['nav-typography']['font-weight']; ?>; color: <?php echo $webulous_options['nav-typography']['color']; ?>; }
	.main-navigation ul a { color: <?php echo $webulous_options['nav-typography']['color']; ?>; }
	h1{ font-family: "<?php echo $webulous_options['h1-typography']['font-family']; ?>", sans-serif; font-size: <?php echo $webulous_options['h1-typography']['font-size']; ?>; font-weight: <?php echo $webulous_options['h1-typography']['font-weight']; ?>; color: <?php echo $webulous_options['h1-typography']['color']; ?>; }
	h2{ font-family: "<?php echo $webulous_options['h2-typography']['font-family']; ?>", sans-serif; font-size: <?php echo $webulous_options['h2-typography']['font-size']; ?>; font-weight: <?php echo $webulous_options['h2-typography']['font-weight']; ?>; color: <?php echo $webulous_options['h2-typography']['color']; ?>; }
	h3{ font-family: "<?php echo $webulous_options['h3-typography']['font-family']; ?>", sans-serif; font-size: <?php echo $webulous_options['h3-typography']['font-size']; ?>; font-weight: <?php echo $webulous_options['h3-typography']['font-weight']; ?>; color: <?php echo $webulous_options['h3-typography']['color']; ?>; }
	h4{ font-family: "<?php echo $webulous_options['h4-typography']['font-family']; ?>", sans-serif; font-size: <?php echo $webulous_options['h4-typography']['font-size']; ?>; font-weight: <?php echo $webulous_options['h4-typography']['font-weight']; ?>; color: <?php echo $webulous_options['h4-typography']['color']; ?>; }
	h5{ font-family: "<?php echo $webulous_options['h5-typography']['font-family']; ?>", sans-serif; font-size: <?php echo $webulous_options['h5-typography']['font-size']; ?>; font-weight: <?php echo $webulous_options['h5-typography']['font-weight']; ?>; color: <?php echo $webulous_options['h5-typography']['color']; ?>; }
	h6{ font-family: "<?php echo $webulous_options['h6-typography']['font-family']; ?>", sans-serif; font-size: <?php echo $webulous_options['h6-typography']['font-size']; ?>; font-weight: <?php echo $webulous_options['h6-typography']['font-weight']; ?>; color: <?php echo $webulous_options['h6-typography']['color']; ?>; }
	a, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .widget a, h1 a:visited, h2 a:visited, h3 a:visited, h4 a:visited, h5 a:visited, h6 a:visited, .widget a:visited { font-weight: inherit; color: <?php echo $webulous_options['opt-link-color']['regular']; ?>; }
	h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover, 
	a:hover, a:hover h1, a:hover h2, a:hover h3, a:hover h4, a:hover h5, a:hover h6, .widget a:hover { color: <?php echo $webulous_options['opt-link-color']['hover']; ?>; }
	
/* custon css */

.woocommerce ul.products li.product .price,  
.woocommerce-page ul.products li.product .price,
.woocommerce #content div.product p.price,.pullright::before, .pullleft::before,
.woocommerce #content div.product span.price,.dropcap,.pullnone:before,
.woocommerce div.product p.price,.site-footer .widget-title,
.woocommerce div.product span.price,.ei-title h3,.toggle-polygon .toggle-title:hover,
.woocommerce-page #content div.product p.price,.site-footer a:hover,
.woocommerce-page #content div.product span.price,.site-title a:hover,
.woocommerce-page div.product p.price,.site-footer .widget_calendar th, .site-footer .widget_archive li a:hover,
.site-footer .widget_categories li a:hover,.footer-bottom a,.widget.widget_skill-widget .skill-container .fa-stack,.widget.widget_skill-widget .skill-container .skill .skill-content .txt-count,
.site-footer .widget_pages li a:hover,blockquote:before,.site-footer .dropcap,.dropcap-book,
.site-footer .widget_nav_menu li a:hover,ol.comment-list .comment-metadata a:hover,ol.comment-list .comment-author cite a:hover,
.woocommerce-page div.product span.price,.required,.error-404.not-found h1 span,.site-footer .widget_testimonial-widget p.client,.widget a:hover,#secondary .widget ul li a:hover,#secondary .widget_calendar caption,.widget_rss ul li .rss-date
  	{
			color: <?php echo $primary_color; ?>; 
	}
		
table td#today,button:hover,.site-footer .widget_tag_cloud a:hover,.ui-accordion .ui-accordion-header-active,.widget_recent-work-widget .recent_work_overlay .fa,
input[type="button"]:hover,.site-footer .widget_search input[type="submit"],
input[type="reset"]:hover,.site-footer input[type="submit"],ul.filter-options li a:hover,
input[type="submit"]:hover,.ui-accordion h3 span.fa,
.woocommerce #content input.button,.footer-bottom ul.menu li a:hover,
.footer-bottom ul.menu li.current_page_item a,.withtip:before,
.woocommerce #respond input#submit,.site-footer a.more-button,.site-footer .flex-direction-nav a.flex-next:hover,.site-footer .flex-direction-nav a.flex-prev:hover,
.woocommerce a.button,
.woocommerce button.button,.widget_tag_cloud a:hover,
.woocommerce input.button,
.woocommerce-page #content input.button,.widget_text .textwidget p.btn-more a:hover,
.woocommerce-page #respond input#submit,
.woocommerce-page a.button,.main-navigation li:hover > a,
.woocommerce-page button.button,
.woocommerce-page input.button,.woocommerce #content table.cart a.remove:hover,
.woocommerce table.cart a.remove:hover,.breadcrumb-wrap,.icon-polygon a.more-button,.callout-widget a,
.woocommerce-page #content table.cart a.remove:hover,
.woocommerce-page table.cart a.remove:hover,.woocommerce #content nav.woocommerce-pagination ul li a,
.woocommerce #content nav.woocommerce-pagination ul li span,.widget_testimonial-widget ul li .client-pic img,
.woocommerce nav.woocommerce-pagination ul li a,
.woocommerce nav.woocommerce-pagination ul li span,.main-navigation .current_page_item a,
.main-navigation .current-menu-item a,.dropcap-circle,
.dropcap-box,.toggle .toggle-title .icn,.toggle .toggle-title:hover,.widget_testimonial-widget ul li p.client strong,
.main-navigation .current-menu-parent > a,.main-navigation .current_page_parent > a,.comment-navigation .nav-previous a:hover,
.paging-navigation .nav-previous a:hover,
.post-navigation .nav-previous a:hover, .comment-navigation .nav-next a:hover,.widget_social-networks-widget ul li a:hover,
.share-box ul li a:hover,
.paging-navigation .nav-next a:hover,.portfolio-excerpt a.btn-readmore:hover,.flex-direction-nav a.flex-next:hover,.flex-direction-nav a.flex-prev:hover,.flex-direction-nav a:hover,
.post-navigation .nav-next a:hover, .page-links a:hover, .entry-body .more-link:hover,
.page-navigation a:hover,.contactform .wpcf7-form p input[type="submit"],.widget_recent-posts-gallery-widget .recent-post,
.woocommerce-page #content nav.woocommerce-pagination ul li a,
.woocommerce-page #content nav.woocommerce-pagination ul li span,.circle-icon-box .circle-icon-wrapper h3.fa-stack,
.woocommerce-page nav.woocommerce-pagination ul li a,.widget_image-box-widget a.more-button,.flex-control-paging li a.flex-active,
.flex-control-paging li a:hover,p.btn-slider a,.ei-slider-thumbs li a,.tabs-container ul.tabs li a:hover,
.woocommerce-page nav.woocommerce-pagination ul li span,.woocommerce #content nav.woocommerce-pagination ul li,
.woocommerce #content nav.woocommerce-pagination ul,.woocommerce #content div.product .woocommerce-tabs ul.tabs li,
.woocommerce div.product .woocommerce-tabs ul.tabs li,.tabs-container ul.tabs li.ui-tabs-active a,.widget.widget_ourteam-widget .team-social ul li a,
.woocommerce-page #content div.product .woocommerce-tabs ul.tabs li,.circle-icon-box a.more-button:hover,
.woocommerce-page div.product .woocommerce-tabs ul.tabs li,.slicknav_menu,.top-features a.more-button,.woocommerce-page .woocommerce-breadcrumb,.widget_recent-posts-gallery-widget .recent-post:hover a img,.widget_recent-posts-gallery-widget .recent-post .post-title:before,.site-footer .circle-icon-box a.more-button:hover
		{
		 	background-color: <?php echo $primary_color; ?>; 
		}
		
button:focus,
input[type="button"]:focus,
input[type="reset"]:focus,
input[type="submit"]:focus,
button:active,
input[type="button"]:active,.gallery-item img,
input[type="reset"]:active,.error-404.not-found a.backtohome:hover,
input[type="submit"]:active,.contactform .wpcf7-form p input:focus,
.contactform .wpcf7-form p textarea:focus,.flex-control-paging li a,.icon-polygon .circle-icon-wrapper h3.fa-stack,
.icon-polygon .circle-icon-wrapper h3.fa-stack:before,
.icon-polygon .circle-icon-wrapper h3.fa-stack:after,.widget_image-box-widget .image-box img
		{
			border-color: <?php echo $primary_color?>;
		}


.sep:after,.withtip.top:after{
			border-top-color: <?php  echo $primary_color; ?>;
		}

.pullright,
.pullleft,.pullright:before,
.pullleft:before,.withtip.left:after,.icon-polygon .circle-icon-wrapper h3.fa-stack
		{
			border-left-color: <?php  echo $primary_color; ?>;
		}
.withtip.right:after,.icon-polygon .circle-icon-wrapper h3.fa-stack
		{
			border-right-color: <?php  echo $primary_color; ?>;
		}
.withtip.bottom:after
		{
			border-bottom-color: <?php  echo $primary_color; ?>;
		}

/* secondary color */	
.widget-title,.widget a,.icon-polygon .circle-icon-wrapper h3.fa-stack i,.callout-widget a:hover,.breadcrumb-wrap #breadcrumb a,.alert-message a:hover,.widget.widget_ourteam-widget .team-content p,.widget_text ul li,.site-title a,.footer-bottom a:hover,.footer-bottom ul.menu li a,.entry-meta a:hover,
.entry-footer a:hover,.site-footer a.more-button:hover,#portfolio h4 a:hover,
.woocommerce ul.products li.product .price,
.woocommerce-page ul.products li.product .price,
.woocommerce #content div.product p.price,
.woocommerce #content div.product span.price,
.woocommerce div.product p.price,
.woocommerce div.product span.price,
.woocommerce-page #content div.product p.price,
.woocommerce-page #content div.product span.price,
.woocommerce-page div.product p.price,
.woocommerce-page div.product span.price,.widget_recent-posts-gallery-widget h4,.toggle-polygon .toggle-title,ol.comment-list .comment-author cite a,.footer-bottom p,.site-footer .widget_social-networks-widget li a,.site-footer .widget_tag_cloud a
	{
<<<<<<< HEAD
		color: <?php echo $secondary_color; ?>; 
=======
		color: <?php echo $primary_color; ?>; 
>>>>>>> fa3317fa76958587c28c987f3641c5a560f5de81
	}
	

input[type="button"],.widget_text .textwidget p.btn-more a,.slicknav_menu li.current-menu-item a,
.slicknav_menu li a:hover,
.slicknav_menu .slicknav_row:hover,.slicknav_menu .slicknav_btn,
.slicknav_menu .slicknav_btn:hover,.top-features a.more-button:hover,.circle-icon-box a.more-button,.icon-polygon a.more-button:hover,
input[type="reset"],.flex-direction-nav a.flex-prev,p.btn-slider a:hover,.ei-slider-thumbs li.ei-slider-element,
.ei-slider-thumbs li a:hover,.toggle .toggle-title,.toggle .toggle-title:hover .icn,
.flex-direction-nav a.flex-next,.flex-direction-nav a.flex-next,.callout-widget,.widget_social-networks-widget ul li a,
.share-box ul li a,.single-portfolio .single-wrapper .one-third,
input[type="submit"],.nav-wrap,.main-navigation ul ul,.comment-navigation .nav-previous a,
.paging-navigation .nav-previous a,.site-footer .widget_search input[type="submit"]:hover,
.post-navigation .nav-previous a,.comment-navigation .nav-next a,.widget.widget_ourteam-widget .team-social ul li a:hover,.widget_recent-work-widget .recent_work_overlay .fa:hover,ul.filter-options li a,.portfolio-excerpt a.btn-readmore,
.paging-navigation .nav-next a,.site-footer input[type="submit"]:hover,.widget.widget_skill-widget .skill-container .skill .skill-percentage,
.post-navigation .nav-next a,.page-links a,.entry-body .more-link,.tabs-container ul.tabs li a,
.page-navigation a,.site-footer,.site-footer .widget_tag_cloud a,.footer-top,.contactform .wpcf7-form p input[type="submit"]:hover,.ui-accordion h3,
.woocommerce #content input.button,
.woocommerce #respond input#submit,
.woocommerce a.button,
.woocommerce button.button,
.woocommerce input.button,
.woocommerce-page #content input.button,
.woocommerce-page #respond input#submit,
.woocommerce-page a.button,
.woocommerce-page button.button,
.woocommerce-page input.button,.woocommerce #content input.button.alt,
.woocommerce #respond input#submit.alt,
.woocommerce a.button.alt,
.woocommerce button.button.alt,
.woocommerce input.button.alt,
.woocommerce-page #content input.button.alt,
.woocommerce-page #respond input#submit.alt,
.woocommerce-page a.button.alt,
.woocommerce-page button.button.alt,
.woocommerce-page input.button.alt,.woocommerce #content table.cart a.remove:hover,
.woocommerce table.cart a.remove:hover,
.woocommerce-page #content table.cart a.remove:hover,
.woocommerce-page table.cart a.remove:hover,.woocommerce #content nav.woocommerce-pagination ul li a,
.woocommerce #content nav.woocommerce-pagination ul li span,
.woocommerce nav.woocommerce-pagination ul li a,
.woocommerce nav.woocommerce-pagination ul li span,
.woocommerce-page #content nav.woocommerce-pagination ul li a,
.woocommerce-page #content nav.woocommerce-pagination ul li span,
.woocommerce-page nav.woocommerce-pagination ul li a,
.woocommerce-page nav.woocommerce-pagination ul li span,.woocommerce #content nav.woocommerce-pagination ul li,
.woocommerce #content nav.woocommerce-pagination ul,.woocommerce #content div.product .woocommerce-tabs ul.tabs li,
.woocommerce div.product .woocommerce-tabs ul.tabs li,
.woocommerce-page #content div.product .woocommerce-tabs ul.tabs li,
.woocommerce-page div.product .woocommerce-tabs ul.tabs li
	{
	 	background-color: <?php echo $secondary_color; ?>; 
	}
	

.widget_image-box-widget a.more-button:hover
	{
		border-color: <?php echo $secondary_color?>;
	}
abbr, acronym
	{
		border-bottom-color: <?php  echo $secondary_color; ?>;
	}


</style>

<?php 
	endif;
}
add_action( 'wp_head', 'webulous_styles_custom', 100 );