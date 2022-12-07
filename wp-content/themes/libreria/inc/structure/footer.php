<?php
/**
 * Hooks for Footer HTML markups.
 *
 * @package Libreria
 * @since   1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'libreria_scroll_to_top' ) ) {

	/**
	 * Adds scrol to top markup.
	 *
	 * @return void
	 */
	function libreria_scroll_to_top() {

		if ( get_theme_mod( 'libreria_scroll_to_top', true ) ) {
			?>
				<a href="#" id="libreria-scroll-to-top" class="libreria-scroll-to-top">
					<?php libreria_get_icon( 'arrow-up' ); ?>
				</a>
			<?php
		}
	}
	add_action( 'libreria_footer_bottom', 'libreria_scroll_to_top' );
}

if ( ! function_exists( 'libreria_footer_columns_markup' ) ) {

	/**
	 * Adds Libreria footer columns markup.
	 *
	 * @return void
	 */
	function libreria_footer_columns_markup() {

		$has_active_sidebar = false;

		// Change the value of $has_active_sidebar to true if any of footer sidebar is active.
		for ( $col = 1; $col <= 4; $col++ ) {
			if ( is_active_sidebar( 'libreria-footer-' . $col ) ) {
				$has_active_sidebar = true;

				break;
			}
		}

		// Return, if none of the footer sidebar is active.
		if ( ! $has_active_sidebar ) {
			return;
		}
		?>
		<div class="libreria-footer-cols">
			<div class="libreria-container">
				<?php
				for ( $col = 1; $col <= 4; $col++ ) :

					$sidebar_id = 'libreria-footer-' . $col;

					if ( is_active_sidebar( $sidebar_id ) ) :
						?>
						<div class="libreria-footer-col libreria-footer-col--<?php echo esc_attr( $col ); ?>">
							<?php dynamic_sidebar( $sidebar_id ); ?>
						</div>
						<?php
					endif;
				endfor;
				?>
			</div>
		</div><!-- .libreria-footer-cols -->
		<?php
	}
	add_action( 'libreria_footer_columns', 'libreria_footer_columns_markup' );
}

if ( ! function_exists( 'libreria_footer_bar_markup' ) ) {

	/**
	 * Adds Libreria bar markup.
	 *
	 * @return void
	 */
	function libreria_footer_bar_markup() {
		?>
		<div class="libreria-footer-bar">
			<div class="libreria-container">
				<?php libreria_footer_copyright(); ?>
			</div>
		</div><!-- .libreria-footer-bar -->
		<?php
	}
	add_action( 'libreria_footer_bar', 'libreria_footer_bar_markup' );
}

if ( ! function_exists( 'libreria_footer_copyright_markup' ) ) {
	/**
	 * Markup for footer copyright.
	 *
	 * @return void
	 * @since  1.0.0
	 */
	function libreria_footer_copyright_markup() {

		$default = sprintf(
			/* translators: 1: Copyright, 2: Site title, 3: Current year, 4: Theme credit */
			esc_html__( '%1$s %2$s %3$s | %4$s', 'libreria' ),
			'{copyright}',
			'{site-title}',
			'{year}',
			'{theme-credit}'
		);
		$content      = get_theme_mod( 'libreria_footer_copyright', $default );
		$theme_credit = '<span class="libreria-theme-credit">' . esc_html__( 'Built with Libreria by ThemeGrill', 'libreria' ) . '</span>';

		if ( $content || is_customize_preview() ) {
			$content = str_replace( '{copyright}', '&copy;', $content );
			$content = str_replace( '{site-title}', get_bloginfo( 'name' ), $content );
			$content = str_replace( '{year}', date_i18n( 'Y' ), $content );
			$content = str_replace( '{theme-credit}', $theme_credit, $content );
		}
		?>
		<div class="libreria-footer-bar-section-1">
			<?php echo do_shortcode( wp_kses_post( $content ) ); ?>
		</div><!-- .libreria-footer-bar-section-1 -->
		<?php
	}
	add_action( 'libreria_footer_copyright', 'libreria_footer_copyright_markup' );
}
