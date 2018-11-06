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
	currentPage,
	isSinglePost,
	ajaxnonce,
	isUser,
	isDev
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
	currentPage: currentPage,
	isSingle: isSinglePost,
	nonce: ajaxnonce,
	isUser: isUser,
	isDev: isDev
}

export { lexi }
