<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Webulous
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'flatonpro' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php edit_post_link( __( 'Edit', 'flatonpro' ), '<footer class="entry-meta"><span class="edit-link"><i class="fa fa-edit"></i> ', '</span></footer>' ); ?>
</article><!-- #post-## -->
