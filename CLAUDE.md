# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## What this is

Al Hathaway ships in two editions, as two sibling WordPress **block themes** (full-site-editing, requires WP 6.1+, PHP 5.6+), both living inside a full WordPress install under `wp-content/themes/`:

- `al-hathaway/` — **Al Hathaway**, the free / lite edition. This is the primary working directory and the source of truth for shared code.
- `al-hathaway-pro/` — **Al Hathaway Pro**, the commercial edition. A superset of lite: everything lite has, plus pro-only patterns, templates, and style variations.

Both theme directories are the project. WordPress core and every other plugin/theme in the install are outside it and not part of this codebase.

## Working across the two themes

**Lite first, then mirror into Pro.** Any change that belongs in both editions — a pattern, a `theme.json` preset, a template, a `functions.php` hook, a CSS rule — is written in `al-hathaway/` first, then copied verbatim into `al-hathaway-pro/`. Never make a shared change in Pro only and expect it to come back; there is no merge tooling here.

**Pro-only work stays in Pro.** Features that exist to differentiate the paid edition are added directly to `al-hathaway-pro/` and are *not* back-ported to lite.

**Identifiers are deliberately identical in both themes** — function/hook prefix `al_hathaway_`, text domain `al-hathaway`, pattern category `al-hathaway`, user meta `al_hathaway_hide_admin_notice2`. Do **not** rename them to `al_hathaway_pro_` / `al-hathaway-pro` in the Pro theme. Only one of the two themes is ever active at a time, so there is no runtime collision, and keeping them identical is what lets shared files be copied across with zero edits.

**Intentional per-theme header differences.** Never clobber these two lines when mirroring:

- `style.css` → `Theme Name: Al Hathaway` vs `Theme Name: Al Hathaway Pro`
- `readme.txt` → `=== Al Hathaway ===` vs `=== Al Hathaway Pro ===`

Everything else in `style.css` and `readme.txt` (including `Version:`, `Stable tag:`, `Text Domain:`, description, tags) is identical between the two.

### Pro-only content

The paid edition is differentiated by holding back content from lite. **These files exist only in `al-hathaway-pro/patterns/` and must never be copied into lite:**

- `02-about-page.php` (`al-hathaway/about`) — full-page pattern
- `03-services-page.php` (`al-hathaway/services`) — full-page pattern
- `04-contact-page.php` (`al-hathaway/contact`) — full-page pattern
- `our-history.php` (`al-hathaway/our-history`) — section, composed by the About page
- `milestones.php` (`al-hathaway/milestones`) — section, composed by the About page
- `operating-principles.php` (`al-hathaway/operating-principles`) — section, composed by the About page
- `memberships-registrations.php` (`al-hathaway/memberships-registrations`) — section, composed by the About page
- `terms-of-engagement.php` (`al-hathaway/terms-of-engagement`) — section, composed by the Services page
- `call-to-action-fullwidth.php` (`al-hathaway/fullwidth-cta`) — section, composed by the Services page

The full-page patterns are thin: they hold the intro and the closing CTA inline and pull every other section in by `<!-- wp:pattern {"slug":"…"} /-->`. Keep it that way — a section that is worth having on the About page is worth having on any page, so extract it as its own pattern rather than inlining it.

When mirroring lite → pro, copy *into* pro without deleting these; when a shared pattern they compose changes, the change still flows lite → pro as usual. Note that lite keeps `call-to-action.php` (`al-hathaway/call-to-action`) — only the full-width variant is held back, and `front-page.html` still composes the regular one.

Before adding a pattern to this list, check that nothing in lite's `templates/` or `parts/` still composes it, or the free theme will render a missing-pattern gap.

### Drift check

Keep this `CLAUDE.md` identical in both directories. To check for unintended drift:

```
diff -rq wp-content/themes/al-hathaway wp-content/themes/al-hathaway-pro
```

Expected output: `readme.txt` and `style.css` differ (by the header lines above), `.claude/` exists only in lite, the pro-only patterns listed above exist only in pro, plus anything else deliberately held back. Anything else in the output is unintended drift.

## Theme layout

Both themes currently have the same structure:

- `style.css` — theme header plus a small amount of front-end CSS (alignfull compatibility, current-menu-item underline).
- `theme.json` — global settings/styles: colours, typography, spacing, layout. The main styling surface; prefer presets here over hardcoded CSS.
- `templates/` — `index.html`, `front-page.html`, `single.html`, `page.html`, `page-no-title.html`, `page-full-width.html`, `archive.html`, `search.html`, `404.html`.
- `parts/` — `header.html`, `header-home.html`, `footer.html`, `footer-home.html`.
- `patterns/` — block patterns registered into the `al-hathaway` pattern category. Numbered files (`02-about-page.php`, `03-services-page.php`, `04-contact-page.php`) are full-page patterns; the rest are section-level.
- `assets/fonts/` — self-hosted Libre Baskerville woff2 files only. The OFL text is deliberately not bundled; the font is credited in `readme.txt` under `== Copyright ==` (copyright holders, licence name/URI, source). Keep that credit in step with the files here.
- `admin/` — `css/admin.css` and `images/theme-logo.jpg` for the welcome notice.
- `styles/` — style variation JSON files. Not present yet; `functions.php` already reads a `custom.variation` setting and adds a `variation-{name}` body class for them.
- `languages/` — referenced by `load_theme_textdomain()` but not yet created.

## Architecture notes (from `functions.php`)

All PHP is namespaced with the `al_hathaway_` prefix and wired via hooks (identical in both themes):

- **Setup** (`after_setup_theme`): standard block-theme supports plus `editor-styles`, `wp-block-styles`, `responsive-embeds`, `custom-logo`. Text domain is `al-hathaway`.
- **Assets** (`wp_enqueue_scripts`): enqueues `style.css`, versioned via `filemtime()`. **Do not bump `Version:` in `style.css` (or `Stable tag` in `readme.txt`) in either theme.** It stays at `0.0.1` through development and is the maintainer's call at release time — never touch it as a side effect of another change. If changed patterns or `theme.json` appear stale, fix it with `define( 'WP_DEVELOPMENT_MODE', 'theme' );` in `wp-config.php`, not a version bump.
- **Pattern category** (`init`, priority 9): registers the `al-hathaway` category, filterable via `al_hathaway_block_pattern_categories`. Register new patterns into this category.
- **Admin welcome notice**: `al_hathaway_call_to_action_markup` renders a dismissible notice; dismissal is persisted per-user via `al_hathaway_hide_admin_notice2` user meta (`al_hathaway_dismiss_admin_notice`).

## Relevant skills

Personal skills live in `~/.claude/skills/` (`/home/yonkov/.claude/skills/`). For work in these themes, reach for these first:

- **`wp-block-themes`** — the primary skill here. `theme.json` global settings/styles, `templates/` and `parts/`, patterns, style variations, and Site Editor troubleshooting (style hierarchy, overrides, caching).
- **`wordpress-router`** — classifies a WordPress repo and routes to the right workflow/skill. Useful as an entry point when the task isn't obviously theme-only.
- **`wordpress-pro`** — general WordPress theme/plugin development, Gutenberg customization, performance and security.
- **`wp-block-development`** — only if either theme grows custom blocks (`block.json`, `register_block_type_from_metadata`, attributes/supports, dynamic `render.php`).
- **`figma-to-gutenberg`** — converts Figma designs into Gutenberg block patterns; use when building `patterns/` from a Figma frame.
- **`accessibility-compliance`** — WCAG 2.2 auditing and inclusive markup for templates and patterns.
- **`wp-playground`** — disposable WP instances via `@wp-playground/cli` for testing either theme against other WP/PHP versions.
- **`wp-project-triage`** — deterministic repo inspection producing a structured JSON report.

Situational, mostly out of scope for a block theme: `wp-plugin-development`, `wp-rest-api`, `wp-interactivity-api`, `wp-abilities-api`, `wp-performance`, `wp-phpstan`, `wp-wpcli-and-ops`, `wpds`, `frontend-design`, `figma-implement-design`.

## Conventions

- Prefix every function, hook name, and meta key with `al_hathaway_` — in **both** themes.
- All user-facing strings use the `al-hathaway` text domain in both themes, and must be escaped (`esc_html__`, `esc_url`, `esc_attr__`) as the existing code does.
- Style through `theme.json` presets rather than hardcoded values in patterns. If a design genuinely needs a new colour, font size, or spacing token, stop and ask before adding it.
- This is not a git repository and has no build step, package manager, linter, or test suite — edit PHP/CSS/JSON/HTML directly. Verify changes by activating the theme in the running WordPress install and using the Site Editor at `wp-admin/site-editor.php`. Since only one theme can be active, verifying a mirrored change means activating each edition in turn.
