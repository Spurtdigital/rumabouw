# Conventions for this WordPress theme

Follow these rules when changing code.

## Language

- All code identifiers are English: class names, ACF field names (machine names), function names, variables.
- Dutch is only allowed in user-facing content: ACF field labels, aria-labels, comments, and visible copy (the site is Dutch).

## CSS / SCSS

- Use BEM: `.block__element`, `.block__element--modifier`.
- Group selectors that share a root prefix by nesting with `&-`:

  ```scss
  .block {
      &-post {}
      &-review {}
  }
  ```

- Keep this grouping in `components/_blocks.scss`, `layout/_header.scss`, `pages/_news.scss`, `pages/_contact.scss`, `pages/_builder.scss`.
- Use simple, descriptive English words for class names.
- No `box-shadow` on `:hover` states.
- Don't write custom `font-size` / `font-weight` rules in SCSS when a Bootstrap typography utility class covers it.

## Class ordering (markup)

In `class="..."` attributes, order classes from large to small: the block/element class first, then any modifiers, then utility classes last.

```html
<div class="block-post__media position-relative overflow-hidden rounded-3">
```

## Typography

- Headings use Bootstrap display utilities: `display-1` … `display-6`.
- Intro paragraphs use `lead`; small labels use `small` (+ `fw-semibold` where needed); body text is a plain `<p>`.
- `display-*` is bold by default (`$display-font-weight`). Don't add `fw-*` on top of a display class.
- Put the `display-*` utility first among the utility classes, right after the block/element class:

  ```html
  <h2 class="block-link__title display-4 mb-0">
  ```

## Icons

- Use Font Awesome (`<i class="fa-solid fa-arrow-right-long"></i>`) instead of inline SVG.

## ACF

- Field names (machine names) are English: `day`, `location`, `time`, `text`, `name`, `icon`, `title`, `value`, `color`.
- Field labels may stay Dutch (admin UI).
- Repeater sub-fields use short English names too.
- In templates keep variables minimal: one group variable (`$group = get_field( 'group', 'option' ) ?: [];`) and read the rest inline:

  ```php
  <?php echo $group['title'] ?? '' ?: __( 'Fallback', 'creators' ); ?>
  ```

## Builder

- All flexible-content layouts live in `template-parts/layouts/layout-builder.php` (no `template-parts/builder/` folder).
- Layouts are dispatched with `if` / `elseif` on `get_row_layout()` inside the `while ( have_rows( 'builder' ) )` loop.
- Each layout is wrapped in `<section class="builder-row">`.
- No redundant wrapper `<div>`s inside a row.
- Spacing between rows is handled in CSS via `.builder-row + .builder-row`, not a flex-gap container.
- Legacy: the field name is currently `contentbuilder` (data-coupled). Rename it to `builder` only together with an ACF migration.

## Commands

- `npm run build` — compile SCSS/JS (Vite) and validate SCSS.
- `npm run dev` — Vite dev server (HMR).
- `php -l <file>` — PHP syntax check.
