<?php
/**
 * Libreria customizer class for theme customize partials.
 *
 * Class Libreria_Customizer_Partials
 *
 * @package    ThemeGrill
 * @subpackage Libreria
 * @since      Libreria 1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Libreria customizer class for theme customize partials.
 *
 * Class Libreria_Customizer_Partials
 */
class Libreria_Customizer_Partials {

	/**
	 * Render the site logo for the selective refresh partial.
	 *
	 * @return void
	 */
	public static function render_customize_partial_custom_logo() {

		$logo = get_theme_mod( 'custom_logo' );

		if ( ! has_custom_logo() && ! $logo ) {
			bloginfo( 'name' );
		}

		the_custom_logo();
	}

	/**
	 * Render the site title for the selective refresh partial.
	 *
	 * @return void
	 */
	public static function render_customize_partial_blogname() {
		bloginfo( 'name' );
	}

	/**
	 * Render the site tagline for the selective refresh partial.
	 *
	 * @return void
	 */
	public static function render_customize_partial_blogdescription() {
		bloginfo( 'description' );
	}

	/**
	 * Render the footer bar section one html for the selective refresh partial.
	 *
	 * @return void
	 */
	public static function render_customize_partial_footer_bar_section_one_html() {
		libreria_footer_copyright_markup();
	}
}
