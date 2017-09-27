const commons            = require( './commons' );
const { join, resolve }  = require( 'path' );

module.exports = {
	output: {
		publicPath: '/'
	},

	module: {
		rules: [].concat( commons.rules ),
	},

	resolve: commons.resolve
};
