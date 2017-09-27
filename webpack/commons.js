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
			loaders: [ "style-loader", "css-loader", "resolve-url-loader" ]
		},
		{
			test: /\.scss$/,
			include: resolve( __dirname, '../' ),
			loaders: [ "style-loader", "css-loader", "resolve-url-loader", "sass-loader", "import-glob-loader" ]
		},
		// {
		// 	test: /\.(png|jpg|woff2|woff|ttf|eot|svg)$/,
		// 	loader: "ignore-loader"
		// },
		// {
		// 	test: /(\.js|\.jsx)$/,
		// 	exclude: /node_modules/,
		// 	loader: 'babel-loader'
		// },
		// {
		// 	test: /\.svg$/,
		// 	use: [
		// 		{
		// 			loader  : 'svg-sprite-loader',
		// 			options : {
		// 				extract : true,
		// 				spriteFilename : 'icons-sprite.svg'
		// 			}
		// 		},
		// 		{
		// 			loader  : 'svgo-loader',
		// 			options : {
		// 			plugins : [
		// 					{ removeDoctype: true },
		// 					{ removeComments: true },
		// 					{ removeTitle: true },
		// 					{ removeEmptyAttrs: true },
		// 					{ removeEmptyContainers: true},
		// 					{ minifyStyles: true },
		// 					{ convertTransform: true },
		// 					{ removeUnknownsAndDefaults: true }
		// 				]
		// 			}
		// 		}
		// 	]
		// }
	],

	output: {
		filename   : 'built.js',
		path       : join( __dirname, '..' )
	},

	resolve: {
		alias: {
			helpers: resolve( __dirname, '../storybook/assets/helpers' ),
			assets : resolve( __dirname, '../assets' )
		}
	},

	styleFileName: 'style.css',
};

module.exports = config;
