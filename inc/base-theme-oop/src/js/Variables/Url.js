// URL Variables
var pathArray = window.location.href.split( '/' )
var protocol = pathArray[0]
var host = pathArray[2]
var domainArray = host.split(".")
var baseDomain = ""
var domainExt = ""
if(domainArray.length > 2) {
	baseDomain = domainArray[1]
	domainExt = domainArray[2]
} else {
	baseDomain = domainArray[0]
	domainExt = domainArray[1]
}

const directory = pathArray[3]
const fullURL = protocol + '//' + host

export { directory, fullURL }
