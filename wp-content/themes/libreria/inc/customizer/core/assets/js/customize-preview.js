/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function ( $ ) {

	// Site title.
	wp.customize(
		'libreria_header_search_text',
		function ( value ) {
			value.bind(
				function ( to ) {
					$( '.libreria-search .search-field' ).attr( 'placeholder', to );
				}
			);
		}
	);

} )( jQuery );
