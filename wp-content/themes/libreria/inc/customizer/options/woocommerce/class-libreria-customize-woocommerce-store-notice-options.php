<?php
/**
 * Class to include WooCommerce store notice customize options.
 *
 * Class Libreria_Customize_WooCommerce_Store_Notice_Options
 *
 * @package    ThemeGrill
 * @subpackage Libreria
 * @since      Libreria 1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Class to include WooCommerce store notice customize options.
 *
 * Class Libreria_Customize_WooCommerce_Store_Notice_Options
 */
class Libreria_Customize_WooCommerce_Store_Notice_Options extends Libreria_Customize_Base_Option {

	/**
	 * Include customize options.
	 *
	 * @param array                 $options      Customize options provided via the theme.
	 * @param \WP_Customize_Manager $wp_customize Theme Customizer object.
	 *
	 * @return mixed|void Customizer options for registering panels, sections as well as controls.
	 */
	public function register_options( $options, $wp_customize ) {

		$is_store_notice_showing = function() {

			if ( function_exists( 'is_store_notice_showing' ) && is_store_notice_showing() ) {
				return true;
			}

			return false;
		};

		$configs = array(

			array(
				'name'            => 'libreria_store_notice_layout_heading',
				'type'            => 'control',
				'control'         => 'libreria-title',
				'label'           => esc_html__( 'Layout', 'libreria' ),
				'section'         => 'woocommerce_store_notice',
				'priority'        => 20,
				'active_callback' => $is_store_notice_showing,
			),

			array(
				'name'            => 'libreria_store_notice_alignment',
				'default'         => 'left',
				'type'            => 'control',
				'control'         => 'select',
				'label'           => esc_html__( 'Alignment', 'libreria' ),
				'section'         => 'woocommerce_store_notice',
				'priority'        => 25,
				'choices'         => array(
					'left'  => esc_html__( 'Left', 'libreria' ),
					'right' => esc_html__( 'Right', 'libreria' ),
				),
				'active_callback' => $is_store_notice_showing,
			),

			array(
				'name'            => 'libreria_store_notice_colors_heading',
				'type'            => 'control',
				'control'         => 'libreria-title',
				'label'           => esc_html__( 'Colors', 'libreria' ),
				'section'         => 'woocommerce_store_notice',
				'priority'        => 30,
				'active_callback' => $is_store_notice_showing,
			),

			array(
				'name'            => 'libreria_store_notice_text_color',
				'default'         => '',
				'type'            => 'control',
				'control'         => 'libreria-color',
				'label'           => esc_html__( 'Text', 'libreria' ),
				'section'         => 'woocommerce_store_notice',
				'priority'        => 35,
				'active_callback' => $is_store_notice_showing,
			),

			array(
				'name'            => 'libreria_store_notice_link_color',
				'default'         => '',
				'type'            => 'control',
				'control'         => 'libreria-color',
				'label'           => esc_html__( 'Link', 'libreria' ),
				'section'         => 'woocommerce_store_notice',
				'priority'        => 40,
				'active_callback' => $is_store_notice_showing,
			),

			array(
				'name'            => 'libreria_store_notice_background_color',
				'default'         => '',
				'type'            => 'control',
				'control'         => 'libreria-color',
				'label'           => esc_html__( 'Background', 'libreria' ),
				'section'         => 'woocommerce_store_notice',
				'priority'        => 45,
				'active_callback' => $is_store_notice_showing,
			),
		);

		return array_merge( $options, $configs );
	}
}

return new Libreria_Customize_WooCommerce_Store_Notice_Options();
