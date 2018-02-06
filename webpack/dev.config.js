'use strict'

const { join } = require('path')
const { readFileSync } = require('fs')
const webpack = require('webpack')
const common = require('./common')

const DashboardPlugin = require('webpack-dashboard/plugin')
const BrowserSyncPlugin = require('browser-sync-webpack-plugin')
const ExtractTextPlugin = require('extract-text-webpack-plugin')
const browserSync = JSON.parse(readFileSync(join(common.paths.root, 'browserSync.json'), 'utf8'))

module.exports = {
  devtool: 'source-map',

  entry: [
    'babel-polyfill',
    common.entry.main
  ],

  output: common.output,

  plugins: [
    new DashboardPlugin(),
    new ExtractTextPlugin('style.css'),
    new BrowserSyncPlugin(Object.assign({}, browserSync, {
      files: [
        `${common.paths.root}/style.css`,
        `${common.paths.root}/built.js`,
        `${common.paths.root}/**/*.php`
      ]
    }), { reload: false })
  ],

  module: {
    rules: [
      common.standardPreLoader,
      common.jsLoader,
      common.fileLoader,
      common.urlLoader,
      Object.assign({}, common.sassLoader, {
        use: ExtractTextPlugin.extract(common.sassLoader.use.slice(1))
      })
    ]
  },

  resolve: common.resolve
}
