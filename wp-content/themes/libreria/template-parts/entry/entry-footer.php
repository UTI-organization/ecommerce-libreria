<?php
/**
 * Template part for entry footer.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Libreria
 * @since   1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Filter for read more text.
 *
 * @since 1.0.0
 */
$libreria_read_more_text = apply_filters( 'libreria_read_more_text', __( 'Read More', 'libreria' ) );
?>

<footer class="entry-footer">
	<a href="<?php the_permalink(); ?>" class="libreria-entry-cta">
		<span class="read-more-text"><?php echo esc_html( $libreria_read_more_text ); ?></span>
	</a>
</footer><!-- .entry-summary -->
