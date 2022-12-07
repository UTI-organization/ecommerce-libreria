<?php
/**
 * Class to include WooCommerce shop customize options.
 *
 * Class Libreria_Customize_WooCommerce_Shop_Options
 *
 * @package    ThemeGrill
 * @subpackage Libreria
 * @since      Libreria 1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Class to include WooCommerce shop customize options.
 *
 * Class Libreria_Customize_WooCommerce_Shop_Options
 */
class Libreria_Customize_WooCommerce_Shop_Options extends Libreria_Customize_Base_Option {

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
				'name'     => 'libreria_shop_general_heading',
				'type'     => 'control',
				'control'  => 'libreria-title',
				'label'    => esc_html__( 'General', 'libreria' ),
				'section'  => 'libreria_woocommerce_shop_section',
				'priority' => 10,
			),

			array(
				'name'     => 'libreria_checkout_panel_after_add_to_cart',
				'default'  => false,
				'type'     => 'control',
				'control'  => 'libreria-toggle',
				'label'    => esc_html__( 'Checkout Panel After Add to Cart', 'libreria' ),
				'section'  => 'libreria_woocommerce_shop_section',
				'priority' => 20,
			),

			array(
				'name'     => 'libreria_shop_filter',
				'default'  => true,
				'type'     => 'control',
				'control'  => 'libreria-toggle',
				'label'    => esc_html__( 'Filter', 'libreria' ),
				'section'  => 'libreria_woocommerce_shop_section',
				'priority' => 30,
			),

			array(
				'name'     => 'libreria_shop_product_result_count',
				'default'  => true,
				'type'     => 'control',
				'control'  => 'libreria-toggle',
				'label'    => esc_html__( 'Product Result Count', 'libreria' ),
				'section'  => 'libreria_woocommerce_shop_section',
				'priority' => 40,
			),

			array(
				'name'     => 'libreria_shop_sale_badge_heading',
				'type'     => 'control',
				'control'  => 'libreria-title',
				'label'    => esc_html__( 'Sale Badge', 'libreria' ),
				'section'  => 'libreria_woocommerce_shop_section',
				'priority' => 50,
			),

			array(
				'name'     => 'libreria_shop_sale_badge',
				'default'  => true,
				'type'     => 'control',
				'control'  => 'libreria-toggle',
				'label'    => esc_html__( 'Enable', 'libreria' ),
				'section'  => 'libreria_woocommerce_shop_section',
				'priority' => 60,
			),

			array(
				'name'       => 'libreria_shop_sale_badge_text',
				'default'    => esc_html__( 'Sale!', 'libreria' ),
				'type'       => 'control',
				'control'    => 'text',
				'label'      => esc_html__( 'Text', 'libreria' ),
				'section'    => 'libreria_woocommerce_shop_section',
				'priority'   => 70,
				'dependency' => array(
					'libreria_shop_sale_badge',
					'==',
					true,
				),
			),

			array(
				'name'     => 'libreria_shop_product_elements_heading',
				'type'     => 'control',
				'control'  => 'libreria-title',
				'label'    => esc_html__( 'Product Elements', 'libreria' ),
				'section'  => 'libreria_woocommerce_shop_section',
				'priority' => 90,
			),

			array(
				'name'       => 'libreria_shop_product_elements',
				'default'    => array(
					'title',
					'rating',
					'price',
					'add_to_cart',
				),
				'type'       => 'control',
				'control'    => 'libreria-sortable',
				'section'    => 'libreria_woocommerce_shop_section',
				'choices'    => array(
					'title'       => esc_html__( 'Title', 'libreria' ),
					'rating'      => esc_html__( 'Rating', 'libreria' ),
					'price'       => esc_html__( 'Price', 'libreria' ),
					'add_to_cart' => esc_html__( 'Add to Cart', 'libreria' ),
				),
				'unsortable' => array(
					'title',
					'rating',
					'price',
					'add_to_cart',
				),
				'priority'   => 100,
			),

			array(
				'name'     => 'libreria_shop_layout_heading',
				'type'     => 'control',
				'control'  => 'libreria-title',
				'label'    => esc_html__( 'Layout', 'libreria' ),
				'section'  => 'libreria_woocommerce_shop_section',
				'priority' => 110,
			),

			array(
				'name'        => 'libreria_shop_column_gap',
				'default'     => 2,
				'suffix'      => 'em',
				'type'        => 'control',
				'control'     => 'libreria-slider',
				'label'       => esc_html__( 'Column Gap', 'libreria' ),
				'section'     => 'libreria_woocommerce_shop_section',
				'priority'    => 140,
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 5,
					'step' => 0.1,
				),
			),

			array(
				'name'        => 'libreria_shop_row_gap',
				'default'     => 2,
				'suffix'      => 'em',
				'type'        => 'control',
				'control'     => 'libreria-slider',
				'label'       => esc_html__( 'Row Gap', 'libreria' ),
				'section'     => 'libreria_woocommerce_shop_section',
				'priority'    => 150,
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 5,
					'step' => 0.1,
				),
			),

			array(
				'name'     => 'libreria_shop_image_alignment',
				'default'  => 'center',
				'type'     => 'control',
				'control'  => 'select',
				'label'    => esc_html__( 'Image Alignment', 'libreria' ),
				'section'  => 'libreria_woocommerce_shop_section',
				'choices'  => array(
					'left'   => esc_html__( 'Left', 'libreria' ),
					'center' => esc_html__( 'Center', 'libreria' ),
					'full'   => esc_html__( 'Full', 'libreria' ),
				),
				'priority' => 160,
			),

			array(
				'name'     => 'libreria_shop_content_alignment',
				'default'  => 'left',
				'type'     => 'control',
				'control'  => 'select',
				'label'    => esc_html__( 'Content Alignment', 'libreria' ),
				'section'  => 'libreria_woocommerce_shop_section',
				'choices'  => array(
					'left'   => esc_html__( 'Left', 'libreria' ),
					'center' => esc_html__( 'Center', 'libreria' ),
				),
				'priority' => 170,
			),

			array(
				'name'     => 'libreria_shop_colors_heading',
				'type'     => 'control',
				'control'  => 'libreria-title',
				'label'    => esc_html__( 'Colors', 'libreria' ),
				'section'  => 'libreria_woocommerce_shop_section',
				'priority' => 180,
			),

			array(
				'name'     => 'libreria_shop_title_color',
				'default'  => '',
				'type'     => 'control',
				'control'  => 'libreria-color',
				'label'    => esc_html__( 'Title', 'libreria' ),
				'section'  => 'libreria_woocommerce_shop_section',
				'priority' => 190,
			),

			array(
				'name'     => 'libreria_shop_price_color',
				'default'  => '',
				'type'     => 'control',
				'control'  => 'libreria-color',
				'label'    => esc_html__( 'Price', 'libreria' ),
				'section'  => 'libreria_woocommerce_shop_section',
				'priority' => 200,
			),

			array(
				'name'     => 'libreria_shop_sale_badge_text_color',
				'default'  => '',
				'type'     => 'control',
				'control'  => 'libreria-color',
				'label'    => esc_html__( 'Sale Badge Text', 'libreria' ),
				'section'  => 'libreria_woocommerce_shop_section',
				'priority' => 210,
			),

			array(
				'name'     => 'libreria_shop_sale_badge_background_color',
				'default'  => '',
				'type'     => 'control',
				'control'  => 'libreria-color',
				'label'    => esc_html__( 'Sale Badge Background', 'libreria' ),
				'section'  => 'libreria_woocommerce_shop_section',
				'priority' => 220,
			),


			array(
				'name'     => 'libreria_shop_pagination_heading',
				'type'     => 'control',
				'control'  => 'libreria-title',
				'label'    => esc_html__( 'Pagination', 'libreria' ),
				'section'  => 'libreria_woocommerce_shop_section',
				'priority' => 230,
			),

			array(
				'name'       => 'libreria_shop_pagination_style',
				'default'    => 'number',
				'type'       => 'control',
				'control'    => 'select',
				'label'      => esc_html__( 'Style', 'libreria' ),
				'section'    => 'libreria_woocommerce_shop_section',
				'choices'    => array(
					'number'        => esc_html__( 'Number', 'libreria' ),
					'infinite-load' => esc_html__( 'Infinite Load', 'libreria' ),
				),
				'priority'   => 240,
			),

			array(
				'name'       => 'libreria_shop_infinite_load_event',
				'default'    => 'button',
				'type'       => 'control',
				'control'    => 'select',
				'label'      => esc_html__( 'Event', 'libreria' ),
				'section'    => 'libreria_woocommerce_shop_section',
				'choices'    => array(
					'button' => esc_html__( 'Button', 'libreria' ),
					'scroll' => esc_html__( 'Scroll', 'libreria' ),
				),
				'priority'   => 250,
				'dependency' => array(
					'libreria_shop_pagination_style',
					'===',
					'infinite-load',
				),
			),
		);

		return array_merge( $options, $configs );
	}
}

return new Libreria_Customize_WooCommerce_Shop_Options();
