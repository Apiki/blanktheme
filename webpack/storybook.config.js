const commons = require( './commons' );
const { join, resolve } = require( 'path' );

module.exports = {
	module: {
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
	},

	resolve: {
		alias: {
			utilities: resolve( __dirname, '../storybook/assets/utilities' )
		}
	}
};
