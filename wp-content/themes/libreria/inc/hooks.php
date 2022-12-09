<?php
/**
 * Theme hooks.
 *
 * @package Libreria
 * @since   1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


if ( ! function_exists( 'libreria_header' ) ) {

	/**
	 * Header.
	 *
	 * @since   1.0.0
	 * @return void
	 */
	function libreria_header() {

		/**
		 * Hook for header.
		 *
		 * @since   1.0.0
		 * @hooked libreria_header_markup - 10.
		 */
		do_action( 'libreria_header' );
	}
}

if ( ! function_exists( 'libreria_masthead' ) ) {

	/**
	 * First level header.
	 *
	 * @since   1.0.0
	 * @return void
	 */
	function libreria_masthead() {

		/**
		 * Hook for header.
		 *
		 * @since   1.0.0
		 * @hooked libreria_masthead_markup - 10.
		 */
		do_action( 'libreria_masthead' );
	}
}

if ( ! function_exists( 'libreria_expandable_search' ) ) {

	/**
	 * Expandable search.
	 *
	 * @since   1.0.0
	 * @return void
	 */
	function libreria_expandable_search() {

		/**
		 * Hook for expandable search dialog.
		 *
		 * @since   1.0.0
		 * @hooked libreria_expandable_search_markup - 10.
		 */
		do_action( 'libreria_expandable_search' );
	}
}

if ( ! function_exists( 'libreria_site_branding' ) ) {

	/**
	 * Header site branding.
	 *
	 * @since   1.0.0
	 * @return void
	 */
	function libreria_site_branding() {

		/**
		 * Hook for header branding.
		 *
		 * @since   1.0.0
		 * @hooked libreria_site_branding_markup - 10.
		 */
		do_action( 'libreria_site_branding' );
	}
}

if ( ! function_exists( 'libreria_site_title' ) ) :

	/**
	 * Site title.
	 *
	 * @since   1.0.0
	 * @return void
	 */
	function libreria_site_title() {

		/**
		 * Hook for site title.
		 *
		 * @since   1.0.0
		 * @hooked libreria_site_title_markup - 10.
		 */
		do_action( 'libreria_site_title' );
	}
endif;

if ( ! function_exists( 'libreria_mobile_navigation' ) ) {

	/**
	 * Mobile navigation.
	 *
	 * @since   1.0.0
	 * @return void
	 */
	function libreria_mobile_navigation() {

		/**
		 * Hook for mobile navigation.
		 *
		 * @since   1.0.0
		 * @hooked libreria_mobile_navigation_markup - 10.
		 */
		do_action( 'libreria_mobile_navigation' );
	}
}

if ( ! function_exists( 'libreria_header_search' ) ) {

	/**
	 * Header search.
	 *
	 * @since   1.0.0
	 * @return void
	 */
	function libreria_header_search() {

		/**
		 * Hook for header search.
		 *
		 * @since   1.0.0
		 * @hooked libreria_header_search_markup - 10.
		 */
		do_action( 'libreria_header_search' );
	}
}

if ( ! function_exists( 'libreria_header_actions' ) ) {

	/**
	 * Header actions.
	 *
	 * @since   1.0.0
	 * @return void
	 */
	function libreria_header_actions() {

		/**
		 * Hook for header actions.
		 *
		 * @since   1.0.0
		 * @hooked libreria_header_actions_markup - 10.
		 */
		do_action( 'libreria_header_actions' );
	}
}

if ( ! function_exists( 'libreria_header_cart' ) ) {

	/**
	 * Header mini cart.
	 *
	 * @since   1.0.0
	 * @return void
	 */
	function libreria_header_cart() {

		/**
		 * Hook for header cart.
		 *
		 * @since   1.0.0
		 */
		do_action( 'libreria_header_cart' );
	}
}

if ( ! function_exists( 'libreria_header_sidebar' ) ) {

	/**
	 * Header more sidebar.
	 *
	 * @since   1.0.0
	 * @return void
	 */
	function libreria_header_sidebar() {

		/**
		 * Hook for header sidebar.
		 *
		 * @since   1.0.0
		 */
		do_action( 'libreria_header_sidebar' );
	}
}

if ( ! function_exists( 'libreria_main_navigation' ) ) {

	/**
	 * Header main navigation.
	 *
	 * @since   1.0.0
	 * @return void
	 */
	function libreria_main_navigation() {

		/**
		 * Hook for main navigation.
		 *
		 * @since   1.0.0
		 * @hooked libreria_main_navigation_markup - 10.
		 */
		do_action( 'libreria_main_navigation' );
	}
}

if ( ! function_exists( 'libreria_page_header' ) ) {

	/**
	 * Page header.
	 *
	 * @since   1.0.0
	 * @return void
	 */
	function libreria_page_header() {

		/**
		 * Hook for page header markup.
		 *
		 * @since   1.0.0
		 * @hooked libreria_page_header_markup - 10.
		 */
		do_action( 'libreria_page_header' );
	}
}

if ( ! function_exists( 'libreria_footer_columns' ) ) {

	/**
	 * Footer columns.
	 *
	 * @since   1.0.0
	 * @return void
	 */
	function libreria_footer_columns() {

		/**
		 * Hook for footer column markup.
		 *
		 * @since   1.0.0
		 * @hooked libreria_footer_columns_markup - 10.
		 */
		do_action( 'libreria_footer_columns' );
	}
}

if ( ! function_exists( 'libreria_footer_bar' ) ) {

	/**
	 * Footer bar.
	 *
	 * @since   1.0.0
	 * @return void
	 */
	function libreria_footer_bar() {

		/**
		 * Hook for libreria footer bar.
		 *
		 * @since   1.0.0
		 * @hooked libreria_footer_bar_markup - 10
		 */
		do_action( 'libreria_footer_bar' );
	}
}

if ( ! function_exists( 'libreria_footer_bottom' ) ) {

	/**
	 * Before wp_footer().
	 *
	 * @since   1.0.0
	 * @return void
	 */
	function libreria_footer_bottom() {

		/**
		 * Hook for footer bottom part.
		 *
		 * @since   1.0.0
		 * @hooked libreria_secondary_navigation_markup - 10
		 */
		do_action( 'libreria_footer_bottom' );
	}
}

if ( ! function_exists( 'libreria_content' ) ) {

	/**
	 * Libreria content.
	 *
	 * @since   1.0.0
	 * @return void
	 */
	function libreria_content() {

		/**
		 * Hook for content.
		 *
		 * @since   1.0.0
		 * @hooked libreria_content_loop - 10
		 */
		do_action( 'libreria_content' );
	}
}

if ( ! function_exists( 'libreria_content_search' ) ) {

	/**
	 * Libreria content search.
	 *
	 * @since   1.0.0
	 * @return void
	 */
	function libreria_content_search() {

		/**
		 * Hook for content search.
		 *
		 * @since   1.0.0
		 * @hooked libreria_content_loop - 10
		 */
		do_action( 'libreria_content_search' );
	}
}

if ( ! function_exists( 'libreria_content_archive' ) ) {

	/**
	 * Libreria content archive.
	 *
	 * @since   1.0.0
	 * @return void
	 */
	function libreria_content_archive() {

		/**
		 * Hook for content archive.
		 *
		 * @since   1.0.0
		 * @hooked libreria_content_loop - 10
		 */
		do_action( 'libreria_content_archive' );
	}
}

if ( ! function_exists( 'libreria_content_single' ) ) {

	/**
	 * Content single.
	 *
	 * @since   1.0.0
	 * @return void
	 */
	function libreria_content_single() {

		/**
		 * Hook for single content.
		 *
		 * @since   1.0.0
		 * @hooked libreria_single_content_loop - 10
		 */
		do_action( 'libreria_content_single' );
	}
}

if ( ! function_exists( 'libreria_footer_copyright' ) ) {

	/**
	 * Footer bar copyright.
	 *
	 * @return void
	 */
	function libreria_footer_copyright() {

		/**
		 * Hook for footer bar copyright.
		 *
		 * @since 1.0.0
		 * @hooked libreria_footer_copyright_markup - 10
		 */
		do_action( 'libreria_footer_copyright' );
	}
}
