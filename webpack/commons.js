const { join, resolve } = require( 'path' );

const config = {
	devtool: 'source-map',

	entry: join( __dirname, '..', 'components/index.js' ),

	output: {
		filename: 'built.js',
		path: join( __dirname, '..' )
	},

	styleFileName: 'style.css',

	rules: [
		{
			test: /\.css$/,
			loaders: [ "style-loader", "css-loader" ]
		},
		{
			test: /\.(woff|woff2|eot|otf|ttf|svg)(\?.*$|$)/,
			loader: "file-loader",
			options: {
				name: "[path][name].[ext]",
				emitFile: false
			}
		}
	],

	resolve: {
		alias: {
			ui: resolve( __dirname, '..', 'storybook/ui' ),
			assets: resolve( __dirname, '..', 'assets' )
		}
	},
};

module.exports = config;
