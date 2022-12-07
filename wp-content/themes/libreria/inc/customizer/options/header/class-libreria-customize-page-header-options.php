<?php
/**
 * Class to include page header customize options.
 *
 * Class Libreria_Customize_Page_Header_Options
 *
 * @package    ThemeGrill
 * @subpackage Libreria
 * @since      Libreria 1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Class to include page header customize options.
 *
 * Class Libreria_Customize_Page_Header_Options
 */
class Libreria_Customize_Page_Header_Options extends Libreria_Customize_Base_Option {

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
				'name'     => 'libreria_page_header_title_heading',
				'type'     => 'control',
				'control'  => 'libreria-title',
				'label'    => esc_html__( 'Title', 'libreria' ),
				'section'  => 'libreria_page_header_section',
				'priority' => 5,
			),

			array(
				'name'     => 'libreria_page_header_title',
				'default'  => true,
				'type'     => 'control',
				'control'  => 'libreria-toggle',
				'label'    => esc_html__( 'Enable', 'libreria' ),
				'section'  => 'libreria_page_header_section',
				'priority' => 10,
			),

			array(
				'name'     => 'libreria_breadcrumbs_heading',
				'type'     => 'control',
				'control'  => 'libreria-title',
				'label'    => esc_html__( 'Breadcrumbs', 'libreria' ),
				'section'  => 'libreria_page_header_section',
				'priority' => 15,
			),

			array(
				'name'     => 'libreria_breadcrumbs',
				'default'  => true,
				'type'     => 'control',
				'control'  => 'libreria-toggle',
				'label'    => esc_html__( 'Enable', 'libreria' ),
				'section'  => 'libreria_page_header_section',
				'priority' => 20,
			),
		);

		$options = array_merge( $options, $configs );

		return $options;
	}
}

return new Libreria_Customize_Page_Header_Options();
