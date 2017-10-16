const commons           = require( './commons' );
const BrowserSyncPlugin = require( 'browser-sync-webpack-plugin' );
const ExtractTextPlugin = require( 'extract-text-webpack-plugin' );

module.exports = {
	devtool: commons.devtool,
	entry  : commons.entry,
	output : commons.output,

	module : {
		noParse : commons.module.noParse,

		rules: [
			{
				test: /\.scss$/,
				use : ExtractTextPlugin.extract( [ "css-loader", "sass-loader", "import-glob-loader" ] )
			},
			{
				test: /\.js$/,
				loader: "babel-loader"
			}
		].concat( commons.rules )
	},

	plugins : [
		new BrowserSyncPlugin( commons.browserSync ),
		new ExtractTextPlugin( 'style.css' )
	],

	resolve: commons.resolve
};
