<?php
/**
 * The Header for our theme.
 * Displays all of the <head> section and everything up till <div id="content">
 * @package Webulous
 *
 */
global $webulous_options;
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title( '|', true, 'right' ); ?></title>

<?php if( isset( $webulous_options['ipad-icon-retina'] ) ) : ?>
	<!-- For third-generation iPad with high-resolution Retina display: -->
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $webulous_options['ipad-icon-retina']['url']; ?>">
<?php endif; ?>

<?php if( isset( $webulous_options['iphone-icon-retina'] ) ) : ?>
	<!-- For iPhone with high-resolution Retina display: -->
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $webulous_options['iphone-icon-retina']['url']; ?>">
<?php endif; ?>

<?php if( isset( $webulous_options['ipad-icon'] ) ) : ?>
	<!-- For first- and second-generation iPad: -->
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $webulous_options['ipad-icon']['url']; ?>">
<?php endif; ?>

<?php if( isset( $webulous_options['iphone-icon'] ) ) : ?>
	<!-- For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
	<link rel="apple-touch-icon-precomposed" href="<?php echo $webulous_options['iphone-icon']['url']; ?>">
<?php endif; ?>

<?php if( isset( $webulous_options['favicon'] ) ) : ?>
	<link rel="icon" href="<?php echo $webulous_options['favicon']['url']; ?>">
<?php endif; ?>

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php if( isset($webulous_options['analytics-place']) ) {
	if ( $webulous_options['analytics-place'] == 0 ){
		echo $webulous_options['google-analytics'];
	}
}
?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="hfeed site">
	<?php if( get_header_image() ) : ?>
		<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" style="position: absolute;" />
	<?php endif; ?>

		<header id="masthead" class="site-header header-wrap" role="banner">
			<div class="container">

				<div class="logo site-branding eight columns">

					<?php if( isset( $webulous_options['site-title'] ) && isset( $webulous_options['custom-logo'] ) && $webulous_options['site-title'] ) : ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo $webulous_options['custom-logo']['url']; ?>" alt="logo" ></a>
					<?php else : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php if( isset( $webulous_options['site-description'] ) && $webulous_options['site-description'] != 0 ) : ?>
							<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
						<?php endif; ?>
					<?php endif; ?>
					<?php if( ! isset( $webulous_options['site-description'] ) ) : ?>
						<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
					<?php endif; ?>

				</div><!-- .site-branding -->

				<div class="eight columns">
					<div class="top-right">
						<?php dynamic_sidebar( 'header-top-right' ); ?>
					</div>					
				</div>

			</div>
		</header><!-- #masthead -->
		<div class="nav-wrap">
			<div class="container">
				<nav id="site-navigation" class="main-navigation" role="navigation">
					<h1 class="menu-toggle"><?php _e( 'Menu', 'flatonpro' ); ?></h1>
					<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'flatonpro' ); ?></a>
					<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
				</nav><!-- #site-navigation -->
			</div>
		</div>		