<?php
/**
 * Class to include primary header customize options.
 *
 * Class Libreria_Customize_Primary_Header_Options
 *
 * @package    ThemeGrill
 * @subpackage Libreria
 * @since      Libreria 1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Class to include primary header customize options.
 *
 * Class Libreria_Customize_Primary_Header_Options
 */
class Libreria_Customize_Primary_Header_Options extends Libreria_Customize_Base_Option {

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
				'name'     => 'libreria_primary_header_full_width',
				'default'  => true,
				'type'     => 'control',
				'control'  => 'libreria-toggle',
				'label'    => esc_html__( 'Full Width', 'libreria' ),
				'section'  => 'libreria_primary_header_general_section',
				'priority' => 10,
			),

			array(
				'name'     => 'libreria_primary_header_colors_heading',
				'type'     => 'control',
				'control'  => 'libreria-title',
				'label'    => esc_html__( 'Primary Header', 'libreria' ),
				'section'  => 'libreria_primary_header_general_section',
				'priority' => 20,
			),

			array(
				'name'     => 'libreria_primary_header_background_color',
				'default'  => '#F6ECE5',
				'type'     => 'control',
				'control'  => 'libreria-color',
				'label'    => esc_html__( 'Background Color', 'libreria' ),
				'section'  => 'libreria_primary_header_general_section',
				'priority' => 30,
			),

			array(
				'name'       => 'libreria_primary_header_border_bottom_heading',
				'type'       => 'control',
				'control'    => 'libreria-title',
				'label'      => esc_html__( 'Border Bottom', 'libreria' ),
				'section'    => 'libreria_primary_header_general_section',
				'priority'   => 40,
			),

			array(
				'name'        => 'libreria_primary_header_border_bottom_size',
				'default'     => 1,
				'type'        => 'control',
				'control'     => 'libreria-slider',
				'label'       => esc_html__( 'Size', 'libreria' ),
				'section'     => 'libreria_primary_header_general_section',
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 20,
					'step' => 1,
				),
				'suffix'      => 'px',
				'priority'    => 50,
			),

			array(
				'name'       => 'libreria_primary_header_border_bottom_color',
				'default'    => '#EFDFD2',
				'type'       => 'control',
				'control'    => 'libreria-color',
				'label'      => esc_html__( 'Color', 'libreria' ),
				'section'    => 'libreria_primary_header_general_section',
				'priority'   => 60,
			),

			array(
				'name'     => 'libreria_primary_menu_color_heading',
				'type'     => 'control',
				'control'  => 'libreria-title',
				'label'    => esc_html__( 'Menu', 'libreria' ),
				'section'  => 'libreria_primary_menu_section',
				'priority' => 10,
			),

			array(
				'name'     => 'libreria_primary_menu_text_color_group',
				'default'  => '',
				'type'     => 'control',
				'control'  => 'libreria-group',
				'label'    => esc_html__( 'Color', 'libreria' ),
				'section'  => 'libreria_primary_menu_section',
				'priority' => 20,
			),

			array(
				'name'     => 'libreria_primary_menu_text_color',
				'default'  => '#111111',
				'type'     => 'sub-control',
				'control'  => 'libreria-color',
				'parent'   => 'libreria_primary_menu_text_color_group',
				'tab'      => esc_html__( 'Normal', 'libreria' ),
				'section'  => 'libreria_primary_menu_section',
				'priority' => 20,
			),

			array(
				'name'     => 'libreria_primary_menu_text_hover_color',
				'default'  => '#925040',
				'type'     => 'sub-control',
				'control'  => 'libreria-color',
				'parent'   => 'libreria_primary_menu_text_color_group',
				'tab'      => esc_html__( 'Hover', 'libreria' ),
				'section'  => 'libreria_primary_menu_section',
				'priority' => 20,
			),

			array(
				'name'     => 'libreria_primary_menu_text_active_color',
				'default'  => '#925040',
				'type'     => 'sub-control',
				'control'  => 'libreria-color',
				'parent'   => 'libreria_primary_menu_text_color_group',
				'tab'      => esc_html__( 'Active', 'libreria' ),
				'section'  => 'libreria_primary_menu_section',
				'priority' => 20,
			),

			array(
				'name'     => 'libreria_sub_menu_heading',
				'type'     => 'control',
				'control'  => 'libreria-title',
				'label'    => esc_html__( 'Sub Menu', 'libreria' ),
				'section'  => 'libreria_primary_menu_section',
				'priority' => 30,
			),

			array(
				'name'     => 'libreria_sub_menu_text_color_group',
				'default'  => '',
				'type'     => 'control',
				'control'  => 'libreria-group',
				'label'    => esc_html__( 'Color', 'libreria' ),
				'section'  => 'libreria_primary_menu_section',
				'priority' => 40,
			),

			array(
				'name'     => 'libreria_sub_menu_text_color',
				'default'  => '',
				'type'     => 'sub-control',
				'control'  => 'libreria-color',
				'parent'   => 'libreria_sub_menu_text_color_group',
				'tab'      => esc_html__( 'Normal', 'libreria' ),
				'section'  => 'libreria_primary_menu_section',
				'priority' => 40,
			),

			array(
				'name'     => 'libreria_sub_menu_text_hover_color',
				'default'  => '',
				'type'     => 'sub-control',
				'control'  => 'libreria-color',
				'parent'   => 'libreria_sub_menu_text_color_group',
				'tab'      => esc_html__( 'Hover', 'libreria' ),
				'section'  => 'libreria_primary_menu_section',
				'priority' => 40,
			),

			array(
				'name'     => 'libreria_sub_menu_text_active_color',
				'default'  => '',
				'type'     => 'sub-control',
				'control'  => 'libreria-color',
				'parent'   => 'libreria_sub_menu_text_color_group',
				'tab'      => esc_html__( 'Active', 'libreria' ),
				'section'  => 'libreria_primary_menu_section',
				'priority' => 40,
			),

			array(
				'name'     => 'libreria_sub_menu_background_color',
				'default'  => '',
				'type'     => 'control',
				'control'  => 'libreria-color',
				'label'    => esc_html__( 'Background Color', 'libreria' ),
				'section'  => 'libreria_primary_menu_section',
				'priority' => 50,
			),

			array(
				'name'     => 'libreria_hamburger_icon_heading',
				'type'     => 'control',
				'control'  => 'libreria-title',
				'label'    => esc_html__( 'Hamburger Icon', 'libreria' ),
				'section'  => 'libreria_primary_menu_section',
				'priority' => 60,
			),

			array(
				'name'     => 'libreria_hamburger_icon_color_group',
				'type'     => 'control',
				'control'  => 'libreria-group',
				'label'    => esc_html__( 'Color', 'libreria' ),
				'section'  => 'libreria_primary_menu_section',
				'priority' => 60,
			),

			array(
				'name'     => 'libreria_hamburger_icon_color',
				'default'  => '',
				'type'     => 'sub-control',
				'control'  => 'libreria-color',
				'tab'      => esc_html__( 'Normal', 'libreria' ),
				'parent'   => 'libreria_hamburger_icon_color_group',
				'section'  => 'libreria_primary_menu_section',
				'priority' => 70,
			),

			array(
				'name'     => 'libreria_hamburger_icon_hover_color',
				'default'  => '',
				'type'     => 'sub-control',
				'control'  => 'libreria-color',
				'tab'      => esc_html__( 'Hover', 'libreria' ),
				'parent'   => 'libreria_hamburger_icon_color_group',
				'section'  => 'libreria_primary_menu_section',
				'priority' => 80,
			),

			array(
				'name'     => 'libreria_header_search',
				'default'  => true,
				'type'     => 'control',
				'control'  => 'libreria-toggle',
				'label'    => esc_html__( 'Enable', 'libreria' ),
				'section'  => 'libreria_header_search_section',
				'priority' => 10,
			),

			array(
				'name'       => 'libreria_header_search_text',
				'default'    => Libreria_Utils::is_wc_active() ? esc_html__( 'Search Products...', 'libreria' ) : esc_html__( 'Search &hellip;', 'libreria' ),
				'type'       => 'control',
				'control'    => 'text',
				'label'      => esc_html__( 'Placeholder Text', 'libreria' ),
				'section'    => 'libreria_header_search_section',
				'transport'  => 'postMessage',
				'priority'   => 20,
				'dependency' => array(
					'libreria_header_search',
					'==',
					true,
				),
			),

			array(
				'name'     => 'libreria_header_sidebar_logo',
				'type'     => 'control',
				'control'  => 'image',
				'label'    => esc_html__( 'Logo', 'libreria' ),
				'section'  => 'libreria_header_sidebar_section',
				'priority' => 10,
			),

			array(
				'name'          => 'libreria_header_sidebar_widgets',
				'type'          => 'control',
				'control'       => 'libreria-navigate',
				'section'       => 'libreria_header_sidebar_section',
				'navigate_info' => array(
					'target_container' => 'section',
					'target_id'        => 'sidebar-widgets-libreria-header-sidebar',
					'target_label'     => esc_html__( 'Header Sidebar', 'libreria' ),
				),
				'priority'      => 20,
			),
		);

		$options = array_merge( $options, $configs );

		if ( Libreria_Utils::is_wc_active() ) {

			// Account.
			$configs[] = array(
				'name'     => 'libreria_header_wc_account_heading',
				'type'     => 'control',
				'control'  => 'libreria-title',
				'label'    => esc_html__( 'Account', 'libreria' ),
				'section'  => 'libreria_header_actions_section',
				'priority' => 10,
			);

			$configs[] = array(
				'name'     => 'libreria_header_wc_account',
				'default'  => true,
				'type'     => 'control',
				'control'  => 'libreria-toggle',
				'label'    => esc_html__( 'Enable', 'libreria' ),
				'section'  => 'libreria_header_actions_section',
				'priority' => 20,
			);

			// Cart.
			$configs[] = array(
				'name'     => 'libreria_header_cart_heading',
				'type'     => 'control',
				'control'  => 'libreria-title',
				'label'    => esc_html__( 'Cart', 'libreria' ),
				'section'  => 'libreria_header_actions_section',
				'priority' => 30,
			);

			$configs[] = array(
				'name'     => 'libreria_header_cart',
				'default'  => true,
				'type'     => 'control',
				'control'  => 'libreria-toggle',
				'label'    => esc_html__( 'Enable', 'libreria' ),
				'section'  => 'libreria_header_actions_section',
				'priority' => 40,
			);

			$configs[] = array(
				'name'       => 'libreria_header_mini_cart',
				'default'    => true,
				'type'       => 'control',
				'control'    => 'libreria-toggle',
				'label'      => esc_html__( 'Mini Cart', 'libreria' ),
				'section'    => 'libreria_header_actions_section',
				'priority'   => 50,
				'dependency' => array(
					'libreria_header_cart',
					'==',
					true,
				),
			);

			$configs[] = array(
				'name'       => 'libreria_header_cart_content_top_divider',
				'type'       => 'control',
				'control'    => 'libreria-divider',
				'section'    => 'libreria_header_actions_section',
				'priority'   => 60,
				'dependency' => array(
					'libreria_header_cart',
					'==',
					true,
				),
			);

			$configs[] = array(
				'name'       => 'libreria_header_cart_content_heading',
				'default'    => true,
				'type'       => 'control',
				'control'    => 'libreria-heading',
				'label'      => esc_html__( 'Content', 'libreria' ),
				'section'    => 'libreria_header_actions_section',
				'priority'   => 70,
				'dependency' => array(
					'libreria_header_cart',
					'==',
					true,
				),
			);

			$configs[] = array(
				'name'       => 'libreria_header_cart_items_count',
				'default'    => true,
				'type'       => 'control',
				'control'    => 'libreria-toggle',
				'label'      => esc_html__( 'Number of Items', 'libreria' ),
				'section'    => 'libreria_header_actions_section',
				'priority'   => 90,
				'dependency' => array(
					'libreria_header_cart',
					'==',
					true,
				),
			);

			$options = array_merge( $options, $configs );
		}

		return $options;
	}
}

return new Libreria_Customize_Primary_Header_Options();
