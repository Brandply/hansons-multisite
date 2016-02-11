<?php 
/*
	Template Name: Portfolio
 */
get_header(); ?>
		<style type="text/css">
			.item {
				overflow: hidden;
			  margin: 10px;
			}

			@media only screen and (max-width: 768px) {
				.item {
					width: 760px;
				}  
			}	
		</style>

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

		<div id="primary" class="content-area sixteen columns">
			
			<main id="main" class="site-main" role="main">

				<?php
					$query_string ="post_type=portfolio&paged=$paged";
					query_posts($query_string);
					$num_of_posts = $wp_query->post_count;
					$count = 0;
				?>

				<div id="filters">
				<?php 
					$terms = get_terms("skills");
					$count = count($terms);
					if ( $count > 0 ) : ?>
					<ul class="filter-options" data-option-key="filter">
						<li><a href="#filter" data-option-value="*">All</a></li>
						<?php foreach ( $terms as $term ) : ?>
						<li><a href="#filter" data-option-value=".<?php echo $term->name; ?>"><?php echo $term->name; ?></a></li>
						<?php endforeach; ?>
					</ul>
					<?php endif; ?>
					<div class="clearfix"></div>
				</div>

				<ul id="portfolio">
				<?php 
					if (have_posts()) : while (have_posts()) : 
						the_post();
						$terms = get_the_terms( $post->ID, 'skills' );
											
						if ( $terms && ! is_wp_error( $terms ) ) {
							$skills = array();
							foreach ( $terms as $term ) {
								$skills[] = $term->name;
							}
							$skills = join( " ", $skills );
						}
					?>
					<li class="item <?php echo $skills; ?>">

						<div class="portfolio1col">
						<?php
							$portfolio_video_type =  get_post_meta( $post->ID, 'portfolio_video_type', true);
							$portfolio_video_id =  trim(get_post_meta( $post->ID, 'portfolio_video_id', true));
							$portfolio_project_url =  trim(get_post_meta( $post->ID, 'portfolio_project_url', true));
							$portfolio_project_link_text =  trim(get_post_meta( $post->ID, 'portfolio_project_link_text', true));
						?>
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'portfolio1col' ); ?></a>
							<div class="portfolio1col_overlay" style="display: none;">
								<div class="overlay_icon" style="left: -42%;">
								<?php if( $portfolio_video_type != 'none' && $portfolio_video_id != '' ) :  ?>
									<?php if( $portfolio_video_type == 'vimeo' ) : ?>
										<a href="http://vimeo.com/<?php echo $portfolio_video_id; ?>" rel="prettyPhoto"><img src="<?php echo FRAMEWORK_URI . '/images/icon-zoom.png'; ?>" alt="<?php the_title(); ?>"></a>
									<?php else : ?>
										<a href="http://www.youtube.com/watch?v=<?php echo $portfolio_video_id; ?>" rel="prettyPhoto"><img src="<?php echo FRAMEWORK_URI . '/images/icon-zoom.png'; ?>" alt="<?php the_title(); ?>"></a>
									<?php endif; ?>
								<?php else :  
									$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
										<a href="<?php echo $url; ?>" rel="prettyPhoto[elasti]"><img src="<?php echo FRAMEWORK_URI . '/images/icon-zoom.png'; ?>" alt="<?php the_title(); ?>"></a>
								<?php endif; ?>
									<a href="<?php the_permalink(); ?>" title="<?php the_title( ); ?>"><img src="<?php echo FRAMEWORK_URI . '/images/icon-link.png'; ?>" alt=""></a>
								</div>
							</div>
						</div>

						<div class="excerpt1">
							<h4>
								<a href="<?php the_permalink(); ?>" title="<?php _e( the_title_attribute(), 'flatonpro' ); ?>">
									<?php the_title(); ?>
								</a>
							</h4>
							<a href="<?php the_permalink(); ?>" class="btn-readmore">Read More</a>
						</div>

					</li>
					<?php endwhile; ?>
				
				</ul>
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

			</div> <!-- end #main -->
		</div> <!-- end #content -->

<?php get_footer(); ?>