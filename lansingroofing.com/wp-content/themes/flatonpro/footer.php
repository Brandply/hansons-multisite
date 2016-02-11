<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Webulous
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="footer-top">
			<div class="container">
				<?php
					global $webulous_options;
					if( $webulous_options['footer-widgets'] ) {
						get_template_part('footer','widgets');
					} 
				?>
			</div>
		</div>


		<div class="footer-bottom copy">
			<div class="container">
				<div class="eight columns">
					<?php if( $webulous_options['footer-text'] ) : ?>
						<p><?php echo $webulous_options['footer-text']; ?></p>
					<?php else : ?>
						<p>
						<?php do_action( 'webulous_credits' ); ?>
						Powered by <a href="http://wordpress.org/"><?php printf( __( '%s', 'flatonpro' ), 'WordPress' ); ?></a>
						<span class="sep"> | </span>
						<?php printf( __( 'Theme: %1$s by %2$s.', 'flatonpro' ), 'FlatOn', '<a href="http://www.webulousthemes.com" rel="author">Webulous Themes</a>' ); ?>
						</p>
					<?php endif; ?>
				</div>
				<?php if(isset($webulous_options['footer-menu']) && isset($webulous_options['enable-footer-menu']) && $webulous_options['enable-footer-menu']) : ?>
				<div class="eight columns">
					<?php wp_nav_menu( array('menu' => $webulous_options['footer-menu'])); ?>
				</div>
				<?php endif; ?>
			</div>
		</div><!-- .site-info -->			
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php if( isset($webulous_options['analytics-place']) && $webulous_options['analytics-place'] == 1 ){
	echo $webulous_options['google-analytics'];
}
?>
<?php wp_footer(); ?>
</body>
</html>