var webpack = require('webpack')
const UglifyJsPlugin = require('uglifyjs-webpack-plugin')

module.exports = function(env) {
	return {
		entry: "./src/js/app.js",
		output: {
			path: __dirname + "/dist/js",
			filename: "bundle.js"
		},
		plugins: [
			new UglifyJsPlugin({
				uglifyOptions: {
					compress: true,
					ecma: 8,
					output: {
						comments: false,
						beautify: false
					}
				}
			})
		]
	}
}
