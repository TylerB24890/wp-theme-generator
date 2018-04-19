/**
* {%THEME_SLUG%} theme main JS file
*
*/

import $ from 'jquery'
import { fullURL } from './variables'

$(document).ready(function() {
	'use strict'

	/**
	 * Add 'target="_blank"' to all external links
	 * @return string target=_blank attribute
	 */
	$('a').each(function() {
		$(this).attr('target', (this.href.match( fullURL )) ? '_self' :'_blank')
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
			var location = $(this).attr('href')

			$('html, body').animate({
					scrollTop: $(location).offset().top
			}, 1200)

			return false
	})
})
