<?php
/**
 * The template best suited for pages with Gutenberg blocks and pages using page builder plugins.
 *
 * Template Name: Gutenberg Block / Page Builder (Libreria)
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 *
 * Remove comments, page content area spacing.
 *
 * @package Libreria
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content/content', 'page' );

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
