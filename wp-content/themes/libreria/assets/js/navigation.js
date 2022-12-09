/**
 * Libreria Navigation JS file.
 *
 * @package
 * @since   1.0.0
 */

/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {
	const libreriaNavigation = function() {
		const self           = this;
		this.siteBranding    = document.getElementById( 'libreria-site-branding' );
		this.primaryMenu     = document.getElementById( 'libreria-site-navigation' );
		this.toggleMenu      = document.getElementById( 'libreria-toggle-navigation' );
		this.mobileMenuOpen  = this.siteBranding ? this.siteBranding.getElementsByClassName( 'menu-toggle' )[0] : null;
		this.mobileMenuClose = document.querySelector( '.libreria-toggle-navigation__close' ) || null;
		this.mobileSubMenu   = this.toggleMenu ? this.toggleMenu.querySelectorAll( '.sub-menu' ) : null;

		// Primary desktop navigation.
		this.subMenu = this.primaryMenu ? this.primaryMenu.querySelectorAll( '.sub-menu' ) : null;

		// Get all the link elements with children within the menu.
		this.linksWithChildren = this.primaryMenu ? this.primaryMenu.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' ) : null

		// Get all the link elements within the menu.
		this.links = this.primaryMenu ? this.primaryMenu.getElementsByTagName( 'a' ) : null;

		// Tertiary navigation.
		this.toggleTertiaryMenu = document.getElementById( 'tertiary-navigation' );
		this.showTertiaryMenu   = document.querySelector( '.tertiary-menu-toggle' );

		this.slideUp = ( target, duration = 300 ) => {
			target.style.transitionProperty = 'height, margin, padding';
			target.style.transitionDuration = duration + 'ms';
			target.style.boxSizing = 'border-box';
			target.style.height = target.offsetHeight + 'px';

			target.offsetHeight;

			target.style.overflow = 'hidden';
			target.style.height = 0;
			target.style.paddingTop = 0;
			target.style.paddingBottom = 0;
			target.style.marginTop = 0;
			target.style.marginBottom = 0;

			window.setTimeout( () => {
				target.style.display = 'none';
				target.style.removeProperty( 'height' );
				target.style.removeProperty( 'padding-top' );
				target.style.removeProperty( 'padding-bottom' );
				target.style.removeProperty( 'margin-top' );
				target.style.removeProperty( 'margin-bottom' );
				target.style.removeProperty( 'overflow' );
				target.style.removeProperty( 'transition-duration' );
				target.style.removeProperty( 'transition-property' );
			}, duration );
		};

		this.slideDown = ( target, duration = 500 ) => {
			target.style.removeProperty( 'display' );

			let display = window.getComputedStyle( target ).display;

			if ( display === 'none' ) {
				display = 'block';
			}

			target.style.display = display;

			const height = target.offsetHeight;
			target.style.overflow = 'hidden';
			target.style.height = 0;
			target.style.paddingTop = 0;
			target.style.paddingBottom = 0;
			target.style.marginTop = 0;
			target.style.marginBottom = 0;

			target.offsetHeight;

			target.style.boxSizing = 'border-box';
			target.style.transitionProperty = 'height, margin, padding';
			target.style.transitionDuration = duration + 'ms';
			target.style.height = height + 'px';

			target.style.removeProperty( 'padding-top' );
			target.style.removeProperty( 'padding-bottom' );
			target.style.removeProperty( 'margin-top' );
			target.style.removeProperty( 'margin-bottom' );

			window.setTimeout( () => {
				target.style.removeProperty( 'height' );
				target.style.removeProperty( 'overflow' );
				target.style.removeProperty( 'transition-duration' );
				target.style.removeProperty( 'transition-property' );
			}, duration );
		};

		this.slideToggle = ( target, duration = 300 ) => {
			if ( window.getComputedStyle( target ).display === 'none' ) {
				return self.slideDown( target, duration );
			}
			return self.slideUp( target, duration );
		};

		this.openMobileNavigation = function( e ) {
			e.preventDefault();

			if ( ! self.toggleMenu.classList.contains( 'libreria-toggle-navigation--is-opened' ) ) {
				self.toggleMenu.classList.add( 'libreria-toggle-navigation--is-opened' );
				self.mobileMenuOpen.setAttribute( 'aria-expanded', 'true' );
			}
		};

		this.closeMobileNavigation = function( e ) {
			e.preventDefault();

			if ( self.toggleMenu.classList.contains( 'libreria-toggle-navigation--is-opened' ) ) {
				self.toggleMenu.classList.remove( 'libreria-toggle-navigation--is-opened' );
				self.mobileMenuOpen.setAttribute( 'aria-expanded', 'false' );
			}
		}

		this.toggleTertiaryNavigation = function( e ) {
			e.preventDefault();

			// Toggle the .toggled class each time the button is clicked.
			self.toggleTertiaryMenu.classList.toggle( 'toggled' );
		};

		this.toggleSubMenu = function( e ) {
			e.preventDefault();

			this.classList.toggle( 'active' );

			const targetSubMenu = e.currentTarget.parentNode.querySelector( '.sub-menu' );

			self.slideToggle( targetSubMenu );
		};

		/**
		 * Sets or removes .focus class on an element.
		 */
		this.toggleFocus = function () {
			if ( event.type === 'focus' || event.type === 'blur' ) {
				let selfNav = this;

				// Move up through the ancestors of the current link until we hit .nav-menu.
				while ( ! selfNav.classList.contains( 'nav-menu' ) ) {
					// On li elements toggle the class .focus.
					if ( 'li' === selfNav.tagName.toLowerCase() ) {
						selfNav.classList.toggle( 'focus' );
					}

					selfNav = selfNav.parentNode;
				}
			}

			if ( event.type === 'touchstart' ) {
				const menuItem = this.parentNode;

				event.preventDefault();

				for ( const link of menuItem.parentNode.children ) {
					if ( menuItem !== link ) {
						link.classList.remove( 'focus' );
					}
				}

				menuItem.classList.toggle( 'focus' );
			}
		};

		this.init = function() {

			// Hide menu toggle button if menu is empty and return early.
			if ( ! self.primaryMenu ) {
				self.mobileMenuOpen.style.display = 'none';

				return;
			}

			if ( ! self.primaryMenu.classList.contains( 'nav-menu' ) ) {
				self.primaryMenu.classList.add( 'nav-menu' );
			}

			if ( self.mobileMenuOpen ) {
				/**
				 * Open mobile navigation.
				 */
				self.mobileMenuOpen.addEventListener( 'click', self.openMobileNavigation );
			}

			if ( self.mobileMenuClose ) {
				/**
				 * Mobile navigation close.
				 */
				self.mobileMenuClose.addEventListener( 'click', self.closeMobileNavigation );
			}

			/**
			 * Tertiary navigation toggle.
			 */
			if ( self.showTertiaryMenu ) {
				self.showTertiaryMenu.addEventListener( 'click', this.toggleTertiaryNavigation );
			}

			// Slide toggle mobile submenu.
			if ( null !== self.mobileSubMenu ) {
				self.mobileSubMenu.forEach( function( item, index ) {
					item.parentNode.querySelector( '.libreria-submenu-toggle' ).addEventListener( 'click', self.toggleSubMenu );
				} );
			}

			// Toggle focus each time a menu link is focused or blurred.
			for ( const link of this.links ) {
				link.addEventListener( 'focus', this.toggleFocus, true );
				link.addEventListener( 'blur', this.toggleFocus, true );
			}

			// Toggle focus each time a menu link with children receive a touch event.
			for ( const link of this.linksWithChildren ) {
				link.addEventListener( 'touchstart', this.toggleFocus, { passive: true} );
			}
		};

		this.init();
	};

	window.libreriaNavigation = new libreriaNavigation();
}() );
