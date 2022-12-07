<?php
/**
 * Hooks for Header HTML markups.
 *
 * @package Libreria
 * @since   1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'libreria_header_markup' ) ) {

	/**
	 * Adds Libreria header markup.
	 *
	 * @return void
	 */
	function libreria_header_markup() {

		/**
		 * Fires before header markup.
		 *
		 * @since 1.0.0
		 */
		do_action( 'libreria_header_markup_before' );
		?>

		<header id="libreria-header" class="libreria-header">
			<?php
			libreria_masthead();
			libreria_header_sidebar();
			libreria_page_header();
			?>
		</header><!-- #masthead -->
		<?php
		/**
		 * Fires after header markup.
		 *
		 * @since 1.0.0
		 */
		do_action( 'libreria_header_markup_after' );
	}
	add_action( 'libreria_header', 'libreria_header_markup' );
}

if ( ! function_exists( 'libreria_masthead_markup' ) ) {

	/**
	 * Adds Libreria masthead  markup.
	 *
	 * @return void
	 */
	function libreria_masthead_markup() {
		$header_container_full_width_class = esc_html( get_theme_mod( 'libreria_primary_header_full_width', true ) );
		?>

		<div id="libreria-masthead" class="libreria-masthead">
			<div class="libreria-header-main">
				<div class="libreria-container <?php echo $header_container_full_width_class ? 'libreria-container--full-width' : ''; ?>">
					<div class="libreria-row">
						<?php libreria_main_navigation(); ?>

						<?php libreria_site_branding(); ?>

						<?php libreria_header_actions(); ?>

						<?php libreria_mobile_navigation(); ?>
					</div> <!-- .libreria-row -->
				</div> <!-- .libreria-container -->

			</div> <!-- /.libreria-header-main -->

			<div class="libreria-search--mobile">
				<div class="libreria-container <?php echo $header_container_full_width_class ? 'libreria-container--full-width' : ''; ?>">
					<div class="search-wrapper">
						<button class="libreria-search__toggle libreria-btn--header-action" aria-label="Open search dialog" aria-expanded="false">
							<?php libreria_get_icon( 'search' ); ?>
						</button>
						<?php libreria_expandable_search(); ?>
					</div>
				</div> <!-- .libreria-container -->
			</div>
		</div> <!-- /.libreria-masthead-->
		<?php
	}
	add_action( 'libreria_masthead', 'libreria_masthead_markup' );
}

if ( ! function_exists( 'libreria_site_branding_markup' ) ) {

	/**
	 * Adds Libreria site branding markup.
	 *
	 * @return void
	 */
	function libreria_site_branding_markup() {
		?>

		<div id="libreria-site-branding" class="libreria-site-branding">
			<!-- Toggle button for mobile menu. -->
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false" aria-label="<?php esc_attr_e( 'Open mobile menu', 'libreria' ); ?>">
				<?php libreria_get_icon( 'hamburger-menu' ); ?>
			</button>

			<?php the_custom_logo(); ?>

			<div class="site-info-wrap">
				<?php libreria_site_title(); ?>
			</div>
		</div><!-- .libreria-site-branding -->
		<?php
	}
	add_action( 'libreria_site_branding', 'libreria_site_branding_markup' );
}

if ( ! function_exists( 'libreria_site_title_markup' ) ) {

	/**
	 * Adds Libreria site title markup.
	 *
	 * @return void
	 */
	function libreria_site_title_markup() {

		$logo = get_theme_mod( 'custom_logo' );

		if ( ! has_custom_logo() && ! $logo ) :
			?>
			<p class="site-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<?php bloginfo( 'name' ); ?>
				</a>
			</p>
			<?php
		endif;
	}
	add_action( 'libreria_site_title', 'libreria_site_title_markup' );
}

if ( ! function_exists( 'libreria_mobile_navigation_markup' ) ) {

	/**
	 * Adds Libreria mobile navigation markup.
	 *
	 * @return void
	 */
	function libreria_mobile_navigation_markup() {
		?>

		<nav id="libreria-toggle-navigation" class="libreria-toggle-navigation">
			<?php
			if ( has_nav_menu( 'libreria-menu-primary' ) ) {
				wp_nav_menu(
					array(
						'theme_location'  => 'libreria-menu-primary',
						'menu_class'      => 'libreria-toggle-menu',
						'menu_id'         => 'toggle-menu',
						'container'       => 'div',
						'container_class' => 'libreria-toggle-menu-background',
					)
				);

			} else {
				?>
				<div class="libreria-toggle-menu-background">
					<?php
					wp_page_menu(
						array(
							'menu_class' => 'libreria-toggle-menu',
							'menu_id'    => 'toggle-menu',
							'container'  => 'ul',
							'before'     => '',
							'after'      => '',
						)
					);
					?>
				</div>
			<?php
			}
			?>
			<button class="libreria-toggle-navigation__close libreria-btn--close-modal" aria-label="<?php esc_attr_e( 'Close search dialog', 'libreria' ); ?>">
				<?php libreria_get_icon( 'close' ); ?>
			</button>
		</nav> <!-- /.libreria-mobile-navigation -->
		<?php
	}
	add_action( 'libreria_mobile_navigation', 'libreria_mobile_navigation_markup' );
}

if ( ! function_exists( 'libreria_header_actions_markup' ) ) {

	/**
	 * Adds Libreria header actions markup
	 *
	 * @return void
	 */
	function libreria_header_actions_markup() {

		$account_enable = esc_html( get_theme_mod( 'libreria_header_wc_account', true ) );
		$cart_enable    = esc_html( get_theme_mod( 'libreria_header_cart', true ) );
		$search_enable  = esc_html( get_theme_mod( 'libreria_header_search', true ) );
		?>

		<div class="libreria-header-actions">
			<?php if ( $search_enable ) : ?>

			<div class="libreria-header-action libreria-search">
				<button class="libreria-search__toggle libreria-btn--header-action" aria-label="Open search dialog" aria-expanded="false">
					<?php libreria_get_icon( 'search' ); ?>
				</button>
				<button class="libreria-search__close libreria-btn--header-action" aria-label="Open search dialog" aria-expanded="false">
					<?php libreria_get_icon( 'close' ); ?>
				</button>

				<div class="search-wrapper">
					<?php libreria_expandable_search(); ?>
				</div>
			</div>

				<?php
			endif;

			if ( $account_enable && Libreria_Utils::is_wc_active() ) :
				?>

				<div class="libreria-header-action wc-account">
					<?php
					if ( is_user_logged_in() ) {
						$account_title = __( 'My Account', 'libreria' );
					} else {
						$account_title = __( 'Login/Register', 'libreria' );
					}
					?>
					<a href="<?php echo esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ); ?>" title="<?php echo esc_attr( $account_title ); ?>" class="libreria-account-link libreria-btn--header-action">
						<?php libreria_get_icon( 'user' ); ?>
					</a>
				</div> <!-- /.libreria-account -->

			<?php endif; ?>

			<?php if ( $cart_enable && Libreria_Utils::is_wc_active() ) : ?>
				<?php
				if ( method_exists( 'Libreria_WooCommerce', 'header_cart' ) ) {
					Libreria_WooCommerce::header_cart();
				}
				?>
			<?php endif; ?>

			<div class="libreria-header-more">
				<button class="libreria-header-more__toggle libreria-btn--header-action">
					<?php libreria_get_icon( 'more-vertical' ); ?>
				</button>
			</div>
		</div> <!-- /.libreria-header-actions -->
		<?php
	}
	add_action( 'libreria_header_actions', 'libreria_header_actions_markup' );
}

if ( ! function_exists( 'libreria_expandable_search_markup' ) ) {

	/**
	 * Adds markup for expandable search.
	 *
	 * @return void
	 */
	function libreria_expandable_search_markup() {

		if ( ! Libreria_Utils::is_wc_active() ) {
			get_template_part( 'template-parts/searchform/searchform' );
		} else {
			get_template_part( 'template-parts/product-searchform/product-searchform' );
		}
	}
	add_action( 'libreria_expandable_search', 'libreria_expandable_search_markup' );
}

if ( ! function_exists( 'libreria_header_sidebar_markup' ) ) {

	/**
	 * Adds markup for header sidebar modal.
	 *
	 * @return void
	 */
	function libreria_header_sidebar_markup() {
		?>

		<div class="libreria-header-sidebar">
			<div class="libreria-header-sidebar__content">

			<?php
			if ( has_custom_logo() ) :
				$image_url = get_theme_mod( 'libreria_header_sidebar_logo', '' );
				?>

					<figure class="libreria-header-sidebar__logo">
						<img src="<?php echo esc_url( $image_url ); ?>"/>
					</figure>

			<?php endif; ?>

				<div class="libreria-header-sidebar__widgets">
				<?php
				$sidebar_id = 'libreria-header-sidebar';
				if ( is_active_sidebar( $sidebar_id ) ) {
					dynamic_sidebar( $sidebar_id );
				} elseif ( current_user_can( 'edit_theme_options' ) ) {
					?>
				<section class="libreria-no-widget">
					<h2><?php esc_html_e( 'Header Sidebar Widgets.', 'libreria' ); ?></h2>
					<a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Click here to add widgets for this area', 'libreria' ); ?></a>
				</section>
					<?php
				}
				?>
				</div>
			</div>
			<button class="libreria-header-sidebar__close libreria-btn--close-modal" aria-label="<?php esc_attr_e( 'Close search dialog', 'libreria' ); ?>">
				<?php libreria_get_icon( 'close' ); ?>
			</button>
		</div><!-- .libreria-header-sidebar -->
		<?php
	}
	add_action( 'libreria_header_sidebar', 'libreria_header_sidebar_markup' );
}

if ( ! function_exists( 'libreria_main_navigation_markup' ) ) {

	/**
	 * Adds Libreria main navigation markup.
	 *
	 * @return void
	 */
	function libreria_main_navigation_markup() {
		?>

		<nav id="libreria-site-navigation" class="libreria-main-navigation">
			<?php
			if ( has_nav_menu( 'libreria-menu-primary' ) ) {
				wp_nav_menu(
					array(
						'theme_location' => 'libreria-menu-primary',
						'menu_id'        => 'libreria-primary-menu',
						'container'      => '',
					)
				);
			} else {
				wp_page_menu(
					array(
						'menu_class' => 'libreria-primary-menu',
						'container'  => 'ul',
						'before'     => '',
						'after'      => '',
					)
				);
			}
			?>
		</nav><!-- #libreria-site-navigation -->
		<?php
	}
	add_action( 'libreria_main_navigation', 'libreria_main_navigation_markup' );
}

if ( ! function_exists( 'libreria_change_logo_attr' ) ) {

	/**
	 * Change the logo image attr while retina logo is set.
	 *
	 * @param array  $attr Array of attribute values for the image markup.
	 * @param object $attachment Image attachment post.
	 * @param int    $size Requested image size.
	 *
	 * @return mixed
	 */
	function libreria_change_logo_attr( $attr, $attachment, $size ) {

		$custom_logo = get_theme_mod( 'custom_logo' );
		$retina_logo = get_theme_mod( 'libreria_retina_logo' );

		if ( $custom_logo && $retina_logo && isset( $attr['class'] ) && 'custom-logo' === $attr['class'] ) {
			$attr['srcset']  = '';
			$custom_logo_src = wp_get_attachment_image_src( $custom_logo, 'full' );
			$custom_logo_url = $custom_logo_src[0];

			// Set srcset.
			$attr['srcset'] = $custom_logo_url . ' 1x, ' . $retina_logo . ' 2x';
		}

		return $attr;
	}
	add_filter( 'wp_get_attachment_image_attributes', 'libreria_change_logo_attr', 10, 3 );
}

if ( ! function_exists( 'libreria_page_header_markup' ) ) {

	/**
	 * Create markup for the page header.
	 *
	 * @return void
	 */
	function libreria_page_header_markup() {

		if (
			is_front_page() ||
			is_404() ||
			(
				Libreria_Utils::page_header_has_title() &&
				Libreria_Utils::page_header_has_breadcrumbs()
			) ||
			(
				is_single() &&
				Libreria_Utils::page_header_has_breadcrumbs()
			) ||
			is_page_template( 'page-templates/template-libreria-page-builder.php' )
		) {
			return;
		}

		get_template_part( 'template-parts/page-header/page-header' );
	}
	add_action( 'libreria_page_header', 'libreria_page_header_markup' );
}
