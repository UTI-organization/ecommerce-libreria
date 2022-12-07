<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Libreria
 * @since   1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

			</div> <!-- /.libreria-row from header.php -->
		</div> <!-- /.libreria-container from header.php -->
	</div> <!-- /#content from header.php -->

	<footer id="colophon" class="libreria-footer">
		<?php libreria_footer_columns(); ?>
		<?php libreria_footer_bar(); ?>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php libreria_footer_bottom(); ?>

<?php wp_footer(); ?>

</body>
</html>
