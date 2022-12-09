<?php
/**
 * Class to include footer bar customize options.
 *
 * Class Libreria_Customize_Footer_Bar_Options
 *
 * @package    ThemeGrill
 * @subpackage Libreria
 * @since      Libreria 1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Class to include footer bar customize options.
 *
 * Class Libreria_Customize_Footer_Bar_Options
 */
class Libreria_Customize_Footer_Bar_Options extends Libreria_Customize_Base_Option {

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
				'name'        => 'libreria_footer_copyright_heading',
				'type'        => 'control',
				'control'     => 'libreria-title',
				'label'       => esc_html__( 'Copyright', 'libreria' ),
				'description' => esc_html__( 'Available Placeholders: {copyright} {site-title} {year} {theme-credit}', 'libreria' ),
				'section'     => 'libreria_footer_bar_section',
			),

			array(
				'name'      => 'libreria_footer_copyright',
				'default'   => sprintf(
					/* translators: 1: Copyright, 2: Site title, 3: Current year, 4: Theme credit */
					esc_html__( '%1$s %2$s %3$s | %4$s', 'libreria' ),
					'{copyright}',
					'{site-title}',
					'{year}',
					'{theme-credit}'
				),
				'type'      => 'control',
				'control'   => 'libreria-editor',
				'section'   => 'libreria_footer_bar_section',
				'transport' => 'postMessage',
				'partial'   => array(
					'selector'        => '.libreria-footer-bar-section-1',
					'render_callback' => 'Libreria_Customizer_Partials::render_customize_partial_footer_bar_section_one_html',
				),
			),

			// Colors.
			array(
				'name'    => 'libreria_footer_bar_colors_heading',
				'type'    => 'control',
				'control' => 'libreria-title',
				'label'   => esc_html__( 'Colors', 'libreria' ),
				'section' => 'libreria_footer_bar_section',
			),

			array(
				'name'    => 'libreria_footer_bar_background_color',
				'default' => '',
				'type'    => 'control',
				'control' => 'libreria-color',
				'label'   => esc_html__( 'Background Color', 'libreria' ),
				'section' => 'libreria_footer_bar_section',
			),

			array(
				'name'    => 'libreria_footer_bar_text_color',
				'default' => '',
				'type'    => 'control',
				'control' => 'libreria-color',
				'label'   => esc_html__( 'Text Color', 'libreria' ),
				'section' => 'libreria_footer_bar_section',
			),

			array(
				'name'     => 'libreria_footer_bar_link_color_group',
				'default'  => '',
				'type'     => 'control',
				'control'  => 'libreria-group',
				'label'    => esc_html__( 'Link Color', 'libreria' ),
				'section'  => 'libreria_footer_bar_section',
			),

			array(
				'name'     => 'libreria_footer_bar_link_color',
				'default'  => '',
				'type'     => 'sub-control',
				'control'  => 'libreria-color',
				'parent'   => 'libreria_footer_bar_link_color_group',
				'tab'      => esc_html__( 'Normal', 'libreria' ),
				'section'  => 'libreria_footer_bar_section',
			),

			array(
				'name'     => 'libreria_footer_bar_link__hover_color',
				'default'  => '',
				'type'     => 'sub-control',
				'control'  => 'libreria-color',
				'parent'   => 'libreria_footer_bar_link_color_group',
				'tab'      => esc_html__( 'Hover', 'libreria' ),
				'section'  => 'libreria_footer_bar_section',
			),
		);

		$options = array_merge( $options, $configs );

		return $options;
	}
}

return new Libreria_Customize_Footer_Bar_Options();
