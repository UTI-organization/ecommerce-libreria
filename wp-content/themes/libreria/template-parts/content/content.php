<?php
/**
 * Template part for displaying posts.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Libreria
 * @since   1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	$entry_elements = get_theme_mod(
		'libreria_blog_post_elements',
		array(
			'thumbnail',
			'header',
			'meta',
			'summary',
			'footer',
		)
	);
	?>

	<?php get_template_part( 'template-parts/entry/entry', 'thumbnail' ); ?>

	<div class="libreria-entry-content-wrapper">
		<?php
		if ( in_array( 'header', $entry_elements, true ) ) {
			get_template_part( 'template-parts/entry/entry', 'header' );
		}
		if ( in_array( 'meta', $entry_elements, true ) ) {
			get_template_part( 'template-parts/entry/entry', 'meta' );
		}
		if ( in_array( 'summary', $entry_elements, true ) ) {
			get_template_part( 'template-parts/entry/entry', 'summary' );
		}
		get_template_part( 'template-parts/entry/entry', 'footer' );
		?>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->
