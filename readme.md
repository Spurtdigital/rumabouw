# Rumabouw | Spurt Digital thema

Klantthema voor Rumabouw, gebaseerd op de Spurt Digital basis (Vite + Bootstrap 5.3).

## Installatie

```bash
npm install
```

## Development

```bash
npm run dev
```

Start de Vite dev server met hot reloading op `http://localhost:5173`.
De theme-PHP detecteert automatisch of de dev server draait.

## Productie build

```bash
npm run build
```

Output komt in `/dist`:

```
dist/
├── css/app.css
├── js/app.js
├── images/
└── .vite/manifest.json
```

## Stack

| Package | Versie | Beschrijving |
|---------|--------|--------------|
| Bootstrap | 5.3 | CSS framework |
| jQuery | 4.x | JS library |
| Fancybox | 6.x | Lightbox (`data-fancybox`) |
| Swiper | 14.x | Slider (`data-swiper` of `.js-project-slider` / `.js-builder-slider`) |
| Font Awesome | 7 Pro | Icons (lokaal in `assets/fontawesome/`) |

## Structuur

```
├── assets/
│   ├── js/
│   │   └── app.js              # JS entry point (incl. sliders, menu, FAQ)
│   ├── scss/
│   │   ├── app.scss            # SCSS entry point
│   │   ├── base/               # reset, type, fonts
│   │   ├── components/         # block, buttons
│   │   ├── layout/             # header, navigation, footer, panel, form
│   │   ├── pages/              # page-specifieke styles (home, contact, builder)
│   │   ├── utils/              # variables (incl. klantwaarden), mixins, functions
│   │   └── vendors/            # bootstrap imports
│   ├── fontawesome/            # Font Awesome 7 Pro
│   └── images/
├── inc/
│   ├── setup.php
│   ├── cleanup.php
│   ├── scripts.php             # Enqueue styles & scripts (Vite + Font Awesome)
│   ├── menus.php
│   ├── contactform7.php
│   ├── buttons.php
│   └── client.php              # Rumabouw specifieke functionaliteit (Yoast e.d.)
├── template-parts/
│   ├── blocks/
│   ├── components/
│   └── layouts/
├── functions.php
├── header.php
├── footer.php
├── style.css
├── package.json
└── vite.config.js
```

## Design tokens

De klant-specifieke waarden staan in `assets/scss/utils/_variables.scss` (Spurt-basis):

- Kleuren: `$primary: #2E2C26`, `$gray-100: #F4F3EE`
- Typografie: Geist Variable (zelf-gehost via `@fontsource-variable/geist`), `$font-size-base: 1rem` (16px), `$lead-font-size: 17px`, eigen `$h1`-`$h6` en display-sizes
- Spacers, breakpoints, containers, line-height en border-radius komen uit de Spurt-basis (`_variables.scss`): 8px-grid, `.m-{0-30}` / `.p-{0-30}`, breakpoints t/m `xxl` (1400px)

## Spurt plugin (Creators General)

Dit thema gebruikt de helpers uit de **Creators General** plugin:

| Functie | Gebruik |
|---------|---------|
| `spurt_image( $url, $w, $h )` | Resized afbeelding-URL |
| `spurt_header()` | Automatisch via `wp_head` |
| `spurt_footer()` | Automatisch via `wp_footer` |
| `do_action( 'spurt_social' )` | Social iconen |
| `do_action( 'spurt_branding' )` | Spurt branding/logo |

## Fancybox

Automatisch geactiveerd op `[data-fancybox]`:

```html
<a href="image.jpg" data-fancybox="gallery">
    <img src="thumb.jpg" alt="">
</a>
```

## Swiper

Automatisch geactiveerd op elementen met `data-swiper`, plus de projectslider
(`.js-project-slider`) en builder gallery (`.js-builder-slider`).
