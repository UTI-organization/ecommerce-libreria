<?php
/**
 * Libreria dynamic CSS generation file for theme options.
 *
 * Class Libreria_Dynamic_CSS
 *
 * @package    ThemeGrill
 * @subpackage Libreria
 * @since      Libreria 1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Libreria dynamic CSS generation file for theme options.
 *
 * Class Libreria_Dynamic_CSS
 *
 * @since 1.0.0
 */
class Libreria_Dynamic_CSS {

	/**
	 * Return dynamic CSS output.
	 *
	 * @param string $dynamic_css          Dynamic CSS.
	 * @param string $dynamic_css_filtered Dynamic CSS Filters.
	 *
	 * @return string Generated CSS.libreria_primary_menu_text_color
	 */
	public static function get_css( $dynamic_css = '', $dynamic_css_filtered = '' ) {

		/**
		 * Filter for color darken factor.
		 *
		 * @since 1.0.0
		 */
		$steps = apply_filters( 'libreria_color_darken_factor', -25 );

		// Global.
		$base_color                    = get_theme_mod( 'libreria_base_color', '#2C1810' );
		$headings_color                = get_theme_mod( 'libreria_headings_color', '#2C1810' );
		$link_color                    = get_theme_mod( 'libreria_link_color', '#2C1810' );
		$link_hover_color              = get_theme_mod( 'libreria_link_hover_color', 'rgba(44, 24, 16, 0.6)' );
		$container_width               = get_theme_mod( 'libreria_container_width', 1440 );
		$button_text_color             = get_theme_mod( 'libreria_button_text_color', '#FFF' );
		$button_text_hover_color       = get_theme_mod( 'libreria_button_text_hover_color', '' );
		$button_background_color       = get_theme_mod( 'libreria_button_bg_color', '#2C1810' );
		$button_background_hover_color = get_theme_mod( 'libreria_button_bg_hover_color', '' );

		// Header.
		$logo_height            = get_theme_mod( 'libreria_site_logo_height', '' );
		$site_title_color       = get_theme_mod( 'libreria_site_title_color', '#181818' );
		$site_title_hover_color = get_theme_mod( 'libreria_site_title_hover_color', '#925040' );


		// General
		$primary_header_background_color    = get_theme_mod( 'libreria_primary_header_background_color', '#F6ECE5' );
		$primary_header_border_bottom_color = get_theme_mod( 'libreria_primary_header_border_bottom_color', '#EFDFD2' );
		$primary_header_border_bottom_size  = get_theme_mod( 'libreria_primary_header_border_bottom_size', 1 );

		// Primary menu.
		$primary_menu_text_color         = get_theme_mod( 'libreria_primary_menu_text_color', '#111111' );
		$primary_menu_text_hover_color   = get_theme_mod( 'libreria_primary_menu_text_hover_color', '#925040' );
		$primary_menu_text_active_color  = get_theme_mod( 'libreria_primary_menu_text_active_color', '#925040' );
		$hamburger_icon_color            = get_theme_mod( 'libreria_hamburger_icon_color', '' );
		$hamburger_icon_hover_color      = get_theme_mod( 'libreria_hamburger_icon_hover_color', '' );

		// Header full width.
		$header_container_full_width = esc_html( get_theme_mod( 'libreria_primary_header_full_width', true ) );

		// Sub menu.
		$sub_menu_text_color        = get_theme_mod( 'libreria_sub_menu_text_color', '' );
		$sub_menu_text_hover_color  = get_theme_mod( 'libreria_sub_menu_text_hover_color', '' );
		$sub_menu_text_active_color = get_theme_mod( 'libreria_sub_menu_text_active_color', '' );
		$sub_menu_background_color  = get_theme_mod( 'libreria_sub_menu_background_color', '' );

		// Footer column.
		$footer_col_heading_color         = get_theme_mod( 'libreria_footer_column_heading_color', '' );
		$footer_col_background_color      = get_theme_mod( 'libreria_footer_column_background_color', '' );
		$footer_col_text_color            = get_theme_mod( 'libreria_footer_column_text_color', '' );
		$footer_col_link_color            = get_theme_mod( 'libreria_footer_column_link_color', '' );
		$footer_col_link_hover_color      = get_theme_mod( 'libreria_footer_column_link_hover_color', '' );
		$footer_col_list_link_color       = get_theme_mod( 'libreria_footer_column_list_link_color', '' );
		$footer_col_list_link_hover_color = get_theme_mod( 'libreria_footer_column_list_link_hover_color', '' );
		$footer_col_border_top_size 	  = get_theme_mod( 'libreria_footer_column_border_top_size', 2 );
		$footer_col_border_top_color 	  = get_theme_mod( 'libreria_footer_column_border_top_color', '#EFDFD2' );
		$footer_col_list_separator_enable = get_theme_mod( 'libreria_footer_column_list_sep', true );
		$footer_col_list_separator_color  = get_theme_mod( 'libreria_footer_column_list_sep_color', '' );

		// Footer bar.
		$footer_bar_background_color = get_theme_mod( 'libreria_footer_bar_background_color', '' );
		$footer_bar_text_color       = get_theme_mod( 'libreria_footer_bar_text_color', '' );
		$footer_bar_link_color       = get_theme_mod( 'libreria_footer_bar_link_color', '' );
		$footer_bar_link_hover_color = get_theme_mod( 'libreria_footer_bar_link__hover_color', '' );

		// Scroll to top.
		$footer_scroll_to_top_width                  = get_theme_mod( 'libreria_scroll_to_top_width', 54 );
		$footer_scroll_to_top_height                 = get_theme_mod( 'libreria_scroll_to_top_height', 54 );
		$footer_scroll_to_top_roundness              = get_theme_mod( 'libreria_scroll_to_top_roundness', 0 );
		$footer_scroll_to_top_icon_size              = get_theme_mod( 'libreria_scroll_to_top_icon_size', 24 );
		$footer_scroll_to_top_background_color       = get_theme_mod( 'libreria_scroll_to_top_background_color', '' );
		$footer_scroll_to_top_icon_color             = get_theme_mod( 'libreria_scroll_to_top_icon_color', '' );
		$footer_scroll_to_top_background_hover_color = get_theme_mod( 'libreria_scroll_to_top_bg_hover_color', '' );
		$footer_scroll_to_top_icon_hover_color       = get_theme_mod( 'libreria_scroll_to_top_icon_hover_color', '' );

		// Blog.
		$blog_row_gap                  = get_theme_mod( 'libreria_blog_row_gap', 3.75 );
		$blog_post_feature_image_width = get_theme_mod( 'libreria_blog_post_featured_image_width', 1 );

		/**
		 * Generate dynamic CSS.
		 */
		$parse_css = '';

		// Base Color.
		$base_color_css = array(
			'body,
			input,
			select,
			optgroup,
			input[type="text"],
			input[type="email"],
			input[type="url"],
			input[type="password"],
			input[type="search"],
			input[type="number"],
			input[type="tel"],
			input[type="range"],
			input[type="date"],
			input[type="month"],
			input[type="week"],
			input[type="time"],
			input[type="datetime"],
			input[type="datetime-local"],
			input[type="color"],
			textarea,
			input[type="text"]:focus,
			input[type="email"]:focus,
			input[type="url"]:focus,
			input[type="password"]:focus,
			input[type="search"]:focus,
			input[type="number"]:focus,
			input[type="tel"]:focus,
			input[type="range"]:focus,
			input[type="date"]:focus,
			input[type="month"]:focus,
			input[type="week"]:focus,
			input[type="time"]:focus,
			input[type="datetime"]:focus,
			input[type="datetime-local"]:focus,
			input[type="color"]:focus,
			textarea:focus,
			.tertiary-menu-toggle,
			.product .wc-block-grid__product-title'
			=> array(
				'color' => esc_html( $base_color ),
			),

			'blockquote,
			.menu-toggle span'
			=> array(
				'border-color' => esc_html( $base_color ),
			),

			'.libreria-main-navigation .libreria-icon,
			.libreria-toggle-navigation .libreria-icon'
			=> array(
				'fill' => esc_html( $base_color ),
			),
		);

		$parse_css .= self::libreria_parse_css( '#2C1810', $base_color, $base_color_css );

		// Headings Color.
		$headings_color_css = array(
			'h1,
			h2,
			h3,
			h4,
			h5,
			h6,
			.entry-header a'
			=> array(
				'color' => esc_html( $headings_color ),
			),
		);

		$parse_css .= self::libreria_parse_css( '#2C1810', $headings_color, $headings_color_css );

		// Links Color.
		$link_color_css = array(
			'a'
			=> array(
				'color' => esc_html( $link_color ),
			),
		);

		$parse_css .= self::libreria_parse_css( '#2C1810', $link_color, $link_color_css );

		$link_hover_color_css = array(
			'a:hover'
			=> array(
				'color' => esc_html( $link_hover_color ),
			),
		);

		$parse_css .= self::libreria_parse_css( 'rgba(44, 24, 16, 0.6)', $link_hover_color, $link_hover_color_css );

		// Container width.
		$container_width_css = array(
			'.libreria-container'
			=> array(
				'max-width' => esc_html( $container_width ) . 'px',
			),
		);

		$parse_css .= self::libreria_parse_css( 1440, $container_width, $container_width_css );

		$button_text_color_css = array(
			'button,
			input[type="button"],
			input[type="reset"],
			input[type="submit"],
			.everest-forms .button.everest-forms-submit-button.evf-submit,
			.wp-block-button__link,
			.wp-block-search__button,
			.wp-block-file a.wp-block-file__button,
			.button,
			.added_to_cart,
			.libreria-entry-cta,
			.libreria-btn'
			=> array(
				'color' => esc_html( $button_text_color ),
			),
		);

		$parse_css .= self::libreria_parse_css( '#FFF', $button_text_color, $button_text_color_css );

		$button_text_hover_color_css = array(
			'button:hover,
			input[type="button"]:hover,
			input[type="reset"]:hover,
			input[type="submit"]:hover,
			.everest-forms .button.everest-forms-submit-button.evf-submit:hover,
			.wp-block-button__link:hover,
			.wp-block-search__button:hover,
			.wp-block-file a.wp-block-file__button:hover,
			.button:hover,
			.added_to_cart:hover,
			.libreria-entry-cta:hover,
			.libreria-btn:hover'
			=> array(
				'color' => esc_html( $button_text_hover_color ),
			),
		);

		$parse_css .= self::libreria_parse_css( '', $button_text_hover_color, $button_text_hover_color_css );

		$button_background_color_css = array(
			'button,
			input[type="button"],
			input[type="reset"],
			input[type="submit"],
			.everest-forms .button.everest-forms-submit-button.evf-submit,
			.wp-block-button__link,
			.wp-block-search__button,
			.wp-block-file a.wp-block-file__button,
			.button,
			.added_to_cart,
			.libreria-entry-cta,
			.libreria-btn'
			=> array(
				'background-color' => esc_html( $button_background_color ),
			),
		);

		$parse_css .= self::libreria_parse_css( '#2C1810', $button_background_color, $button_background_color_css );

		$button_background_hover_color_css = array(
			'button:hover,
			input[type="button"]:hover,
			input[type="reset"]:hover,
			input[type="submit"]:hover,
			.everest-forms .button.everest-forms-submit-button.evf-submit:hover,
			.wp-block-button__link:hover,
			.wp-block-search__button:hover,
			.wp-block-file a.wp-block-file__button:hover,
			.button:hover,
			.added_to_cart:hover,
			.libreria-entry-cta:hover,
			.libreria-btn:hover'
			=> array(
				'background-color' => esc_html( $button_background_hover_color ),
			),
		);

		$parse_css .= self::libreria_parse_css( '', $button_background_hover_color, $button_background_hover_color_css );

		$site_title_color_css = array(
			'.site-title a'
			=> array(
				'color' => esc_html( $site_title_color ),
			),
		);

		$parse_css .= self::libreria_parse_css( '#181818', $site_title_color, $site_title_color_css );

		$site_title_hover_color_css = array(
			'.site-title a:hover,
			.site-title a:focus'
			=> array(
				'color' => esc_html( $site_title_hover_color ),
			),
		);

		$parse_css .= self::libreria_parse_css( '#925040', $site_title_hover_color, $site_title_hover_color_css );

		// Site logo height.
		$logo_height_css = array(
			'.custom-logo'
			=> array(
				'max-height' => esc_html( (int) $logo_height ) . 'px',
			),
		);

		$parse_css .= self::libreria_parse_css( '', $logo_height, $logo_height_css );

		// Header container full width.
		if ( $header_container_full_width ) {
			$parse_css .= '.libreria-masthead .libreria-container--full-width{max-width: 100%;}';
		}

		$primary_menu_text_color_css = array(
			'.libreria-main-navigation li > a'
			=> array(
				'color' => esc_html( $primary_menu_text_color ),
			),
			'.libreria-main-navigation .libreria-icon'
			=> array(
				'fill' => esc_html( $primary_menu_text_color ),
			),
		);

		$parse_css .= self::libreria_parse_css( '#111111', $primary_menu_text_color, $primary_menu_text_color_css );

		$primary_menu_text_hover_color_css = array(
			'.libreria-main-navigation li:hover > a,
			.libreria-main-navigation li:focus > a,
			.libreria-main-navigation li.focus > a,
			.libreria-toggle-navigation li:hover > a,
			.libreria-toggle-navigation li:focus > a,
			.libreria-toggle-navigation li.focus > a'
			=> array(
				'color' => esc_html( $primary_menu_text_hover_color ),
			),

			'.libreria-main-navigation li:hover > .libreria-submenu-toggle .libreria-icon,
			.libreria-main-navigation li:focus > .libreria-submenu-toggle .libreria-icon,
			.libreria-main-navigation li.focus > .libreria-submenu-toggle .libreria-icon,
			.libreria-toggle-navigation li:hover > .libreria-submenu-toggle .libreria-icon,
			.libreria-toggle-navigation li:focus > .libreria-submenu-toggle .libreria-icon,
			.libreria-toggle-navigation li.focus > .libreria-submenu-toggle .libreria-icon'
			=> array(
				'fill' => esc_html( $primary_menu_text_hover_color ),
			),
		);

		$parse_css .= self::libreria_parse_css( '#925040', $primary_menu_text_hover_color, $primary_menu_text_hover_color_css );

		$primary_menu_text_active_color_css = array(
			'.libreria-main-navigation .current_page_item > a,
			.libreria-main-navigation .current-menu-item > a,
			.libreria-main-navigation .current_page_ancestor > a,
			.libreria-main-navigation .current-menu-ancestor > a,
			.libreria-toggle-navigation .current_page_item > a,
			.libreria-toggle-navigation .current-menu-item > a,
			.libreria-toggle-navigation .current_page_ancestor > a,
			.libreria-toggle-navigation .current-menu-ancestor > a'
			=> array(
				'color' => esc_html( $primary_menu_text_active_color ),
			),

			'.libreria-main-navigation .current_page_item > .libreria-submenu-toggle .libreria-icon,
			.libreria-main-navigation .current-menu-item > .libreria-submenu-toggle .libreria-icon,
			.libreria-main-navigation .current_page_ancestor > .libreria-submenu-toggle .libreria-icon,
			.libreria-main-navigation .current-menu-ancestor > .libreria-submenu-toggle .libreria-icon,
			.libreria-toggle-navigation .current_page_item > .libreria-submenu-toggle .libreria-icon,
			.libreria-toggle-navigation .current-menu-item > .libreria-submenu-toggle .libreria-icon,
			.libreria-toggle-navigation .current_page_ancestor > .libreria-submenu-toggle .libreria-icon,
			.libreria-toggle-navigation .current-menu-ancestor > .libreria-submenu-toggle .libreria-icon'
			=> array(
				'fill' => esc_html( $primary_menu_text_active_color ),
			),
		);

		$parse_css .= self::libreria_parse_css( '#925040', $primary_menu_text_active_color, $primary_menu_text_active_color_css );

		$hamburger_icon_color_css = array(
			'.menu-toggle .libreria-icon--hamburger-menu'
			=> array(
				'fill' => esc_html( $hamburger_icon_color ),
			),
		);

		$parse_css .= self::libreria_parse_css( '', $hamburger_icon_color, $hamburger_icon_color_css );

		$hamburger_icon_hover_color_css = array(
			'.menu-toggle:hover .libreria-icon--hamburger-menu'
			=> array(
				'fill' => esc_html( $hamburger_icon_hover_color ),
			),
		);

		$parse_css .= self::libreria_parse_css( '', $hamburger_icon_hover_color, $hamburger_icon_hover_color_css );

		// Sub menu.
		$sub_menu_text_color_css = array(
			'.libreria-main-navigation ul ul a'
			=> array(
				'color' => esc_html( $sub_menu_text_color ),
			),
			'.libreria-main-navigation ul ul.sub-menu .libreria-submenu-toggle .libreria-icon'
			=> array(
				'fill' => esc_html( $sub_menu_text_color ),
			),
		);

		$parse_css .= self::libreria_parse_css( '', $sub_menu_text_color, $sub_menu_text_color_css );

		$sub_menu_text_hover_color_css = array(
			'.libreria-main-navigation ul ul li:hover > .libreria-submenu-toggle .libreria-icon,
			.libreria-main-navigation ul ul li.current-menu-item:hover > .libreria-submenu-toggle .libreria-icon,
			.libreria-main-navigation ul ul li.current_page_item:hover > .libreria-submenu-toggle .libreria-icon'
			=> array(
				'fill' => esc_html( $sub_menu_text_hover_color ),
			),

			'.libreria-main-navigation ul ul li:hover > a'
			=> array(
				'color' => esc_html( $sub_menu_text_hover_color ),
			),

			'.libreria-main-navigation ul ul li.current-menu-item:hover > .libreria-submenu-toggle .libreria-icon,
			libreria-main-navigation ul ul li.current_page_item:hover > .libreria-submenu-toggle .libreria-icon'
			=> array(
				'fill' => esc_html( $sub_menu_text_hover_color ),
			),
		);

		$parse_css .= self::libreria_parse_css( '', $sub_menu_text_hover_color, $sub_menu_text_hover_color_css );

		$sub_menu_text_active_color_css = array(
			'.libreria-main-navigation ul ul li.current-menu-item > a,
			.libreria-main-navigation ul ul li.current_page_item > a'
			=> array(
				'color' => esc_html( $sub_menu_text_active_color ),
			),

			'.libreria-main-navigation ul ul li.current-menu-item > .libreria-submenu-toggle .libreria-icon,
			libreria-main-navigation ul ul li.current_page_item > .libreria-submenu-toggle .libreria-icon'
			=> array(
				'fill' => esc_html( $sub_menu_text_active_color ),
			),
		);

		$parse_css .= self::libreria_parse_css( '', $sub_menu_text_active_color, $sub_menu_text_active_color_css );

		$sub_menu_background_color_css = array(
			'.libreria-main-navigation ul ul,
			.libreria-main-navigation > ul > .menu-item-has-children > ul.sub-menu:before'
			=> array(
				'background-color' => esc_html( $sub_menu_background_color ),
			),
		);

		$parse_css .= self::libreria_parse_css( '', $sub_menu_background_color, $sub_menu_background_color_css );

		// Primary header.
		$primary_header_background_color_css = array(
			'.libreria-masthead'
			=> array(
				'background-color' => esc_html( $primary_header_background_color ),
			),
		);

		$parse_css .= self::libreria_parse_css( '#EEF0f2', $primary_header_background_color, $primary_header_background_color_css );

		$primary_header_border_bottom_size_css = array(
			'.libreria-header-main'
			=> array(
				'border-bottom-width' => esc_html($primary_header_border_bottom_size) . 'px',
			),
		);

		$parse_css .= self::libreria_parse_css( 1, $primary_header_border_bottom_size, $primary_header_border_bottom_size_css );

		$primary_header_border_bottom_color_css = array(
			'.libreria-header-main'
			=> array(
				'border-bottom-color' => esc_html( $primary_header_border_bottom_color ),
			),
		);

		$parse_css .= self::libreria_parse_css( '#EFDFD2', $primary_header_border_bottom_color, $primary_header_border_bottom_color_css );

		// Header mini cart.
		$header_mini_cart_enable = esc_html( get_theme_mod( 'libreria_header_mini_cart', true ) );
		if ( $header_mini_cart_enable && Libreria_Utils::is_wc_active() ) {
			if ( ! is_checkout() ) {
				$parse_css .= '@media screen and (min-width: 48em){ .libreria-header-actions .libreria-header-cart .libreria-mini-cart__toggle { display: block; } }';
				$parse_css .= '@media screen and (min-width: 48em){ .libreria-header-actions .libreria-header-cart .libreria-mini-cart__link { display: none; } }';
			} else {
				$parse_css .= '@media screen and (min-width: 48em){ .libreria-header-actions .libreria-header-cart .libreria-mini-cart__toggle { display: none; } }';
				$parse_css .= '@media screen and (min-width: 48em){ .libreria-header-actions .libreria-header-cart .libreria-mini-cart__link { display: flex; } }';
			}
		}

		// Blog.
		$blog_row_gap_css = array(
			'.libreria-posts'
			=> array(
				'row-gap' => esc_html( $blog_row_gap ) . 'em',
			),
		);

		$parse_css .= self::libreria_parse_css( '', $blog_row_gap, $blog_row_gap_css );

		$blog_post_feature_image_width_css = array(
			'.libreria-blog-style--list .post.has-post-thumbnail'
			=> array(
				'grid-template-columns' => esc_html($blog_post_feature_image_width) . 'fr 1fr',
			),
		);

		$parse_css .= self::libreria_parse_css(1, $blog_post_feature_image_width, $blog_post_feature_image_width_css, '37.5em');

		// Footer column.
		$footer_col_heading_color_css = array(
			'.libreria-footer-cols .widget-title'
			=> array(
				'color' => esc_html( $footer_col_heading_color ),
			),
		);

		$parse_css .= self::libreria_parse_css( '', $footer_col_heading_color, $footer_col_heading_color_css );

		$footer_col_background_color_css = array(
			'.libreria-footer-cols'
			=> array(
				'background-color' => esc_html( $footer_col_background_color ),
			),
		);

		$parse_css .= self::libreria_parse_css( '', $footer_col_background_color, $footer_col_background_color_css );

		$footer_col_text_color_css = array(
			'.libreria-footer-cols'
			=> array(
				'color' => esc_html( $footer_col_text_color ),
			),
		);

		$parse_css .= self::libreria_parse_css( '', $footer_col_text_color, $footer_col_text_color_css );

		$footer_col_link_color_css = array(
			'.libreria-footer-cols a'
			=> array(
				'color' => esc_html( $footer_col_link_color ),
			),
		);

		$parse_css .= self::libreria_parse_css( '', $footer_col_link_color, $footer_col_link_color_css );

		$footer_col_link_hover_color_css = array(
			'.libreria-footer-cols a:hover'
			=> array(
				'color' => esc_html( $footer_col_link_hover_color ),
			),
		);

		$parse_css .= self::libreria_parse_css( '', $footer_col_link_hover_color, $footer_col_link_hover_color_css );

		$footer_col_list_link_color_css = array(
			'.libreria-footer-cols li a'
			=> array(
				'color' => esc_html( $footer_col_list_link_color ),
			),
		);

		$parse_css .= self::libreria_parse_css( '', $footer_col_list_link_color, $footer_col_list_link_color_css );

		$footer_col_list_link_hover_color_css = array(
			'.libreria-footer-cols li a:hover'
			=> array(
				'color' => esc_html( $footer_col_list_link_hover_color ),
			),
		);

		$parse_css .= self::libreria_parse_css( 'rgba(44, 24, 16, 0.6)', $footer_col_list_link_hover_color, $footer_col_list_link_hover_color_css );

		$footer_col_border_top_size_css = array(
			'.libreria-footer-cols'
			=> array(
				'border-top-width' => esc_html($footer_col_border_top_size) . 'px',
			),
		);

		$parse_css .= self::libreria_parse_css(2, $footer_col_border_top_size, $footer_col_border_top_size_css);

		$footer_col_border_top_color_css = array(
			'.libreria-footer-cols'
			=> array(
				'border-top-color' => esc_html($footer_col_border_top_color),
			),
		);

		$parse_css .= self::libreria_parse_css('#EFDFD2', $footer_col_border_top_color, $footer_col_border_top_color_css);

		if ( ! $footer_col_list_separator_enable ) {
			$parse_css .= '.libreria-footer-cols li { border-width: 0px }';
		}

		$footer_col_list_separator_color_css = array(
			'.libreria-footer-cols li'
			=> array(
				'border-color' => esc_html( $footer_col_list_separator_color ),
			),
		);

		$parse_css .= self::libreria_parse_css( '', $footer_col_list_separator_color, $footer_col_list_separator_color_css );

		// Footer bar.
		$footer_bar_background_color_css = array(
			'.libreria-footer-bar'
			=> array(
				'background-color' => esc_html( $footer_bar_background_color ),
			),
		);

		$parse_css .= self::libreria_parse_css( '', $footer_bar_background_color, $footer_bar_background_color_css );

		$footer_bar_text_color_css = array(
			'.libreria-footer-bar'
			=> array(
				'color' => esc_html( $footer_bar_text_color ),
			),
		);

		$parse_css .= self::libreria_parse_css( '', $footer_bar_text_color, $footer_bar_text_color_css );

		$footer_bar_link_color_css = array(
			'.libreria-footer-bar a'
			=> array(
				'color' => esc_html( $footer_bar_link_color ),
			),
		);

		$parse_css .= self::libreria_parse_css( '', $footer_bar_link_color, $footer_bar_link_color_css );

		$footer_bar_link_hover_color_css = array(
			'.libreria-footer-bar a:hover'
			=> array(
				'color' => esc_html( $footer_bar_link_hover_color ),
			),
		);

		$parse_css .= self::libreria_parse_css( '', $footer_bar_link_hover_color, $footer_bar_link_hover_color_css );

		// Scroll to top.
		$footer_scroll_to_top_width_css = array(
			'.libreria-scroll-to-top'
			=> array(
				'width' => esc_html( $footer_scroll_to_top_width ) . 'px',
			),
		);

		$parse_css .= self::libreria_parse_css( 54, $footer_scroll_to_top_width, $footer_scroll_to_top_width_css );

		$footer_scroll_to_top_height_css = array(
			'.libreria-scroll-to-top'
			=> array(
				'height' => esc_html( $footer_scroll_to_top_height ) . 'px',
			),
		);

		$parse_css .= self::libreria_parse_css( 54, $footer_scroll_to_top_height, $footer_scroll_to_top_height_css );

		$footer_scroll_to_top_roundness_css = array(
			'.libreria-scroll-to-top'
			=> array(
				'border-radius' => esc_html( $footer_scroll_to_top_roundness ) . 'px',
			),
		);

		$parse_css .= self::libreria_parse_css( 2, $footer_scroll_to_top_roundness, $footer_scroll_to_top_roundness_css );

		$footer_scroll_to_top_icon_size_css = array(
			'.libreria-scroll-to-top .libreria-icon'
			=> array(
				'height' => esc_html( $footer_scroll_to_top_icon_size ) . 'px',
				'width'  => esc_html( $footer_scroll_to_top_icon_size ) . 'px',
			),
		);

		$parse_css .= self::libreria_parse_css( 24, $footer_scroll_to_top_icon_size, $footer_scroll_to_top_icon_size_css );

		$footer_scroll_to_top_background_color_css = array(
			'.libreria-scroll-to-top'
			=> array(
				'background-color' => esc_html( $footer_scroll_to_top_background_color ),
			),
		);

		$parse_css .= self::libreria_parse_css( '', $footer_scroll_to_top_background_color, $footer_scroll_to_top_background_color_css );

		$footer_scroll_to_top_icon_color_css = array(
			'.libreria-scroll-to-top .libreria-icon'
			=> array(
				'fill' => esc_html( $footer_scroll_to_top_icon_color ),
			),
		);

		$parse_css .= self::libreria_parse_css( '', $footer_scroll_to_top_icon_color, $footer_scroll_to_top_icon_color_css );

		$footer_scroll_to_top_background_hover_color_css = array(
			'.libreria-scroll-to-top:hover'
			=> array(
				'background-color' => esc_html( $footer_scroll_to_top_background_hover_color ),
			),
		);

		$parse_css .= self::libreria_parse_css( '', $footer_scroll_to_top_background_hover_color, $footer_scroll_to_top_background_hover_color_css );

		$footer_scroll_to_top_icon_hover_color_css = array(
			'.libreria-scroll-to-top .libreria-icon:hover'
			=> array(
				'fill' => esc_html( $footer_scroll_to_top_icon_hover_color ),
			),
		);

		$parse_css .= self::libreria_parse_css( '', $footer_scroll_to_top_icon_hover_color, $footer_scroll_to_top_icon_hover_color_css );

		return $parse_css;
	}

	/**
	 * Parses CSS for woocommerce calling libreria_parse_css() method.
	 *
	 * @return string Generated CSS.
	 */
	public static function get_woocommerce_css() {

		/**
		 * Filter for color darken factor.
		 *
		 * @since 1.0.0
		 */
		$steps = apply_filters( 'libreria_color_darken_factor', -25 );

		/**
		 * Variable declarations.
		 */
		// Primary color.
		$base_color                = get_theme_mod( 'libreria_base_color', '#2C1810' );
		$accent_color              = get_theme_mod( 'libreria_accent_color', '#D03737' );
		$headings_color            = get_theme_mod( 'libreria_headings_color', '#2C1810' );
		$sec_menu_background_color = get_theme_mod( 'libreria_toggle_button_background_color', '#EBEBEC' );
		$sec_menu_text_color       = get_theme_mod( 'libreria_toggle_button_text_color', '' );

		// Shop.
		$shop_product_title_color                 = get_theme_mod( 'libreria_shop_title_color', '' );
		$shop_product_price_color                 = get_theme_mod( 'libreria_shop_price_color', '' );
		$shop_product_sale_badge_text_color       = get_theme_mod( 'libreria_shop_sale_badge_text_color', '' );
		$shop_product_sale_badge_background_color = get_theme_mod( 'libreria_shop_sale_badge_background_color', '' );
		$shop_product_column_gap                  = get_theme_mod( 'libreria_shop_column_gap', 2 );
		$shop_product_row_gap                     = get_theme_mod( 'libreria_shop_row_gap', 2 );

		// Catalogue columns.
		$catalog_columns = get_option( 'woocommerce_catalog_columns' );

		// Single product.
		$single_product_image_area_width = get_theme_mod( 'libreria_single_product_image_area_width', 50 );

		// Store notice.
		$store_notice_text_color       = get_theme_mod( 'libreria_store_notice_text_color', '' );
		$store_notice_link_color       = get_theme_mod( 'libreria_store_notice_link_color', '' );
		$store_notice_background_color = get_theme_mod( 'libreria_store_notice_background_color', '' );

		$cart_items_number = get_theme_mod( 'libreria_header_cart_items_count', true );

		/**
		 * Generate dynamic CSS.
		 */
		$parse_css = '';

		// Base Color.
		$base_color_css = array(
			'.price del,
			.woocommerce-cart thead .product-subtotal,
			.woocommerce-cart td,
			.woocommerce-cart td:before,
			.woocommerce-cart .product-remove a,
			.woocommerce-cart .actions > .button,
			.product_list_widget .mini_cart_item a,
			.product_list_widget .mini_cart_item .remove_from_cart_button,
			li.product .add_to_cart_button,
			p.stars a::before,
			p.stars a:hover ~ a::before,
			.woocommerce-tabs ul.tabs li.active a,
			.widget_shopping_cart .button,
			.woocommerce-MyAccount-navigation ul li a,
			.quantity .qty,
			.libreria-filter-sidebar-toggle,
			.libreria-filter-sidebar .libreria-no-widget a:hover,
			.libreria-filter-sidebar .libreria-no-widget a:focus'
			=> array(
				'color' => esc_html( $base_color ),
			),

			'.libreria-filter-sidebar-toggle .libreria-icon--filter,
			.libreria-close-filter-sidebar .libreria-icon'
			=> array(
				'fill' => esc_html( $base_color ),
			),
		);

		$parse_css .= self::libreria_parse_css( '#2C1810', $base_color, $base_color_css );

		// Accent Color.
		$accent_color_css = array(
			'.archive .onsale,
			.wc-block-grid__product-onsale '
			=> array(
				'background-color' => esc_html( $accent_color ),
			),
		);

		$parse_css .= self::libreria_parse_css( '#D03737', $accent_color, $accent_color_css );

		if ( $shop_product_title_color ) {

			$shop_product_title_color_css = array(
				'li.product .woocommerce-loop-category__title,
				li.product .woocommerce-loop-product__title,
				li.product .wc-block-grid__product-title'
				=> array(
					'color' => esc_html( $shop_product_title_color ),
				),

				'li.product .woocommerce-loop-category__title:hover,
				li.product .woocommerce-loop-product__title:hover,
				li.product .wc-block-grid__product-title:hover'
				=> array(
					'color' => Libreria_Utils::adjust_color_brightness( $shop_product_title_color, $steps ),
				),
			);

			$parse_css .= self::libreria_parse_css( '', $shop_product_title_color, $shop_product_title_color_css );
		}

		$shop_product_price_color_css = array(
			'.price ins .amount,
			.price > .amount'
			=> array(
				'color' => esc_html( $shop_product_price_color ),
			),
		);

		$parse_css .= self::libreria_parse_css( '', $shop_product_price_color, $shop_product_price_color_css );

		$shop_product_sale_badge_text_color_css = array(
			'.archive .onsale,
			.wc-block-grid__product-onsale '
			=> array(
				'color' => esc_html( $shop_product_sale_badge_text_color ),
			),
		);

		$parse_css .= self::libreria_parse_css( '', $shop_product_sale_badge_text_color, $shop_product_sale_badge_text_color_css );

		$shop_product_sale_badge_background_color_css = array(
			'.archive .onsale,
			.wc-block-grid__product-onsale '
			=> array(
				'background-color' => esc_html( $shop_product_sale_badge_background_color ),
			),
		);

		$parse_css .= self::libreria_parse_css( '', $shop_product_sale_badge_background_color, $shop_product_sale_badge_background_color_css );

		$column_selector = '.products.columns-' . $catalog_columns;

		$shop_product_column_gap_css = array(
			$column_selector
			=> array(
				'column-gap' => esc_html( $shop_product_column_gap ) . 'em',
			),
		);

		$parse_css .= self::libreria_parse_css( 2, $shop_product_column_gap, $shop_product_column_gap_css, '37.5em' );

		$shop_product_column_row_css = array(
			$column_selector
			=> array(
				'row-gap' => esc_html( $shop_product_row_gap ) . 'em',
			),
		);

		$parse_css .= self::libreria_parse_css( 2, $shop_product_row_gap, $shop_product_column_row_css, '37.5em' );

		$single_product_image_area_width_css = array(
			'.single-product .product .woocommerce-product-gallery'
			=> array(
				'--product-gallery-width' => esc_html( $single_product_image_area_width ) . '%',
			),
		);

		$singe_product_entry_summary_width_css = array(
			'.single-product .product .entry-summary'
			=> array(
				'--entry-summary-width' => esc_html( 100 - (int) $single_product_image_area_width ) . '%',
			),
		);

		$parse_css .= self::libreria_parse_css( 50, $single_product_image_area_width, $single_product_image_area_width_css, '48em' );
		$parse_css .= self::libreria_parse_css( 50, $single_product_image_area_width, $singe_product_entry_summary_width_css );

		if ( function_exists( 'is_store_notice_showing' ) && is_store_notice_showing() ) {

			$store_notice_text_color_css = array(
				'.demo_store'
				=> array(
					'color' => esc_html( $store_notice_text_color ),
				),
			);

			$parse_css .= self::libreria_parse_css( '', $store_notice_text_color, $store_notice_text_color_css );

			$store_notice_link_color_css = array(
				'.demo_store a'
				=> array(
					'color' => esc_html( $store_notice_link_color ),
				),
			);

			$parse_css .= self::libreria_parse_css( '', $store_notice_link_color, $store_notice_link_color_css );

			$store_notice_background_color_css = array(
				'.demo_store'
				=> array(
					'background-color' => esc_html( $store_notice_background_color ),
				),
			);

			$parse_css .= self::libreria_parse_css( '', $store_notice_background_color, $store_notice_background_color_css );
		}

		if ( ! $cart_items_number ) {
			$parse_css .= '.libreria-header-cart .libreria-btn--header-action span.count{display:none;}';
		}

		return $parse_css;
	}

	/**
	 * Parses CSS.
	 *
	 * @param string|array $default_value Default value.
	 * @param string|array $output_value  Updated value.
	 * @param array        $css_output    Array of CSS.
	 * @param string       $min_media     Min Media breakpoint.
	 * @param string       $max_media     Max Media breakpoint.
	 *
	 * @return string Generated CSS.
	 */
	public static function libreria_parse_css( $default_value, $output_value, $css_output = array(), $min_media = '', $max_media = '' ) {

		// Return if default value matches.
		if ( $default_value == $output_value ) {
			return;
		}

		$parse_css = '';

		if ( is_array( $css_output ) && count( $css_output ) > 0 ) {

			foreach ( $css_output as $selector => $properties ) {

				if ( null === $properties ) {
					break;
				}

				if ( ! count( $properties ) ) {
					continue;
				}

				$temp_parse_css   = $selector . '{';
				$properties_added = 0;

				foreach ( $properties as $property => $value ) {

					if ( '' === $value ) {
						continue;
					}

					$properties_added ++;
					$temp_parse_css .= $property . ':' . $value . ';';
				}

				$temp_parse_css .= '}';

				if ( $properties_added > 0 ) {
					$parse_css .= $temp_parse_css;
				}
			}

			if ( '' !== $parse_css && ( '' !== $min_media || '' !== $max_media ) ) {

				$media_css       = '@media ';
				$min_media_css   = '';
				$max_media_css   = '';
				$media_separator = '';

				if ( '' !== $min_media ) {
					$min_media_css = '(min-width:' . $min_media . ')';
				}

				if ( '' !== $max_media ) {
					$max_media_css = '(max-width:' . $max_media . ')';
				}

				if ( '' !== $min_media && '' !== $max_media ) {
					$media_separator = ' and ';
				}

				$media_css .= $min_media_css . $media_separator . $max_media_css . '{' . $parse_css . '}';

				return $media_css;

			}
		}

		return $parse_css;
	}
}
