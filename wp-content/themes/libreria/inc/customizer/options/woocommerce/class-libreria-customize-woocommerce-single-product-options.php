<?php
/**
 * Class to include WooCommerce single product customize options.
 *
 * Class Libreria_Customize_WooCommerce_Single_Product_Options
 *
 * @package    ThemeGrill
 * @subpackage Libreria
 * @since      Libreria 1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Class to include WooCommerce single product customize options.
 *
 * Class Libreria_Customize_WooCommerce_Single_Product_Options
 */
class Libreria_Customize_WooCommerce_Single_Product_Options extends Libreria_Customize_Base_Option {

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
				'name'     => 'libreria_single_product_general_heading',
				'type'     => 'control',
				'control'  => 'libreria-title',
				'label'    => esc_html__( 'General', 'libreria' ),
				'section'  => 'libreria_woocommerce_single_product_section',
				'priority' => 10,
			),

			array(
				'name'        => 'libreria_single_product_image_area_width',
				'default'     => 50,
				'suffix'      => '%',
				'type'        => 'control',
				'control'     => 'libreria-slider',
				'label'       => esc_html__( 'Image Area Width', 'libreria' ),
				'section'     => 'libreria_woocommerce_single_product_section',
				'priority'    => 20,
				'input_attrs' => array(
					'min'  => 40,
					'max'  => 70,
					'step' => 1,
				),
			),

			array(
				'name'     => 'libreria_add_to_cart_panel_on_scroll',
				'default'  => false,
				'type'     => 'control',
				'control'  => 'libreria-toggle',
				'label'    => esc_html__( 'Add to Cart Panel on Scroll', 'libreria' ),
				'section'  => 'libreria_woocommerce_single_product_section',
				'priority' => 30,
			),

			array(
				'name'     => 'libreria_single_product_sale_badge_heading',
				'type'     => 'control',
				'control'  => 'libreria-title',
				'label'    => esc_html__( 'Sale Badge', 'libreria' ),
				'section'  => 'libreria_woocommerce_single_product_section',
				'priority' => 50,
			),

			array(
				'name'     => 'libreria_single_product_sale_badge',
				'default'  => true,
				'type'     => 'control',
				'control'  => 'libreria-toggle',
				'label'    => esc_html__( 'Enable', 'libreria' ),
				'section'  => 'libreria_woocommerce_single_product_section',
				'priority' => 60,
			),

			array(
				'name'     => 'libreria_single_product_elements_heading',
				'type'     => 'control',
				'control'  => 'libreria-title',
				'label'    => esc_html__( 'Product Structure', 'libreria' ),
				'section'  => 'libreria_woocommerce_single_product_section',
				'priority' => 90,
			),

			array(
				'name'       => 'libreria_single_product_elements',
				'default'    => array(
					'meta',
					'tabs',
				),
				'type'       => 'control',
				'control'    => 'libreria-sortable',
				'section'    => 'libreria_woocommerce_single_product_section',
				'choices'    => array(
					'meta' => esc_html__( 'Product Meta Information', 'libreria' ),
					'tabs' => esc_html__( 'Tabs', 'libreria' ),
				),
				'unsortable' => array(
					'meta',
					'tabs',
				),
				'priority'   => 100,
			),

			array(
				'name'     => 'libreria_related_products_heading',
				'type'     => 'control',
				'control'  => 'libreria-title',
				'label'    => esc_html__( 'Related Products', 'libreria' ),
				'section'  => 'libreria_woocommerce_single_product_section',
				'priority' => 110,
			),

			array(
				'name'     => 'libreria_related_products',
				'default'  => true,
				'type'     => 'control',
				'control'  => 'libreria-toggle',
				'label'    => esc_html__( 'Enable', 'libreria' ),
				'section'  => 'libreria_woocommerce_single_product_section',
				'priority' => 120,
			),

			array(
				'name'        => 'libreria_related_products_count',
				'default'     => 4,
				'suffix'      => '',
				'type'        => 'control',
				'control'     => 'libreria-slider',
				'label'       => esc_html__( 'Number of Products', 'libreria' ),
				'section'     => 'libreria_woocommerce_single_product_section',
				'priority'    => 130,
				'input_attrs' => array(
					'min'  => 2,
					'max'  => 6,
					'step' => 1,
				),
			),

			array(
				'name'     => 'libreria_related_products_column',
				'default'  => '4',
				'type'     => 'control',
				'control'  => 'select',
				'label'    => esc_html__( 'Column', 'libreria' ),
				'section'  => 'libreria_woocommerce_single_product_section',
				'priority' => 140,
				'choices'  => array(
					'2' => esc_html__( '2', 'libreria' ),
					'3' => esc_html__( '3', 'libreria' ),
					'4' => esc_html__( '4', 'libreria' ),
					'5' => esc_html__( '5', 'libreria' ),
					'6' => esc_html__( '6', 'libreria' ),
				),
			),

			array(
				'name'     => 'libreria_upsell_products_heading',
				'type'     => 'control',
				'control'  => 'libreria-title',
				'label'    => esc_html__( 'Upsell Products', 'libreria' ),
				'section'  => 'libreria_woocommerce_single_product_section',
				'priority' => 150,
			),

			array(
				'name'     => 'libreria_upsell_products',
				'default'  => true,
				'type'     => 'control',
				'control'  => 'libreria-toggle',
				'label'    => esc_html__( 'Enable', 'libreria' ),
				'section'  => 'libreria_woocommerce_single_product_section',
				'priority' => 160,
			),

			array(
				'name'        => 'libreria_upsell_products_count',
				'default'     => 4,
				'suffix'      => '',
				'type'        => 'control',
				'control'     => 'libreria-slider',
				'label'       => esc_html__( 'Number of Products', 'libreria' ),
				'section'     => 'libreria_woocommerce_single_product_section',
				'priority'    => 170,
				'input_attrs' => array(
					'min'  => 2,
					'max'  => 4,
					'step' => 1,
				),
			),

			array(
				'name'     => 'libreria_upsell_products_column',
				'default'  => '4',
				'type'     => 'control',
				'control'  => 'select',
				'label'    => esc_html__( 'Column', 'libreria' ),
				'section'  => 'libreria_woocommerce_single_product_section',
				'priority' => 180,
				'choices'  => array(
					'2' => esc_html__( '2', 'libreria' ),
					'3' => esc_html__( '3', 'libreria' ),
					'4' => esc_html__( '4', 'libreria' ),
				),
			),
		);

		return array_merge( $options, $configs );
	}
}

return new Libreria_Customize_WooCommerce_Single_Product_Options();
