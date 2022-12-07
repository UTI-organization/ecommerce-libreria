<?php
/**
 * The template for displaying all single posts.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Libreria
 * @since   1.0.0
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php libreria_content_single(); ?>

	</main><!-- #main -->

<?php
get_footer();
