<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Webulous
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

	<div id="content" class="site-content container">
		
		<?php if( isset( $webulous_options['layout'] ) && $webulous_options['layout'] == 2 ) : ?>
			<?php get_sidebar(); ?>
		<?php endif; ?>

		<div id="primary" class="content-area eleven columns">
			
			<main id="main" class="site-main" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

					<?php
						// If comments are open or we have at least one comment, load up the comment template
						if ( comments_open() || '0' != get_comments_number() ) :
							comments_template();
						endif;
					?>

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->
		</div><!-- #primary -->

		<?php if( isset( $webulous_options['layout'] ) && $webulous_options['layout'] == 3 ) : ?>
			<?php get_sidebar(); ?>
		<?php endif; ?>

		<?php if( ! isset( $webulous_options['layout'] ) ) : ?>
			<?php get_sidebar(); ?>
		<?php endif; ?>
		
		<?php get_footer(); ?>