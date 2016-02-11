<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Webulous
 */

get_header(); ?>
	<div id="content" class="site-content container">
		
		<div id="primary" class="content-area sixteen columns">
			
			<main id="main" class="site-main" role="main">			

				<section class="error-404 not-found">
					<header class="page-header">
						<h1 class="page-title"><?php _e( 'Oops! <span>404</span> Not Found.', 'flatonpro' ); ?></h1>
					</header><!-- .page-header -->

					<div class="page-content">
						<p><?php _e( '<h4>You will be out of the woods in a minute</h4><p>Sorry, the page you are looking for does not exist. Take a run around the block or tap the button below.</p>', 'flatonpro' ); ?></p>

					<table>
						<tr>
							<td><?php get_search_form(); ?></td>
							<td>OR</td>
							<td><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="backtohome">Go to Homepage</a></td>
						</tr>
					</table>
					</div><!-- .page-content -->
				</section><!-- .error-404 -->

			</main><!-- #main -->
		</div><!-- #primary -->
	</div>
		
<?php get_footer(); ?>