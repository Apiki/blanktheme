const { join, resolve } = require( 'path' );

const config = {
	devtool: 'source-map',

	entry: join( __dirname, '..', 'app/index.js' ),

	output: {
		filename: 'built.js',
		path: join( __dirname, '..' )
	},

	styleFileName: 'style.css',

	browserSync: {
		port  : 8080,
		proxy : 'wpdev.dev',
		files : [ '../style.css', '../built.js', '../**/*.php' ]
	},

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
			ui        : resolve( __dirname, '..', 'storybook/ui' ),
			app       : resolve( __dirname, '..', 'app' ),
			assets    : resolve( __dirname, '..', 'assets' ),
			components: resolve( __dirname, '..', 'components' )
		}
	},

	module: {
		noParse : /node_modules\/strclass\/dist\/strclass.min.js/
	}
};

module.exports = config;
