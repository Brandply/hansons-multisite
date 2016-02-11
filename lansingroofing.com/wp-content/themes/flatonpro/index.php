<?php
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
global $webulous_options;
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
				
			<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );
					?>

				<?php endwhile; ?>

				<?php 
					if( $webulous_options['pagenavi'] && function_exists( 'webulous_pagination' ) ) : 
						webulous_pagination();
					else :
						webulous_posts_nav();
					endif; 
				?>

			<?php else : ?>

				<?php get_template_part( 'content', 'none' ); ?>

			<?php endif; ?>

			</main><!-- #main -->
		</div><!-- #primary -->

		<?php if( isset( $webulous_options['layout'] ) && $webulous_options['layout'] == 3 ) : ?>
			<?php get_sidebar(); ?>
		<?php endif; ?>

		<?php if( ! isset( $webulous_options['layout'] ) ) : ?>
			<?php get_sidebar(); ?>
		<?php endif; ?>
		
		<?php get_footer(); ?>