/**
* Lexi Theme JS
*
*/

import { urlVars } from './variables'
import { inlineScroll } from './functions'

$(document).ready(function() {
	'use strict'

	/**
	* Add 'target="_blank"' to all external links
	* @return string target=_blank attribute
	*/
	$('a').each(function() {
		$(this).attr('target', (this.href.match( urlVars.fullUrl )) ? '_self' :'_blank')
	})

	/**
	* Animate the Bootstrap hamburger to an X on click
	*/
	$('.navbar-toggle').on('click', function() {
		$(this).toggleClass('active')
	})

	/**
	* Inline scrolling
	* @param  event e capture the JS click event
	* @return false - prevents link redirection
	*/
	$('a.inline-link').click(function(e) {
		inlineScroll($(this).attr('href'))
		return false
	})
})
