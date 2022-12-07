<?php
/**
 * Class to include WooCommerce checkout customize options.
 *
 * Class Libreria_Customize_WooCommerce_Checkout_Options
 *
 * @package    ThemeGrill
 * @subpackage Libreria
 * @since      Libreria 1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Class to include WooCommerce checkout customize options.
 *
 * Class Libreria_Customize_WooCommerce_Checkout_Options
 */
class Libreria_Customize_WooCommerce_Checkout_Options extends Libreria_Customize_Base_Option {

	/**
	 * Include customize options.
	 *
	 * @param array                 $options      Customize options provided via the theme.
	 * @param \WP_Customize_Manager $wp_customize Theme Customizer object.
	 *
	 * @return mixed|void Customizer options for registering panels, sections as well as controls.
	 */
	public function register_options( $options, $wp_customize ) {

		$configs = array(

			array(
				'name'     => 'libreria_checkout_distraction_free_view',
				'default'  => false,
				'type'     => 'control',
				'control'  => 'libreria-toggle',
				'label'    => esc_html__( 'Distraction-Free View', 'libreria' ),
				'section'  => 'woocommerce_checkout',
				'priority' => 1,
			),
		);

		return array_merge( $options, $configs );
	}
}

return new Libreria_Customize_WooCommerce_Checkout_Options();
