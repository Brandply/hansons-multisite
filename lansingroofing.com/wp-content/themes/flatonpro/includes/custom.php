<?php
	function webulous_custom_theme_options_js() {
		global $webulous_options;

		if( $webulous_options['flexslider_animation'] == 1 ) {
			$animation = 'fade';
		} else {
			$animation = 'slide';
		}

		if( $webulous_options['flexslider_slide_direction'] == 1 ) {
			$slide_direction = 'horizontal';
		} else {
			$slide_direction = 'vertical';
		}

		switch ($webulous_options['lightbox_theme']) {
			case 1:
				$lightbox_theme = 'pp_default';
				break;
			case 2:
				$lightbox_theme = 'light_rounded';
				break;			
			case 3:
				$lightbox_theme = 'dark_rounded';
				break;
			case 4:
				$lightbox_theme = 'light_square';
				break;
			case 5:
				$lightbox_theme = 'dark_square';
				break;
			case 6:
				$lightbox_theme = 'facebook';
				break;
			default:
				$lightbox_theme = 'pp_default';
				break;
		}
	?>
	<script type="text/javascript">
		jQuery(document).ready(function($){
			$('.flexslider').flexslider({
				//controlsContainer: ".flex-container",
				animation: "<?php echo $animation; ?>",
				direction: "<?php echo $slide_direction; ?>",
				slideshowSpeed: <?php echo isset( $webulous_options['flexslider_slideshow_speed'] ) ? $webulous_options['flexslider_slideshow_speed'] : 7000; ?>,
				animationSpeed: <?php echo isset( $webulous_options['flexslider_animation_speed'] ) ? $webulous_options['flexslider_animation_speed'] : 600 ; ?>,
				slideshow: <?php echo ( $webulous_options['flexslider_slideshow'] ) ? 'true' : 'false'; ?>,
				smoothHeight: <?php echo ( $webulous_options['flexslider_smooth_height'] ) ? 'true': 'false'; ?>,
				directionNav: <?php echo ( $webulous_options['flexslider_direction_nav'] ) ? 'true' : 'false'; ?>,
				controlNav: <?php echo ( $webulous_options['flexslider_control_nav'] ) ? 'true' : 'false'; ?>,
				multipleKeyboard: <?php echo ( $webulous_options['flexslider_keyboard_nav'] ) ? 'true' : 'false'; ?>,
				mousewheel: <?php echo ( $webulous_options['flexslider_mousewheel_nav'] ) ? 'true' : 'false'; ?>,
				pauseplay: <?php echo ( $webulous_options['flexslider_pauseplay'] ) ? 'true' : 'false'; ?>,
				randomize: <?php echo ( $webulous_options['flexslider_randomize'] ) ? 'true' : 'false'; ?>,
				animationLoop: <?php echo ( $webulous_options['flexslider_animation_loop'] ) ? 'true' : 'false'; ?>,
				pauseOnAction: <?php echo ( $webulous_options['flexslider_pause_on_action'] ) ? 'true' : 'false'; ?>,
				pauseOnHover: <?php echo ( $webulous_options['flexslider_pause_on_hover'] ) ? 'true' : 'false'; ?>,
				prevText: "<?php echo $webulous_options['flexslider_prev_text']; ?>",
				nextText: "<?php echo $webulous_options['flexslider_next_text']; ?>",
				playText: "<?php echo $webulous_options['flexslider_play_text']; ?>",
				pauseText: "<?php echo $webulous_options['flexslider_pause_text']; ?>",
			});
			
			$('.flexcarousel').flexslider({
			    animation: "slide",
			    animationLoop: false,
			    itemWidth: 230,
			    itemMargin: 5
			});

			$("a[rel^='prettyPhoto']").prettyPhoto({
				animation_speed: "<?php echo strtolower($webulous_options['lightbox_animation_speed']); ?>",
				slideshow: <?php echo $webulous_options['lightbox_slideshow']; ?>,
				autoplay_slideshow: <?php echo ( $webulous_options['lightbox_autoplay_slideshow'] ) ? 'true' : 'false'; ?>,
				opacity: <?php echo $webulous_options['lightbox_opacity']; ?>,
				show_title: <?php echo ( $webulous_options['lightbox_show_title'] ) ? 'true' : 'false'; ?>,
				theme: "<?php echo $lightbox_theme; ?>",
				overlay_gallery: <?php echo ( $webulous_options['lightbox_overlay_gallery'] ) ? 'true' : 'false'; ?>,
				<?php if( ! $webulous_options['lightbox_social_tools']) : ?>
					social_tools: false
				<?php endif; ?>
			});
		
		});
	</script>
<?php
	}

	add_action( 'wp_footer', 'webulous_custom_theme_options_js', 100 );