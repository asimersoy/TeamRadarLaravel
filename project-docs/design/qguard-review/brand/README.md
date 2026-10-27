# QGuard Brand Assets

Owner-selected Q mark, QGuard lettering and **Good company. Good games.**
The visible wording and letter shapes come from the accepted prototype.
`DEC-069` records retention/export authority; `DEC-073` applies the approved
calibration. Localization remains deferred.

- [Wide lockup, light surface](qguard-wide-light.svg) and
  [dark surface](qguard-wide-dark.svg): tagline on one line.
- [Compact lockup, light surface](qguard-compact-light.svg) and
  [dark surface](qguard-compact-dark.svg): tagline on two complete lines.
- [Standalone Q, light surface](qguard-mark-light.svg) and
  [dark surface](qguard-mark-dark.svg).
- `mono` and `white` variants provide single-color artwork.
- [SVG favicon](favicon.svg), [ICO fallback](favicon.ico), [32px PNG](qguard-icon-32.png),
  [180px icon](qguard-icon-180.png), [512px icon](qguard-icon-512.png).
- [Brand sheet](brand-sheet.html) previews the actual asset files.

SVGs contain outlined paths, not live text or embedded fonts. They have
transparent backgrounds; the app/favicon icons include the existing dark-green
background (`#090D0C`). Scale uniformly, preserve the viewBox and leave space around the
mark. Use an accessible name on the image or its enclosing home link.

The source CSS used Avenir Next at 23px/weight 800 with -1px tracking, and
9px/weight 600 with 1.3px tracking for the tagline. Export uses the matching
installed Avenir Next Heavy and DemiBold outlines. No font binaries are copied.
The Q ring/tail reproduces the CSS geometry. The compact version replaces
incidental text wrapping with two intentional lines. Typography elsewhere in
the prototype remains system-font text.

To regenerate on macOS with those source fonts available:

```sh
swift -module-cache-path /tmp/qguard-swift-modules project-docs/design/qguard-review/brand/build-brand.swift
python3 project-docs/design/qguard-review/build-standalone.py
```

The generator asserts font identity before export. Vector assets can be used
on any platform without those fonts installed. These files do not select a
production frontend or desktop stack.

## Current Color Roles

Dark-surface artwork uses lime `#C9E99B`, lettering `#EEF3ED` and tagline
`#B2C2B8`, matching the approved current interface. Icons use the selected
navigation background. Light-surface, monochrome and white exports remain
for print/alternate surfaces; they are not additional app-theme choices.
Letter paths, mark geometry and spacing are unchanged by DEC-073.
