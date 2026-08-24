# Stack — design system

## Atmosphere

A personal engineering blog that reads like it was shipped by a design-systems
engineer at a company like Vercel, Linear, or Stripe. Strictly monochrome,
hairline discipline, generous whitespace, one serif editorial voice for
display type, and one signature motion idea — "the quiet page turn." Nothing
decorates; everything either carries content or gets out of the way.

## Colors

The palette is monochrome by design. Every color is a semantic token defined
once in `resources/css/site.css` — light values on `:root` via `@theme`, dark
values re-declared on `.dark`. Markup only ever uses the token utilities.

| Role | Token | Light | Dark |
|---|---|---|---|
| Page ground | `canvas` | `#ffffff` | `#111111` |
| Wells / code blocks | `surface` | `#f7f7f7` | `#19191b` |
| Headings, strong text | `ink` | `#111111` | `#f4f4f3` |
| Secondary text | `muted` | `#6f6f76` | `#9d9da4` |
| Tertiary text | `faint` | mix of muted → canvas | same mix |
| Hairlines | `line` | `rgba(17,17,17,0.08)` | `rgba(255,255,255,0.10)` |
| The one solid button | `accent` | `#111111` | `#f4f4f3` |
| Text on accent | `accent-ink` | `#ffffff` | `#111111` |

Dark mode is a true near-black (`#111111`) — never a blue-black. There is no
hue anywhere; emphasis comes from weight, size, and space. Do not introduce a
colored accent when editing this template.

## Typography

- **Display — Source Serif 4** (`font-display`): every heading, the masthead
  statement, post titles, the wordmark. Optical sizing on; weight 500–600,
  tracking slightly tight at large sizes.
- **Text — Geist** (`font-sans`): body copy, UI, meta, nav. Weight 400–600.
- Scale: masthead statement `clamp(2.25rem → 3.25rem)`; article title
  `clamp(2rem → 2.75rem)`; list post title `1.375rem`; prose body
  `1.0625rem / 1.85`; UI and meta `0.875rem`; small labels `0.8125rem`.
- Dates and counters are `tabular-nums`, normal case. No uppercase eyebrows,
  no letterspaced label caps — the quiet voice is the brand.

## Spacing & Radius

- Section rhythm: masthead `pt-20/pb-16` mobile → `pt-32/pb-24` desktop;
  post-list rows `py-9`; article blocks step in `mt-12`.
- One spacing scale, 4/8-based. Whitespace is the luxury — never fill it.
- Radius: `rounded-full` only for the portrait, avatars, and the theme
  toggle; images `rounded-[min(1vw,12px)]`; everything else square or hairline.

## Components

- **Nav**: fixed, transparent at top; scrolling under it adds a translucent
  canvas + hairline (`data-scrolled`). Wordmark is the author's name in serif.
- **Post list**: a left-aligned ledger — tabular date column, serif title,
  one-line excerpt, hairline dividers, no cards. The whole row is one `<a>`;
  hover slides a small arrow in and deepens the title to ink.
- **Pagination**: prev/next arrows + a `1 / 2` counter; page changes
  stagger-fade the rows (the signature).
- **Article**: 68ch measure, `.prose` styles the body HTML; a 1px reading
  progress hairline runs along the top of the viewport.
- **Buttons**: at most one solid `accent` button per page; everything else is
  a ghost/text link with an underline or arrow affordance.

## Motion

Reveals fade + rise 14px over 700ms `cubic-bezier(0.16,1,0.3,1)`, staggered on
lists; cross-document view transitions crossfade the root (220ms); hovers
150–200ms. All motion is gated: hidden states only exist under `html.js`, and
`prefers-reduced-motion: reduce` resolves everything fully visible.

## Voice

First person, precise, calm. Titles are claims, not topics ("Ship small,
ship daily" — never "My thoughts on shipping"). Short sentences. No hype
words, no exclamation marks, no emoji.

## Anti-patterns

- No colored accents, gradients, glassmorphism, or glows.
- No cards, no shadows — hairlines and whitespace do the separation.
- No uppercase tracked labels, no section numbers, no eyebrow kickers.
- No centered walls of text — the ledger and the split masthead carry the
  composition.
- Never leave content hidden when JavaScript is absent or motion is reduced.

## Tokens

```css
@theme {
    --color-canvas: #ffffff;
    --color-surface: #f7f7f7;
    --color-ink: #111111;
    --color-muted: #6f6f76;
    --color-faint: color-mix(in oklab, #6f6f76 55%, #ffffff);
    --color-line: rgb(17 17 17 / 0.08);
    --color-accent: #111111;
    --color-accent-ink: #ffffff;
    --font-display: "Source Serif 4", Georgia, "Times New Roman", serif;
    --font-sans: "Geist", ui-sans-serif, system-ui, -apple-system, sans-serif;
    --ease-out-quart: cubic-bezier(0.25, 1, 0.5, 1);
    --ease-spring: cubic-bezier(0.16, 1, 0.3, 1);
}
```

Dark re-declares the color tokens under `.dark` (canvas `#111111`, ink
`#f4f4f3`, surface `#19191b`, line `rgb(255 255 255 / 0.10)`); the toggle in
the nav owns the class and persists it to `localStorage`.
