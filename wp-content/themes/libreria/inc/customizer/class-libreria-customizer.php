<?php
/**
 * Libreria customizer class for theme customize options.
 *
 * Class Libreria_Customizer
 *
 * @package    ThemeGrill
 * @subpackage Libreria
 * @since      Libreria 1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Libreria customizer class.
 *
 * Class Libreria_Customizer
 */
class Libreria_Customizer {

	/**
	 * Constructor - Sets up customizer.
	 */
	public function __construct() {
		// Load files extending customizer features.
		add_action( 'customize_register', array( $this, 'customize_register' ) );
		// load core customizer files.
		add_action( 'customize_register', array( $this, 'customize_include_core' ), 1 );
		// Load customizer files necessary for registering customizer options.
		add_action( 'customize_register', array( $this, 'customize_include' ), 1 );

		add_action( 'wp_enqueue_scripts', array( $this, 'customizer_dynamic_css' ) );
	}

	/**
	 * Include the required files for extending the custom Customize controls.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	public function customize_register( $wp_customize ) {
		// Override default.
		require get_template_directory() . '/inc/customizer/override-defaults.php';
	}

	/**
	 * Load core file for theme customizer framework.
	 */
	public function customize_include_core() {

		// load customizer framework.
		require dirname( __FILE__ ) . '/core/class-libreria-customizer-framework.php';
		require dirname( __FILE__ ) . '/core/class-libreria-customize-base-option.php';
	}

	/**
	 * Load the required files for Customize option.
	 */
	public function customize_include() {

		// Selective refresh partial.
		require get_template_directory() . '/inc/customizer/class-libreria-customizer-partials.php';

		// Register sections and panels.
		require get_template_directory() . '/inc/customizer/class-libreria-customizer-register-section-panel.php';

		/**
		 * Register options.
		 */
		// Global.
		require get_template_directory() . '/inc/customizer/options/global/class-libreria-customize-colors-options.php';
		require get_template_directory() . '/inc/customizer/options/global/class-libreria-customize-container-options.php';

		// Header.
		require get_template_directory() . '/inc/customizer/options/header/class-libreria-customize-site-identity-options.php';
		require get_template_directory() . '/inc/customizer/options/header/class-libreria-customize-primary-header-options.php';
		require get_template_directory() . '/inc/customizer/options/header/class-libreria-customize-page-header-options.php';

		// Content.
		require get_template_directory() . '/inc/customizer/options/content/class-libreria-customize-blog-options.php';
		require get_template_directory() . '/inc/customizer/options/content/class-libreria-customize-single-post-options.php';

		// Footer.
		require get_template_directory() . '/inc/customizer/options/footer/class-libreria-customize-footer-column-options.php';
		require get_template_directory() . '/inc/customizer/options/footer/class-libreria-customize-footer-bar-options.php';
		require get_template_directory() . '/inc/customizer/options/footer/class-libreria-customize-scroll-to-top-options.php';

		// WooCommerce.
		if ( Libreria_Utils::is_wc_active() ) {
			require get_template_directory() . '/inc/customizer/options/woocommerce/class-libreria-customize-woocommerce-shop-options.php';
			require get_template_directory() . '/inc/customizer/options/woocommerce/class-libreria-customize-woocommerce-single-product-options.php';
			require get_template_directory() . '/inc/customizer/options/woocommerce/class-libreria-customize-woocommerce-store-notice-options.php';
			require get_template_directory() . '/inc/customizer/options/woocommerce/class-libreria-customize-woocommerce-checkout-options.php';
		}
	}

	/**
	 * Adds inline styles.
	 *
	 * @return void
	 */
	public function customizer_dynamic_css() {

		wp_add_inline_style( 'libreria-style', Libreria_Dynamic_CSS::get_css() );
		wp_add_inline_style( 'libreria-woocommerce-style', Libreria_Dynamic_CSS::get_woocommerce_css() );
	}

	/**
	 * Undocumented function.
	 *
	 * @return void
	 */
	public function get_css() {

	}
}

return new Libreria_Customizer();
