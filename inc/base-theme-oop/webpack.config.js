var webpack = require('webpack')

module.exports = function(env) {
	return {
		entry: "./assets/js/app.js",
		output: {
			path: __dirname + "/dist",
			filename: "bundle.js"
		}
	}
}
