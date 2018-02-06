'use strict'

const { join } = require('path')
const webpack = require('webpack')
const common = require('./common')

const CleanPlugin = require('clean-webpack-plugin')
const ExtractTextPlugin = require('extract-text-webpack-plugin')
const { BundleAnalyzerPlugin } = require('webpack-bundle-analyzer')

module.exports = {
  devtool: 'cheap-module-source-map',

  entry: [
    'babel-polyfill',
    common.entry.main
  ],

  output: common.output,

  plugins: [
    new CleanPlugin(common.paths.root, {
      root: common.paths.root
    }),

    new webpack.DefinePlugin({
      'process.env': {
        'NODE_ENV': '"production"'
      }
    }),

    new webpack.optimize.UglifyJsPlugin({
      sourceMap: true,
      mangle: {
        screw_ie8: true,
        keep_fnames: true
      },
      compress: {
        screw_ie8: true,
        warnings: false
      },
      comments: false
    })
  ].concat(
    process.env.ANALYZER ? new BundleAnalyzerPlugin() : []
  ),

  module: {
    rules: [
      common.jsLoader,
      common.fileLoader,
      common.urlLoader
      // Object.assign({}, common.sassLoader, {
      //   test: /\.(css|scss)$/,
      //   include: common.sassLoader.include.concat([]),
      //   use: ExtractTextPlugin.extract({
      //     fallback: common.sassLoader.use[0],
      //     use: [
      //       common.sassLoader.use[1]
      //     ].concat(common.sassLoader.use.slice(2))
      //   })
      // })
    ]
  },

  resolve: common.resolve
}
