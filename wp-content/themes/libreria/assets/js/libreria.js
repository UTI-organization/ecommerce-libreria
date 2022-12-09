/**
 * Scroll to top.
 */
( function () {

	document.addEventListener('DOMContentLoaded', function () {
		let scrollToTopButton = document.getElementById( 'libreria-scroll-to-top' );

		// Only proceed when the button is present.
		if ( scrollToTopButton ) {

			// On scroll and show and hide button.
			window.addEventListener(
				'scroll',
				function() {
					if ( 500 < window.scrollY ) {
						scrollToTopButton.classList.add( 'libreria-scroll-to-top--show' );
					} else if ( 500 > window.scrollY ) {
						scrollToTopButton.classList.remove(
							'libreria-scroll-to-top--show'
						);
					}
				}
			);

			// Scroll to top when clicked on button.
			scrollToTopButton.addEventListener(
				'click',
				function( e ) {
					e.preventDefault();

					// Only scroll to top if we are not in top.
					if ( 0 !== window.scrollY ) {
						window.scrollTo(
							{
								top: 0,
								behavior: 'smooth'
							}
						);
					}
				}
			);
		}
	});

} )();

/**
 * Toggle search modal.
 */
let searchModalController = ( function () {

	let DOMStrings = {
		search: document.querySelector( '.libreria-search'),
		openModalBtn:  document.querySelector( '.libreria-search__toggle' ),
		closeModalBtn: document.querySelector( '.libreria-search__close' ),
		searchField: document.querySelector( 'input.search-field' ),
	};

	let setUpEvents = function () {
		DOMStrings.openModalBtn.addEventListener( 'click', openTheModal );
		DOMStrings.closeModalBtn.addEventListener( 'click', closeTheModal );
		document.addEventListener( 'keyup', keyPressHandler );
	};

	let openTheModal = function ( e ) {
		window.setTimeout( function () {
			DOMStrings.searchField.focus();
		}, 100 );

		DOMStrings.search.classList.add( 'libreria-active' );
		DOMStrings.openModalBtn.setAttribute( 'aria-expanded', true );
	};

	let closeTheModal = function () {
		DOMStrings.search.classList.remove( 'libreria-active' );
		DOMStrings.openModalBtn.setAttribute( 'aria-expanded', false );
	}

	let keyPressHandler = function( e ) {
		if ( 27 === e.keyCode ) {
			closeTheModal();
		}
	}

	return {
		init: function() {
			if ( DOMStrings.openModalBtn ) {
				setUpEvents();
			}
		}
	}
} )();

searchModalController.init();

/**
 * Header More Sidebar Modal Toggle.
 */
let moreSidebarController = ( function() {

	let DOMStrings = {
		openModalBtn    : document.querySelector( '.libreria-header-more__toggle' ),
		closeModalBtn   : document.querySelector( '.libreria-header-sidebar__close' ),
		sidebarMoreModal: document.querySelector( '.libreria-header-sidebar' ),
	};

	let setUpEvents = function () {
		DOMStrings.openModalBtn.addEventListener( 'click', openTheModal );
		DOMStrings.closeModalBtn.addEventListener( 'click', closeTheModal );
		document.addEventListener( 'keyup', keyPressHandler );
	};

	let openTheModal = function ( e ) {
		e.preventDefault();
		DOMStrings.sidebarMoreModal.classList.add( 'libreria-header-sidebar--is-opened' );
		DOMStrings.openModalBtn.setAttribute( 'aria-expanded', true );
	};

	let closeTheModal = function () {
		DOMStrings.sidebarMoreModal.classList.remove( 'libreria-header-sidebar--is-opened' );
		DOMStrings.openModalBtn.setAttribute( 'aria-expanded', false );
	}

	let keyPressHandler = function( e ) {
		if ( 27 === e.keyCode ) {
			closeTheModal();
		}
	}

	return {
		init: function() {
			if ( DOMStrings.openModalBtn ) {
				setUpEvents();
			}
		}
	}
} )();

moreSidebarController.init();
