<?php
/**
 * Template Name: W/o Nav &amp; Title
 */

get_header(); ?>

<div id="content" class="site-content container">

	<div id="primary" class="content-area sixteen columns">
		<main id="main" class="site-main" role="main">
			
			<?php while ( have_posts() ) : the_post(); ?>

				<?php the_content(); ?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	
<?php get_footer(); ?>