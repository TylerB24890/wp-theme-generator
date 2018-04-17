var webpack = require('webpack')

module.exports = function(env) {
	return {
		entry: "./src/js/app.js",
		output: {
			path: __dirname + "/dist/js",
			filename: "bundle.js"
		}
	}
}
