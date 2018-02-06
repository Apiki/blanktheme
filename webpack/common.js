'use strict'

const { join } = require('path')
const { readFileSync } = require('fs')
const webpack = require('webpack')
const babelrc = JSON.parse(readFileSync(join(__dirname, '..', '.babelrc'), 'utf-8'))

const paths = {
  root: join(__dirname, '..'),
  components: join(__dirname, '..', 'components'),
  assets: join(__dirname, '..', 'assets'),
  dist: join(__dirname, '..')
}

const alias = {
  root: paths.root,
  assets: paths.assets,
  components: paths.components,
  styles: join(paths.assets, 'stylesheets')
}

const storybookAlias = {
  'storybook-ui': join(paths.root, 'storybook', 'ui')
}

const config = {
  paths,

  entry: {
    main: join(paths.components, 'index')
  },

  output: {
    path: paths.dist,
    filename: 'built.js'
  },

  standardPreLoader: {
    enforce: 'pre',
    test: /\.js$/,
    include: paths.src,
    use: 'eslint-loader'
  },

  jsLoader: {
    test: /\.js$/,
    include: paths.src,
    use: {
      loader: 'babel-loader',
      options: Object.assign({}, babelrc, {
        presets: babelrc.presets.map((preset) => (
          preset === 'env' ? ['env', { modules: false }] : preset
        ))
      })
    }
  },

  sassLoader: {
    test: /\.(css|scss)$/,
    include: paths.root,
    use: [ 'style-loader', 'css-loader', 'sass-loader', 'import-glob-loader' ]
  },

  fileLoader: {
    test: /\.(ico|jpg|jpeg|png|gif|eot|otf|webp|svg|ttf|woff|woff2|txt)(\?.*)?$/,
    use: {
      loader: 'file-loader',
      options: {
        name: '[path][name].[ext]',
        emitFile: false
      }
    }
  },

  urlLoader: {
    test: /\.(mp4|webm|wav|mp3|m4a|aac|oga)(\?.*)?$/,
    use: {
      loader: 'url-loader',
      options: {
        limit: 10000,
        name: '[path][name].[ext]',
        emitFile: false
      }
    }
  },

  plugins: [
    new webpack.NamedModulesPlugin(),
    new webpack.NoEmitOnErrorsPlugin()
  ],

  resolve: {
    alias: Object.assign({}, alias, storybookAlias)
  }
}

module.exports = config
