const { join, resolve } = require( 'path' );

const config = {
	browserSync: {
		port  : 8080,
		proxy : 'http://localhost/wp-dev/',
		files : [ '../style.css', '../built.js', '../**/*.php' ]
	},

	devtool: 'source-map',

	entry: join( __dirname, '..', 'components/index.js' ),

	rules: [
		{
			test: /\.css$/,
			use:[
				{
					loader: "style-loader",
					options: {
						convertToAbsoluteUrls: true
					}
				},
				"css-loader",
				"resolve-url-loader"
			]
		},
		{
			test: /\.scss$/,
			include: resolve( __dirname, '../' ),
			use:[
				{
					loader: "style-loader",
					options: {
						convertToAbsoluteUrls: true
					}
				},
				"css-loader",
				"resolve-url-loader",
				"sass-loader",
				"import-glob-loader"
			]
		}
	],

	output: {
		filename   : 'built.js',
		path       : join( __dirname, '..' ),
		publicPath : '/'
	},

	resolve: {
		alias: {
			addons: resolve( __dirname, '../storybook/assets/addons-apiki' ),
			assets : resolve( __dirname, '../assets' )
		}
	},

	styleFileName: 'style.css',
};

module.exports = config;
