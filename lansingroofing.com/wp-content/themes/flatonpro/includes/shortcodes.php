<?php

	function webulous_remove_wpautop( $content ) { 
		$content = do_shortcode( shortcode_unautop( $content ) ); 
		$content = preg_replace('#^<\/p>|^<br \/>|<p>$#', '', $content);
		return $content;
	}

 	/*	Accordion */
 	function webulous_accordion_group( $atts, $content = null ) {

 		$output = '';
 		$output .= '<div class="accordion">';
 		$output .= do_shortcode( $content );
 		$output .= '</div>';
 		return $output;

 	}

	function webulous_accordion( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'title' => ''
		), $atts) );

		$output = '';
		$output .= '<h3>'.$title.'</h3>';
		$output .= '<div class="acc_content">';
		$output .= do_shortcode($content);
		$output .= '</div>';
		return $output;
		
	}

	/*	Alert   */
	function webulous_alert( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'type' 	=> 'warning',
			'close'	=> '1'
	  ), $atts ) );

		if(!$close) {
			$var1 = '<a class="alert-close" href="#">x</a>';
		} else {
			$var1 = '';
		}

		$output = '';
		$output .= '<div class="alert-message ' . $type . '">' . $var1;
		$output .= do_shortcode($content);
		$output .= '</div>';
    
		return $output; 
	}

	/*  Button  */
	function webulous_button( $atts, $content = null ) {
		extract(shortcode_atts(array(
	    'link'      => '#',
			'target'    => '_self',
			'color'     => 'btn',
	    'size'    	=> 'medium',
		), $atts));

		$output = '';
		$output .= '<a href="' . $link .'"';
		$output .= 'target="' . $target . '" ';
		$output .= 'class="btn ' . $color . ' ' . $size .'">';
		$output .= do_shortcode($content);
		$output .= '</a>';
		return $output;
	}

	/* Divider */
	function webulous_divider( $atts, $content = null) {
		extract( shortcode_atts( array(
	    'style' => 'solid'
	  ), $atts ) );
	      
    return '<div class="hr_' .$style. '"></div>';  
	}

	/* Call to action */
	function webulous_cta ( $atts, $content = null ) {
		extract( shortcode_atts( array(
	    'title' => '',
	    'url' => '',
	    'anchor_text' => ''
	  ), $atts ) );

		$output = '';
		$output .= '<div class="callout-widget">';
			$output .= '<div class="container">';
				$output .= '<div class="twelve columns">';
					$output .= '<h4>' . $title . '</h4>';
					$output .= '<p>';
					$output .= do_shortcode($content);
					$output .= '</p>';
				$output .= '</div>';
				$output .= '<div class="four columns">';
					$output .= '<a href="' . $url . '">' . $anchor_text . '</a>';
				$output .= '</div>';
			$output .= '</div>';
		$output .= '</div>';
		return $output;
	}

	/* Clear */
	function webulous_clear ( $atts, $content = null ) {
		return '<div class="clear"></div>';
	}

	/* Dropcap */
	function webulous_dropcap( $atts, $content = null) {
		extract( shortcode_atts( array(
	    'style' => 'default'
	  ), $atts ) );

	  $first_letter = substr($content, 0, 1);
	  $rest = substr($content, 1);
	      
	    return '<span class="dropcap dropcap-'. $style .'">' . do_shortcode( $first_letter ) . '</span>' . $rest;
	}

	/* Elastic Slider */
	function webulous_elasticslider( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'id' => ''
		), $atts ) );

		if ( $id == '' ) return;
		$args = array(
			'post_type' => 'elasticslider',
			'posts_per_page' => -1,
			'tax_query' => array(
				array(
					'taxonomy' => 'elasticslider_group',
					'field' => 'id',
					'terms' => $id
				)
			)
		);

		$output = '';

		$loop = new WP_Query( $args );

		if( $loop->have_posts() ) {
			$output .= '<div id="ei-slider" class="ei-slider">';
			$output .= '<ul class="ei-slider-large">';
		} else {
			return $output;
		}

		while ( $loop->have_posts() ) {
			$loop->the_post();
			if( has_post_thumbnail( ) ) {
				$url = wp_get_attachment_url( get_post_thumbnail_id($loop->post->ID) );
				$output .= '<li>';
				$output .= get_the_post_thumbnail( $loop->post->ID, 'full_width' );
				$output .= '<div class="ei-title">';
				$output .= '<h2>' . get_post_meta( $loop->post->ID, 'title1', true ) . '</h2>';
				$output .= '<h3>' . get_post_meta( $loop->post->ID, 'title2', true ) . '</h3>';
				$output .= '</div>';
				$output .= '</li>';
			}
		}

		$output .= '</ul><!-- .ei-slider-large -->';
		$loop->rewind_posts();
		$output .= '<ul class="ei-slider-thumbs">';
		$output .= '<li class="ei-slider-element">Current</li>';
		$count = 1;
		while( $loop->have_posts() ) {
			$loop->the_post();
			if( has_post_thumbnail() ) {
				$output .= '<li><a href="#">Slide '. $count .'</a>' . get_the_post_thumbnail( $loop->post->ID ) .'</li>';
				$count++;
			}
		}
                   
		$loop = null;
		wp_reset_postdata();
		$output .= '</ul><!-- .ei-slider-thumbs -->';
		$output .= '</div><!-- .ei-slider -->';
		return $output;
	}

	/* Flex Slider */
	function webulous_flexslider( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'id' => '',
			'type' => 'slider'
		), $atts ) );

		if ( $id == '' ) return;
		$args = array(
			'post_type' => 'flexslider',
			'posts_per_page' => -1,
			'tax_query' => array(
				array(
					'taxonomy' => 'flexslider_group',
					'field' => 'id',
					'terms' => $id
				)
			)
		);

		$output = '';

		$loop = new WP_Query( $args );

		if( $loop->have_posts() ) {
			$output .= '<div class="flex-container">';
			if( 'slider' == $type) {
				$output .= '<div class="flexslider">';	
			} else {
				$output .= '<div class="flexcarousel">';
			}
			
			$output .= '<ul class="slides">';

			while ( $loop->have_posts() ) {
				$loop->the_post();
				if( has_post_thumbnail( ) ) {
					$output .= '<li><div class="flex-image">' . get_the_post_thumbnail( $loop->post->ID, 'full_width') . '</div>';
					if ( trim(get_the_content( ) ) != '' ) {
						$output .= '<div class="flex-caption">' . get_the_content( ) . '</div>';
					}
					$output .= '</li>';
				}
			}
		}

		$loop = null;
		wp_reset_postdata();
		$output .= '</ul>';
		$output .= '</div>';
		$output .= '</div>';
		return $output;
	}

	/* Icon */
	function webulous_icon( $atts, $content = null) {
		extract( shortcode_atts( array(
	    'icon' => 'none',
	    'size' => '',
	    //'align' => 'left',
	  ), $atts ) );

		$classes = 'fa ' . $icon;
	  $classes .= ($size == '') ? '' : ' fa-'.$size;
	      
    return '<i class="' . $classes .'"></i> ';
	}

	/* Vertical Gap */
	function webulous_gap( $atts, $content = null) {
		extract( shortcode_atts( array(
		  'height' 	=> '10'
	  ), $atts ) );
	      
	  if($height == '') {
			$gap = '';
		} else {
			$gap = 'style="height: '.$height.'px;"';
		}

		return '<div class="gap" ' . $gap . '></div>';
	}

	/* Google Font */
	function webulous_googlefont( $atts, $content = null) {
		extract( shortcode_atts( array(
			'font_family' => 'Lato',
			'size' => '42',
			'weights' => '',
			'weight' => '',
		), $atts ) );
		      
		$google_font = preg_replace("/ /","+",$font_family);

		$output = '';
		$output .= '<link href="http://fonts.googleapis.com/css?family='.$google_font.':'.$weights.'" ';
		$output .= 'rel="stylesheet" type="text/css">';
		$output .= '<div class="googlefont" style="font-family:\'' .$font_family. '\', serif !important; ';
		$output .= 'font-size:' .$size. 'px !important; font-weight:'.$weight.'">';
		$output .= do_shortcode($content);
		$output .= '</div>';
		      
		return $output;
	}	

	/* Headline */
	function webulous_headline( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'level' => 1,
			'type' => 'normal',
			'align' => 'left',
		), $atts ) );

		if($type == 'normal') {
			$type_class = ' class="' . $align . '"';
		} else {
			$type_class = ' class="sep ' . $align . '"';
		}

		$output = '';
		switch ($level) {
			case 1:
				$output .= '<h1' . $type_class . '>' . do_shortcode( $content ) . '</h1>';
				break;

			case 2:
				$output .= '<h2' . $type_class . '>' . do_shortcode( $content ) . '</h2>';
				break;

			case 3:
				$output .= '<h3' . $type_class . '>' . do_shortcode( $content ) . '</h3>';
				break;

			case 4:
				$output .= '<h4' . $type_class . '>' . do_shortcode( $content ) . '</h4>';
				break;

			case 5:
				$output .= '<h5' . $type_class . '>' . do_shortcode( $content ) . '</h5>';
				break;

			case 6:
				$output .= '<h6' . $type_class . '>' . do_shortcode( $content ) . '</h6>';
				break;
		}

		return $output;
	}

	/* Highlight */
	function webulous_highlight( $atts, $content = null) {
		extract( shortcode_atts( array(
			'color' => 'black',
			'bgcolor' => '#F6F67A'
		), $atts ) );
		      
		$output = '';
		$output .= '<span class="highlight" style="color:' . $color . '; background-color: ' . $bgcolor . '">';
		$output .= do_shortcode($content);
		$output .= '</span>';     
		return $output;
	}

	/* Our Team */
	function webulous_ourteam( $atts, $content = null) {
		extract( shortcode_atts( array(
			'image_url' => '',
			'title' => '',
			'designation' => '',
			'linkedin' => '',
			'google' => '',
			'twitter' => '',
			'facebook' => ''
		), $atts ) );
		      
		$output = '';
		$output .= '<div class="our-team">';
			$output .= '<div class="team-avator">';
				$output .= '<img alt="" src="' . $image_url .'">';
			 $output .= '</div>';
		if( $linkedin != '' || $google != '' || $twitter != '' || $facebook != '' ) :
			$output .= '<div class="team-social">';
				$output .= '<ul>';
				if( isset( $linkedin ) && $linkedin != '') :
			        $output .= '<li><a href="'. esc_url( $linkedin ) .'"><i class="fa fa-linkedin fa-lg"></i></a></li>';
			    endif;
			    if( isset( $google ) && $google != '') :
			        $output .= '<li><a href="'. esc_url( $google ) . '"><i class="fa fa-google-plus fa-lg"></i></a></li>';
			    endif;
			    if( isset( $twitter ) && $twitter != '') :
			        $output .= '<li><a href="' . esc_url( $twitter ) . '"><i class="fa fa-twitter fa-lg"></i></a></li>';
			    endif;
			    if( isset( $facebook ) && $facebook != '' ) :
			        $output .= '<li><a href="' . esc_url( $facebook ) .'"><i class="fa fa-facebook fa-lg"></i></a></li>';
			   endif;
			      $output .= '</ul>';
			$output .= '</div>';
		endif;
			$output .= '<div class="team-content">';
			$output .= '<h4>' . esc_html( $title ) .' <span>' . esc_html( $designation ) .'</span></h4>';
			$output .= '<p>';
			$output .= do_shortcode($content);
			$output .= '</p>';
			$output .= '</div>';
		$output .= '</div>';
		return $output;
	}

	/* Skill */
	function webulous_skill( $atts, $content = null) {

		$args = array(
			'post_type' => 'skill',
			'posts_per_page' => -1,
		);

		$output = '';

		$loop = new WP_Query( $args );

		if( $loop->have_posts() ) {
			while ( $loop->have_posts() ) {
				$loop->the_post();
					$output .= '<div class="skill-container">';
					$output .= '<span class="fa-stack fa-lg">';
					  $output .= '<i class="fa fa-circle fa-stack-2x"></i>';
					  $output .= '<i class="fa ' . get_post_meta( $loop->post->ID, 'skill_icon', true ) . ' fa-stack-1x fa-inverse"></i>';
					$output .= '</span>';
					$output .= '<div class="skill">';
					$output .= '<div class="skill-percentage percent' . get_post_meta( $loop->post->ID, 'skill_percentage', true ) .' start"></div>';
					$output .= '<div class="skill-content">'  . get_the_title() .'<div class="txt-count"> <span class="count">'. get_post_meta( $loop->post->ID, 'skill_percentage', true ) . '</span>%</div></div>';
					$output .= '</div>';
					$output .= '</div>';
			}
		}

		$loop = null;
		wp_reset_postdata();

		return $output;
	}

	/* Social Networks */
	function webulous_social_networks( $atts, $content = null) {
		global $webulous_options;
		$output = '';
		$output .= '<ul id="social-widget">';
		if( isset( $webulous_options['social-digg'] ) && trim($webulous_options['social-digg'] != '') ) :
		    $output .= '<li><a href="'. esc_url( $webulous_options['social-digg'] ) . '"><i class="fa fa-digg"></i></a></li>';
		endif;
		if( isset( $webulous_options['social-dribble'] ) && trim($webulous_options['social-dribble'] != '') ) :
		    $output .= '<li><a href="'. esc_url( $webulous_options['social-dribble'] ) . '"><i class="fa fa-dribbble"></i></a></li>';
		endif;
		if( isset( $webulous_options['social-facebook'] ) && trim($webulous_options['social-facebook'] != '') ) :
		    $output .= '<li><a href="'. esc_url( $webulous_options['social-facebook'] ) . '"><i class="fa fa-facebook"></i></a></li>';
		endif;
		if( isset( $webulous_options['social-flickr'] ) && trim($webulous_options['social-flickr'] != '') ) :
		    $output .= '<li><a href="'. esc_url( $webulous_options['social-flickr'] ) . '"><i class="fa fa-flickr"></i></a></li>';
		endif;
		if( isset( $webulous_options['social-google'] ) && trim($webulous_options['social-google'] != '') ) :
		    $output .= '<li><a href="'. esc_url( $webulous_options['social-google'] ) . '"><i class="fa fa-google-plus"></i></a></li>';
		endif;
		if( isset( $webulous_options['social-instagram'] ) && trim($webulous_options['social-instagram'] != '') ) :
		    $output .= '<li><a href="'. esc_url( $webulous_options['social-instagram'] ) . '"><i class="fa fa-instagram"></i></a></li>';
		endif;
		if( isset( $webulous_options['social-linkedin'] ) && trim($webulous_options['social-linkedin'] != '') ) :
		    $output .= '<li><a href="'. esc_url( $webulous_options['social-linkedin'] ) . '"><i class="fa fa-linkedin"></i></a></li>';
		endif;
		if( isset( $webulous_options['social-pinterest'] ) && trim($webulous_options['social-pinterest'] != '') ) :
		    $output .= '<li><a href="'. esc_url( $webulous_options['social-pinterest'] ) . '"><i class="fa fa-pinterest"></i></a></li>';
		endif;
		if( isset( $webulous_options['social-rss'] ) && trim($webulous_options['social-rss'] != '') ) :
		    $output .= '<li><a href="'. esc_url( $webulous_options['social-rss'] ) . '"><i class="fa fa-rss"></i></a></li>';
		endif;
		if( isset( $webulous_options['social-skype'] ) && trim($webulous_options['social-skype'] != '') ) :
		    $output .= '<li><a href="'. esc_url( $webulous_options['social-skype'] ) . '"><i class="fa fa-skype"></i></a></li>';
		endif;
		if( isset( $webulous_options['social-tumblr'] ) && trim($webulous_options['social-tumblr'] != '') ) :
		    $output .= '<li><a href="'. esc_url( $webulous_options['social-tumblr'] ) . '"><i class="fa fa-tumblr"></i></a></li>';
		endif;
		if( isset( $webulous_options['social-twitter'] ) && trim($webulous_options['social-twitter'] != '') ) :
		    $output .= '<li><a href="'. esc_url( $webulous_options['social-twitter'] ) . '"><i class="fa fa-twitter"></i></a></li>';
		endif;
		if( isset( $webulous_options['social-vimeo'] ) && trim($webulous_options['social-vimeo'] != '') ) :
		    $output .= '<li><a href="'. esc_url( $webulous_options['social-vimeo'] ) . '"><i class="fa fa-vimeo-square"></i></a></li>';
		endif;
		if( isset( $webulous_options['social-youtube'] ) && trim($webulous_options['social-youtube'] != '') ) :
		    $output .= '<li><a href="'. esc_url( $webulous_options['social-youtube'] ) . '"><i class="fa fa-youtube"></i></a></li>';
		endif;
		$output .= '</ul>';

		return $output;

	}

	/* Sound Cloud */
	function webulous_soundcloud( $atts, $content = null) {
		extract( shortcode_atts( array(
				'url' => '',
				'width' => '100%',
				'height' => 80,
				'comments' => 0,
				'auto_play' => 0,
				'color' => 'ff7700',
			), $atts) );

		$comments = ($comments == 0) ? 'false' : 'true';
		$auto_play = ($auto_play == 0) ? 'false' : 'true';
		      
		$output = '';
		$output .= '<object height="' . esc_attr( $height ) . '" width="' . esc_attr( $width ) . '">';
		$output .= '<param name="movie" value="http://player.soundcloud.com/player.swf?url=' . urlencode($url);
		$output .= '&amp;show_comments=' . $comments . '&amp;auto_play=' . $auto_play;
		$output .= '&amp;color=' . $color . '"></param>';
		$output .= '<param name="allowscriptaccess" value="always"></param>';
		$output .= '<embed allowscriptaccess="always" height="' . esc_attr( $height ) . '" ';
		$output .= 'src="http://player.soundcloud.com/player.swf?url=' . urlencode($url);
		$output .= '&amp;show_comments=' . $comments;
		$output .= '&amp;auto_play=' . $auto_play;
		$output .= '&amp;color=' . esc_attr( $color ) . '" ';
		$output .= 'type="application/x-shockwave-flash" width="' . esc_attr( $width );
		$output .= '"></embed></object>';
		return $output;
	}


 	/* Quote */
	function webulous_quote( $atts, $content = null ){
		extract(shortcode_atts(array(
	        'align' => 'none',
	  ), $atts)); 	

		$output = '';
		$output .= '<span class="pull'. esc_attr( $align ).'">';
		$output .= do_shortcode( $content );
		$output .= '</span>';

		return $output;
	}

 	/*	Tabs */
 	function webulous_tabs_group( $atts, $content = null ) {
		
		extract(shortcode_atts(array(
	        'type' => 'normal',
	  	), $atts)); 			
		
		if (!preg_match_all('~\[tabs([^\[\]]*)]([^\[\]]+)\[/tabs]~', $content, $matches)) {

			return webulous_remove_wpautop( $content );

		} else {

			$output = '';
			$output .= '<ul class="tabs clearfix">';			
			$tab_id = array();
			for($i = 0; $i < count($matches[1]); $i++) {
				$tab_id[$i] = uniqid('tab_');
				$output .= '<li><a href="#'.$tab_id[$i].'">' . str_replace(array('title="', '"'), '', $matches[1][$i]) . '</a></li>';
			}
			$output .= '</ul>';
			
			for($i = 0; $i < count($matches[2]); $i++) {
				$output .= '<div id="'.$tab_id[$i].'">' . webulous_remove_wpautop( $matches[2][$i] ) . '</div>';
			}
			
			return '<div class="tabs-container ' . $type . '">' . $output . '</div>';

		}
 	}

	function webulous_testimonial( $atts, $content = null ){
		extract( shortcode_atts( array(
			'count' => '5'
		), $atts ) );

		$args = array(
			'post_type' => 'testimonial',
			'posts_per_page' => $count,
		);

		$output = '';

		$loop = new WP_Query( $args );

		if( $loop->have_posts() ) {
			$output .= '<div class="testimonial-container">';
			$output .= '<div class="testimonials">';
			$output .= '<ul class="slides">';

			while ( $loop->have_posts() ) {
				$loop->the_post();
					$output .= '<li>';
					$output .= '<div class="testimony">' . get_post_meta( $loop->post->ID, 'testimonial_text', true ) . '</div>';
					$output .= '<div class="client-pic">' . get_the_post_thumbnail($loop->post->ID, 'thumbnail' ) . '</div>';
					$output .= '<p class="client"><strong>'. get_post_meta( $loop->post->ID, 'testimonial_client_name', true ) . '</strong>, ' . get_post_meta( $loop->post->ID, 'testimonial_company_name', true ) . '</p>';
					$output .= '</li>';
				}
			}
		$loop = null; 
		wp_reset_postdata();
		$output .= '</ul>';
		$output .= '</div>';
		$output .= '</div>';
		return $output;
	}

	/*  Toggle  */
	function webulous_toggle( $atts, $content = null ){
		extract(shortcode_atts(array(
	        'title' => '',
	        'type' => 'normal',
	        'open' => false,
	  ), $atts));

	    
		if( $open ) {
			$toggle_class = 'open';
			$icon_class = 'fa fa-minus';
		} else {
			$toggle_class = 'close';
			$icon_class = 'fa fa-plus';
		}

		if( 'normal' == $type ) {
			$type_class = 'toggle-normal';
		} else {
			$type_class = 'toggle-polygon';
		}

	   return '<div class="toggle ' . $type_class .'"><div class="toggle-title">'.$title.' <span class="icn"><i class="'. $icon_class . '"></i></span></div><div class="toggle-content  '.$toggle_class.'"><p>'. do_shortcode($content) . '</p></div></div>';
	}


	/* Tooltip */
	function webulous_tooltip( $atts, $content = null ) {
		extract(shortcode_atts(array(
	      'tip' => '',
	      'pos' => 'top'
	    ), $atts));
	   
	   return '<a href="#" data-toggle="tooltip" title="' . $tip . '" class="withtip ' . $pos .'">' . do_shortcode( $content ) .'</a>';
	}	

	/* Video */
	function webulous_video( $atts, $content = null) {
		extract( shortcode_atts( array(
			'type' => 'youtube',
			'video_id' => '',
			'height' => '315',
			'width' => '560'
		), $atts ) );
		
		$output = '';
		if(!$video_id) {
			return $output;
		} else {
			if($type === 'youtube') {
				$output .= '<iframe width="'. $width .'" height="' . $height . '" ';
				$output .= 'src="http://www.youtube.com/embed/' . $video_id .'" frameborder="0" allowfullscreen></iframe>';
			} else {
				$output .= '<iframe src="http://player.vimeo.com/video/' . $video_id .'" ';
				$output .= 'width="' . $width . '" height="' . $height .'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
			}
			return $output;
		}
	}	

	/* Recent Projects Carousel */
	function webulous_recent_projects_carousel( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'count' => '10'
		), $atts ) );
		
		$args = array(
			'post_type' => 'portfolio',
			'posts_per_page' => $count,
		);

		$output = '';

		$loop = new WP_Query( $args );

		if( $loop->have_posts() ) {
			$output .= '<div class="recent-work-container">';
			$output .= '<div class="recent-work">';
			$output .= '<ul class="slides">';

			while ( $loop->have_posts() ) {
				$loop->the_post();
					$output .= '<li>';
					$output .= '<div class="work">';
					$output .= '<a href="'. get_the_permalink() . '">' . get_the_post_thumbnail($loop->post->ID, 'recent-work' ) . '</a>';
					$image_url = wp_get_attachment_url( get_post_thumbnail_id($loop->post->ID) );
					$cats = wp_get_post_categories($loop->post->ID);
					$cat = get_category($cats[0]);
					$output .= '<div class="lbl-portfolio"><div class="lbl"><strong class="lbl-content">' . $cat->name . '</strong></div></div>';
						$output .= '<div style="display: none;" class="recent_work_overlay">';
							$output .= '<div style="left: -42%;" class="overlay_icon">';
								$output .= '<a rel="prettyPhoto" href="'. $image_url . '"><i class="fa fa-link fa-2x"></i></a>';
							$output .= '</div>';
						$output .= '</div>';
					$output .= '<h4><a href="'. get_the_permalink() . '">' . get_the_title() . '</a></h4>';
					//$output .= '<p class="work-meta"> <span class="views">'. webulous_get_post_views( $loop->post->ID ) . '</span>';
					//$output .=' <span class="likes"><a href="" class="countable_link">Like</a></span></p>';
					$output .= '</div>';
					$output .= '</li>';
				}
			}
		$loop = null;
		wp_reset_postdata();
		$output .= '</ul>';
		$output .= '</div>';
		$output .= '</div>';
		return $output;
	}

// Recent Posts with featured Images
	function webulous_recent_posts_sc( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'count' => get_option('posts_per_page')
		), $atts ) );
		
		$output = '';
		$output .= '<div class="flex-recent-posts">';
	  $output .= '<ul class="slides">';
		// WP_Query arguments
		$args = array (
			'post_type'              => 'post',
			'post_status'            => 'publish',
			'posts_per_page'         => $count,
			'ignore_sticky_posts'    => true,
			'order'                  => 'DESC',
		);

		// The Query
		$query = new WP_Query( $args );

		// The Loop
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				$output .= '<li>';
				$output .= '<div class="recent-post">';
				$output .= '<div class="rp-thumb">';
				if ( has_post_thumbnail() ) {
					$output .= get_the_post_thumbnail();
				}
				else {
					$output .= '<img src="' . get_stylesheet_directory_uri() . '/images/thumbnail-default.png" alt="" >';
				}
				$output .= '</div><!-- .rp-thumb -->';
				$output .= '<div class="rp-content">';
				$output .= '<h4>'. get_the_title() . '</h4>';
				$output .= get_the_excerpt();
				$output .= '</div><!-- .rp-content -->';
				$output .= '</div>';
				$output .= '</li>';
			}
		} 

		$query = null;
		// Restore original Post Data
		wp_reset_postdata();
	  $output .= '</ul>';
		$output .= '</div>';
		return $output;
	}

	/* Project isotopie */
	function webulous_recent_projects_isotope( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'count' => '12'
		), $atts ) );

		$args = array(
			'post_type' => 'portfolio',
			'posts_per_page' => $count,
		);

		$output = '';
		$output .= '<style type="text/css">.item { overflow: hidden; width: 25%; margin: 0; }';
		$output .= '#filters, #portfolio { padding: 0; } </style>';
		$loop = new WP_Query( $args );
		$output .= '<div id="isolate">';
		$output .= '<div id="filters">';
			$terms = get_terms("skills");
			$count = count($terms);
			if ( $count > 0 ) {
			$output .= '<ul class="filter-options" data-option-key="filter">';
				$output .= '<li><a href="#filter" data-option-value="*">All</a></li>';
				foreach ( $terms as $term ) {
				$output .= '<li><a href="#filter" data-option-value=".' . $term->name . '">' . $term->name . '</a></li>';
				}
			$output .= '</ul>';
			}
		$output .= '<div class="clearfix"></div>';
		$output .= '</div>';

		$output .= '<ul id="portfolio">';
		if ($loop->have_posts()) : while ($loop->have_posts()) : 
			$loop->the_post();
			$terms = get_the_terms( $loop->post->ID, 'skills' );
							
			if ( $terms && ! is_wp_error( $terms ) ) {
				$skills = array();
				foreach ( $terms as $term ) {
					$skills[] = $term->name;
				}
				$skills = join( " ", $skills );
			}
			$output .= '<li class="item ' . $skills .'">';

				$output .= '<div class="portfolio4col">';
						$portfolio_video_type =  get_post_meta( $loop->post->ID, 'portfolio_video_type', true);
						$portfolio_video_id =  trim(get_post_meta( $loop->post->ID, 'portfolio_video_id', true));
						$portfolio_project_url =  trim(get_post_meta( $loop->post->ID, 'portfolio_project_url', true));
						$portfolio_project_link_text =  trim(get_post_meta( $loop->post->ID, 'portfolio_project_link_text', true));
					
					$output .= '<a href="' . get_the_permalink() . '">'. get_the_post_thumbnail( $loop->post->ID, 'portfolio4col' ) . '</a>';
					$output .= '<div class="portfolio4col_overlay" style="display: none;">';
						$output .= '<div class="overlay_icon" style="left: -42%;">';
					
					if( $portfolio_video_type != 'none' && $portfolio_video_id != '' ) {
						if( $portfolio_video_type == 'vimeo' ) {
							$output .= '<a href="http://vimeo.com/' . $portfolio_video_id .'" rel="prettyPhoto"><img src="' . get_template_directory_uri() . '/images/icon-zoom.png" alt=""></a>';
						} else {
							$output .= '<a href="http://www.youtube.com/watch?v=' . $portfolio_video_id . '" rel="prettyPhoto"><img src="' . get_template_directory_uri() . '/images/icon-zoom.png" alt=""></a>';
						}
					} else {
						$url = wp_get_attachment_url( get_post_thumbnail_id($loop->post->ID) );
						$output .= '<a href="' . $url .'" rel="prettyPhoto[elasti]"><img src="' . get_template_directory_uri() . '/images/icon-zoom.png" alt=""></a>';
					}
						$output .= '<a href="' . get_the_permalink() . '" title="' . get_the_title() . '"><img src="' . get_template_directory_uri() . '/images/icon-link.png" alt=""></a>';
						$output .= '</div>';
					$output .= '</div>';
				$output .= '</div><!-- .portfolio4col -->';

			$output .= '</li>';
			endwhile; endif;
		$output .= '</ul></div>';
		$loop = null;
		wp_reset_postdata();
		return $output;
	}

		add_shortcode( 'accordion_group', 'webulous_accordion_group' );
		add_shortcode( 'accordion', 'webulous_accordion' );
		add_shortcode( 'alert', 'webulous_alert' );
		add_shortcode( 'button', 'webulous_button' );
		add_shortcode( 'clear', 'webulous_clear' );
		add_shortcode( 'cta', 'webulous_cta' );
		add_shortcode( 'divider', 'webulous_divider' );
		add_shortcode( 'dropcap', 'webulous_dropcap' );
		add_shortcode( 'elasticslider', 'webulous_elasticslider' );
		add_shortcode( 'flexslider', 'webulous_flexslider' );
		add_shortcode( 'gap', 'webulous_gap' );
		add_shortcode( 'googlefont', 'webulous_googlefont' );
		add_shortcode( 'headline', 'webulous_headline' );
		add_shortcode( 'highlight', 'webulous_highlight' );
		add_shortcode( 'icon', 'webulous_icon' );
		add_shortcode( 'icon_content_box', 'webulous_icon_content_box' );
		add_shortcode( 'list', 'webulous_list' );
		add_shortcode( 'list_item', 'webulous_list_item' );
		add_shortcode( 'ourteam', 'webulous_ourteam' );

		add_shortcode( 'quote', 'webulous_quote' );
		add_shortcode( 'skill', 'webulous_skill' );
		add_shortcode( 'social_networks', 'webulous_social_networks' );
		add_shortcode( 'soundcloud', 'webulous_soundcloud' );
		add_shortcode( 'tabs_group', 'webulous_tabs_group' );
		add_shortcode( 'testimonial', 'webulous_testimonial' );
		add_shortcode( 'toggle', 'webulous_toggle' );
		add_shortcode( 'tooltip', 'webulous_tooltip' );
		add_shortcode( 'video', 'webulous_video' );
		add_shortcode( 'recent_work', 'webulous_recent_projects_carousel' );
		add_shortcode( 'recent_posts', 'webulous_recent_posts_sc' );
		add_shortcode( 'recent_work_isotope', 'webulous_recent_projects_isotope' );

		add_filter('widget_text', 'do_shortcode');