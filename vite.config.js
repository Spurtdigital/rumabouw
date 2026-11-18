import { defineConfig } from "vite";
import { resolve } from "path";
import { copyFileSync, cpSync, existsSync, mkdirSync } from "fs";
import autoprefixer from "autoprefixer";
import purgecss from "@fullhuman/postcss-purgecss";

const isProduction = process.env.NODE_ENV === "production";

// PurgeCSS configuratie (alleen in productie)
const purgeCssPlugin = purgecss({
    content: ["./**/*.php", "./assets/js/**/*.js"],
    safelist: {
        standard: [
            /^btn-/,
            /^href/,
            /^is-/,
            /^has-/,
            /^f-/,
            /^fancybox-/,
            /^fancybox/,
            /^gform_/,
            /^ginput_/,
            /^lock/,
            /^block/,
            /^wpadminbar/,
            /^swiper-/,
            /^spurt-/,
            /^svg/,
            /^nav-/,
            /^home-/,
            /^builder-/,
            /^footer/,
            /^panel/,
            /^single-/,
            /^breadcumb/,
            /^archive-/,
            /^project-/,
            /^slider/,
            /^screen-reader/,
            /^img-/,
            /^current-/,
            /^menu-item/,
            /^columns-/,
            // WordPress / plugins
            /^wp-/,
            /^wpcf7/,
            /^form-/,
            /^gform_/,
            /^ginput_/,
            /^woocommerce/,
            /^wc-/,
            /^logged-in/,
            /^admin-bar/,
            /^align/,
            /^gallery/,
            /^attachment/
        ],
        // Behoud attribute-selectors voor formuliervelden (CF7)
        deep: [
            /input\[type=/,
            /textarea/,
            /select/
        ],
        // Behoud alle Bootstrap spacing utilities (m-, p-, gap-) met responsive prefixes
        greedy: [
            /^input$/,
            /^m[trblxy]?-/,
            /^p[trblxy]?-/,
            /^gap-/,
            /^g[xy]?-/,
            /^col-/,
            /^row-/,
            /^offset-/,
            /^order-/,
            /^d-/,
            /^flex-/,
            /^justify-/,
            /^align-/,
            /^text-/,
            /^bg-/,
            /^border-/,
            /^rounded-/,
            /^shadow-/,
            /^w-/,
            /^h-/,
            /^fw-/,
            /^fs-/,
            /^lh-/,
            /^position-/,
            /^top-/,
            /^bottom-/,
            /^start-/,
            /^end-/,
            /^overflow-/,
            /^opacity-/,
            /^z-/,
            /^visible/,
            /^invisible/
        ]
    }
});

export default defineConfig({
    root: ".",
    base: "./",

    build: {
        outDir: "dist",
        emptyOutDir: true,
        manifest: true,
        rollupOptions: {
            input: {
                app: resolve(import.meta.dirname, "assets/js/app.js")
            },
            output: {
                entryFileNames: "js/[name].js",
                chunkFileNames: "js/[name]-[hash].js",
                assetFileNames: (assetInfo) => {
                    if (assetInfo.name?.endsWith(".css")) {
                        return "css/[name][extname]";
                    }
                    if (/\.(png|jpe?g|gif|svg|webp|ico)$/i.test(assetInfo.name || "")) {
                        return "images/[name][extname]";
                    }
                    if (/\.(woff2?|ttf|eot|otf)$/i.test(assetInfo.name || "")) {
                        return "fonts/[name][extname]";
                    }
                    return "assets/[name][extname]";
                }
            }
        },
        sourcemap: !isProduction
    },

    resolve: {
        alias: {
            "@": resolve(import.meta.dirname, "assets/js"),
            "~": resolve(import.meta.dirname, "assets/scss"),
            jquery: "jquery"
        }
    },

    css: {
        preprocessorOptions: {
            scss: {
                api: "modern-compiler",
                silenceDeprecations: [
                    "legacy-js-api",
                    "import",
                    "mixed-decls",
                    "color-functions",
                    "global-builtin",
                    "if-function"
                ],
                quietDeps: true,
                logger: {
                    warn: () => {}
                },
                loadPaths: [
                    resolve(import.meta.dirname, "node_modules"),
                    resolve(import.meta.dirname, "assets/scss")
                ]
            }
        },
        postcss: {
            plugins: [
                autoprefixer(),
                ...(isProduction ? [purgeCssPlugin] : [])
            ]
        }
    },

    server: {
        host: true,
        port: 5173,
        strictPort: true,
        origin: "http://localhost:5173",
        watch: {
            usePolling: false
        }
    },

    publicDir: false,

    plugins: [
        {
            name: "copy-images",
            writeBundle() {
                const imagesDir = resolve(import.meta.dirname, "dist/images");
                const cssDir = resolve(import.meta.dirname, "dist/css");

                // Zorg dat directories bestaan
                if (!existsSync(imagesDir)) mkdirSync(imagesDir, { recursive: true });
                if (!existsSync(cssDir)) mkdirSync(cssDir, { recursive: true });

                // Kopieer images directory
                if (existsSync(resolve(import.meta.dirname, "assets/images"))) {
                    cpSync(resolve(import.meta.dirname, "assets/images"), imagesDir, { recursive: true });
                }

                // Kopieer ajax-loader.gif naar css folder
                const ajaxLoader = resolve(import.meta.dirname, "assets/images/ajax-loader.gif");
                if (existsSync(ajaxLoader)) {
                    copyFileSync(ajaxLoader, resolve(cssDir, "ajax-loader.gif"));
                }
            }
        }
    ]
});
