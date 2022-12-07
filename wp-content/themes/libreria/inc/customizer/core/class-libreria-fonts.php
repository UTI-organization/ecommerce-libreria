<?php
/**
 * Helper class for font settings for this theme.
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
 * Helper class for font settings for this theme.
 *
 * Class Libreria_Fonts
 */
class Libreria_Fonts {

	/**
	 * System Fonts
	 *
	 * @var array
	 */
	public static $system_fonts = array();

	/**
	 * Google Fonts
	 *
	 * @var array
	 */
	public static $google_fonts = array();

	/**
	 * Custom Fonts
	 *
	 * @var array
	 */
	public static $custom_fonts = array();

	/**
	 * Font variants
	 *
	 * @var array
	 */
	public static $font_variants = array();

	/**
	 * Google font subsets
	 *
	 * @var array
	 */
	public static $google_font_subsets = array();

	/**
	 * Get system fonts.
	 *
	 * @return mixed|void
	 */
	public static function get_system_fonts() {

		if ( empty( self::$system_fonts ) ) :

			self::$system_fonts = array(

				'default'                               => array(
					'family' => 'default',
					'label'  => 'Default',
				),
				'Georgia,Times,"Times New Roman",serif' => array(
					'family' => 'Georgia,Times,"Times New Roman",serif',
					'label'  => 'serif',
				),
				'-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", Helvetica, Arial, sans-serif' => array(
					'family' => '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", Helvetica, Arial, sans-serif',
					'label'  => 'sans-serif',
				),
				'Monaco,"Lucida Sans Typewriter","Lucida Typewriter","Courier New",Courier,monospace' => array(
					'family' => 'Monaco,"Lucida Sans Typewriter","Lucida Typewriter","Courier New",Courier,monospace',
					'label'  => 'monospace',
				),

			);

		endif;

		/**
		 * Filter for system fonts.
		 *
		 * @since 1.0.0
		 */
		return apply_filters( 'libreria_system_fonts', self::$system_fonts );

	}

	/**
	 * Get Google fonts.
	 * It's array is generated from the google-fonts.json file.
	 *
	 * @return mixed|void
	 */
	public static function get_google_fonts() {

		if ( empty( self::$google_fonts ) ) :

			/**
			 * Filter for google fonts json file path.
			 *
			 * @since 1.0.0
			 */
			$google_fonts_file = apply_filters( 'libreria_google_fonts_json_file', dirname( __FILE__ ) . '/custom-controls/typography/google-fonts.json' );

			if ( ! file_exists( $google_fonts_file ) ) {
				return array();
			}

			ob_start();

			include_once $google_fonts_file;

			$google_fonts_json = json_decode( ob_get_clean(), true );

			foreach ( $google_fonts_json['items'] as $key => $font ) {

				$google_fonts[ $font['family'] ] = array(
					'family'   => $font['family'],
					'label'    => $font['family'],
					'variants' => $font['variants'],
					'subsets'  => $font['subsets'],
				);

				self::$google_fonts = $google_fonts;

			}

		endif;

		/**
		 * Filter for system fonts.
		 *
		 * @since 1.0.0
		 */
		return apply_filters( 'libreria_system_fonts', self::$google_fonts );

	}

	/**
	 * Get custom fonts.
	 *
	 * @return mixed|void
	 */
	public static function get_custom_fonts() {

		/**
		 * Filter for custom fonts.
		 *
		 * @since 1.0.0
		 */
		return apply_filters( 'libreria_custom_fonts', self::$custom_fonts );

	}

	/**
	 * Get font variants.
	 *
	 * @return mixed|void
	 */
	public static function get_font_variants() {

		if ( empty( self::$font_variants ) ) :

			self::$font_variants = array(
				'100'       => esc_html__( 'Thin 100', 'libreria' ),
				'100italic' => esc_html__( 'Thin 100 Italic', 'libreria' ),
				'200'       => esc_html__( 'Extra-Light 200', 'libreria' ),
				'200italic' => esc_html__( 'Extra-Light 200 Italic', 'libreria' ),
				'300'       => esc_html__( 'Light 300', 'libreria' ),
				'300italic' => esc_html__( 'Light 300 Italic', 'libreria' ),
				'regular'   => esc_html__( 'Regular 400', 'libreria' ),
				'italic'    => esc_html__( 'Regular 400 Italic', 'libreria' ),
				'500'       => esc_html__( 'Medium 500', 'libreria' ),
				'500italic' => esc_html__( 'Medium 500 Italic', 'libreria' ),
				'600'       => esc_html__( 'Semi-Bold 600', 'libreria' ),
				'600italic' => esc_html__( 'Semi-Bold 600 Italic', 'libreria' ),
				'700'       => esc_html__( 'Bold 700', 'libreria' ),
				'700italic' => esc_html__( 'Bold 700 Italic', 'libreria' ),
				'800'       => esc_html__( 'Extra-Bold 800', 'libreria' ),
				'800italic' => esc_html__( 'Extra-Bold 800 Italic', 'libreria' ),
				'900'       => esc_html__( 'Black 900', 'libreria' ),
				'900italic' => esc_html__( 'Black 900 Italic', 'libreria' ),
			);

		endif;

		/**
		 * Filter for font variants.
		 *
		 * @since 1.0.0
		 */
		return apply_filters( 'libreria_font_variants', self::$font_variants );

	}

	/**
	 * Get Google font subsets.
	 *
	 * @return mixed|void
	 */
	public static function get_google_font_subsets() {

		if ( empty( self::$google_font_subsets ) ) :

			self::$google_font_subsets = array(
				'arabic'              => esc_html__( 'Arabic', 'libreria' ),
				'bengali'             => esc_html__( 'Bengali', 'libreria' ),
				'chinese-hongkong'    => esc_html__( 'Chinese (Hong Kong)', 'libreria' ),
				'chinese-simplified'  => esc_html__( 'Chinese (Simplified)', 'libreria' ),
				'chinese-traditional' => esc_html__( 'Chinese (Traditional)', 'libreria' ),
				'cyrillic'            => esc_html__( 'Cyrillic', 'libreria' ),
				'cyrillic-ext'        => esc_html__( 'Cyrillic Extended', 'libreria' ),
				'devanagari'          => esc_html__( 'Devanagari', 'libreria' ),
				'greek'               => esc_html__( 'Greek', 'libreria' ),
				'greek-ext'           => esc_html__( 'Greek Extended', 'libreria' ),
				'gujarati'            => esc_html__( 'Gujarati', 'libreria' ),
				'gurmukhi'            => esc_html__( 'Gurmukhi', 'libreria' ),
				'hebrew'              => esc_html__( 'Hebrew', 'libreria' ),
				'japanese'            => esc_html__( 'Japanese', 'libreria' ),
				'kannada'             => esc_html__( 'Kannada', 'libreria' ),
				'khmer'               => esc_html__( 'Khmer', 'libreria' ),
				'korean'              => esc_html__( 'Korean', 'libreria' ),
				'latin'               => esc_html__( 'Latin', 'libreria' ),
				'latin-ext'           => esc_html__( 'Latin Extended', 'libreria' ),
				'malayalam'           => esc_html__( 'Malayalam', 'libreria' ),
				'myanmar'             => esc_html__( 'Myanmar', 'libreria' ),
				'oriya'               => esc_html__( 'Oriya', 'libreria' ),
				'sinhala'             => esc_html__( 'Sinhala', 'libreria' ),
				'tamil'               => esc_html__( 'Tamil', 'libreria' ),
				'telugu'              => esc_html__( 'Telugu', 'libreria' ),
				'thai'                => esc_html__( 'Thai', 'libreria' ),
				'tibetan'             => esc_html__( 'Tibetan', 'libreria' ),
				'vietnamese'          => esc_html__( 'Vietnamese', 'libreria' ),
			);

		endif;

		/**
		 * Filter for font variants.
		 *
		 * @since 1.0.0
		 */
		return apply_filters( 'libreria_font_variants', self::$google_font_subsets );

	}

}
