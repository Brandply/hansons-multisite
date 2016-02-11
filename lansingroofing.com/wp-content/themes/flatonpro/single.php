<?php
/**
 * The Template for displaying all single posts.
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

		<?php if( isset( $webulous_options['layout'] ) && $webulous_options['layout'] == 2 ) : ?>
			<?php get_sidebar(); ?>
		<?php endif; ?>
<div id="content" class="site-content container">
	<div id="primary" class="content-area eleven columns">
		<main id="main" class="site-main" role="main">
			
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'single' ); ?>

				<?php webulous_post_nav(); ?>

				<?php if($webulous_options['show-social-sharing']): ?>
				<div class="share-box">
					<h4><?php echo __( 'Share this on ...', 'flatonpro' ); ?></h4>
					<ul>
						<?php if( $webulous_options['ss_box_facebook'] ): ?>
						<li>
							<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&amp;t=<?php the_title(); ?>">
								<i class="fa fa-facebook"></i>
							</a>
						</li>
						<?php endif; ?>
						<?php if($webulous_options['ss_box_twitter']): ?>
						<li>
							<a href="http://twitthis.com/twit?url=<?php the_permalink(); ?>">
								<i class="fa fa-twitter"></i>
							</a>
						</li>
						<?php endif; ?>
						<?php if($webulous_options['ss_box_linkedin']): ?>
						<li>
							<a href="http://linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>">
								<i class="fa fa-linkedin"></i>
							</a>
						</li>
						<?php endif; ?>

						<?php if($webulous_options['ss_box_googleplus']): ?>
						<li>
							<a href="https://plus.google.com/share?url=<?php the_permalink(); ?>">
								<i class="fa fa-google-plus"></i>
							</a>
						</li>
						<?php endif; ?>
						<?php if($webulous_options['ss_box_email']): ?>
						<li>
							<a href="mailto:?subject=<?php the_title(); ?>&amp;body=<?php the_permalink(); ?>">
								<i class="fa fa-envelope"></i>
							</a>
						</li>
						<?php endif; ?>
					</ul>
				</div>
				<?php endif; ?>

				<?php if($webulous_options['show-author-bio']): ?>
				<section class="author-bio clearfix">
					<div class="author-info">
						<div class="avatar">
							<?php echo get_avatar( get_the_author_meta( 'email' ), '72' ); ?>
						</div>
						<div class="description">
							<h4><?php echo __( 'About Author:', 'flatonpro' ); ?> <?php the_author_posts_link(); ?></h4>
							<?php the_author_meta('description');?>
						</div>
					</div>
				</section>
				<?php endif; ?>

				<?php if( $webulous_options['show-related-posts'] && function_exists( 'webulous_related_posts' ) ) : ?>
						<section class="related-posts clearfix">
							<?php webulous_related_posts(); ?>
						</section>
				<?php endif;  ?>

				<?php
					if( $webulous_options['show-comments'] ) :
						// If comments are open or we have at least one comment, load up the comment template
						if ( comments_open() || '0' != get_comments_number() ) :
							comments_template();
						endif;
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
	</div>
			
		<?php get_footer(); ?>