// URL Variables
var pathArray = window.location.href.split( '/' )
var protocol = pathArray[0]
var host = pathArray[2]
var domainArray = host.split(".")
var domain = ""
var ext = ""
if(domainArray.length > 2) {
	domain = domainArray[1]
	ext = domainArray[2]
} else {
	domain = domainArray[0]
	ext = domainArray[1]
}
var directory = pathArray[3]
var fullURL = protocol + '//' + host

export {
	protocol,
	host,
	domain,
	ext,
	directory,
	fullURL
}
