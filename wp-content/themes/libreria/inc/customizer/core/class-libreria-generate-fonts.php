<?php
/**
 * Helper class to enqueue fonts.
 *
 * Class Libreria_Fonts
 *
 * @package    ThemeGrill
 * @subpackage Libreria
 * @since      Libreria 3.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Helper class to enqueue fonts.
 *
 * Class Libreria_Generate_Fonts
 */
class Libreria_Generate_Fonts {

	/**
	 * Get fonts to generate.
	 *
	 * @var array
	 */
	private static $fonts = array();

	/**
	 * Adds data to the $fonts array for a font to be rendered.
	 *
	 * @param string $name        The name key of the font to add.
	 * @param array  $font_weight An array of weight variants.
	 *
	 * @return void
	 */
	public static function add_font( $name, $font_weight = array() ) {

		if ( ! is_array( $font_weight ) ) {
			// For multiple variant selectons for fonts.
			$font_weight = explode( ',', $font_weight );
		}

		if ( ! empty( $font_weight ) && isset( self::$fonts[ $name ] ) ) {
			foreach ( (array) $font_weight as $variant ) {
				if ( ! in_array( $variant, self::$fonts[ $name ]['font-weight'], true ) ) {
					self::$fonts[ $name ]['font-weight'][] = $variant;
				}
			}
		} else {
			self::$fonts[ $name ] = array(
				'font-weight' => (array) $font_weight,
			);
		}

	}

	/**
	 * Get Fonts
	 */
	public static function get_fonts() {

		/**
		 * Fires immediately google fonts is generated.
		 *
		 * @since 1.0.0
		 */
		do_action( 'libreria_get_fonts' );

		/**
		 * Filter for generated fonts.
		 *
		 * @since 1.0.0
		 */
		return apply_filters( 'libreria_add_fonts', self::$fonts );

	}

	/**
	 * Renders the <link> tag for all fonts in the $fonts array.
	 *
	 * @return void
	 */
	public static function render_fonts() {

		/**
		 * Filter for rendering fonts.
		 *
		 * @since 1.0.0
		 */
		$font_list = apply_filters( 'libreria_render_fonts', self::get_fonts() );

		$google_fonts = array();
		$font_subset  = array();

		$system_fonts = Libreria_Fonts::get_system_fonts();

		foreach ( $font_list as $name => $font ) {
			if ( ! empty( $name ) && ! isset( $system_fonts[ $name ] ) ) {

				// Add font variants.
				$google_fonts[ $name ] = $font['font-weight'];

				/**
				 * Add subset.
				 *
				 * Filter for font subset.
				 *
				 * @since 1.0.0
				 */
				$subset = apply_filters( 'libreria_font_subset', '', $name );
				if ( ! empty( $subset ) ) {
					$font_subset = array_unique( $subset );
				}
			}
		}

		$google_font_url = self::google_fonts_url( $google_fonts, $font_subset );
		wp_enqueue_style( 'libreria_googlefonts', $google_font_url, array(), LIBRERIA_VERSION, 'all' );

	}

	/**
	 * Google Font URL.
	 * Combine multiple google font in one URL.
	 *
	 * @param array $fonts   Google Fonts array.
	 * @param array $subsets Font's Subsets array.
	 *
	 * @return string
	 */
	public static function google_fonts_url( $fonts, $subsets = array() ) {

		$base_url  = '//fonts.googleapis.com/css';
		$font_args = array();
		$family    = array();

		/**
		 * Filter for selected google fonts.
		 *
		 * @since 1.0.0
		 */
		$fonts = apply_filters( 'libreria_google_fonts_selected', $fonts );

		/* Format Each Font Family in Array */
		foreach ( $fonts as $font_name => $font_weight ) {
			$font_name = str_replace( ' ', '+', $font_name );

			if ( ! empty( $font_weight ) ) {
				if ( is_array( $font_weight ) ) {
					$font_weight = implode( ',', $font_weight );
				}

				$font_family = explode( ',', $font_name );
				$font_family = str_replace( "'", '', $font_family[0] );
				$family[]    = trim( $font_family . ':' . rawurlencode( trim( $font_weight ) ) );
			} else {
				$family[] = trim( $font_name );
			}
		}

		/* Only return URL if font family defined. */
		if ( ! empty( $family ) ) {

			/* Make Font Family a String */
			$family = implode( '|', $family );

			/* Add font family in args */
			$font_args['family'] = $family;

			/* Add font subsets in args */
			if ( ! empty( $subsets ) ) {

				/* format subsets to string */
				if ( is_array( $subsets ) ) {
					$subsets = implode( ',', $subsets );
				}

				$font_args['subset'] = rawurlencode( trim( $subsets ) );
			}

			return add_query_arg( array( $font_args, '&display=swap' ), $base_url );
		}

		return '';
	}

}
