const path = require('path');
const UglifyJsPlugin = require('uglifyjs-webpack-plugin')

var isDev = process.env.NODE_ENV !== 'production';

module.exports = {
	mode: 'development',
	entry: {
		main: './src/js/app.js'
	},
	output: {
		path: path.resolve(__dirname, './dist/js'),
		filename: 'bundle.js'
	},
	module: {
		rules: [
			{
				test: /\.js$/,
				exclude: /(node_modules|bower_components)/,
				use: {
					loader: 'babel-loader',
					options: {
						presets: ['babel-preset-env']
					}
				}
			}
		]
	},
	optimization: {
		minimize: false
	}
};
