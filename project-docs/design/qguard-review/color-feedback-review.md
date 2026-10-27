# Forest And Lime Calibration Review

- **Date:** 2026-10-28
- **Type/status:** historical assessment, accepted and applied under DEC-073
- **Owner:** project owner selects; primary agent assesses
- **Authority:** DEC-072 chooses A and requests assessment before application
- **Update trigger:** owner disposition, rendered refinement or new badge evidence

**Subsequent disposition:** the owner approved this recommendation. See
[the current application/evidence](palette-application/README.md). The findings
and no-change statements below describe the assessment stage.

## Route And Boundary

Current project entry/governance and actual repository checked; clean baseline
`7f21b91`. Documentation, design, research/sourcing, external owner review and
QA/completion routes apply. This is read-only UI assessment plus decision records.
No prototype, palette, brand asset, app or portable workflow changes. Preserve
the pasted feedback as an unapproved suggestion, not specialist authority.
Batch notes with the ensuing palette-calibration work; no per-reply commit.

## Source Corrections

Actual values are in [palettes.json](color-study/palettes.json).

| Token | Actual A | Feedback's stated current/retained value |
| --- | --- | --- |
| line | `#5B7568` | `#2B3D35` |
| soft | `#253A2B` | `#21332B`, described as retained |
| ink | `#EEF3ED` | `#ECF3EE` mentioned in the proposed explanation |

The cited nav, background, panel and accent values match actual A. Button
text stays at the existing accent-text value in the calculations below. The actual shared line token is used
for cards/dividers and input/select/textarea outlines, rating options, secondary
controls and other components. Its prior strengthening is recorded in the
[color review verification](color-direction.md#verification--2026-10-28).

## Measured Contrast

Calculated from the specified sRGB hex values with relative luminance. Values
below are rounded for display; no rendered comfort/attention test is implied.

| Pair | Actual A | Suggested calibration |
| --- | ---: | ---: |
| Line / panel | 3.23:1 | 1.27:1 |
| Ink / panel (including proposed ink) | 14.42:1 | 15.39:1 |
| Muted text / panel | 8.72:1 | 9.34:1 |
| Lime / panel | 12.05:1 | 12.90:1 |
| Primary-button text / lime | 12.15:1 | 12.15:1 |
| Panel / page | 1.13:1 | 1.09:1 |

Keeping actual A's `#5B7568` for control outlines against the suggested panel
gives 3.46:1. Darker decorative separators can be quieter, but replacing the
shared line token globally would also reduce input/control boundary visibility.

[W3C non-text contrast guidance](https://www.w3.org/WAI/WCAG22/Understanding/non-text-contrast.html),
accessed 2026-10-28, requires sufficient contrast for visual information needed
to identify controls/states. It does not require every decorative border or
every text-labeled button boundary to meet 3:1. Focus indicators still matter.
This is why the recommendation distinguishes structural decoration from
functional cues rather than demanding strong borders everywhere.

## Assessment And Recommendation

1. **Agree as design judgment:** try the proposed darker, less green nav/page/
   panel colors while retaining `#C9E99B`. The existing palette already provides
   strong text/accent contrast, so “much harder” emphasis is not a measured gain.
2. **Revise the border proposal:** use `#24302B` for decorative card edges and
   dividers, with a separate stronger control-outline token (actual A's
   `#5B7568` is a working candidate). Keep clear focus and selected states.
3. **Do not silently adopt the incidental changes:** the soft/ink colors are
   also different from current A. Keep current values initially unless the
   comparison supports changing them.
4. **Badge/attention claims remain hypotheses:** neutralizing surfaces may
   make multicolored assets easier to balance, but actual rank artwork at its
   displayed size must be inspected. Existing green does not by itself prove
   badges clash or disappear. No night-session comfort or attention study was
   supplied, and “50% closer to neutral” has no specified measurement method.

Recommend a calibrated A with quieter decorative surfaces and stronger
functional boundaries. Approval of A is recorded; this specific calibration
has not been selected or rendered.

## Verification And Handoff

Source token values and line-token uses inspected; contrast calculations run;
W3C primary guidance read. No browser, badge-asset or full accessibility test
was run because no UI was edited. Document links and the full scoped diff are
checked before handoff. Notes remain uncommitted with the ongoing calibration
batch. No remote action, application change or palette replacement occurred.
