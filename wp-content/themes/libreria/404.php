<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link    https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Libreria
 * @since   1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

	<main id="primary" class="site-main">

		<section class="error-404 not-found">
			<header class="page-header">
				<img class="error-img" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/404.png" alt="<?php echo esc_attr__( 'Page not found', 'libreria' ); ?>">
				<p><?php esc_html_e( 'Oops! That page can\'t be found ', 'libreria' ); ?></p>
			</header><!-- .page-header -->

			<div class="page-content">
			<p><?php esc_html_e( 'Sorry, but the page you are looking for is not found. Please make sure you have typed the correct URL.', 'libreria' ); ?></p>

				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="libreria-btn">
					<span><?php esc_html_e( 'Go to Home Page', 'libreria' ); ?></span>
				</a>

			</div><!-- .page-content -->
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
