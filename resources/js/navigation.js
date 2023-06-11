/**
 * Primary navigation script.
 *
 * Primary JavaScript file. Any includes or anything imported should be filtered through this file
 * and eventually saved back into the `/assets/js/app.js` file.
 *
 * @package   Creativity
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2023. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/creativity
 */

/**
 * A simple immediately-invoked function expression to kick-start
 * things and encapsulate our code.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
( function( $ ) {
	var container, button, screenreadertext, menu;

	container = document.getElementById( 'masthead' );
	if ( ! container ) {
		return;
	}``

	button = container.getElementsByTagName( 'button' )[0];
	if ( 'undefined' === typeof button ) {
		return;
	}

	menu = container.getElementsByTagName( 'ul' )[0];

	screenreadertext = document.createElement( 'span' );
	screenreadertext.classList.add( 'screen-reader-text' );
	screenreadertext.textContent = creativityScreenReaderText.expandMain;
	button.appendChild( screenreadertext );

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}

	button.onclick = function() {
		screenreadertext = this.querySelector( '.screen-reader-text' );
		if ( -1 !== container.className.indexOf( 'toggled' ) ) {
			container.className = container.className.replace( ' toggled', '' );
			button.setAttribute( 'aria-expanded', 'false' );
			screenreadertext.textContent = creativityScreenReaderText.expandMain;
			menu.setAttribute( 'aria-expanded', 'false' );
		} else {
			container.className += ' toggled';
			button.setAttribute( 'aria-expanded', 'true' );
			screenreadertext.textContent = creativityScreenReaderText.collapseMain;
			menu.setAttribute( 'aria-expanded', 'true' );
		}
	};
} )( jQuery );
