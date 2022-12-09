<?php
/**
 * Class to include scroll to top customize options.
 *
 * Class Libreria_Customize_Scroll_To_Top_Options
 *
 * @package    ThemeGrill
 * @subpackage Libreria
 * @since      Libreria 1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Class to include scroll to top customize options.
 *
 * Class Libreria_Customize_Scroll_To_Top_Options
 */
class Libreria_Customize_Scroll_To_Top_Options extends Libreria_Customize_Base_Option {

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
				'name'     => 'libreria_scroll_to_top',
				'default'  => true,
				'type'     => 'control',
				'control'  => 'libreria-toggle',
				'label'    => esc_html__( 'Enable', 'libreria' ),
				'section'  => 'libreria_scroll_to_top',
				'priority' => 10,
			),

			array(
				'name'       => 'libreria_scroll_to_top_dimension_heading',
				'type'       => 'control',
				'control'    => 'libreria-title',
				'label'      => esc_html__( 'Dimension', 'libreria' ),
				'section'    => 'libreria_scroll_to_top',
				'priority'   => 20,
				'dependency' => array(
					'libreria_scroll_to_top',
					'==',
					true,
				),
			),

			array(
				'name'        => 'libreria_scroll_to_top_width',
				'default'     => 54,
				'suffix'      => 'px',
				'type'        => 'control',
				'control'     => 'libreria-slider',
				'label'       => esc_html__( 'Width', 'libreria' ),
				'section'     => 'libreria_scroll_to_top',
				'priority'    => 30,
				'input_attrs' => array(
					'min'  => 40,
					'max'  => 64,
					'step' => 1,
				),
				'dependency'  => array(
					'libreria_scroll_to_top',
					'==',
					true,
				),
			),

			array(
				'name'        => 'libreria_scroll_to_top_height',
				'default'     => 54,
				'suffix'      => 'px',
				'type'        => 'control',
				'control'     => 'libreria-slider',
				'label'       => esc_html__( 'Height', 'libreria' ),
				'section'     => 'libreria_scroll_to_top',
				'priority'    => 40,
				'input_attrs' => array(
					'min'  => 40,
					'max'  => 64,
					'step' => 1,
				),
				'dependency'  => array(
					'libreria_scroll_to_top',
					'==',
					true,
				),
			),

			array(
				'name'        => 'libreria_scroll_to_top_roundness',
				'default'     => 0,
				'suffix'      => 'px',
				'type'        => 'control',
				'control'     => 'libreria-slider',
				'label'       => esc_html__( 'Roundness', 'libreria' ),
				'section'     => 'libreria_scroll_to_top',
				'priority'    => 60,
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 32,
					'step' => 1,
				),
				'dependency'  => array(
					'libreria_scroll_to_top',
					'==',
					true,
				),
			),

			array(
				'name'        => 'libreria_scroll_to_top_icon_size',
				'default'     => 24,
				'suffix'      => 'px',
				'type'        => 'control',
				'control'     => 'libreria-slider',
				'label'       => esc_html__( 'Icon Size', 'libreria' ),
				'section'     => 'libreria_scroll_to_top',
				'priority'    => 70,
				'input_attrs' => array(
					'min'  => 20,
					'max'  => 40,
					'step' => 1,
				),
				'dependency'  => array(
					'libreria_scroll_to_top',
					'==',
					true,
				),
			),

			array(
				'name'       => 'libreria_scroll_to_top_colors_heading',
				'type'       => 'control',
				'control'    => 'libreria-title',
				'label'      => esc_html__( 'Colors', 'libreria' ),
				'section'    => 'libreria_scroll_to_top',
				'priority'   => 80,
				'dependency' => array(
					'libreria_scroll_to_top',
					'==',
					true,
				),
			),

			array(
				'name'       => 'libreria_scroll_to_top_bg_group',
				'type'       => 'control',
				'control'    => 'libreria-group',
				'label'      => esc_html__( 'Background', 'libreria' ),
				'section'    => 'libreria_scroll_to_top',
				'priority'   => 90,
				'dependency' => array(
					'libreria_scroll_to_top',
					'==',
					true,
				),
			),

			array(
				'name'       => 'libreria_scroll_to_top_background_color',
				'default'    => '',
				'type'       => 'sub-control',
				'control'    => 'libreria-color',
				'parent'     => 'libreria_scroll_to_top_bg_group',
				'tab'        => esc_html__( 'Normal', 'libreria' ),
				'section'    => 'libreria_scroll_to_top',
				'priority'   => 90,
				'dependency' => array(
					'libreria_scroll_to_top',
					'==',
					true,
				),
			),

			array(
				'name'       => 'libreria_scroll_to_top_bg_hover_color',
				'default'    => '',
				'type'       => 'sub-control',
				'control'    => 'libreria-color',
				'parent'     => 'libreria_scroll_to_top_bg_group',
				'tab'        => esc_html__( 'Hover', 'libreria' ),
				'section'    => 'libreria_scroll_to_top',
				'priority'   => 90,
				'dependency' => array(
					'libreria_scroll_to_top',
					'==',
					true,
				),
			),

			array(
				'name'       => 'libreria_scroll_to_top_icon_color_group',
				'type'       => 'control',
				'control'    => 'libreria-group',
				'label'      => esc_html__( 'Icon', 'libreria' ),
				'section'    => 'libreria_scroll_to_top',
				'priority'   => 100,
				'dependency' => array(
					'libreria_scroll_to_top',
					'==',
					true,
				),
			),

			array(
				'name'       => 'libreria_scroll_to_top_icon_color',
				'default'    => '',
				'type'       => 'sub-control',
				'control'    => 'libreria-color',
				'parent'     => 'libreria_scroll_to_top_icon_color_group',
				'tab'        => esc_html__( 'Normal', 'libreria' ),
				'section'    => 'libreria_scroll_to_top',
				'priority'   => 100,
				'dependency' => array(
					'libreria_scroll_to_top',
					'==',
					true,
				),
			),

			array(
				'name'       => 'libreria_scroll_to_top_icon_hover_color',
				'default'    => '',
				'type'       => 'sub-control',
				'control'    => 'libreria-color',
				'parent'     => 'libreria_scroll_to_top_icon_color_group',
				'tab'        => esc_html__( 'Hover', 'libreria' ),
				'section'    => 'libreria_scroll_to_top',
				'priority'   => 100,
				'dependency' => array(
					'libreria_scroll_to_top',
					'==',
					true,
				),
			),
		);

		$options = array_merge( $options, $configs );

		return $options;
	}
}

return new Libreria_Customize_Scroll_To_Top_Options();
