jQuery( document ).ready( function( $ ) {

	let filterSidebar        = $( '.libreria-filter-sidebar' ),
		openFilterSidebar    = $( '.libreria-filter-sidebar-toggle' ),
		closeFilterSidebar   = $( '.libreria-close-filter-sidebar' ),
		filterSidebarOverlay = $( '.libreria-filter-sidebar-overlay' ),
		stickyCart           = $( '.libreria-sticky-panel-add-to-cart' ),
		addToCartButton      = $( '.single_add_to_cart_button' ),
		stickyCheckout       = $( '.libreria-sticky-panel-checkout' ),
		variationBtn         = $( '.libreria-scroll-to-variable' );
		headerMiniCart       = $( '.libreria-header-cart' );
		qty 				 = $( 'form.cart .quantity, .woocommerce-cart-form__cart-item.cart_item .quantity' );

	if ( headerMiniCart.length > 0 ) {

		headerMiniCart.on( 'click', '.libreria-mini-cart__toggle', function () {
			$('.libreria-mini-cart').addClass( 'libreria-mini-cart--is-opened' );
		} );

		headerMiniCart.on( 'click', '.libreria-mini-cart__close', function () {
			$('.libreria-mini-cart').removeClass( 'libreria-mini-cart--is-opened' );
		} );
	}

	if( qty.length > 0 ) {
		for (let i = 0; i < qty.length; i++) {
			let plus  = qty[i].querySelector('.libreria-quantity-plus');
			    minus = qty[i].querySelector('.libreria-quantity-minus');

			plus.addEventListener('click', function (e) {
				let input = this.parentNode.querySelector('.qty'),
					changeEvent = document.createEvent('HTMLEvents');
				e.preventDefault();
				input.value = input.value === '' ? 0 : parseInt(input.value) + 1;
				changeEvent.initEvent('change', true, false);
				input.dispatchEvent(changeEvent);
			});
			minus.addEventListener('click', function (e) {
				let input = this.parentNode.querySelector('.qty'),
					changeEvent = document.createEvent('HTMLEvents');
				e.preventDefault();
				input.value = parseInt(input.value) > 0 ? parseInt(input.value) - 1 : 0;
				changeEvent.initEvent('change', true, false);
				input.dispatchEvent(changeEvent);
			});
		}
	}


	let throttle = function( fn, threshold, scope ) {

		threshold || ( threshold = 250 );

		let last,
			deferTimer;

		return function () {
			let context = scope || this;

			let now  = +new Date,
				args = arguments;

			if ( last && now < last + threshold ) {

				clearTimeout( deferTimer );

				deferTimer = setTimeout( function () {
					last = now;

					fn.apply( context, args );
				}, threshold );
			} else {
				last = now;

				fn.apply( context, args );
			}
		};
	}

	if ( filterSidebar.length > 0 && openFilterSidebar.length > 0 ) {

		let toggleFilterSidebar = function ( e ) {
			e.preventDefault();
			filterSidebar.toggleClass( 'toggled' );
			filterSidebarOverlay.toggleClass( 'toggled' );
		}

		openFilterSidebar.on( 'click', toggleFilterSidebar );
		filterSidebarOverlay.on( 'click', toggleFilterSidebar );
		closeFilterSidebar.on( 'click', toggleFilterSidebar );
	}

	if (  stickyCart.length > 0 ) {

		let triggerStickyCart = function() {

			if ( addToCartButton.length > 0 ) {
				let buttonBtm = addToCartButton[0].getBoundingClientRect().bottom;

				if ( 0 > buttonBtm ) {
					stickyCart.addClass( 'show' );
				} else {
					stickyCart.removeClass( 'show' );
				}
			}
		}

		$( window ).on( 'load scroll', throttle( triggerStickyCart, 250 ) );

		if ( variationBtn.length > 0 ) {

			variationBtn.on( 'click', function( e ) {
				e.preventDefault();

				let offset = 0,
					adminBar = $( '#wpadminbar' );

				if ( adminBar.length ) {
					offset = offset + adminBar.outerHeight();
				}

				$( 'html, body' ).animate( {
					scrollTop: $( '.variations' ).offset().top - offset
				}, 500 );
			} );
		}
	}

	if ( stickyCheckout.length > 0 ) {

		let triggerStickyCheckout = function() {

			stickyCheckout.addClass( 'show' );

			$( document ).on( 'click', '.libreria-continue-shopping > a', function( e ) {
				e.preventDefault();
				stickyCheckout.removeClass( 'show' );
			} );

			$( window ).on( 'scroll', throttle( function() {
				stickyCheckout.removeClass( 'show' );
			}, 250 ) )
		}

		$( document.body ).on( 'added_to_cart', triggerStickyCheckout );
	}
} );
