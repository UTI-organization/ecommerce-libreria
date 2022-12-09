<?php
/**
 * Class to include Single Post General customize options.
 *
 * Class Libreria_Customize_Single_Post_Options
 *
 * @package    ThemeGrill
 * @subpackage Libreria
 * @since      Libreria 1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Class to include Single Post General customize options.
 *
 * Class Libreria_Customize_Single_Post_Options
 */
class Libreria_Customize_Single_Post_Options extends Libreria_Customize_Base_Option {

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
				'name'     => 'libreria_single_post_elements_heading',
				'type'     => 'control',
				'control'  => 'libreria-title',
				'label'    => esc_html__( 'Post', 'libreria' ),
				'section'  => 'libreria_single_post_section',
				'priority' => 10,
			),

			array(
				'name'       => 'libreria_single_post_elements',
				'default'    => array(
					'header',
					'meta',
					'thumbnail',
					'content',
					'author-bio',
				),
				'type'       => 'control',
				'control'    => 'libreria-sortable',
				'section'    => 'libreria_single_post_section',
				'label'      => esc_html__( 'Post Elements', 'libreria' ),
				'choices'    => array(
					'header'     => esc_html__( 'Title', 'libreria' ),
					'meta'       => esc_html__( 'Meta', 'libreria' ),
					'thumbnail'  => esc_html__( 'Featured Image', 'libreria' ),
					'content'    => esc_html__( 'Content', 'libreria' ),
					'author-bio' => esc_html__( 'Author Bio', 'libreria' ),
				),
				'unsortable' => array(
					'header',
					'meta',
					'thumbnail',
					'content',
					'author-bio',
				),
				'priority'   => 20,
			),

			array(
				'name'       => 'libreria_single_post_meta',
				'default'    => array(
					'author',
					'date',
					'category',
					'comment',
				),
				'type'       => 'control',
				'control'    => 'libreria-sortable',
				'section'    => 'libreria_single_post_section',
				'label'      => esc_html__( 'Meta Elements', 'libreria' ),
				'choices'    => array(
					'author'   => esc_attr__( 'Author', 'libreria' ),
					'date'     => esc_attr__( 'Date', 'libreria' ),
					'category' => esc_attr__( 'Category', 'libreria' ),
					'comment'  => esc_attr__( 'Comment', 'libreria' ),
					'tags'     => esc_attr__( 'Tags', 'libreria' ),
				),
				'unsortable' => array(
					'author',
					'date',
					'category',
					'comment',
					'tags',
				),
				'priority'   => 40,
			),

			array(
				'name'     => 'libreria_related_post_heading',
				'type'     => 'control',
				'control'  => 'libreria-title',
				'label'    => esc_html__( 'Related Posts', 'libreria' ),
				'section'  => 'libreria_single_post_section',
				'priority' => 50,
			),

			array(
				'name'     => 'libreria_related_posts',
				'default'  => true,
				'type'     => 'control',
				'control'  => 'libreria-toggle',
				'label'    => esc_html__( 'Enable', 'libreria' ),
				'section'  => 'libreria_single_post_section',
				'priority' => 60,
			),

			array(
				'name'       => 'libreria_related_posts_column',
				'default'    => '2',
				'type'       => 'control',
				'control'    => 'select',
				'label'      => esc_html__( 'Columns', 'libreria' ),
				'section'    => 'libreria_single_post_section',
				'choices'    => array(
					'1' => esc_html__( '1', 'libreria' ),
					'2' => esc_html__( '2', 'libreria' ),
				),
				'priority'   => 70,
				'dependency' => array(
					'libreria_related_posts',
					'==',
					true,
				),
			),
		);

		$options = array_merge( $options, $configs );

		return $options;
	}

}

return new Libreria_Customize_Single_Post_Options();
