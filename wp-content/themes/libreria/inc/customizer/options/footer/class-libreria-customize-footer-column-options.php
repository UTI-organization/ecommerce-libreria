<?php
/**
 * Class to include footer column customize options.
 *
 * Class Libreria_Customize_Footer_Column_Options
 *
 * @package    ThemeGrill
 * @subpackage Libreria
 * @since      Libreria 1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Class to include footer column customize options.
 *
 * Class Libreria_Customize_Footer_Column_Options
 */
class Libreria_Customize_Footer_Column_Options extends Libreria_Customize_Base_Option {

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
			// Colors.
			array(
				'name'     => 'libreria_footer_column_colors_heading',
				'type'     => 'control',
				'control'  => 'libreria-title',
				'label'    => esc_html__( 'Colors', 'libreria' ),
				'section'  => 'libreria_footer_column_section',
				'priority' => 10,
			),

			array(
				'name'     => 'libreria_footer_column_background_color',
				'default'  => '',
				'type'     => 'control',
				'control'  => 'libreria-color',
				'label'    => esc_html__( 'Background Color', 'libreria' ),
				'section'  => 'libreria_footer_column_section',
				'priority' => 20,
			),

			array(
				'name'     => 'libreria_footer_column_heading_color',
				'default'  => '',
				'type'     => 'control',
				'control'  => 'libreria-color',
				'label'    => esc_html__( 'Heading Color', 'libreria' ),
				'section'  => 'libreria_footer_column_section',
				'priority' => 30,
			),

			array(
				'name'     => 'libreria_footer_column_text_color',
				'default'  => '',
				'type'     => 'control',
				'control'  => 'libreria-color',
				'label'    => esc_html__( 'Text Color', 'libreria' ),
				'section'  => 'libreria_footer_column_section',
				'priority' => 40,
			),

			array(
				'name'     => 'libreria_footer_column_link_color_group',
				'default'  => '',
				'type'     => 'control',
				'control'  => 'libreria-group',
				'label'    => esc_html__( 'Link Color', 'libreria' ),
				'section'  => 'libreria_footer_column_section',
				'priority' => 50,
			),

			array(
				'name'     => 'libreria_footer_column_link_color',
				'default'  => '',
				'type'     => 'sub-control',
				'control'  => 'libreria-color',
				'parent'   => 'libreria_footer_column_link_color_group',
				'tab'      => esc_html__( 'Normal', 'libreria' ),
				'section'  => 'libreria_footer_column_section',
				'priority' => 50,
			),

			array(
				'name'     => 'libreria_footer_column_link_hover_color',
				'default'  => '',
				'type'     => 'sub-control',
				'control'  => 'libreria-color',
				'parent'   => 'libreria_footer_column_link_color_group',
				'tab'      => esc_html__( 'Hover', 'libreria' ),
				'section'  => 'libreria_footer_column_section',
				'priority' => 50,
			),

			array(
				'name'     => 'libreria_footer_column_list_link_color_group',
				'default'  => '',
				'type'     => 'control',
				'control'  => 'libreria-group',
				'label'    => esc_html__( 'List Link Color', 'libreria' ),
				'section'  => 'libreria_footer_column_section',
				'priority' => 60,
			),

			array(
				'name'     => 'libreria_footer_column_list_link_color',
				'default'  => '',
				'type'     => 'sub-control',
				'control'  => 'libreria-color',
				'parent'   => 'libreria_footer_column_list_link_color_group',
				'tab'      => esc_html__( 'Normal', 'libreria' ),
				'section'  => 'libreria_footer_column_section',
				'priority' => 60,
			),

			array(
				'name'     => 'libreria_footer_column_list_link_hover_color',
				'default'  => '',
				'type'     => 'sub-control',
				'control'  => 'libreria-color',
				'parent'   => 'libreria_footer_column_list_link_color_group',
				'tab'      => esc_html__( 'Hover', 'libreria' ),
				'section'  => 'libreria_footer_column_section',
				'priority' => 60,
			),

			array(
				'name'       => 'libreria_footer_column_border_top_heading',
				'type'       => 'control',
				'control'    => 'libreria-title',
				'label'      => esc_html__( 'Border Top', 'libreria' ),
				'section'    => 'libreria_footer_column_section',
				'priority'   => 70,
			),

			array(
				'name'        => 'libreria_footer_column_border_top_size',
				'default'     => 2,
				'type'        => 'control',
				'control'     => 'libreria-slider',
				'label'       => esc_html__( 'Size', 'libreria' ),
				'section'     => 'libreria_footer_column_section',
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 20,
					'step' => 1,
				),
				'suffix'      => 'px',
				'priority'    => 80,
			),

			array(
				'name'       => 'libreria_footer_column_border_top_color',
				'default'    => '#EFDFD2',
				'type'       => 'control',
				'control'    => 'libreria-color',
				'label'      => esc_html__( 'Color', 'libreria' ),
				'section'    => 'libreria_footer_column_section',
				'priority'   => 90,
			),

			array(
				'name'     => 'libreria_footer_column_list_sep_heading',
				'type'     => 'control',
				'control'  => 'libreria-title',
				'label'    => esc_html__( 'List Separator', 'libreria' ),
				'section'  => 'libreria_footer_column_section',
				'priority' => 100,
			),

			array(
				'name'     => 'libreria_footer_column_list_sep',
				'default'  => true,
				'type'     => 'control',
				'control'  => 'libreria-toggle',
				'label'    => esc_html__( 'Enable', 'libreria' ),
				'section'  => 'libreria_footer_column_section',
				'priority' => 110,
			),

			array(
				'name'       => 'libreria_footer_column_list_sep_color',
				'default'    => '',
				'type'       => 'control',
				'control'    => 'libreria-color',
				'label'      => esc_html__( 'Color', 'libreria' ),
				'section'    => 'libreria_footer_column_section',
				'priority'   => 120,
				'dependency' => array(
					'libreria_footer_column_list_sep',
					'==',
					true,
				),
			),
		);

		$options = array_merge( $options, $configs );

		return $options;
	}
}

return new Libreria_Customize_Footer_Column_Options();
