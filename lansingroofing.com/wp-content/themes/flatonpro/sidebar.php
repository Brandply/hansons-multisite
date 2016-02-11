<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Webulous
 */
?>
	<div id="secondary" class="widget-area offset-by-one five columns" role="complementary">
		<?php do_action( 'before_sidebar' ); ?>

		<?php if( is_page() ) : ?>
			<?php generated_dynamic_sidebar(); ?>
		<?php else : ?>
		
			<?php if ( ! is_active_sidebar( 'sidebar-1' ) ) : ?>

			<aside id="search" class="widget widget_search">
				<?php get_search_form(); ?>
			</aside>

			<aside id="archives" class="widget">
				<h3 class="widget-title"><?php _e( 'Archives', 'flatonpro' ); ?></h3>
				<ul>
					<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
				</ul>
			</aside>

			<aside id="meta" class="widget">
				<h3 class="widget-title"><?php _e( 'Meta', 'flatonpro' ); ?></h3>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
			</aside>
		<?php else : ?>
		 	<?php dynamic_sidebar('sidebar-1' ); ?>
		<?php endif; // end sidebar widget area ?>

	<?php endif; ?>
	</div><!-- #secondary -->