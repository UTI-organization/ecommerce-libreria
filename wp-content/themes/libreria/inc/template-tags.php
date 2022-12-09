<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Libreria
 * @since   1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'wp_body_open' ) ) :

	/**
	 * Shim for sites older than 5.2.
	 *
	 * @since   1.0.0
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {

		/**
		 * Triggered after the opening body tag.
		 *
		 * @since   1.0.0
		 */
		do_action( 'wp_body_open' );
	}
endif;

if ( ! function_exists( 'libreria_page_title' ) ) :

	/**
	 * Get the title.
	 *
	 * Returns the title of a blog page, archive page etc.
	 *
	 * @since   1.0.0
	 */
	function libreria_page_title() {

		// Blog page.
		if ( is_singular() ) {
			the_title();
		} elseif ( is_search() ) { // Search page.
			/* translators: %s: search query. */
			printf( esc_html__( 'Search Results for: %s', 'libreria' ), '<span>' . get_search_query() . '</span>' );
		} elseif ( Libreria_Utils::is_wc_active() && is_woocommerce() ) {
			woocommerce_page_title();
		} elseif ( is_home() ) {
			echo wp_kses_post( get_the_title( get_option( 'page_for_posts', true ) ) );
		} elseif ( is_author() ) {
			the_author();
		} elseif ( is_category() || is_tag() || is_tax() ) {
			single_term_title( '' );
		} elseif ( is_archive() ) {
			the_archive_title();
		}
	}
endif;

if ( ! function_exists( 'libreria_archive_description' ) ) :

	/**
	 * Output the archive description.
	 *
	 * @since 1.0.0
	 */
	function libreria_archive_description() {

		if ( Libreria_Utils::is_wc_active() && is_shop() ) {
			return;
		} else {
			the_archive_description( '<div class="libreria-page-header-description">', '</div>' );
		}
	}
endif;

if ( ! function_exists( 'libreria_entry_meta_date' ) ) :

	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function libreria_entry_meta_date() {

		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$allowed_time_html = array(
			'time' => array(
				'datetime' => true,
				'class'    => true,
			),
		);

		echo '<span class="post-date">' . wp_kses( libreria_get_icon( 'calender', false ), Libreria_SVG_Icons::$allowed_html ) . '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . wp_kses( $time_string, $allowed_time_html ) . '</a></span>';
	}
endif;

if ( ! function_exists( 'libreria_entry_meta_author' ) ) :

	/**
	 * Prints HTML with meta information for the current author.
	 */
	function libreria_entry_meta_author() {
		echo '<span class="post-author"><span class="screen-reader-text">' . esc_html__( 'Posted by', 'libreria' ) . '</span>' . wp_kses( libreria_get_icon( 'user', false ), Libreria_SVG_Icons::$allowed_html ) . '<span><span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span></span></span>';
	}
endif;

if ( ! function_exists( 'libreria_entry_category' ) ) :

	/**
	 * Prints HTML with meta information for the categories assigned.
	 */
	function libreria_entry_category() {

		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			$categories_list = get_the_category_list( ' ' );

			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf(
					'<span class="post-categories">' . wp_kses(
						$categories_list,
						array(
							'a' => array(
								'href' => true,
								'rel'  => true,
							),
						)
					) . '</span>'
				);
			}
		}
	}
endif;

if ( ! function_exists( 'libreria_entry_tag' ) ) :

	/**
	 * Prints HTML with meta information for the tag assigned.
	 */
	function libreria_entry_tag() {

		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() && get_the_tag_list() ) {
			echo '<span class="post-tags">' . wp_kses( libreria_get_icon( 'tag', false ), Libreria_SVG_Icons::$allowed_html ) . wp_kses(
				get_the_tag_list( '', ', ' ),
				array(
					'a' => array(
						'href' => true,
						'rel'  => true,
					),
				)
			) . '</span>';
		}
	}
endif;

if ( ! function_exists( 'libreria_entry_comments' ) ) :

	/**
	 * Prints HTML with meta information for the comments.
	 */
	function libreria_entry_comments() {

		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';

			libreria_get_icon( 'comment' );

			comments_popup_link(
				sprintf(
					wp_kses(
					/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'libreria' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
			echo '</span>';
		}
	}
endif;

if ( ! function_exists( 'libreria_entry_thumbnail' ) ) :

	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function libreria_entry_thumbnail() {

		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		global $post;

		$thumbnail_size = get_theme_mod( 'libreria_blog_post_featured_image_size', 'full' );
		?>
		<div class="entry-thumbnail">
			<?php
			if ( is_singular() ) :
				the_post_thumbnail();
			else :
				?>
				<a class="entry-thumbnail__link" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
					<?php
					the_post_thumbnail(
						$thumbnail_size,
						array(
							'alt' => the_title_attribute(
								array(
									'echo' => false,
								)
							),
						)
					);
					?>
				</a>
			<?php endif; // End is_singular(). ?>
		</div><!-- .entry-thumbnail -->
		<?php
	}
endif;

if ( ! function_exists( 'libreria_comments' ) ) :

	/**
	 * Prints comment form and comments in single post and page.
	 */
	function libreria_comments() {

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
	}
endif;

if ( ! function_exists( 'libreria_pagination' ) ) :

	/**
	 * Adds pagination links for posts.
	 *
	 * @return void
	 */
	function libreria_pagination() {

		$left_icon  = libreria_get_icon( 'chevron-left', false );
		$right_icon = libreria_get_icon( 'chevron-right', false );
		?>

		<div class="libreria-pagination">
			<?php
			$args = array(
				'type'      => 'list',
				'prev_text' => ( is_rtl() ? $right_icon : $left_icon ) . '<span class="screen-reader-text">' . __( 'Previous page', 'libreria' ) . '</span>',
				'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'libreria' ) . '</span>' . ( is_rtl() ? $left_icon : $right_icon ),
			);

			the_posts_pagination( $args );
			?>
		</div>
		<?php
	}
endif;

if ( ! function_exists( 'libreria_infinite_load_pagination' ) ) :

	/**
	 * Load More Pagination.
	 */
	function libreria_infinite_load_pagination() {

		global $wp_query;
		$event = get_theme_mod( 'libreria_shop_infinite_load_event', 'button' );

		if ( $wp_query->max_num_pages > 1 ) :
			?>
			<nav class="libreria-infinite-pagination">
				<div class="libreria-load-more">

					<?php if ( 'button' === $event ) : ?>
						<a href="#" class="libreria-load-more-btn button">
					<?php endif; ?>

						<div class="libreria-load-more-icon">
							<div class="spinner"></div>
							<?php libreria_get_icon( 'plus' ); ?>
						</div>

					<?php if ( 'button' === $event ) : ?>
						<span class="libreria-load-more-text"><?php echo esc_html__( 'More', 'libreria' ); ?></span>
					</a>
				<?php endif; ?>
				</div>
			</nav>
		<?php
		endif;
		?>
		<?php
	}
endif;

if ( ! function_exists( 'libreria_post_navigation' ) ) :

	/**
	 * Template part post-navigation.
	 *
	 * @return void
	 */
	function libreria_post_navigation() {
		get_template_part( 'template-parts/entry/entry', 'post-navigation' );
	}
endif;

if ( ! function_exists( 'libreria_breadcrumb' ) ) :

	/**
	 * Get breadcrumb markup.
	 *
	 * @param array $args Array for breadcrumb before and after container.
	 */
	function libreria_breadcrumb( $args = array() ) {

		$args = wp_parse_args(
			$args,
			array(
				'container_before' => '',
				'container_after'  => '',
			)
		);

		echo wp_kses_post( $args['container_before'] );

		libreria_breadcrumb_trail(
			array(
				'show_browse' => false,
			)
		);

		echo wp_kses_post( $args['container_after'] );
	}
endif;
