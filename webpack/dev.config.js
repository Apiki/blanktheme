const { join, resolve }  = require( 'path' );
const commons            = require( './commons' );
const BrowserSyncPlugin  = require( 'browser-sync-webpack-plugin' );
const ExtractTextPlugin  = require( 'extract-text-webpack-plugin' );

module.exports = {
	devtool : commons.devtool,

	entry   : commons.entry,

	module  : {
		rules: [
			{
				test: /(\.js|\.jsx)$/,
				exclude: /node_modules/,
				loader: 'babel-loader'
			},
			{
				test: /\.scss$/,
				enforce: 'pre',
				loader: 'import-glob-loader'
			},
			{
				test: /\.scss$/,
				use: ExtractTextPlugin.extract(['css-loader', 'resolve-url-loader', 'sass-loader'])
			}
		].concat( commons.rules )
	},

	output  : commons.output,

	plugins : [
		new BrowserSyncPlugin( commons.browserSync ),
		new ExtractTextPlugin( 'style.css' )
	],

	resolve: commons.resolve
};
