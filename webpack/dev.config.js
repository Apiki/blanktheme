const { join, resolve }  = require( 'path' );
const commons            = require( './commons' );
const BrowserSyncPlugin  = require( 'browser-sync-webpack-plugin' );
const ExtractTextPlugin  = require( 'extract-text-webpack-plugin' );

module.exports = {
	devtool : commons.devtool,

	entry   : commons.entry,

	module  : {
		rules: [
			commons.rules.js,
			commons.rules.files,
			{
				test: /\.scss$/,
				enforce: 'pre',
				loader: 'import-glob-loader'
			},
			{
				test: /\.scss$/,
				use: ExtractTextPlugin.extract(['css-loader', 'sass-loader'])
			},
		]
	},

	output  : commons.output,

	plugins : [
		new BrowserSyncPlugin( commons.browserSync ),
		new ExtractTextPlugin( commons.styleFileName )
	],

	resolve: commons.resolve
};
