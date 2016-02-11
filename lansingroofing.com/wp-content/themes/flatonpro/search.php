<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Webulous
 */

get_header(); ?>

	<?php if( isset( $webulous_options['layout'] ) && $webulous_options['layout'] == 2 ) : ?>
		<?php get_sidebar(); ?>
	<?php endif; ?>

	<div id="content" class="site-content container">	

	<div id="primary" class="content-area eleven columns">
		
		<main id="main" class="site-main" role="main">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'flatonpro' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				</header><!-- .page-header -->

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'search' ); ?>

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