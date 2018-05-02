import {
	protocol,
	host,
	domain,
	ext,
	directory,
	fullURL
} from './url'

import {
	ajaxurl,
	isMobile,
	currentPage,
	isSinglePost,
	ajaxnonce
} from './theme'

const lexi = {
	url: {
		protocol: protocol,
		host: host,
		domain: domain,
		extension: ext,
		directory: directory,
		fullUrl: fullURL
	},
	ajaxurl: ajaxurl,
	isMobile: isMobile,
	currentPage: currentPage,
	isSingle: isSinglePost,
	nonce: ajaxnonce
}

export { lexi }
