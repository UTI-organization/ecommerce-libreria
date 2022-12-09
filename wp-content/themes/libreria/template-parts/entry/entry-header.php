<?php
/**
 * Template part for entry header.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Libreria
 * @since   1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$hide_title    = get_post_meta( get_the_ID(), 'libreria_hide_title' );
$is_hide_title = ( isset( $hide_title[0] ) && $hide_title[0] );

$meta_orders = get_theme_mod(
	'libreria_blog_meta',
	array(
		'category',
		'author',
		'date',
		'comment',
	)
);

?>
<header class="entry-header">
	<?php

	if ( in_array( 'category', $meta_orders, true ) ) {
		libreria_entry_category();
	}

	if ( is_singular() ) :

		the_title( '<h1 class="entry-title">', '</h1>' );
	else :
		the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
	endif;
	?>
</header><!-- .entry-header -->
