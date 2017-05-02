/**
 * WordPress Theme Maker
 */

(function($) {
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

	// Add target=_blank to all external links
    $('a').each(function() {
        $(this).attr('target', (this.href.match( fullURL)) ? '_self' :'_blank');
    });

    // Increase counter
    $('form').on('submit', function(e) {
        var count = Number($('#theme-count').text());

        setTimeout(function() {
            count++;
            $('#theme-count').text(count);
        }, 5000);
    });

    // Inline scrolling
    $('a.inline-link').click(function(e) {
        var location = $(this).attr('href');
        $('html, body').animate({
            scrollTop: $(location).offset().top - 30
        }, 1200);
        return false;
    });
})(jQuery);
