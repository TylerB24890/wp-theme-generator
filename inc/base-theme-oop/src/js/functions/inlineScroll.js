import $ from 'jquery'

const inlineScroll = (loc) => {
	$('html, body').animate({
		scrollTop: $(loc).offset().top
	}, 1200)
}

export { inlineScroll }
