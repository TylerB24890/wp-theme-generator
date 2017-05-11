/**
* {%THEME_SLUG%} theme main JS file
*
*/

(function($) {

    'use strict';

    var $window = $(window);
    var ww = $window.width();

    // URL Variables
    var pathArray = window.location.href.split( '/' );
    var protocol = pathArray[0];
    var host = pathArray[2];
    var directory = pathArray[3];
    var domainArray = host.split(".");
    var baseDomain = "";
    var domainExt = "";
    if(domainArray.length > 2) {
      baseDomain = domainArray[1];
      domainExt = domainArray[2];
    } else {
      baseDomain = domainArray[0];
      domainExt = domainArray[1];
    }
    var baseURL = "." + baseDomain + "." + domainExt;
    var fullURL = protocol + '//' + host;

    // Is touch device?
    var isTouch = !!("undefined" != typeof document.documentElement.ontouchstart)

    /**
     * Exeucte when DOM is ready
     */
    $(function() {

        /**
         * Add 'target="_blank"' to all external links
         * @return string target=_blank attribute
         */
        $('a').each(function() {
          $(this).attr('target', (this.href.match( baseURL )) ? '_self' :'_blank');
        });

    });

    /**
     * Animate the Bootstrap hamburger to an X on click
     */
    $('.navbar-toggle').on('click', function() {
        $(this).toggleClass('active');
    });

    /**
     * Inline scrolling
     * @param  event e capture the JS click event
     * @return false - prevents link redirection
     */
    $('a.inline-link').click(function(e) {
        var location = $(this).attr('href');

        $('html, body').animate({
            scrollTop: $(location).offset().top
        }, 1200);

        return false;
    });

})( jQuery );
