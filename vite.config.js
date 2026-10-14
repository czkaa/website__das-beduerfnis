/* eslint-env node */
import "dotenv/config";
import { defineConfig } from "vite";
import { resolve } from "path";
import Vue from "@vitejs/plugin-vue";
import styleImport from 'vite-plugin-style-import'

process.env.VITE_BACKEND_URL = `http://${process.env.KIRBY_DEV_HOSTNAME}:${process.env.KIRBY_DEV_PORT}`;
process.env.VITE_BACKEND_API_SLUG = process.env.CONTENT_API_SLUG;
process.env.VITE_MULTILANG = process.env.KIRBY_MULTILANG;

export default ({ mode }) =>
  defineConfig({
    root: "src",
    base: mode === "development" ? "/" : "/dist/",

    build: {
      outDir: resolve(__dirname, "public/dist"),
      emptyOutDir: true,
      manifest: true,
      rollupOptions: {
        input: "/index.js",
      },
      commonjsOptions: {
        transformMixedEsModules: true
      }
    },

    resolve: {
      alias: {
        '@/': `${resolve(__dirname, 'src')}/`,
        'tailwind.config.js': resolve(__dirname, 'tailwind.config.js'),
      },
    },

    plugins: [
      Vue(),
      styleImport({
        libs: [
        {
          libraryName: 'element-plus',
          esModule: true,
          ensureStyleFile: true,
          resolveStyle: (name) => {
            name = name.slice(3)
            return `element-plus/packages/theme-chalk/src/${name}.scss`;
          },
          resolveComponent: (name) => {
            return `element-plus/lib/${name}`;
          },
        }]
      })
    ],

    server: {
      cors: true,
      port: 3000,
      strictPort: true,
    },

    optimizeDeps: {
      include: ["vue", "vue-router", "tailwind.config.js"],
    },
  });
