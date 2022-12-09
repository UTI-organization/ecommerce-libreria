( function ( $ ) {

	if ( 'undefined' === typeof libreriaInfiniteLoadParams ) {
		return;
	}

	let infiniteLoadParams = libreriaInfiniteLoadParams; // Localized data.

	let infiniteTotal       = parseInt(infiniteLoadParams['infiniteTotal']),
		infiniteCount       = parseInt(infiniteLoadParams['infiniteCount']),
		ajaxUrl             = infiniteLoadParams['ajaxUrl'],
		infiniteNonce       = infiniteLoadParams['infiniteNonce'],
		pagination          = infiniteLoadParams['pagination'],
		loadStatus          = true,
		infiniteLoadEvent   = infiniteLoadParams['infiniteLoadEvent'],
		message             = infiniteLoadParams['allPostsLoadedMessage'];

	if( pagination === 'infinite-load' ) {
		$('.woocommerce-pagination').hide();
	}

	function loadProducts( pageNumber ) {

		let data = {
				action : 'libreria_infinite_load',
				page_no: pageNumber,
				nonce: infiniteNonce,
				query_vars: infiniteLoadParams['queryVars'],
			},
			loadMore = $( '.libreria-load-more' );

		loadMore.addClass( 'loading' );

		$.post( ajaxUrl, data, function( data ) {
			let posts = $( data );


			loadMore.removeClass( 'loading' );

			$( '#primary > .products' ).append( posts );

			if( infiniteCount > infiniteTotal ) {
				loadMore.addClass( 'libreria-no-more-product' );
				loadMore.html( '<span class="libreria-no-more-product-text">' + message + '</span>' );
			}

			loadStatus = true;
		} );
	}

	function inViewPort( el, callback, options = {} ) {

		return new IntersectionObserver( function( entries ) {

				entries.forEach( function( entry ) {
						callback( entry );
					}
				);
			},
			options
		).observe( document.querySelector( el ) );
	}

	switch ( infiniteLoadEvent ) {

		case 'button':
			$( document ).on( 'click', '.libreria-load-more', function( e ) {

				e.preventDefault();

				if( infiniteCount && infiniteTotal ) {

					if ( infiniteCount > infiniteTotal ) {
						return false;
					}

					loadProducts( infiniteCount );
					infiniteCount++;
				}
			} );

			break;
		case 'scroll' :
			if ( $( '#primary .products' ).find( 'li:last' ).length > 0 ) {

				if ( infiniteCount > infiniteTotal ) {
					return false;
				}

				inViewPort( '.libreria-infinite-pagination', function( element ) {

					if ( element.isIntersecting ) {

						if ( loadStatus ) {
							loadProducts( infiniteCount );
							infiniteCount++;
							loadStatus = false;
						}
					}
				}, {} );
			}

			break;
	}
} )( jQuery );
