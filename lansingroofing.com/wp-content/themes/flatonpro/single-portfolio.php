<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Webulous
 */

get_header(); ?>

	<div class="breadcrumb-wrap">
		<div class="container">
			<div class="container">
				<?php if ( $webulous_options['breadcrumb'] && function_exists( 'webulous_breadcrumbs' ) ) : ?>			
					<div id="breadcrumb" role="navigation">
						<?php webulous_breadcrumbs(); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>

<div id="content" class="site-content container">	

	<div id="primary" class="content-area sixteen columns">
		
		<main id="main" class="site-main" role="main">
					
				<?php if( have_posts() ) : ?>
					<?php while( have_posts() ) : the_post(); ?>

		
						<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
					
							<header class="article-header">
						
								<h1 class="entry-title single-title"><?php the_title(); ?></h1>
				
							</header> <!-- end article header -->
							<?php
								$content_width = get_post_meta( $post->ID, 'portfolio_content_width', true );
								if ( $content_width == "full_width") : 
							?>
			
							<section class="article-content">
								<div class="thumbnail">
									<?php the_post_thumbnail( 'full_width' ); ?>
								</div>
								<div class="single-wrapper">
									<div class="row">
										<div class="one-third column alpha">
											<h4><?php esc_html_e( 'Project Details','flatonpro' ); ?></h4>
											<?php
												$project_url = get_post_meta( $post->ID, 'portfolio_project_url', true );
												$project_link_text = get_post_meta( $post->ID, 'portfolio_project_link_text', true );
											?>
											<table>
												<tr>
													<td><?php esc_html_e( 'Skill needed :','flatonpro' ); ?></td>
													<td><?php echo the_terms( $post->ID, 'skills', '', ', ', '' ); ?></td>
												</tr>
												<tr>
													<td><?php esc_html_e( 'Category :','flatonpro' ); ?></td>
													<td><?php echo get_the_category_list( ', ', '', $post->ID ); ?></td>
												</tr>
												<tr>
													<td><?php esc_html_e( 'Project Website :','flatonpro' ); ?></td>
													<td><a href="<?php echo $project_url; ?>"><?php echo $project_link_text; ?></a></td>
												</tr>
											</table>										
										</div>
										<div class="two-thirds column omega">
											<h3><?php esc_html_e('Project Description','flatonpro'); ?></h3>
											<?php the_content(); ?>										
										</div>
									</div>
								</div>
							</section> <!-- end article section -->
							<?php else : ?>
							<section class="row">
								<div class="thumbnail two-thirds column alpha">
									<?php the_post_thumbnail( 'blog_large' ); ?>
								</div>
								<div class="one-third column omega">
									<h3><?php esc_html_e('Project Description','flatonpro'); ?></h3>
									<?php the_content(); ?>
									<h4><?php esc_html_e( 'Project Details','flatonpro' ); ?></h4>
									<?php
										$project_url = get_post_meta( $post->ID, 'portfolio_project_url', true );
										$project_link_text = get_post_meta( $post->ID, 'portfolio_project_link_text', true );
									?>
									<dl>
										<dt><?php esc_html_e( 'Skill needed','flatonpro' ); ?></dt>
										<dd><?php echo the_terms( $post->ID, 'skills', '', ', ', '' ); ?></dd>
										<dt><?php esc_html_e( 'Category','flatonpro'); ?></dt>
										<dd><?php echo get_the_category_list( ', ', '', $post->ID ); ?></dd>
										<dt><?php esc_html_e( 'Project Website','flatonpro' ); ?></dt>
										<dd><a href="<?php echo $project_url; ?>"><?php echo $project_link_text; ?></a></dd>
									</dl>
								</div>
							</section> <!-- end article section -->
							<?php endif; ?>
							

							<section class="related-posts clearfix">
								<?php
									if( isset($webulous_options['show_related_posts']) && $webulous_options['show_related_posts'] && function_exists( 'nvraj_related_posts' ) ) {
										nvraj_related_posts();
									}
								?>
			
						</article> <!-- end article -->
					<?php endwhile; ?>
					<?php 
						if( $webulous_options['pagenavi'] && function_exists( 'webulous_pagination' ) ) : 
							webulous_pagination();
						else :
							webulous_posts_nav();
						endif; 
					?>
				<?php else : ?>
						
						<article id="post-not-found">
							
							<header class ="article-header">
								<h1 class="article-title"><?php _e("Page Not Found", 'flatonpro'); ?></h1>
							</header>
							
							<section class="article-content">
								<p>
									<?php 
										printf( __('The page you were looking for was not found!. You can return %s or search for the page you were looking for.', 'flatonpro'), sprintf( '<a href="%1$s" title="%2$s">%3$s</a>', esc_url( get_home_url() ), esc_attr__('Home', 'flatonpro'), esc_attr__('&larr; Home', 'flatonpro') )); 
									?>
								</p>
							</section>

							<footer class="article-footer">
								<p>
									<?php 
										_e("This is the error message in the page.php template.", 'flatonpro'); 
									?>
								</p>
							</footer>

						</article>
						
				<?php endif; ?>						

			</main><!-- #main -->
		</div><!-- #primary -->

		</div><!-- .row -->
	</div><!-- .container -->
		
	<?php get_footer(); ?>