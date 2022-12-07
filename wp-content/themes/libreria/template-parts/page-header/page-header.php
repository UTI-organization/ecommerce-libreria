<?php
/**
 * Page header template.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Libreria
 * @since   1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<div class="libreria-page-header <?php echo esc_html( is_singular( array( 'post', 'product' ) ) ? 'libreria-page-header--thin' : '' ); ?>">
	<div class="libreria-container">

		<?php if ( ! is_singular( array( 'post', 'product' ) ) ) : ?>

			<?php if ( ! Libreria_Utils::page_header_has_title() ) : ?>
				<div class="libreria-page-header-title">
					<h1 class="libreria-page-title">
						<?php libreria_page_title(); ?>
					</h1>
					<?php libreria_archive_description(); ?>
				</div>
			<?php endif; ?>
		<?php endif ?>

		<?php
		$args = array(
			'container_before' => '<div class="libreria-breadcrumbs">',
			'container_after'  => '</div>',
		);

		if ( ! Libreria_Utils::page_header_has_breadcrumbs() ) {
			libreria_breadcrumb( $args );
		}
		?>

	</div>
</div><!-- .libreria-page-header -->
