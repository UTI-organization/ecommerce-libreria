<?php
/**
 * Template part entry meta.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Libreria
 * @since   1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( 'post' === get_post_type() ) :
	?>
	<div class="entry-meta">
		<?php
		$blog_meta_elements        = get_theme_mod(
			'libreria_blog_meta',
			array(
				'author',
				'date',
				'category',
			)
		);
		$single_post_meta_elements = get_theme_mod(
			'libreria_single_post_meta',
			array(
				'author',
				'date',
				'category',
				'comment',
			)
		);
		$meta_elements             = is_single() ? $single_post_meta_elements : $blog_meta_elements;

		if ( in_array( 'author', $meta_elements, true ) ) {
			libreria_entry_meta_author();
		}

		if ( in_array( 'date', $meta_elements, true ) ) {
			libreria_entry_meta_date();
		}

		if ( in_array( 'comment', $meta_elements, true ) ) {

			if ( ! is_single() ) {
				libreria_entry_comments();
			} elseif ( is_single() ) {
				libreria_entry_comments();
			}
		}

		if ( in_array( 'tags', $meta_elements, true ) ) {
			libreria_entry_tag();
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'libreria' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			),
			'<span class="edit-link">' . libreria_get_icon( 'edit', false ),
			'</span>'
		);
		?>
	</div><!-- .entry-meta -->
<?php endif; ?>
