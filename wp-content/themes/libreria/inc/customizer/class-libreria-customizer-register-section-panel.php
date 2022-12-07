<?php
/**
 * Class to register panels and sections for customize options.
 *
 * Class Libreria_Customizer_Register_Section_Panel
 *
 * @package    ThemeGrill
 * @subpackage Libreria
 * @since      Libreria 1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Class to register panels and sections for customize options.
 *
 * Class Libreria_Customizer_Register_Section_Panel
 */
class Libreria_Customizer_Register_Section_Panel extends Libreria_Customize_Base_Option {

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

			/**
			 * Panels.
			 */
			array(
				'name'     => 'libreria_global_panel',
				'type'     => 'panel',
				'title'    => esc_html__( 'Global', 'libreria' ),
				'priority' => 5,
			),

			array(
				'name'     => 'libreria_header_panel',
				'type'     => 'panel',
				'title'    => esc_html__( 'Header', 'libreria' ),
				'priority' => 5,
			),

			array(
				'name'     => 'libreria_content_panel',
				'type'     => 'panel',
				'title'    => esc_html__( 'Content', 'libreria' ),
				'priority' => 5,
			),

			array(
				'name'     => 'libreria_content_panel',
				'type'     => 'panel',
				'title'    => esc_html__( 'Content', 'libreria' ),
				'priority' => 5,
			),

			array(
				'name'     => 'libreria_footer_panel',
				'type'     => 'panel',
				'title'    => esc_html__( 'Footer', 'libreria' ),
				'priority' => 5,
			),

			/**
			 * Global.
			 */
			// Colors.
			array(
				'name'     => 'libreria_global_colors_section',
				'type'     => 'section',
				'title'    => esc_html__( 'Colors', 'libreria' ),
				'panel'    => 'libreria_global_panel',
				'priority' => 10,
			),

			/**
			 * Layout.
			 */
			array(
				'name'     => 'libreria_layout_section',
				'type'     => 'section',
				'title'    => esc_html__( 'Layout', 'libreria' ),
				'panel'    => 'libreria_global_panel',
				'priority' => 20,
			),

			array(
				'name'     => 'libreria_container_section',
				'type'     => 'section',
				'title'    => esc_html__( 'Container', 'libreria' ),
				'panel'    => 'libreria_global_panel',
				'section'  => 'libreria_layout_section',
				'priority' => 10,
			),

			/**
			 * Button.
			 */
			array(
				'name'     => 'libreria_global_button_section',
				'type'     => 'section',
				'title'    => esc_html__( 'Button', 'libreria' ),
				'panel'    => 'libreria_global_panel',
				'priority' => 30,
			),

			/**
			 * Header.
			 */
			array(
				'name'     => 'title_tagline',
				'type'     => 'section',
				'title'    => esc_html__( 'Site Identity', 'libreria' ),
				'panel'    => 'libreria_header_panel',
				'priority' => 5,
			),

			array(
				'name'     => 'libreria_primary_header_section',
				'type'     => 'section',
				'title'    => esc_html__( 'Primary Header', 'libreria' ),
				'panel'    => 'libreria_header_panel',
				'priority' => 10,
			),

			array(
				'name'     => 'libreria_primary_header_general_section',
				'type'     => 'section',
				'title'    => esc_html__( 'General', 'libreria' ),
				'section'  => 'libreria_primary_header_section',
				'panel'    => 'libreria_header_panel',
				'priority' => 10,
			),

			array(
				'name'     => 'libreria_primary_menu_section',
				'type'     => 'section',
				'title'    => esc_html__( 'Primary Menu', 'libreria' ),
				'section'  => 'libreria_primary_header_section',
				'panel'    => 'libreria_header_panel',
				'priority' => 20,
			),

			array(
				'name'     => 'libreria_header_search_section',
				'type'     => 'section',
				'title'    => esc_html__( 'Search', 'libreria' ),
				'section'  => 'libreria_primary_header_section',
				'panel'    => 'libreria_header_panel',
				'priority' => 20,
			),

			array(
				'name'     => 'libreria_header_actions_section',
				'type'     => 'section',
				'title'    => esc_html__( 'Header Actions', 'libreria' ),
				'section'  => 'libreria_primary_header_section',
				'panel'    => 'libreria_header_panel',
				'priority' => 30,
			),

			array(
				'name'     => 'libreria_header_sidebar_section',
				'type'     => 'section',
				'title'    => esc_html__( 'Header Sidebar', 'libreria' ),
				'section'  => 'libreria_primary_header_section',
				'panel'    => 'libreria_header_panel',
				'priority' => 40,
			),

			array(
				'name'     => 'libreria_page_header_section',
				'type'     => 'section',
				'title'    => esc_html__( 'Page Header', 'libreria' ),
				'panel'    => 'libreria_header_panel',
				'priority' => 40,
			),

			/**
			 * Content.
			 */
			// Primary Header.
			array(
				'name'     => 'libreria_blog_section',
				'type'     => 'section',
				'title'    => esc_html__( 'Blog', 'libreria' ),
				'panel'    => 'libreria_content_panel',
				'priority' => 10,
			),

			/**
			 * Content.
			 */
			// Single Post.
			array(
				'name'     => 'libreria_single_post_section',
				'type'     => 'section',
				'title'    => esc_html__( 'Single Post', 'libreria' ),
				'panel'    => 'libreria_content_panel',
				'priority' => 10,
			),

			/**
			 * Footer.
			 */

			// Footer Column.
			array(
				'name'     => 'libreria_footer_column_section',
				'type'     => 'section',
				'title'    => esc_html__( 'Footer Column', 'libreria' ),
				'panel'    => 'libreria_footer_panel',
				'priority' => 20,
			),

			array(
				'name'     => 'libreria_footer_bar_section',
				'type'     => 'section',
				'title'    => esc_html__( 'Footer Bar', 'libreria' ),
				'panel'    => 'libreria_footer_panel',
				'priority' => 20,
			),

			array(
				'name'     => 'libreria_scroll_to_top',
				'type'     => 'section',
				'title'    => esc_html__( 'Scroll to Top', 'libreria' ),
				'panel'    => 'libreria_footer_panel',
				'priority' => 30,
			),

			array(
				'name'             => 'libreria_panel_separator',
				'type'             => 'section',
				'priority'         => 75,
				'section_callback' => 'Libreria_WP_Customize_Separator',
			),
		);

		$options = array_merge( $options, $configs );

		if ( Libreria_Utils::is_wc_active() ) {

			$configs[] = array(
				'name'     => 'libreria_woocommerce_shop_section',
				'type'     => 'section',
				'title'    => esc_html__( 'Shop', 'libreria' ),
				'panel'    => 'woocommerce',
				'priority' => 1,
			);

			$configs[] = array(
				'name'     => 'libreria_woocommerce_single_product_section',
				'type'     => 'section',
				'title'    => esc_html__( 'Single Product', 'libreria' ),
				'panel'    => 'woocommerce',
				'priority' => 2,
			);

			$options = array_merge( $options, $configs );
		}

		return $options;
	}
}

return new Libreria_Customizer_Register_Section_Panel();
