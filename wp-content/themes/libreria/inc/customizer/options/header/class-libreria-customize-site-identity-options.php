<?php
/**
 * Class to include site identity customize options.
 *
 * Class Libreria_Customize_Site_Identity_Options
 *
 * @package    ThemeGrill
 * @subpackage Libreria
 * @since      Libreria 1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Class to include site identity customize options.
 *
 * Class Libreria_Customize_Site_Identity_Options
 */
class Libreria_Customize_Site_Identity_Options extends Libreria_Customize_Base_Option {

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
				'name'        => 'libreria_retina_logo',
				'type'        => 'control',
				'control'     => 'image',
				'label'       => esc_html__( 'Retina Logo', 'libreria' ),
				'description' => esc_html__( 'Upload 2X times the size of your current logo. Eg: If your current logo size is 115*50 then upload 230*100 sized logo.', 'libreria' ),
				'section'     => 'title_tagline',
				'priority'    => 7,
			),

			array(
				'name'        => 'libreria_site_logo_height',
				'default'     => '',
				'suffix'      => 'px',
				'type'        => 'control',
				'control'     => 'libreria-slider',
				'label'       => esc_html__( 'Logo Height', 'libreria' ),
				'section'     => 'title_tagline',
				'priority'    => 7,
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
				),
			),

			array(
				'name'     => 'libreria_site_identity_colors_heading',
				'type'     => 'control',
				'control'  => 'libreria-title',
				'label'    => esc_html__( 'Colors', 'libreria' ),
				'section'  => 'title_tagline',
				'priority' => 15,
			),

			array(
				'name'     => 'libreria_site_title_colors_group',
				'default'  => '',
				'type'     => 'control',
				'control'  => 'libreria-group',
				'label'    => esc_html__( 'Site Title', 'libreria' ),
				'section'  => 'title_tagline',
				'priority' => 20,
			),

			array(
				'name'     => 'libreria_site_title_color',
				'default'  => '#181818',
				'type'     => 'sub-control',
				'control'  => 'libreria-color',
				'parent'   => 'libreria_site_title_colors_group',
				'tab'      => esc_html__( 'Normal', 'libreria' ),
				'section'  => 'title_tagline',
				'priority' => 20,
			),

			array(
				'name'     => 'libreria_site_title_hover_color',
				'default'  => '#925040',
				'type'     => 'sub-control',
				'control'  => 'libreria-color',
				'parent'   => 'libreria_site_title_colors_group',
				'tab'      => esc_html__( 'Hover', 'libreria' ),
				'section'  => 'title_tagline',
				'priority' => 20,
			),
		);

		$options = array_merge( $options, $configs );

		return $options;
	}
}

return new Libreria_Customize_Site_Identity_Options();
