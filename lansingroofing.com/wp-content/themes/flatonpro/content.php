<?php
/**
 * @package Webulous
 */
global $webulous_options;
?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<div class="entry-content">
				<?php if( isset($webulous_options['featured-image'] ) && $webulous_options['featured-image'] ) : ?>
					<div class="thumb">
						<?php 
							if( has_post_thumbnail() && ! post_password_required() ) : 
								the_post_thumbnail('blog-large'); 
							endif;
						?>
					</div>
				<?php endif; ?>

				<div class="entry-body">
					<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title( '', '' ); ?></a></h1>
					<?php if( 'post' == get_post_type() ) : ?>
						<?php echo webulous_content_limit(); ?>
					<?php else : ?>
						<?php the_content( ); ?>
					<?php endif; ?>
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