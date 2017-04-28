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
    baseDomain = domainArray[0];
    domainExt = domainArray[1];

	// Add target=_blank to all external links
    $('a').each(function() {
        $(this).attr('target', (this.href.match( baseDomain)) ? '_self' :'_blank');
    });

    // Increase counter
    $('form').on('submit', function(e) {
        var count = Number($('#theme-count').text());

        setTimeout(function() {
            count++;
            $('#theme-count').text(count);
        }, 5000);
    });
})(jQuery);
