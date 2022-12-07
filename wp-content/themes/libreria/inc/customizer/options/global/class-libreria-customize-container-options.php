<?php
/**
 * Class to include Container customize options.
 *
 * Class Libreria_Customize_Container_Options
 *
 * @package    ThemeGrill
 * @subpackage Libreria
 * @since      Libreria 1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Class to include Container customize options.
 *
 * Class Libreria_Customize_Container_Options
 */
class Libreria_Customize_Container_Options extends Libreria_Customize_Base_Option {

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
				'name'        => 'libreria_container_width',
				'default'     => 1440,
				'type'        => 'control',
				'control'     => 'libreria-slider',
				'suffix'      => 'px',
				'label'       => esc_html__( 'Container Width', 'libreria' ),
				'section'     => 'libreria_container_section',
				'priority'    => 10,
				'input_attrs' => array(
					'min'  => 768,
					'max'  => 1920,
					'step' => 1,
				),
			),
		);

		$options = array_merge( $options, $configs );

		return $options;
	}
}

return new Libreria_Customize_Container_Options();
