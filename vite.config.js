const path = require('path')
// import { resolve } from 'path'

import { defineConfig } from 'vite'

export default defineConfig({
  root: '',

  build: {
    outDir: 'frontend',
    assetsDir: '',
    // lib: {
    //   // Could also be a dictionary or array of multiple entry points
    //   entry: path.resolve(__dirname, 'main.js'),
    //   name: 'app',
    //   fileName: 'app',
    // },
    rollupOptions: {
      // overwrite default .html entry
      input: 'main.js',
      output: {
        entryFileNames: "[name].js",
        assetFileNames: "[name].[ext]",
      },
    },
    minify: true,
  },
  resolve: {
    alias: {
      '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
    }
  },
  server: {
    port: 8080,
    hot: true
  }
})

