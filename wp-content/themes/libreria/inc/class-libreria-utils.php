<?php
/**
 * Libreria utils class.
 *
 * @package Libreria
 * @since   1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Libreria utils.
 *
 * Class responsible for different utility methods.
 *
 * @since 1.0.0
 */
class Libreria_Utils {

	/**
	 * Is WooCommerce plugin active.
	 *
	 * @since 1.0.0
	 *
	 * @return bool True if WC plugin is active, false otherwise.
	 */
	public static function is_wc_active() {
		return class_exists( 'WooCommerce' );
	}

	/**
	 * Given an hex colors, returns an array with the colors components.
	 *
	 * @since  1.0.0
	 *
	 * @param string $hex Hex color.
	 * @return array      Array with color components (r, g, b).
	 */
	public static function get_rgba_values_from_hex( $hex ) {

		if ( false !== strpos( $hex, 'rgb' ) ) {
			$hex = self::rgba_to_hex( $hex );
		}

		// Format the hex color string.
		$hex  = str_replace( '#', '', $hex );
		$rgba = array();

		switch ( strlen( $hex ) ) {

			case 3:
				$rgba['r'] = hexdec( substr( $hex, 0, 1 ) . substr( $hex, 0, 1 ) );
				$rgba['g'] = hexdec( substr( $hex, 1, 1 ) . substr( $hex, 1, 1 ) );
				$rgba['b'] = hexdec( substr( $hex, 2, 1 ) . substr( $hex, 2, 1 ) );
				$rgba['a'] = 1;

				break;
			case 7:
			case 6:
				$rgba['r'] = hexdec( substr( $hex, 0, 2 ) );
				$rgba['g'] = hexdec( substr( $hex, 2, 2 ) );
				$rgba['b'] = hexdec( substr( $hex, 4, 2 ) );
				$rgba['a'] = 1;

				break;
			case 8:
				$rgba['r'] = hexdec( substr( $hex, 0, 2 ) );
				$rgba['g'] = hexdec( substr( $hex, 2, 2 ) );
				$rgba['b'] = hexdec( substr( $hex, 4, 2 ) );
				$rgba['a'] = hexdec( substr( $hex, 6, 2 ) ) / 255;
				break;
		}

		return $rgba;
	}

	/**
	 * Convert rgba to hex.
	 *
	 * @since  1.0.0
	 *
	 * @param string $rgba RGBA color value.
	 * @return string
	 */
	public static function rgba_to_hex( $rgba ) {

		$regex = '#\((([^()]+|(?R))*)\)#';

		if ( preg_match_all( $regex, $rgba, $matches ) ) {
			$rgba = explode( ',', implode( ' ', $matches[1] ) );
		} else {
			$rgba = explode( ',', $rgba );
		}

		$r_hex = dechex( $rgba['0'] );
		$g_hex = dechex( $rgba['1'] );
		$b_hex = dechex( $rgba['2'] );
		$a_hex = '';

		if ( array_key_exists( '3', $rgba ) ) {
			$a_hex = dechex( $rgba['3'] * 255 );
		}

		return '#' . $r_hex . $g_hex . $b_hex . $a_hex;
	}

	/**
	 * Generate hex/rgba color value by changing brightness.
	 *
	 * Useful for generating hover color values.
	 *
	 * @since  1.0.0
	 *
	 * @param string  $hex     Hex color value.
	 * @param integer $steps   -255 (darken) to 255 (brighten).
	 * @return string          hex or rgba color value depending on the param passed.
	 */
	public static function adjust_color_brightness( $hex, $steps ) {

		$steps = max( -255, min( 255, $steps ) );

		$rgb_values = self::get_rgba_values_from_hex( $hex );

		$r = max( 0, min( 255, $rgb_values['r'] + $steps ) );
		$g = max( 0, min( 255, $rgb_values['g'] + $steps ) );
		$b = max( 0, min( 255, $rgb_values['b'] + $steps ) );

		if ( $rgb_values['a'] >= 0 && $rgb_values['a'] < 1 && 1 !== $rgb_values['a'] ) {
			return 'rgba(' . $r . ',' . $g . ',' . $b . ',' . round( $rgb_values['a'], 2 ) . ')';
		}

		$r_hex = str_pad( dechex( $r ), 2, '0', STR_PAD_LEFT );
		$g_hex = str_pad( dechex( $g ), 2, '0', STR_PAD_LEFT );
		$b_hex = str_pad( dechex( $b ), 2, '0', STR_PAD_LEFT );

		return '#' . $r_hex . $g_hex . $b_hex;
	}

	/**
	 * Get featured image sizes.
	 *
	 * @since   1.0.0
	 * @param array $choices Desired image sizes.
	 * @return array
	 */
	public static function get_image_sizes( $choices = array() ) {

		global $_wp_additional_image_sizes;

		$default_image_sizes = get_intermediate_image_sizes();
		$image_sizes         = array();
		$size_choices        = array();

		foreach ( $default_image_sizes as $size ) {
			$image_sizes[ $size ]['width']  = intval( get_option( "{$size}_size_w" ) );
			$image_sizes[ $size ]['height'] = intval( get_option( "{$size}_size_h" ) );
			$image_sizes[ $size ]['crop']   = get_option( "{$size}_crop" ) ? get_option( "{$size}_crop" ) : false;
		}

		if ( isset( $_wp_additional_image_sizes ) && count( $_wp_additional_image_sizes ) ) {
			$image_sizes = array_merge( $image_sizes, $_wp_additional_image_sizes );
		}

		$image_sizes['full'] = array(
			'width'  => '',
			'height' => '',
			'crop'   => '',
		);

		if ( ! empty( $image_sizes ) ) {

			foreach ( $image_sizes as $key => $value ) {

				if ( ! in_array( $key, $choices, true ) ) {
					continue;
				}

				$name = ucwords( str_replace( array( '-', '_' ), ' ', $key ) );

				$size_choices[ $key ] = $name;

				if ( $value['width'] || $value['height'] ) {
					$size_choices[ $key ] .= ' (' . $value['width'] . 'x' . $value['height'] . ')';
				}
			}
		}

		return $size_choices;
	}

	/**
	 * Get sidebar name from id.
	 *
	 * @since 1.0.0
	 *
	 * @param string $sidebar_id Sidebar ID.
	 * @return mixed|string
	 */
	public static function get_sidebar_name_by_id( $sidebar_id = '' ) {

		global $wp_registered_sidebars;
		$sidebar_name = '';

		if ( isset( $wp_registered_sidebars[ $sidebar_id ] ) ) {
			$sidebar_name = $wp_registered_sidebars[ $sidebar_id ]['name'];
		}

		return $sidebar_name;
	}

	/**
	 * Get post id.
	 *
	 * @since  1.0.0
	 *
	 * @return mixed|void
	 */
	public static function get_the_id() {

		$post_id = '';

		if ( is_home() && 'page' === get_option( 'show_on_front' ) ) {
			$post_id = get_option( 'page_for_posts' );
		} elseif ( is_front_page() && 'page' === get_option( 'show_on_front' ) ) {
			$post_id = get_option( 'page_on_front' );
		} elseif ( is_singular() ) {
			$post_id = get_the_ID();
		}

		/**
		 * Filter for getting ID.
		 *
		 * @since   1.0.0
		 */
		return apply_filters( 'libreria_get_the_id', $post_id );
	}

	/**
	 * Check if page header has title.
	 *
	 * @since  1.0.0
	 *
	 * @return mixed|void
	 */
	public static function page_header_has_title() {

		$hidden = false;

		if ( ! get_theme_mod( 'libreria_page_header_title', true ) ) {
			$hidden = true;
		}

		/**
		 * Filter to determine if page header has title or not.
		 *
		 * @since   1.0.0
		 */
		return apply_filters( 'libreria_page_header_has_title', $hidden );
	}

	/**
	 * Check if page header has breadcrumbs.
	 *
	 * @since  1.0.0
	 *
	 * @return mixed|void
	 */
	public static function page_header_has_breadcrumbs() {

		$hidden = false;

		if ( ! get_theme_mod( 'libreria_breadcrumbs', true ) ) {
			$hidden = true;
		}

		/**
		 * Filter to determine if page header has breadcrumbs or not.
		 *
		 * @since   1.0.0
		 */
		return apply_filters( 'libreria_page_header_has_breadcrumbs', $hidden );
	}
}
