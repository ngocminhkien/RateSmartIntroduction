export default {
  build: {
    outDir: 'dist',
    rollupOptions: {
      input: {
        main: 'index.html',
        presentation: 'presentation/presentation.html',
        prototype: 'prototype/index.html'
      }
    }
  }
};
