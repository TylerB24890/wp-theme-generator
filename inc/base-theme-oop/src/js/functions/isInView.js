function isInView(elem, offset = 0) {
	var docViewTop = $(window).scrollTop();
	var docViewBottom = docViewTop + ($(window).height() + offset);

	var elemTop = $(elem).offset().top;
	var elemBottom = elemTop + $(elem).height();

	return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
}

export { isInView }
