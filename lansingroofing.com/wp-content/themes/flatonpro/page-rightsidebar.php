<?php
/**
 * Template Name: Sidebar Right
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

		<?php get_sidebar(); ?>

		<?php get_footer(); ?>