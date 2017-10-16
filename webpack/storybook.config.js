const { resolve } = require( 'path' );
const webpack     = require( 'webpack' );
const commons     = require( './commons' );

module.exports = {
	module: {
		noParse : commons.module.noParse,

		rules: [
			{
				test: /\.scss$/,
				loaders: [ "style-loader", "css-loader", "sass-loader", "import-glob-loader" ]
			}
		].concat( commons.rules )
	},

	resolve: Object.assign( {}, commons.resolve )
};
