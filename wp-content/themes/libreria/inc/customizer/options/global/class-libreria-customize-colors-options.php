<?php
/**
 * Class to include Colors customize options.
 *
 * Class Libreria_Customize_Colors_Options
 *
 * @package    ThemeGrill
 * @subpackage Libreria
 * @since      Libreria 1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Class to include Colors customize options.
 *
 * Class Libreria_Customize_Colors_Options
 */
class Libreria_Customize_Colors_Options extends Libreria_Customize_Base_Option {

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
				'name'     => 'libreria_primary_color_heading',
				'type'     => 'control',
				'control'  => 'libreria-title',
				'label'    => esc_html__( 'Primary Colors', 'libreria' ),
				'section'  => 'libreria_global_colors_section',
				'priority' => 10,
			),

			array(
				'name'     => 'libreria_base_color',
				'default'  => '#2C1810',
				'type'     => 'control',
				'control'  => 'libreria-color',
				'label'    => esc_html__( 'Base Color', 'libreria' ),
				'section'  => 'libreria_global_colors_section',
				'priority' => 20,
			),

			array(
				'name'     => 'libreria_accent_color',
				'default'  => '#D03737',
				'type'     => 'control',
				'control'  => 'libreria-color',
				'label'    => esc_html__( 'Accent Color', 'libreria' ),
				'section'  => 'libreria_global_colors_section',
				'priority' => 30,
			),

			array(
				'name'     => 'libreria_headings_color_heading',
				'type'     => 'control',
				'control'  => 'libreria-title',
				'label'    => esc_html__( 'Headings', 'libreria' ),
				'section'  => 'libreria_global_colors_section',
				'priority' => 40,
			),

			array(
				'name'     => 'libreria_headings_color',
				'default'  => '#2C1810',
				'type'     => 'control',
				'control'  => 'libreria-color',
				'label'    => esc_html__( 'Headings', 'libreria' ),
				'section'  => 'libreria_global_colors_section',
				'priority' => 50,
			),

			array(
				'name'     => 'libreria_link_color_heading',
				'type'     => 'control',
				'control'  => 'libreria-title',
				'label'    => esc_html__( 'Link Colors', 'libreria' ),
				'section'  => 'libreria_global_colors_section',
				'priority' => 60,
			),

			array(
				'name'     => 'libreria_link_color_group',
				'type'     => 'control',
				'control'  => 'libreria-group',
				'label'    => esc_html__( 'Color', 'libreria' ),
				'section'  => 'libreria_global_colors_section',
				'priority' => 60,
			),

			array(
				'name'     => 'libreria_link_color',
				'default'  => '#2C1810',
				'type'     => 'sub-control',
				'control'  => 'libreria-color',
				'tab'      => esc_html__( 'Normal', 'libreria' ),
				'parent'   => 'libreria_link_color_group',
				'section'  => 'libreria_global_colors_section',
				'priority' => 70,
			),

			array(
				'name'     => 'libreria_link_hover_color',
				'default'  => 'rgba(44, 24, 16, 0.6)',
				'type'     => 'sub-control',
				'control'  => 'libreria-color',
				'tab'      => esc_html__( 'Hover', 'libreria' ),
				'parent'   => 'libreria_link_color_group',
				'section'  => 'libreria_global_colors_section',
				'priority' => 80,
			),

			array(
				'name'     => 'libreria_button_color_heading',
				'type'     => 'control',
				'control'  => 'libreria-title',
				'label'    => esc_html__( 'Colors', 'libreria' ),
				'section'  => 'libreria_global_button_section',
				'priority' => 10,
			),

			array(
				'name'     => 'libreria_button_text_color_group',
				'default'  => '',
				'type'     => 'control',
				'control'  => 'libreria-group',
				'label'    => esc_html__( 'Text Color', 'libreria' ),
				'section'  => 'libreria_global_button_section',
				'priority' => 20,
			),

			array(
				'name'     => 'libreria_button_text_color',
				'default'  => '#FFF',
				'type'     => 'sub-control',
				'control'  => 'libreria-color',
				'parent'   => 'libreria_button_text_color_group',
				'tab'      => esc_html__( 'Normal', 'libreria' ),
				'section'  => 'libreria_global_button_section',
				'priority' => 20,
			),

			array(
				'name'     => 'libreria_button_text_hover_color',
				'default'  => '',
				'type'     => 'sub-control',
				'control'  => 'libreria-color',
				'parent'   => 'libreria_button_text_color_group',
				'tab'      => esc_html__( 'Hover', 'libreria' ),
				'section'  => 'libreria_global_button_section',
				'priority' => 20,
			),

			array(
				'name'     => 'libreria_button_bg_color_group',
				'default'  => '',
				'type'     => 'control',
				'control'  => 'libreria-group',
				'label'    => esc_html__( 'Background', 'libreria' ),
				'section'  => 'libreria_global_button_section',
				'priority' => 30,
			),

			array(
				'name'     => 'libreria_button_bg_color',
				'default'  => '#2C1810',
				'type'     => 'sub-control',
				'control'  => 'libreria-color',
				'parent'   => 'libreria_button_bg_color_group',
				'tab'      => esc_html__( 'Normal', 'libreria' ),
				'section'  => 'libreria_global_button_section',
				'priority' => 40,
			),

			array(
				'name'     => 'libreria_button_bg_hover_color',
				'default'  => '',
				'type'     => 'sub-control',
				'control'  => 'libreria-color',
				'parent'   => 'libreria_button_bg_color_group',
				'tab'      => esc_html__( 'Hover', 'libreria' ),
				'section'  => 'libreria_global_button_section',
				'priority' => 40,
			),
		);

		$options = array_merge( $options, $configs );

		return $options;
	}
}

return new Libreria_Customize_Colors_Options();
