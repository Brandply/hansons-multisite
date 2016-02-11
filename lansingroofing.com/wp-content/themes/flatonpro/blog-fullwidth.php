<?php 
/*
	Template Name: Blog Large Full Width
 */
	global $webulous_options;
 	get_header();
?>
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
					$query_string ="post_type=post&paged=$paged";
					query_posts($query_string);
					$num_of_posts = $wp_query->post_count;
				?>		
					
				<?php if ( have_posts() ) : ?>

					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<div class="entry-content">
							<?php if( isset($webulous_options['featured-image'] ) && $webulous_options['featured-image'] ) : ?>
								<div class="thumb blog-thumb">
									<?php 
										if( has_post_thumbnail() && ! post_password_required() ) : 
											the_post_thumbnail('blog-full-width'); 
										else :
											echo '<img src="' . WEBULOUS_CHILD_URL . '/images/no-image-blog-full-width.png" />';
										endif;
									?>
								</div>
							<?php endif; ?>

							<div class="entry-body">
								<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title( '', '' ); ?></a></h1>
								<?php echo webulous_content_limit(); ?>
							</div>

							<?php
								wp_link_pages( array(
									'before' => '<div class="page-links">' . __( 'Pages:', 'flatonpro' ),
									'after'  => '</div>',
								) );
							?>
							<br class="clear" />
						</div><!-- .entry-content -->

						<footer class="entry-meta">
							<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
								<span class="posted-on"><?php webulous_post_date(); ?></span>
								<?php
									/* translators: used between list items, there is a space after the comma */
									$categories_list = get_the_category_list( __( ', ', 'flatonpro' ) );
									if ( $categories_list && webulous_categorized_blog() ) :
								?>
								<span class="cat-links">
									<i class="el-icon-list-alt"></i>
									<?php printf( __( ' %1$s', 'flatonpro' ), $categories_list ); ?>
								</span>
								<?php endif; // End if categories ?>

								<?php
									/* translators: used between list items, there is a space after the comma */
									$tags_list = get_the_tag_list( '', __( ', ', 'flatonpro' ) );
									if ( $tags_list ) :
								?>		
								<span class="tags-links">
									<i class="el-icon-tags"></i>
									<?php printf( __( ' %1$s', 'flatonpro' ), $tags_list ); ?>
								</span>
								<?php endif; // End if $tags_list ?>
							<?php endif; // End if 'post' == get_post_type() ?>
							<?php edit_post_link( __( '<span class="edit-link"><i class="el-icon-file-edit"></i> Edit</span>', 'flatonpro' ), '', '' ); ?>
						</footer><!-- .entry-meta -->
						
					</article><!-- #post-## -->
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

		<?php get_footer(); ?>