<?php
/**
 * The template for search form.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Libreria
 * @since   1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Filter for header product search placeholder.
 *
 * @since 1.0.0
 */
$search_text = apply_filters( 'libreria_search_placeholder', get_theme_mod( 'libreria_header_search_text', __( 'Search &hellip;', 'libreria' ) ) );

/**
 * Filter for header product search label.
 *
 * @since 1.0.0
 */
$search_label = apply_filters( 'libreria_search_label', _x( 'Search for:', 'label', 'libreria' ) );
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="screen-reader-text" for="search-field">
		<?php echo esc_attr( $search_label ); ?>
	</label>
	<input type="search" id="search-field" class="search-field" placeholder="<?php echo esc_attr( $search_text ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="<?php echo esc_attr( $search_label ); ?>">
	<button type="submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'libreria' ); ?>">
	</button>
</form>
