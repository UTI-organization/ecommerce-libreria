<?php
/**
 * Libreria WooCommerce Class.
 *
 * @package    ThemeGrill
 * @subpackage Libreria
 * @since      Libreria 1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Libreria_WooCommerce' ) ) {

	/**
	 * Class Libreria_WooCommerce
	 */
	class Libreria_WooCommerce {

		/**
		 * Member variable.
		 *
		 * @since 1.0.0
		 * @var $instance
		 */
		private static $instance;

		/**
		 * Initiator.
		 *
		 * @since 1.0.0
		 *
		 * @return Libreria_WooCommerce
		 */
		public static function get_instance() {

			if ( ! isset( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * Libreria_WooCommerce constructor.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function __construct() {

			// WooCommerce setup.
			add_action( 'after_setup_theme', array( $this, 'setup' ) );

			// Enqueue WC scripts.
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ) );

			/**
			 * Disable the default WooCommerce stylesheet.
			 *
			 * Removing the default WooCommerce stylesheet and enqueing your own will
			 * protect you during WooCommerce core updates.
			 *
			 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
			 */
			add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

			// Add body classes.
			add_filter( 'body_class', array( $this, 'body_class' ) );

			// Filter related and upsell products args.
			add_filter( 'woocommerce_output_related_products_args', array( $this, 'related_products_args' ) );
			add_filter( 'woocommerce_upsell_display_args', array( $this, 'upsell_products_args' ) );

			// Remove default WooCommerce wrapper.
			remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
			remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

			// Remove WooCommerce breadcrumbs.
			remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

			// Disable WooCommerce page title.
			add_filter( 'woocommerce_show_page_title', '__return_false' );

			// Disable WooCommerce product description and additional information heading.
			add_filter( 'woocommerce_product_description_heading', '__return_null' );
			add_filter( 'woocommerce_product_additional_information_heading', '__return_null' );

			// Add content wrapper.
			add_action( 'woocommerce_before_main_content', array( $this, 'wrapper_before' ) );
			add_action( 'woocommerce_after_main_content', array( $this, 'wrapper_after' ) );

			// cart fragments.
			add_filter( 'woocommerce_add_to_cart_fragments', array( $this, 'cart_link_fragment' ) );
			add_filter( 'woocommerce_add_to_cart_fragments', array( $this, 'sticky_cart_info_fragment' ) );
			add_filter( 'woocommerce_add_to_cart_fragments', array( $this, 'header_mini_cart_fragment' ) );
			add_filter( 'woocommerce_add_to_cart_fragments', array( $this, 'header_mini_cart_link_fragment' ) );

			// Add filter wrapper.
			add_action( 'woocommerce_before_shop_loop', array( $this, 'filter_wrapper_before' ), 10 );
			add_action( 'woocommerce_before_shop_loop', array( $this, 'filter_wrapper_after' ), 30 );

			// Add thumbnail wrapper.
			add_action( 'woocommerce_before_shop_loop_item', array( $this, 'product_thumbnail_before' ), 0 );
			add_action( 'woocommerce_before_shop_loop_item_title', array( $this, 'product_thumbnail_after' ), 99 );

			// Manage product loop link opening and closing.
			add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 11 );
			add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_link_open', 8 );

			// Add product content wrapper.
			add_action( 'woocommerce_after_shop_loop_item', array( $this, 'product_content_after' ), 99 );

			// Add payment method heading.
			add_action( 'woocommerce_review_order_before_payment', array( $this, 'payment_method_heading' ) );

			// Filter WC blocks html.
			add_filter( 'woocommerce_blocks_product_grid_item_html', array( $this, 'blocks_product_grid_item_html' ), 10, 3 );

			// Add sidebar.
			add_action( 'widgets_init', array( $this, 'widgets_init' ), 15 );

			// Shop customization.
			add_action( 'wp', array( $this, 'shop_product_content_structure' ) );
			add_action( 'wp', array( $this, 'shop_sale_badge' ) );
			add_action( 'wp', array( $this, 'shop_filter_count' ) );
			add_action( 'libreria_footer_bottom', array( $this, 'get_shop_filters_sidebar' ) );
			add_action( 'woocommerce_before_shop_loop', array( $this, 'get_filter_button' ), 11 );

			// Filter product list classes.
			add_filter( 'woocommerce_post_class', array( $this, 'product_list_classes' ) );
			add_filter( 'libreria_blocks_product_list_class', array( $this, 'product_list_classes' ) );

			// Add sticky panel html.
			add_action( 'libreria_footer_bottom', array( $this, 'sticky_panel' ) );

			// Single product customization.
			add_action( 'wp', array( $this, 'single_product_sale_badge' ) );
			add_action( 'wp', array( $this, 'single_product_structure' ) );
			add_action( 'wp', array( $this, 'upsell_and_related_products' ) );
			add_action( 'woocommerce_before_quantity_input_field', array( $this, 'quantity_input_field_before' ) );
			add_action( 'woocommerce_after_quantity_input_field', array( $this, 'quantity_input_field_after' ) );

			// Checkout customization.
			add_action( 'wp', array( $this, 'distraction_free_view' ) );

			add_action( 'wp', array( $this, 'cart_item_remove_link' ) );

			// Pagination.
			add_filter( 'woocommerce_pagination_args', array( $this, 'replace_pagination_icons' ) );

			if ( 'infinite-load' === get_theme_mod( 'libreria_shop_pagination_style', 'number' ) ) {
				add_action('woocommerce_after_shop_loop', 'libreria_infinite_load_pagination', 15);
			}

			add_action( 'woocommerce_checkout_before_order_review_heading', array( $this, 'order_review_before' ) );
			add_action( 'woocommerce_checkout_after_order_review', array( $this, 'order_review_after' ) );
		}

		/**
		 * WooCommerce setup.
		 *
		 * @since 1.0.0
		 *
		 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
		 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)
		 * @link https://github.com/woocommerce/woocommerce/wiki/Declaring-WooCommerce-support-in-themes
		 *
		 * @return void
		 */
		public function setup() {

			// Support WooCommerce.
			add_theme_support(
				'woocommerce',
				array(
					'product_grid' => array(
						'default_columns' => 6,
					),
				)
			);
			add_theme_support( 'wc-product-gallery-zoom' );
			add_theme_support( 'wc-product-gallery-lightbox' );
			add_theme_support( 'wc-product-gallery-slider' );
		}

		/**
		 * WooCommerce specific scripts & stylesheets.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function enqueue() {

			wp_enqueue_style( 'libreria-woocommerce-style', get_template_directory_uri() . '/woocommerce.css', array( 'libreria-style' ), LIBRERIA_VERSION );

			$font_path   = WC()->plugin_url() . '/assets/fonts/';
			$inline_font = '
			@font-face {
				font-family: "star";
				src: url("' . $font_path . 'star.eot");
				src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
					url("' . $font_path . 'star.woff") format("woff"),
					url("' . $font_path . 'star.ttf") format("truetype"),
					url("' . $font_path . 'star.svg#star") format("svg");
				font-weight: normal;
				font-style: normal;
			}
			@font-face {
				font-family: "WooCommerce";
				src: url("' . $font_path . 'WooCommerce.eot");
				src: url("' . $font_path . 'WooCommerce.eot?#iefix") format("embedded-opentype"),
					url("' . $font_path . 'WooCommerce.woff") format("woff"),
					url("' . $font_path . 'WooCommerce.ttf") format("truetype"),
					url("' . $font_path . 'WooCommerce.svg#star") format("svg");
				font-weight: normal;
				font-style: normal;
			}
			';

			wp_add_inline_style( 'libreria-woocommerce-style', $inline_font );
		}

		/**
		 * Add classes to body tag.
		 *
		 * @param array $classes An array of body class names.
		 * @return array
		 */
		public function body_class( $classes ) {

			$classes[] = 'woocommerce-active';

			if ( function_exists( 'is_store_notice_showing' ) && is_store_notice_showing() ) {
				$classes[] = 'libreria-store-notice--' . get_theme_mod( 'libreria_store_notice_alignment', 'left' );
			}

			if ( get_theme_mod( 'libreria_checkout_distraction_free_view', false ) ) {
				$classes[] = 'libreria-distraction-free-checkout';
			}

			if ( is_product() ) {
				$curr_product_id        = wc_get_product()->get_id();
				$related_products       = is_null( $curr_product_id ) ? false : wc_get_related_products( $curr_product_id, 6 );
				$related_product_number = count( $related_products );
				$related_product_column = get_theme_mod( 'libreria_related_products_column', '4' );
				$related_product_limit  = get_theme_mod( 'libreria_related_products_count', 4 );

				if ( $related_product_number < $related_product_column ) {
					$col_diff_class = 'libreria-has-less-rp__' . $related_product_number;
					array_push( $classes, $col_diff_class );
				} elseif ( $related_product_number > $related_product_column ) {
					$product_count  = (int) $related_product_limit < $related_product_number ? (int) $related_product_limit : $related_product_number;
					$col_diff_class = 'libreria-has-more-rp__' . $product_count;

					array_push( $classes, $col_diff_class );
				}
			}

			return $classes;
		}

		/**
		 * Related Products Args.
		 *
		 * @since 1.0.0
		 *
		 * @param array $args related products args.
		 * @return array $args related products args.
		 */
		public function related_products_args( $args ) {

			$related_product_number = get_theme_mod( 'libreria_related_products_count', 4 );
			$related_product_column = get_theme_mod( 'libreria_related_products_column', '4' );

			$args['posts_per_page'] = isset( $related_product_number ) ? (int) $related_product_number : 4;
			$args['columns']        = isset( $related_product_column ) ? (int) $related_product_column : 4;

			return $args;
		}

		/**
		 * Upsell Products Args.
		 *
		 * @since 1.0.0
		 *
		 * @param array $args related products args.
		 * @return array $args related products args.
		 */
		public function upsell_products_args( $args ) {

			$upsell_product_number = get_theme_mod( 'libreria_upsell_products_count', 4 );
			$upsell_product_column = get_theme_mod( 'libreria_upsell_products_column', '4' );

			$args['posts_per_page'] = isset( $upsell_product_number ) ? (int) $upsell_product_number : 4;
			$args['columns']        = isset( $upsell_product_column ) ? (int) $upsell_product_column : 4;

			return $args;
		}

		public function quantity_input_field_before() {
			echo '<a href="#" class="libreria-quantity-minus" role="button">';
			libreria_get_icon( 'minus' );
			echo '</a>';
		}

		public function quantity_input_field_after() {
			echo '<a href="#" class="libreria-quantity-plus" role="button">';
			libreria_get_icon( 'plus' );
			echo '</a>';
		}

		/**
		 * Before Content.
		 *
		 * Wraps all WooCommerce content in wrappers which match the theme markup.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function wrapper_before() {
			?>
			<main id="primary" class="site-main">
			<?php
		}

		/**
		 * After Content.
		 *
		 * Closes the wrapping divs.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function wrapper_after() {
			?>
			</main><!-- #main -->
			<?php
		}

		/**
		 * Cart Fragments.
		 *
		 * Ensure cart contents update when products are added to the cart via AJAX.
		 *
		 * @since 1.0.0
		 *
		 * @param array $fragments Fragments to refresh via AJAX.
		 * @return array Fragments to refresh via AJAX.
		 */
		public function cart_link_fragment( $fragments ) {

			ob_start();

			self::cart_link();

			$fragments['a.cart-contents'] = ob_get_clean();

			return $fragments;
		}

		/**
		 * Cart info Fragments.
		 *
		 * Ensure cart contents update when products are added to the cart via AJAX.
		 *
		 * @since 1.0.0
		 *
		 * @param array $fragments Fragments to refresh via AJAX.
		 * @return array Fragments to refresh via AJAX.
		 */
		public function sticky_cart_info_fragment( $fragments ) {

			ob_start();

			self::sticky_cart_info();

			$fragments['div.libreria-cart-data'] = ob_get_clean();

			return $fragments;
		}

		/**
		 * Header mini cart fragments.
		 *
		 * Ensure cart contents update when products are added to the cart via AJAX.
		 *
		 * @since 1.0.0
		 *
		 * @param array $fragments Fragments to refresh via AJAX.
		 * @return array Fragments to refresh via AJAX.
		 */
		public function header_mini_cart_fragment( $fragments ) {

			ob_start();

			self::header_mini_cart();

			$fragments['#libreria-header-cart button.libreria-mini-cart__toggle'] = ob_get_clean();

			return $fragments;
		}

		/**
		 * Header mini cart link fragments.
		 *
		 * Ensure cart contents update when products are added to the cart via AJAX.
		 *
		 * @since 1.0.0
		 *
		 * @param array $fragments Fragments to refresh via AJAX.
		 * @return array Fragments to refresh via AJAX.
		 */
		public function header_mini_cart_link_fragment( $fragments ) {

			ob_start();

			self::header_mini_cart_link();

			$fragments['#libreria-header-cart a.libreria-mini-cart__link'] = ob_get_clean();

			return $fragments;
		}

		/**
		 * Cart Info.
		 *
		 * Display cart total and cart item number for sticky checkout panel.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public static function sticky_cart_info() {
			?>
			<div class="libreria-cart-data">
				<?php
				printf(
					/* Translators: 1: Cart items number. */
					esc_html( _n( '%d item ', '%d items ', esc_html( WC()->cart->get_cart_contents_count() ), 'libreria' ) ),
					esc_html( WC()->cart->get_cart_contents_count() )
				);
				?>
				-
				<?php
				echo wp_kses_post( WC()->cart->get_cart_total() );
				?>
			</div>
			<?php
		}

		/**
		 * Cart Link.
		 *
		 * Displayed a link to the cart including the number of items present and the cart total.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public static function cart_link() {
			?>
			<a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'libreria' ); ?>">

				<div class="cart-icon-holder">
					<?php libreria_get_icon( 'cart' ); ?>

					<?php $item_count_text = WC()->cart->get_cart_contents_count(); ?>

					<span class="count"><?php echo esc_html( $item_count_text ); ?></span>
				</div>

				<span class="amount"><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span>
			</a>
			<?php
		}

		/**
		 * Header mini cart button.
		 *
		 * Displays header mini cart button.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public static function header_mini_cart() {
			?>
			<button class="libreria-mini-cart__toggle libreria-btn--header-action" aria-label="<?php esc_attr_e( 'Close search dialog', 'libreria' ); ?>" aria-expanded="false" >
				<?php
				libreria_get_icon( 'cart' );
				$item_count_text = WC()->cart->get_cart_contents_count();
				?>

				<span class="count"><?php echo esc_html( $item_count_text ); ?></span>
			</button>
			<?php
		}

		/**
		 * Header mini cart button as a link.
		 *
		 * Displays header mini cart button as a link.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public static function header_mini_cart_link() {
			?>
			<a class="libreria-mini-cart__link libreria-btn--header-action" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'libreria' ); ?>">
				<?php
				libreria_get_icon( 'cart' );
				$item_count_text = WC()->cart->get_cart_contents_count();
				?>

				<span class="count"><?php echo esc_html( $item_count_text ); ?></span>
			</a>
			<?php
		}

		/**
		 * Display Header Cart.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public static function header_cart() {

			if ( ! is_cart() && get_theme_mod( 'libreria_header_cart', true ) ) {
				?>
				<div id="libreria-header-cart" class="libreria-header-action libreria-header-cart" >
					<?php self::header_mini_cart(); ?>
					<?php self::header_mini_cart_link(); ?>

					<div class="libreria-mini-cart">
						<?php
						$instance = array(
							'title' => esc_html__( 'Cart', 'libreria' ),
						);

						the_widget( 'WC_Widget_Cart', $instance );
						?>
						<button class="libreria-mini-cart__close libreria-btn--close-modal" aria-label="<?php esc_attr_e( 'Close mini cart dialog', 'libreria' ); ?>">
							<?php libreria_get_icon( 'close' ); ?>
						</button>
					</div>
				</div>
				<?php
			}
		}

		/**
		 * Opening element for filter wrapper at the top of WC pages.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function filter_wrapper_before() {
			echo '<div class="libreria-wc-filter">';
		}

		/**
		 * Closing element for filter wrapper at the top of WC pages.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function filter_wrapper_after() {
			echo '</div><!-- /.libreria-wc-filter -->';
		}

		/**
		 * Product listing.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function product_thumbnail_before() {
			?>
			<figure class="product__thumbnail">
			<?php
		}

		/**
		 * Adds markup after product thumbnail.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function product_thumbnail_after() {
			?>
			</figure><!-- /.product__thumbnail -->
			<div class="product__content">
			<?php
		}

		/**
		 * Adds markup after product content.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function product_content_after() {
			?>
			</div> <!-- /.product__content -->
			<?php
		}

		/**
		 * Change default HTML markup of product in blocks.
		 *
		 * @since 1.0.0
		 *
		 * @param object $html The existing HTML for the product block.
		 * @param object $data The data that includes information regarding the product block that was entered.
		 * @param object $product The post that the product block is getting added to. Could be a page, post, custom post type, etc.
		 * @return string
		 */
		public function blocks_product_grid_item_html( $html, $data, $product ) {

			/**
			 * Filter for blocks product list class.
			 *
			 * @since 1.0.0
			 */
			$classes = apply_filters( 'libreria_blocks_product_list_class', array( 'wc-block-grid__product', 'product' ) );
			$classes = esc_attr( implode( ' ', $classes ) );

			$badge_enabled = get_theme_mod( 'libreria_shop_sale_badge', true );
			$badge_text    = $this->block_grid_item_sale_badge( $product );
			$badge         = $badge_enabled ? $badge_text : '';

			$html = "<li class=\"{$classes}\">
				<figure class=\"product__thumbnail\">
						<a href=\"{$data->permalink}\" class=\"wc-block-grid__product-link\">
							{$badge}
							{$data->image}
						</a>
				</figure>
				<div class=\"product__content\">
					<a href=\"{$data->permalink}\">
						{$data->title}
						{$data->rating}
						{$data->price}
					</a>
					{$data->button}
				</div>
			</li>";

			return $html;
		}

		/**
		 * Get the sale badge.
		 *
		 * @since 1.0.0
		 *
		 * @param WC_Product|object $product Product.
		 * @return string           Rendered product output.
		 */
		public function block_grid_item_sale_badge( $product ) {

			$sale_badge_text = get_theme_mod( 'libreria_shop_sale_badge_text', __( 'Sale!', 'libreria' ) );
			$text            = 'Sale!' !== $sale_badge_text ? esc_html( $sale_badge_text ) : esc_html__( 'Sale', 'libreria' );

			if ( ! $product->is_on_sale() || '' === $text ) {
				return '';
			}

			return '
				<div class="wc-block-grid__product-onsale">
					<span aria-hidden="true">' . $text . '</span>
					<span class="screen-reader-text">' . esc_html__( 'Product on sale', 'libreria' ) . '</span>
				</div>
				';
		}

		/**
		 * Change the position or disable sale badge based on the customizer option.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function shop_sale_badge() {

			$is_sale_badge_enabled = get_theme_mod( 'libreria_shop_sale_badge', true );

			if ( $is_sale_badge_enabled ) {
				add_filter( 'woocommerce_sale_flash', array( $this, 'shop_sale_badge_text' ) );
			} else {
				remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
			}
		}

		/**
		 * Change default sale badge text.
		 *
		 * @since 1.0.0
		 *
		 * @return string
		 */
		public function shop_sale_badge_text() {

			$sale_badge_text = esc_html( get_theme_mod( 'libreria_shop_sale_badge_text', __( 'Sale!', 'libreria' ) ) );
			$sale_badge_html = "<span class=\"onsale\">{$sale_badge_text}</span>";

			if ( '' === $sale_badge_text ) {
				return '';
			}

			return $sale_badge_html;
		}

		/**
		 * Remove product filter and product result count.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function shop_filter_count() {

			$is_product_results_count_enabled = get_theme_mod( 'libreria_shop_product_result_count', true );

			if ( ! $is_product_results_count_enabled ) {
				remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
			}
		}

		/**
		 * Add CSS classes based on the customizer options.
		 *
		 * @since 1.0.0
		 *
		 * @param array $classes Product list classes.
		 * @return array
		 */
		public function product_list_classes( $classes ) {

			if ( self::is_single_product_loop() ) {
				return $classes;
			}

			$image_alignment   = get_theme_mod( 'libreria_shop_image_alignment', 'center' );
			$content_alignment = get_theme_mod( 'libreria_shop_content_alignment', 'left' );

			$classes[] = 'center' !== $image_alignment ? "libreria-product-thumbnail--{$image_alignment}" : '';
			$classes[] = 'left' !== $content_alignment ? "libreria-product-content--{$content_alignment}" : '';

			return $classes;
		}

		/**
		 * Register shop sidebar.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function widgets_init() {

			register_sidebar(
				array(
					'name'          => esc_html__( 'Shop Filters', 'libreria' ),
					'id'            => 'libreria-wc-filters-sidebar',
					'description'   => __( 'This sidebar will show product filters on shop.', 'libreria' ),
					'before_widget' => '<section id="%1$s" class="widget %2$s">',
					'after_widget'  => '</section>',
					'before_title'  => '<h2 class="widget-title">',
					'after_title'   => '</h2>',
				)
			);
		}

		/**
		 * Get shop filters sidebar.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function get_shop_filters_sidebar() {

			$is_filter_enabled = get_theme_mod( 'libreria_shop_filter', true );
			$sidebar_id        = 'libreria-wc-filters-sidebar';

			if ( self::is_product_archive() && $is_filter_enabled ) {
				?>
				<div class="libreria-filter-sidebar">
					<h2 class="libreria-filter-sidebar__heading">
						<?php esc_html_e( 'Filter', 'libreria' ); ?>
					</h2>
					<button href="#" class="libreria-close-filter-sidebar libreria-btn--close-modal" aria-expanded="false">
						<?php libreria_get_icon( 'close' ); ?>
					</button>
					<?php
					if ( is_active_sidebar( $sidebar_id ) ) {
						dynamic_sidebar( $sidebar_id );
					} elseif ( current_user_can( 'edit_theme_options' ) ) {
						?>
						<section class="libreria-no-widget">
							<h2><?php esc_html_e( 'Shop Filters', 'libreria' ); ?></h2>
							<a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Click here to add widgets for this area', 'libreria' ); ?></a>
						</section>
						<?php
					}
					?>
				</div>
				<div class="libreria-filter-sidebar-overlay"></div>
				<?php
			}
		}

		/**
		 * Filter button html markup.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function get_filter_button() {

			$is_filter_enabled = get_theme_mod( 'libreria_shop_filter', true );

			if ( $is_filter_enabled ) {
				?>
				<a href="#" class="libreria-filter-sidebar-toggle button">
					<?php esc_html_e( 'Filter', 'libreria' ); ?>
					<?php libreria_get_icon( 'filter' ); ?>
				</a>
				<?php
			}
		}

		/**
		 * Shop product content structure.
		 *
		 * @since 1.0.0
		 */
		public function shop_product_content_structure() {

			$structure = get_theme_mod(
				'libreria_shop_product_elements',
				array(
					'title',
					'rating',
					'price',
					'add_to_cart',
				)
			);

			if ( ! in_array( 'title', $structure, true ) ) {
				remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title' );
			}

			if ( ! in_array( 'rating', $structure, true ) ) {
				remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
			}

			if ( ! in_array( 'price', $structure, true ) ) {
				remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price' );
			}

			if ( ! in_array( 'add_to_cart', $structure, true ) ) {
				remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
			}
		}

		/**
		 * Customize single product sale badge.
		 *
		 * @since 1.0.0
		 */
		public function single_product_sale_badge() {

			$is_sale_badge_enabled = get_theme_mod( 'libreria_single_product_sale_badge', true );

			if ( ! $is_sale_badge_enabled ) {
				remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
			}
		}

		/**
		 * Show hide meta information or description tabs.
		 *
		 * @since 1.0.0
		 */
		public function single_product_structure() {

			$single_product_structure = get_theme_mod(
				'libreria_single_product_elements',
				array(
					'meta',
					'tabs',
				)
			);

			if ( ! in_array( 'meta', $single_product_structure, true ) ) {
				remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
			}

			if ( ! in_array( 'tabs', $single_product_structure, true ) ) {
				remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
			}
		}

		/**
		 * Remove upsell and related products from single product page.
		 *
		 * @since 1.0.0
		 */
		public function upsell_and_related_products() {

			$is_related_products_enabled = get_theme_mod( 'libreria_related_products', true );
			$is_upsell_products_enabled  = get_theme_mod( 'libreria_upsell_products', true );

			if ( ! $is_upsell_products_enabled ) {
				remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
			}

			if ( ! $is_related_products_enabled ) {
				remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
			}
		}

		/**
		 * Sticky panel for product archive pages and single product pages.
		 *
		 * Displays sticky checkout panel in product archive pages and sticky add to cart in single product pages.
		 *
		 * @since 1.0.0
		 */
		public function sticky_panel() {

			global $product;

			$is_add_to_cart_panel_enabled = get_theme_mod( 'libreria_add_to_cart_panel_on_scroll', false );
			$is_checkout_panel_enabled    = get_theme_mod( 'libreria_checkout_panel_after_add_to_cart', false );

			$class = '';

			if ( is_product() && $is_add_to_cart_panel_enabled ) {
				$class = 'add-to-cart';
			} elseif ( $is_checkout_panel_enabled ) {
				$class = 'checkout';
			}

			if ( $is_add_to_cart_panel_enabled || $is_checkout_panel_enabled ) :
				?>
				<div class="libreria-sticky-panel libreria-sticky-panel-<?php echo esc_attr( $class ); ?>">
					<div class="libreria-container">

						<?php if ( is_product() && $is_add_to_cart_panel_enabled ) : ?>

							<div class="libreria-product-image">
								<?php the_post_thumbnail( 'thumbnail' ); ?>
							</div>

							<div class="libreria-product-title">
								<?php the_title(); ?>
							</div>

							<div class="libreria-product-price">
								<?php woocommerce_template_single_price(); ?>
							</div>

							<div class="libreria-product-add-to-cart">

								<?php
								if ( $product->is_type( 'variable' ) ) {
									?>
									<a href="#" class="button libreria-scroll-to-variable"><?php echo esc_html( $product->add_to_cart_text() ); ?></a>
									<?php
								} else {
									woocommerce_template_single_add_to_cart();
								}
								?>
							</div>
						<?php elseif ( $is_checkout_panel_enabled ) : ?>

							<div class="libreria-continue-shopping">
								<a href="#"><?php esc_html_e( 'Continue Shopping', 'libreria' ); ?></a>
							</div>

							<div class="libreria-cart-info">
								<div class="libreria-item-added">
									<?php esc_html_e( 'Item added to cart.', 'libreria' ); ?>
								</div>
								<?php self::sticky_cart_info(); ?>
							</div>

							<div class="libreria-checkout-btn">
								<a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="button"><?php esc_html_e( 'Checkout', 'libreria' ); ?></a>
							</div>
						<?php endif; ?>
					</div>
				</div>
				<?php
			endif;
		}

		/**
		 * Distraction free checkout.
		 *
		 * Remove unnecessary distractions like sidebars and footer widgets.
		 *
		 * @since 1.0.0
		 */
		public function distraction_free_view() {

			$distraction_free_view = get_theme_mod( 'libreria_checkout_distraction_free_view', false );

			if ( is_checkout() && $distraction_free_view ) {
				remove_action( 'libreria_header_actions', 'libreria_header_actions_markup' );
				remove_action( 'libreria_mobile_navigation', 'libreria_mobile_navigation_markup' );
				remove_action( 'libreria_header_search', 'libreria_header_search_markup' );
				remove_action( 'libreria_page_header', 'libreria_page_header_markup' );
				remove_action( 'libreria_main_navigation', 'libreria_main_navigation_markup' );
				remove_action( 'libreria_footer_columns', 'libreria_footer_columns_markup' );
				remove_action( 'libreria_footer_bar', 'libreria_footer_bar_markup' );

				add_filter( 'libreria_current_layout', array( $this, 'remove_sidebar' ) );
			}
		}

		/**
		 * Customize cart item remove link in cart page.
		 *
		 * @since 1.0.0
		 */
		public function cart_item_remove_link() {

			add_filter(
				'woocommerce_cart_item_remove_link',
				function( $link ) {
					return str_replace( '&times;', libreria_get_icon( 'close', false ), $link );
				}
			);
		}

		/**
		 * Adds order review wrapper opening div.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function order_review_before() {
			echo '<div class="order-review-wrap">';
		}

		/**
		 * Adds order review wrapper closing div.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function order_review_after() {
			echo '</div>';
		}

		/**
		 * Adds heading for payment methods in checkout page.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function payment_method_heading() {
			echo '<h4 class="payment-method-heading">' . esc_html__( 'Payment Method', 'libreria' ) . '</h4>';
		}

		/**
		 * Remove sidebar.
		 *
		 * @since 1.0.0
		 *
		 * @return string
		 */
		public function remove_sidebar() {
			return 'no-sidebar';
		}

		/**
		 * Replace WC pagination icons.
		 *
		 * @param array $arr Pagination args array.
		 * @return array
		 */
		public function replace_pagination_icons( $arr ) {

			$left_icon  = libreria_get_icon( 'chevron-left', false );
			$right_icon = libreria_get_icon( 'chevron-right', false );

			$arr['prev_text'] = is_rtl() ? $right_icon : $left_icon;
			$arr['next_text'] = is_rtl() ? $left_icon : $right_icon;

			return $arr;
		}

		/**
		 * Check if it is a WC product archive page.
		 *
		 * @since 1.0.0
		 *
		 * @return bool
		 */
		public static function is_product_archive() {
			return is_shop() || is_product_taxonomy() || is_product_category() || is_product_tag();
		}

		/**
		 * Check if it is a single loop.
		 *
		 * Returns false in any loop including the ones inside single product page.
		 *
		 * @since 1.0.0
		 *
		 * @return bool
		 */
		public static function is_single_product_loop() {
			return is_product() && ! in_array( wc_get_loop_prop( 'name' ), array( 'related', 'up-sells' ), true ) && ! wc_get_loop_prop( 'is_shortcode' );
		}
	}
	Libreria_WooCommerce::get_instance();
}
