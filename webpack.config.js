'use strict';

var webpack = require('webpack');
var ExtractTextPlugin = require('extract-text-webpack-plugin');
var path = require('path');

var config = require('./_config'); //paths config..

var NODE_ENV = '\'development\'';

process.argv.forEach(arg => {
  if(arg === '-p' || arg === '-d'){
    NODE_ENV = '\'production\'';
  }
});

module.exports = {

  entry: [
    config.build('js', 'src'),
    './_scss/style.scss'
  ],

  output: {
    path: config.js.dest.path,
    filename: config.js.dest.file //JavaScript end point
  },

  //quickest, webpack -d -p for production
  devtool: 'eval',

  module: {

    //test: which filetype?,
    //exclude: which folders to exclude

    loaders: [

      {
        test: /\.(js|jsx)$/,
        exclude: /node_modules/,
        loader: 'babel',
        query: {
          babelrc: path.join(__dirname, '.babelrc')
        }
      },

      {
        test: /\.(js|jsx)$/,
        exclude: /node_modules/,
        loader: 'eslint'
      },

      {
        test: /\.scss$/,
        loader: ExtractTextPlugin.extract('css!postcss!sass?outputStyle=expanded')
      }

    ]

  },

  //webpack plugins
  plugins: [

    new webpack.optimize.DedupePlugin(),

    //react smaller build
    new webpack.DefinePlugin({
      'process.env': {NODE_ENV: NODE_ENV}
    }),

    new ExtractTextPlugin('../css/style.css')

  ],

  resolve: {
    extensions: ['', '.json', '.js', '.jsx', '.css'],
    fallback: path.join(__dirname, 'node_modules')
  },

  resolveLoader: {
    fallback: path.join(__dirname, 'node_modules')
  }

};
