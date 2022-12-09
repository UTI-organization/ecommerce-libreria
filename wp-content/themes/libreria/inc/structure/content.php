<?php
/**
 * Hooks for the content area of the site.
 *
 * @package Libreria
 * @since   1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'libreria_excerpt_more' ) ) {

	/**
	 * Remove [...] from excerpts.
	 *
	 * @return void
	 */
	function libreria_excerpt_more() {
		return; // phpcs:ignore Squiz.PHP.NonExecutableCode.ReturnNotRequired
	}
	add_filter( 'excerpt_more', 'libreria_excerpt_more' );
}

if ( ! function_exists( 'libreria_excerpt_length' ) ) {

	/**
	 * Filters excerpt length.
	 *
	 * @param int $length Number of words in an excerpt.
	 * @return int Filtered number of words in an excerpt.
	 */
	function libreria_excerpt_length( $length ) {

		$customizer_length = get_theme_mod( 'libreria_excerpt_length', 18 );

		if ( $customizer_length ) {
			$length = $customizer_length;
		}

		return intval( $length );
	}
	add_filter( 'excerpt_length', 'libreria_excerpt_length' );
}

if ( ! function_exists( 'libreria_content_loop' ) ) {

	/**
	 * Main content loop.
	 *
	 * @return void
	 */
	function libreria_content_loop() {

		/**
		 * Filter for posts classes.
		 *
		 * @since 1.0.0
		 */
		$classes = apply_filters(
			'libreria_posts_classes',
			array(
				'libreria-posts',
				'libreria-blog-style--list'
			)
		);

		if ( have_posts() ) :
			?>

			<div class="<?php echo esc_attr( implode( ' ', array_unique( $classes ) ) ); ?>">

				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content/content', '' );
				endwhile;
				?>
			</div>
			<?php

			if ( get_theme_mod( 'libreria_blog_pagination_enable', true ) ) :

					libreria_pagination();
			endif;
		else :

			get_template_part( 'template-parts/content/content', 'none' );
		endif;
	}
	add_action( 'libreria_content', 'libreria_content_loop' );
	add_action( 'libreria_content_search', 'libreria_content_loop' );
	add_action( 'libreria_content_archive', 'libreria_content_loop' );
}

if ( ! function_exists( 'libreria_single_content_loop' ) ) {

	/**
	 * Single content loop.
	 *
	 * @return void
	 */
	function libreria_single_content_loop() {

		if ( have_posts() ) :
			?>

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content/content', 'single' );

				libreria_post_navigation();

				libreria_related_posts();

				libreria_comments();
			endwhile; // End of the loop.
		else :

			get_template_part( 'template-parts/content/content', 'none' );
		endif;
	}
	add_action( 'libreria_content_single', 'libreria_single_content_loop' );
}


if ( ! function_exists( 'libreria_read_more_text' ) ) {

	/**
	 * Filters read more text.
	 *
	 * @param string $text read more text.
	 * @return string Modified read more text.
	 */
	function libreria_read_more_text( $text ) {

		$customizer_text = get_theme_mod( 'libreria_read_more_text', '' );

		if ( $customizer_text ) {
			$text = $customizer_text;
		}

		return $text;
	}
	add_filter( 'libreria_read_more_text', 'libreria_read_more_text' );
}

if ( ! function_exists( 'libreria_infinite_scroll' ) ) {

	/**
	 * Ajax callback for infinite load.
	 */
	function libreria_infinite_load() {

		check_ajax_referer( 'libreria_infinite_load_nonce', 'nonce' );
		$query_vars                = isset( $_POST['query_vars'] ) ? json_decode( sanitize_text_field( wp_unslash( $_POST['query_vars'] ) ), true ) : array();
		$query_vars['post_type']   = 'product';
		$query_vars['paged']       = ( isset( $_POST['page_no'] ) ) ? absint( $_POST['page_no'] ) : 1;
		$query_vars['post_status'] = 'publish';

		$posts                     = new WP_Query( $query_vars );

		if ( $posts->have_posts() ) {

			while ( $posts->have_posts() ) {

				$posts->the_post();

				wc_get_template_part( 'content', 'product' );
			}

		}

		wp_reset_postdata();

		wp_die();
	}
	add_action( 'wp_ajax_libreria_infinite_load', 'libreria_infinite_load' );
	add_action( 'wp_ajax_nopriv_libreria_infinite_load', 'libreria_infinite_load' );
}

if ( ! function_exists( 'libreria_related_posts' ) ) :

	/**
	 * Display the related posts if it is enabled via Customize Option.
	 */
	function libreria_related_posts() {

		// Bail out if related posts is disabled.
		$is_related_posts_enabled = get_theme_mod( 'libreria_related_posts', true );

		if ( ! $is_related_posts_enabled ) {
			return;
		}

		// Related posts query.
		global $post;

		// Define shared post arguments.
		$args = array(
			'no_found_rows'          => true,
			'update_post_meta_cache' => false,
			'update_post_term_cache' => false,
			'ignore_sticky_posts'    => true,
			'orderby'                => 'rand',
			'post__not_in'           => array( $post->ID ),
			'posts_per_page'         => 2,
			'category__in'           => wp_get_post_categories( $post->ID, array( 'fields' => 'ids' ) ),
		);

		$related_posts_query = new WP_Query( $args );
		$grid_cols           = get_theme_mod( 'libreria_related_posts_column', '2' );

		if ( $related_posts_query->have_posts() ) :
			?>

			<div class="libreria-related-posts">

				<h2 class="libreria-related-posts-header">
					<?php esc_html_e( 'You May Also Like', 'libreria' ); ?>
				</h2>

				<div class="libreria-posts libreria-grid-col--<?php echo esc_attr( $grid_cols ); ?>">
					<?php
					while ( $related_posts_query->have_posts() ) :

						$related_posts_query->the_post();

						get_template_part( 'template-parts/related-post/related-post' );

						wp_reset_postdata();
					endwhile;
					?>
				</div>

			</div>
			<?php
		endif;
	}
endif;
