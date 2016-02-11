<?php
/**
 * Template Name: Page Full Width With Slider
 */

get_header(); ?>
	<div class="breadcrumb-wrap">
		<div class="container">
			<div class="sixteen columns">
				<?php if ( $webulous_options['breadcrumb'] && function_exists( 'webulous_breadcrumbs' ) ) : ?>			
					<div id="breadcrumb" role="navigation">
						<?php webulous_breadcrumbs(); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
		
	<?php 
		while( have_posts() ): the_post();
			$slider = false;
			if( get_post_meta( $post->ID, '_slider-shortcode', true ) != '' ) : ?>
				<div class="page-slider">
					<?php echo do_shortcode( get_post_meta( $post->ID, '_slider-shortcode', true ) ); 
					$slider = true; ?>
				</div>
			<?php
			endif;
		endwhile;
	?>
		<div id="content" class="site-content container">
			
			<div id="primary" class="content-area sixteen columns">

				<main id="main" class="site-main" role="main">
							
					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'content', 'page-slider' ); ?>

						<?php
							// If comments are open or we have at least one comment, load up the comment template
							if ( comments_open() || '0' != get_comments_number() ) :
								comments_template();
							endif;
						?>

					<?php endwhile; // end of the loop. ?>

				</main><!-- #main -->
			</div><!-- #primary -->

	</div><!-- .row -->
	
	<?php get_footer(); ?>