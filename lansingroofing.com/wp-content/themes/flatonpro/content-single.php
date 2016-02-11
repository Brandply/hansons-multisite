<?php
/**
 * @package Webulous
 */
global $webulous_options;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title( '','' ); ?></h1>

		<div class="entry-meta">
			<?php webulous_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php if( isset( $webulous_options['single-featured-image'] ) && $webulous_options['single-featured-image'] ) : ?>
			<?php if( has_post_thumbnail() ) : ?>
				<div class="post-thumb blog-thumb">
					<?php the_post_thumbnail('blog-large'); ?>
				</div>
			<?php endif; ?>
		<?php endif; ?>
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'flatonpro' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php if( $webulous_options['show-post-meta'] ) : ?>
	<footer class="entry-meta">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
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

	</footer><!-- .entry-meta -->
	<?php endif; ?>
</article><!-- #post-## -->