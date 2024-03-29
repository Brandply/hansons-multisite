<?php
/**
 * The template for displaying Archive pages.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 * @package Webulous
 */
get_header(); ?>

	<div id="content" class="site-content container">
	
			<?php if( isset( $webulous_options['layout'] ) && $webulous_options['layout'] == 2 ) : ?>
				<?php get_sidebar(); ?>
			<?php endif; ?>

		<div id="primary" class="content-area eleven columns">
		
			<main id="main" class="site-main" role="main">

				<?php if ( have_posts() ) : ?>

					<header class="page-header">
						<h1 class="page-title">
							<?php
								if ( is_category() ) :
									printf( __( 'Category: %s', 'flatonpro' ), '<span class="vcard">' . single_cat_title( '', false ) . '</span>' );

								elseif ( is_tag() ) :
									printf( __( 'Tag: %s', 'flatonpro' ), '<span class="vcard">' . single_tag_title( '', false ) . '</span>' );

								elseif ( is_author() ) :
									printf( __( 'Author: %s', 'flatonpro' ), '<span class="vcard">' . get_the_author() . '</span>' );

								elseif ( is_day() ) :
									printf( __( 'Day: %s', 'flatonpro' ), '<span>' . get_the_date() . '</span>' );

								elseif ( is_month() ) :
									printf( __( 'Month: %s', 'flatonpro' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'flatonpro' ) ) . '</span>' );

								elseif ( is_year() ) :
									printf( __( 'Year: %s', 'flatonpro' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'flatonpro' ) ) . '</span>' );

								elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
									_e( 'Asides', 'flatonpro' );

								elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
									_e( 'Galleries', 'flatonpro');

								elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
									_e( 'Images', 'flatonpro');

								elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
									_e( 'Videos', 'flatonpro' );

								elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
									_e( 'Quotes', 'flatonpro' );

								elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
									_e( 'Links', 'flatonpro' );

								elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
									_e( 'Statuses', 'flatonpro' );

								elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
									_e( 'Audios', 'flatonpro' );

								elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
									_e( 'Chats', 'flatonpro' );

								else :
									_e( 'Archives', 'flatonpro' );

								endif;
							?>
						</h1>
						<?php
							// Show an optional term description.
							$term_description = term_description();
							if ( ! empty( $term_description ) ) :
								printf( '<div class="taxonomy-description">%s</div>', $term_description );
							endif;
						?>
					</header><!-- .page-header -->

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