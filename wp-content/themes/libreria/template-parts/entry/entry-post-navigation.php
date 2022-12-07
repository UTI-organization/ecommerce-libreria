<?php
/**
 * Template part for displaying post navigation.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Libreria
 * @since   1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<nav class="navigation post-navigation" role="navigation" aria-label="Posts">
	<h2 class="screen-reader-text"><?php esc_html_e( 'Post navigation', 'libreria' ); ?></h2>
	<div class="nav-links">
		<?php
		$previous_post = get_previous_post();
		$next_post     = get_next_post();

		if ( $previous_post ) :
			?>
			<div class="nav-previous">
				<?php
				$previous_post_thumbnail = get_the_post_thumbnail(
					$previous_post->ID,
					'thumbnail',
					array(
						'alt' => the_title_attribute(
							array(
								'echo' => false,
							)
						),
					)
				);

				$previous_post_thumbnail_html = '';

				if ( $previous_post_thumbnail ) {
					$previous_post_thumbnail_html = '<span class="nav-thumbnail-wrap">' . $previous_post_thumbnail . '</span>';
				}

				previous_post_link(
					'%link',
					 $previous_post_thumbnail_html . '<span class="nav-title-wrap"><span class="nav-title">%title</span><span class="nav-meta">' . esc_html_x( 'Previous', 'Previous post link', 'libreria' ) . '</span></span>'
				);
				?>
			</div>
			<?php
		endif;

		if ( $next_post ) :
			?>
			<div class="nav-next">
				<?php
				$next_post_thumbnail = get_the_post_thumbnail(
					$next_post->ID,
					'thumbnail',
					array(
						'alt' => the_title_attribute(
							array(
								'echo' => false,
							)
						),
					)
				);

				$next_post_thumbnail_html = '';

				if ( $next_post_thumbnail ) {
					$next_post_thumbnail_html = '<span class="nav-thumbnail-wrap">' . $next_post_thumbnail . '</span>';
				}

				next_post_link(
					'%link',
					  '<span class="nav-title-wrap"><span class="nav-title">%title</span><span class="nav-meta">' . esc_html_x( 'Next', 'Next post link', 'libreria' ) . '</span></span>' . $next_post_thumbnail_html
				);
				?>
			</div>
		<?php endif; ?>
	</div>
</nav>
