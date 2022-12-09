<?php
/**
 * Override default customizer panels, sections, settings or controls.
 *
 * @package    Libreria
 * @since      Libreria 1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Site Identity.
$wp_customize->get_control( 'custom_logo' )->priority     = 6;
$wp_customize->get_control( 'site_icon' )->priority       = 8;
$wp_customize->get_control( 'blogname' )->priority        = 10;
$wp_customize->get_control( 'blogdescription' )->priority = 12;

// Override Settings.
$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

if ( isset( $wp_customize->selective_refresh ) ) {

	$wp_customize->selective_refresh->add_partial(
		'custom_logo',
		array(
			'selector'        => '#libreria-site-branding',
			'render_callback' => 'Libreria_Customizer_Partials::render_customize_partial_custom_logo',
		)
	);

	$wp_customize->selective_refresh->add_partial(
		'blogname',
		array(
			'selector'        => '.site-title a',
			'render_callback' => 'Libreria_Customizer_Partials::render_customize_partial_blogname',
		)
	);

	$wp_customize->selective_refresh->add_partial(
		'blogdescription',
		array(
			'selector'        => '.site-description',
			'render_callback' => 'Libreria_Customizer_Partials::render_customize_partial_blogdescription',
		)
	);
}
