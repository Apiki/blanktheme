const commons            = require( './commons' );
const { join, resolve }  = require( 'path' );

module.exports = {
	module: {
		rules: [].concat( commons.rules ),
	},

	resolve: commons.resolve
};
