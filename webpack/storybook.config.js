'use strict'

const { join } = require('path')
const common = require('./common')
const DashboardPlugin = require('webpack-dashboard/plugin')

module.exports = {
  plugins: [
    new DashboardPlugin()
  ],

  module: {
    rules: [
      common.standardPreLoader,
      common.jsLoader,
      common.fileLoader,
      common.urlLoader,
      Object.assign({}, common.sassLoader, {
        include: common.sassLoader.include.concat([
          join(common.paths.root, 'storybook', 'ui')
        ])
      })
    ]
  },

  resolve: common.resolve
}
