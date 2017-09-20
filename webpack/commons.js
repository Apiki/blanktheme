const { join, resolve } = require( 'path' );

const config = {
	paths: {
		assets: join( __dirname, '..', 'assets' ),
		stories: join( __dirname, '..', 'stories' ),
		dest: join( __dirname, '..' )
	},

	rules: [
		{
			test: /\.css$/,
			loaders: [ "style-loader", "css-loader" ]
		},
		{
			test: /\.scss$/,
			loaders: [ "style-loader", "css-loader", "sass-loader", "import-glob-loader" ],
			include: resolve( __dirname, '../' )
		}
	]
};

module.exports = config;
