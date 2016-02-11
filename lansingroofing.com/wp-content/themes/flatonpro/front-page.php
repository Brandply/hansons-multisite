<?php
if ( 'posts' == get_option( 'show_on_front' ) ) {
    include( get_home_template() );
} else {
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Webulous
 */
get_header();
	// Use home page theme options only when page builder is not enabled.
	// For first time get free theme options and store it in pro theme options
	if( isset( $webulous_options['home-pagebuilder'] ) && ! $webulous_options['home-pagebuilder'] ) {

		if( isset($webulous_options['homepage_blocks']['enabled']['slider']) && isset($webulous_options['slides']) ) {
			$slides = $webulous_options['slides'];
			$output = '';

			if( count($slides) > 0) {

				$output .= '<div class="flex-container">';   
				$output .= '<div class="flexslider">';
				$output .= '<ul class="slides">';

				foreach($slides as $slide) {
					$output .= '<li>';
					$output .= '<div class="flex-image"><img src="' . esc_url( $slide['image'] ) . '" alt="" ></div>';
					if ( $slide['description'] != '' ) {
						$output .= '<div class="flex-caption">' . $slide['description'] . '</div>';
					}
					$output .= '</li>';
				}

				$output .= '</ul>';
				$output .= '</div><!-- .flexslider -->';   
				$output .= '</div><!-- .flex-container -->';

			}

			echo $output;
			
		}

		
?>
<div id="content" class="site-content">
	
	<div id="primary" class="content-area">   
		<main id="main" class="site-main container" role="main">
		<?php 
		if( isset( $webulous_options['homepage_blocks']['enabled']['services'] ) ) {
			$output = '';
				$output = '<div class="services">';
				$output .= '<div class="container">';
				$output .= '<div class="row">';
					if( isset( $webulous_options['service-main-title'] ) ) {
						$output .= '<h2 class="service-title">' . $webulous_options['service-main-title'] . '</h2>';
					}
					if( isset( $webulous_options['service-sub-title'] ) ) {
						$output .= '<h3 class="service-subtitle">' . $webulous_options['service-sub-title'] . '</h3>';
					}
					$output .= '<div id="service-tabs">';
					$output .= '<ul>';
					if( isset( $webulous_options['service-title-1'] ) ) {
						$output .= '<li><a href="#service-tab-1">' . $webulous_options['service-title-1'] . '</a></li>';
					}
					if( isset( $webulous_options['service-title-2'] ) ) {
						$output .= '<li><a href="#service-tab-2">' . $webulous_options['service-title-2'] . '</a></li>';
					}
					if( isset( $webulous_options['service-title-3'] ) ) {
						$output .= '<li><a href="#service-tab-3">' . $webulous_options['service-title-3'] . '</a></li>';
					}
					if( isset( $webulous_options['service-title-4'] ) ) {
						$output .= '<li><a href="#service-tab-4">' . $webulous_options['service-title-4'] . '</a></li>';
					}
					if( isset( $webulous_options['service-title-5'] ) ) {
						$output .= '<li><a href="#service-tab-5">' . $webulous_options['service-title-5'] . '</a></li>';
					}
					$output .= '</ul><br class="clear"/>';
					if( isset( $webulous_options['service-icon-1'] ) && isset( $webulous_options['service-description-1'] ) ) {
						$output .= '<div id="service-tab-1">';
						$output .= '<div class="four columns"><div class="tab-icon"><i class="' . esc_attr( $webulous_options['service-icon-1'] ) . '"></i></div></div>';
						$output .= '<div class="service-desc twelve columns">' . '<h3 class="tabs-title">' . esc_html( $webulous_options['service-title-1'] ) . '</h3>' . $webulous_options['service-description-1'] . '</div><br class="clear"/>';
						$output .= '</div><!-- #service-tab-1 -->';
					}

					if( isset( $webulous_options['service-icon-2'] ) && isset( $webulous_options['service-description-2'] ) ) {
						$output .= '<div id="service-tab-2">';
						$output .= '<div class="four columns"><div class="tab-icon"><i class="' . esc_attr( $webulous_options['service-icon-2'] ) . '"></i></div></div>';
						$output .= '<div class="service-desc twelve columns">' . '<h3 class="tabs-title">' . esc_html( $webulous_options['service-title-2'] ) . '</h3>' . $webulous_options['service-description-2'] . '</div><br class="clear"/>';
						$output .= '</div><!-- #service-tab-2 -->';
					}

					if( isset( $webulous_options['service-icon-3'] ) && isset( $webulous_options['service-description-3'] ) ) {
						$output .= '<div id="service-tab-3">';
						$output .= '<div class="four columns"><div class="tab-icon"><i class="' . esc_attr( $webulous_options['service-icon-3'] ) . '"></i></div></div>';
						$output .= '<div class="service-desc twelve columns">' . '<h3 class="tabs-title">' . esc_html( $webulous_options['service-title-3'] ) . '</h3>' . $webulous_options['service-description-3'] . '</div><br class="clear"/>';
						$output .= '</div><!-- #service-tab-3 -->';
					}

					if( isset( $webulous_options['service-icon-4'] ) && isset( $webulous_options['service-description-4'] ) ) {
						$output .= '<div id="service-tab-4">';
						$output .= '<div class="four columns"><div class="tab-icon"><i class="' . esc_attr( $webulous_options['service-icon-4'] ) . '"></i></div></div>';
						$output .= '<div class="service-desc twelve columns">' . '<h3 class="tabs-title">' . esc_html( $webulous_options['service-title-4'] ) . '</h3>' . $webulous_options['service-description-4'] . '</div><br class="clear"/>';
						$output .= '</div><!-- #service-tab-4 -->';
					}

					if( isset( $webulous_options['service-icon-5'] ) && isset( $webulous_options['service-description-5'] ) ) {
						$output .= '<div id="service-tab-5">';
						$output .= '<div class="four columns"><div class="tab-icon"><i class="' . esc_attr( $webulous_options['service-icon-5'] ) . '"></i></div></div>';
						$output .= '<div class="service-desc twelve columns">' . '<h3 class="tabs-title">' . esc_html( $webulous_options['service-title-5'] ) .'</h3>' . $webulous_options['service-description-5'] . '</div><br class="clear"/>';
						$output .= '</div><!-- #service-tab-5 -->';
					}
				$output .= '</div> <!-- #services-tabs -->';
				$output .= '</div> <!-- .row -->';
				$output .= '</div> <!-- .container -->';
				$output .= '</div> <!-- .services -->';  

			echo $output;
		}
		?>

		<?php if( isset( $webulous_options['homepage_blocks']['enabled']['team'] )) : ?>
			<div class="row">
				<h2 class="service-title"><div><?php _e('Meet The Team','flaton'); ?></div></h2><div class="team-content"><div class="innercol"><?php echo $webulous_options['team']; ?><br class="clear"/></div></div>
			</div>
		<?php endif; ?>

		<?php if( isset( $webulous_options['homepage_blocks']['enabled']['extra-info'] )) : ?>
			<div class="row">
				<div class="sixteen columns"><div id="add-info"><?php echo $webulous_options['extra-info']; ?><br class="clear"/></div></div>
			</div>
		<?php endif; ?>

		<?php if( isset( $webulous_options['homepage_blocks']['enabled']['features'] )) : ?>
			<div class="row">
				<div class="feature-wrap">

				<div class="eight columns" id="whyus">
					<div class="feature2">
						<?php echo isset( $webulous_options['features'] ) ? $webulous_options['features'] : '' ?>
					</div>
				</div>

				<div class="eight columns" id="skills">
					<?php
						$output = '';
						if ( isset( $webulous_options['skill-heading'] ) ) {
							$output .= '<h2>' . esc_html( $webulous_options['skill-heading'] ) . '</h2>';
						}

						for ($i=1;$i<6;$i++) {
							$skill = "skill-{$i}";
							$percentage = "percentage-{$i}";
							$icon = "skill-icon-{$i}";
							if( isset( $skill ) && isset( $webulous_options[$icon] ) && isset( $webulous_options[$percentage] ) && isset( $webulous_options[$skill] ) ) {
								$output .= '<div class="skill-container"><i class="' . esc_attr( $webulous_options[$icon] ) . '"></i>';
								$output .= '<div class="skill">';
								$output .= '<div class="skill-percentage percent' . esc_attr( $webulous_options[$percentage] ) .' start"><span class="circle"></span></div>';
								$output .= '<div class="skill-content">'  . $webulous_options[$skill] .'<span> ' . $webulous_options[$percentage] . '%</span></div>';
								$output .= '</div>';
								$output .= '</div>';
							}
						}

						echo $output;
					?>
				</div> <!-- .eight columns skills -->
				<br class="clear"/>
				</div>

			</div> <!-- .row -->
					
		<?php endif; ?>      

		<?php if( isset( $webulous_options['homepage_blocks']['enabled']['recent_posts'] )) : ?>
			<div class="row">
				<div class="sixteen columns">
					<h2><?php _e( 'Recent Posts','flaton'); ?></h2>
					<?php webulous_recent_posts(); ?>
				</div><!-- .sixteen columns -->
			</div><!-- .row -->
		<?php endif;  ?>
	
		<?php if( isset( $webulous_options['homepage_blocks']['enabled']['default'] )) : 
				while ( have_posts() ) : the_post();
					the_content();
				endwhile;
			endif; 
	} else {
		if( isset( $webulous_options['home-flexslider'] ) ) {
			echo do_shortcode( $webulous_options['home-flexslider'] );
		}
?>
<div id="content" class="site-content container">
	
	<div id="primary" class="content-area sixteen columns">
		<main id="main" class="site-main" role="main">

			<?php
				while ( have_posts() ) : the_post();
					the_content();
				endwhile;
			?>
			
		</main><!-- #main -->
	</div><!-- #primary -->
<?php } ?>
	<?php get_footer(); 
} ?>