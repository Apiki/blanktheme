const { join, resolve } = require( 'path' );

const config = {
	entry: join( __dirname, '..', 'components/index.js' ),

	paths: {
		assets: join( __dirname, '..', 'assets' ),
		components: join( __dirname, '..', 'components' ),
		dest: join( __dirname, '..' )
	},
};

module.exports = config;
