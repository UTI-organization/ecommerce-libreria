<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Libreria
 * @since   1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'libreria_body_classes' ) ) :

	/**
	 * Adds custom classes to the array of body classes.
	 *
	 * @since   1.0.0
	 * @param array $classes Classes for the body element.
	 * @return array
	 */
	function libreria_body_classes( $classes ) {

		// Adds a class of hfeed to non-singular pages.
		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}

		$hide_title = get_post_meta( get_the_ID(), 'libreria_hide_title', true );

		if ( $hide_title ) {
			$classes[] = 'libreria-page-header--hidden';
		}

		if ( ! is_page_template( 'page-templates/template-libreria-page-builder.php' ) ) {

			if ( is_singular( 'post' ) ) {
				$classes[] = 'libreria-sidebar-layout--centered';
			}
		} else {
			$classes[] = 'libreria-sidebar-layout--no-sidebar';
		}

		return $classes;
	}
	add_filter( 'body_class', 'libreria_body_classes' );
endif;

if ( ! function_exists( 'libreria_pingback_header' ) ) :

	/**
	 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
	 *
	 * @since   1.0.0
	 */
	function libreria_pingback_header() {

		if ( is_singular() && pings_open() ) {
			printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
		}
	}
	add_action( 'wp_head', 'libreria_pingback_header' );
endif;

if ( ! function_exists( 'libreria_posts_classes' ) ) :

	/**
	 * Add classes to the posts wrapper.
	 *
	 * @since   1.0.0
	 * @param array $classes Posts wrapper classnames.
	 * @return array
	 */
	function libreria_posts_classes( $classes ) {

		return $classes;
	}
	add_filter( 'libreria_posts_classes', 'libreria_posts_classes' );
endif;

if ( ! function_exists( 'libreria_infinite_load_js_localize' ) ) :

	/**
	 * Add required params for infinite load.
	 *
	 * @param array $arr Localized array.
	 * @return mixed
	 */
	function libreria_infinite_load_js_localize( $arr ) {

		global $wp_query;

		$arr['queryVars']             = wp_json_encode( $wp_query->query_vars );
		$arr['ajaxUrl']               = admin_url( 'admin-ajax.php' );
		$arr['infiniteCount']         = 2;
		$arr['infiniteTotal']         = $wp_query->max_num_pages;
		$arr['pagination']            = get_theme_mod( 'libreria_shop_pagination_style', 'number' );
		$arr['infiniteLoadEvent']     = get_theme_mod( 'libreria_shop_infinite_load_event', 'button' );
		$arr['infiniteNonce']         = wp_create_nonce( 'libreria_infinite_load_nonce' );
		$arr['allPostsLoadedMessage'] = __( 'All products loaded!', 'libreria' );

		return $arr;
	}
	add_filter( 'libreria_infinite_load_params', 'libreria_infinite_load_js_localize' );
endif;

if ( ! function_exists( 'libreria_post_class' ) ) :

	/**
	 * Adds custom classes to the array of post classes.
	 *
	 * @since   1.0.0
	 * @param array $classes Post classname.
	 * @return mixed
	 */
	function libreria_post_class( $classes ) {

		if ( ! array_key_exists( 'post', $classes ) ) {
			$classes[] = 'post';
		}

		return $classes;
	}
	add_filter( 'post_class', 'libreria_post_class' );
endif;

if ( ! function_exists( 'libreria_add_submenu_icon' ) ) :

	/**
	 * Add submenu icon after the menu title.
	 *
	 * @since 1.0.0
	 *
	 * @param string   $item_output The menu item's starting HTML output.
	 * @param WP_Post  $item        Menu item data object.
	 * @param int      $depth       Depth of menu item. Used for padding.
	 * @param stdClass $args        An object of wp_nav_menu() arguments.
	 * @return array|mixed|string|string[]
	 */
	function libreria_add_submenu_icon( $item_output, $item, $depth, $args ) {

		if ( 'libreria-menu-primary' === $args->theme_location ) {

			if (
				in_array( 'menu-item-has-children', $item->classes, true ) ||
				in_array( 'page_item_has_children', $item->classes, true )
			) {
				$item_output = str_replace(
					$args->link_after . '</a>',
					$args->link_after . '</a><span class="libreria-submenu-toggle">' . libreria_get_icon( 'plus', false ) . libreria_get_icon( 'minus', false ) . '</span>',
					$item_output
				);
			}
		}

		return $item_output;
	}
	add_filter( 'walker_nav_menu_start_el', 'libreria_add_submenu_icon', 10, 4 );
endif;

if ( ! function_exists( 'libreria_get_icon' ) ) :

	/**
	 * Get SVG icon.
	 *
	 * @since   1.0.0
	 * @param string $icon Default is empty.
	 * @param bool   $echo Default is true.
	 * @param array  $args Default is empty.
	 * @return string|null
	 */
	function libreria_get_icon( $icon = '', $echo = true, $args = array() ) {
		return Libreria_SVG_Icons::get_svg( $icon, $echo, $args );
	}
endif;


if ( ! function_exists( 'libreria_social_icon' ) ) :

	/**
	 * Adds social icon with respect to entered social link url.
	 *
	 * @since   1.0.0
	 * @param string   $title The menu item's title.
	 * @param WP_Post  $item  The current menu item object.
	 * @param stdClass $args  An object of wp_nav_menu() arguments.
	 * @param int      $depth Depth of menu item.
	 * @return WP_Post
	 */
	function libreria_social_icon( $title, $item, $args, $depth ) {

		if ( 'libreria-menu-social' === $args->theme_location ) {
			$social_url = strtolower( (string) esc_url( $item->url ) );
			$icon_token = parse_url( $social_url );
			$icon_token = str_replace( 'www.', '', $icon_token['host'] );
			$icon_token = rtrim( $icon_token, '.com' );

			if ( libreria_get_icon( $icon_token, false ) ) {
				$args->after = libreria_get_icon( $icon_token, false );
			}
		}

		return $title;
	}
	add_filter( 'nav_menu_item_title', 'libreria_social_icon', 10, 4 );
endif;
