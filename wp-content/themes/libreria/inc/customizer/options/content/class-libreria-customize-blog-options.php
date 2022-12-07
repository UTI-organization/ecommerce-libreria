<?php
/**
 * Class to include Blog General customize options.
 *
 * Class Libreria_Customize_Blog_Options
 *
 * @package    ThemeGrill
 * @subpackage Libreria
 * @since      Libreria 1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Class to include Blog General customize options.
 *
 * Class Libreria_Customize_Blog_Options
 */
class Libreria_Customize_Blog_Options extends Libreria_Customize_Base_Option {

	/**
	 * Include customize options.
	 *
	 * @param array                 $options      Customize options provided via the theme.
	 * @param \WP_Customize_Manager $wp_customize Theme Customizer object.
	 *
	 * @return mixed|void Customizer options for registering panels, sections as well as controls.
	 */
	public function register_options( $options, $wp_customize ) {

		$size_choices = Libreria_Utils::get_image_sizes( array( 'full', 'medium_large', 'large' ) );

		$configs = array(
			// Toggle Button.
			array(
				'name'    => 'libreria_blog_layout_heading',
				'type'    => 'control',
				'control' => 'libreria-title',
				'label'   => esc_html__( 'Layout', 'libreria' ),
				'section' => 'libreria_blog_section',
				'priority'    => 10,
			),

			array(
				'name'        => 'libreria_blog_row_gap',
				'default'     => 3.75,
				'suffix'      => 'em',
				'type'        => 'control',
				'control'     => 'libreria-slider',
				'label'       => esc_html__( 'Row Gap', 'libreria' ),
				'section'     => 'libreria_blog_section',
				'priority'    => 20,
				'input_attrs' => array(
					'min'  => 2,
					'max'  => 5,
					'step' => 0.1,
				),
			),

			array(
				'name'     => 'libreria_blog_post_featured_image_heading',
				'type'     => 'control',
				'control'  => 'libreria-title',
				'label'    => esc_html__( 'Featured Image', 'libreria' ),
				'section'  => 'libreria_blog_section',
				'priority' => 30,
			),

			array(
				'name'     => 'libreria_blog_post_featured_image_size',
				'default'  => 'full',
				'type'     => 'control',
				'control'  => 'select',
				'label'    => esc_html__( 'Image Size', 'libreria' ),
				'section'  => 'libreria_blog_section',
				'priority' => 40,
				'choices'  => $size_choices,
			),

			array(
				'name'     => 'libreria_blog_post_featured_image_width',
				'default'  => 1,
				'type'     => 'control',
				'suffix'   => 'fr',
				'control'  => 'libreria-slider',
				'label'    => esc_html__( 'Width', 'libreria' ),
				'section'  => 'libreria_blog_section',
				'priority' => 50,
				'input_attrs' => array(
					'min'  => 0.5,
					'max'  => 2,
					'step' => 0.1,
				),
			),

			array(
				'name'     => 'libreria_blog_post_heading',
				'type'     => 'control',
				'control'  => 'libreria-title',
				'label'    => esc_html__( 'Post', 'libreria' ),
				'section'  => 'libreria_blog_section',
				'priority' => 60,
			),

			array(
				'name'            => 'libreria_excerpt_length',
				'default'         => 18,
				'type'            => 'control',
				'control'         => 'number',
				'label'           => esc_html__( 'Excerpt Length', 'libreria' ),
				'section'         => 'libreria_blog_section',
				'priority'        => 70,
			),

			array(
				'name'            => 'libreria_read_more_text',
				'default'         => esc_html__( 'Read More', 'libreria' ),
				'type'            => 'control',
				'control'         => 'text',
				'label'           => esc_html__( 'CTA Text', 'libreria' ),
				'section'         => 'libreria_blog_section',
				'priority'        => 80,
			),

			array(
				'name'       => 'libreria_blog_post_elements',
				'default'    => array(
					'thumbnail',
					'header',
					'meta',
					'summary',
					'footer',
				),
				'type'       => 'control',
				'control'    => 'libreria-sortable',
				'label'      => esc_html__( 'Post Elements', 'libreria' ),
				'section'    => 'libreria_blog_section',
				'choices'    => array(
					'thumbnail' => esc_html__( 'Featured Image', 'libreria' ),
					'header'    => esc_html__( 'Title', 'libreria' ),
					'meta'      => esc_html__( 'Meta Tags', 'libreria' ),
					'summary'   => esc_html__( 'Content', 'libreria' ),
					'footer'    => esc_html__( 'Read More', 'libreria' ),
				),
				'unsortable' => array(
					'thumbnail',
					'header',
					'meta',
					'summary',
					'footer',
				),
				'priority'   => 90,
			),

			array(
				'name'            => 'libreria_blog_meta',
				'default'         => array(
					'author',
					'date',
					'category',
				),
				'type'            => 'control',
				'control'         => 'libreria-sortable',
				'label'           => esc_html__( 'Meta', 'libreria' ),
				'section'         => 'libreria_blog_section',
				'choices'         => array(
					'author'   => esc_html__( 'Author', 'libreria' ),
					'date'     => esc_html__( 'Date', 'libreria' ),
					'category' => esc_html__( 'Category', 'libreria' ),
					'comment'  => esc_html__( 'Comment', 'libreria' ),
				),
				'unsortable'      => array(
					'author',
					'date',
					'category',
					'comment',
				),
				'priority'        => 100,
				'active_callback' => function() {

					if (
						! in_array(
							'meta',
							get_theme_mod(
								'libreria_blog_post_elements',
								array(
									'thumbnail',
									'header',
									'meta',
									'summary',
									'footer',
								)
							)
						)
					) {
						return false;
					}

					return true;
				},
			),

			array(
				'name'     => 'libreria_blog_pagination_heading',
				'type'     => 'control',
				'control'  => 'libreria-title',
				'label'    => esc_html__( 'Pagination', 'libreria' ),
				'section'  => 'libreria_blog_section',
				'priority' => 110,
			),

			array(
				'name'     => 'libreria_blog_pagination_enable',
				'default'  => true,
				'type'     => 'control',
				'control'  => 'libreria-toggle',
				'label'    => esc_html__( 'Enable', 'libreria' ),
				'section'  => 'libreria_blog_section',
				'priority' => 120,
			),
		);

		$options = array_merge( $options, $configs );

		return $options;
	}

}

return new Libreria_Customize_Blog_Options();
