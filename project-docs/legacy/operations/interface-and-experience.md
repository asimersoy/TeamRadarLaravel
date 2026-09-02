# Legacy Interface And Experience

- **Record type:** historical UX/content reconstruction
- **Status:** draft for owner review
- **Current authority:** none
- **Rendered-review status:** source inspected; no full rendered multi-viewport
  review was required or claimed for this reconstruction

## Branding

The Laravel interface is branded **QueueGuard**, including page titles, header,
authentication shell, registration copy, and footer. Project documents and the
Electron package use **TeamRadar**. The memory reconstruction identifies
TeamRadar as the final name and QueueGuard as a mistaken temporary codename.

No surviving brand system, logo decision, visual identity brief, or naming
decision record exists beyond those occurrences.

## Public Landing Prototype

The landing page contains:

- hero: “Match with teammates. Mute the toxicity.”;
- Find a Match and Learn More actions;
- live-matchmaking, rated-lobby, anti-tilt, and cross-game profile labels;
- a five-player preview with placeholder names/levels/ranks;
- feature cards for post-match ratings, anti-toxicity filters, and cross-game
  identity;
- a three-step Queue Up / Play / Rate & Improve flow;
- reputation and testimonial sections;
- account/demo calls to action; and
- FAQ cards.

Most body/testimonial/FAQ copy is Lorem Ipsum. Population, wait, status,
testimonial, and feature claims are placeholders unsupported by behavior.

## Authentication And Account Shell

The legacy app includes Laravel starter flows for:

- register;
- login/logout;
- email verification;
- forgot/reset password;
- confirm password;
- profile/password/appearance settings; and
- authenticated dashboard.

QueueGuard styling/text is layered onto the starter shell. The dashboard itself
contains placeholder panels rather than TeamRadar functionality.

## Game Account Setup

The user is redirected to a setup page when attempting matchmaking without a
game account for the required slug.

The surviving Valorant form asks for:

- Riot ID in `Name#TAG` style; and
- current rank from Unranked through Radiant.

It validates presence/string length and integer range. It does not explain
self-declaration, data use, verification limits, edits, correction, privacy,
or what “verified” means.

## Matchmaking Prototype

The page has:

- profile initial/name;
- placeholder level;
- rank with visual progress;
- Good Standing reputation;
- placeholder recent match outcomes/RR;
- Competitive/Unrated controls;
- Find Match button;
- estimated wait and online population; and
- anti-toxicity/communication positioning.

The controls are not wired to matchmaking behavior. The view pulls the user's
first game account rather than clearly selecting the requested game. Failure,
empty, loading, permission, decline, timeout, and no-match states are absent.

## Remembered Private Room

No implementation survives. The memory record says a matched group would see:

- matched players;
- relevant Apex names/IDs;
- copy/exchange actions;
- host/party-leader coordination;
- readiness;
- manual invitation instructions; and
- possibly relay connection status.

The old idea did not settle chat, host assignment, member replacement, room
expiry, moderation, blocking, accessibility, or mobile behavior.

## Remembered Review Experience

Legacy landing copy references ratings/reputation, and the TODO lists review
frontend/backend. No review screen exists.

Historical options included thumbs up/down, numbers, “would play again,”
commendations, behavior categories, negative reasons, and reports. None was
selected. No explanation showed how feedback affected honor or matching.

## Electron Relay Experience

The recovered 460x620 non-resizable desktop window contains:

- gateway URL;
- local LiveAPI URL;
- PSK;
- Save Settings and Save & Connect;
- gateway/LiveAPI indicator cards;
- ping/event counters;
- debug filter;
- raw-payload toggle; and
- log area.

The window auto-opens detached DevTools. There is no onboarding wizard,
installer trust explanation, game-launch configuration guidance, secure token
handling disclosure, update UI, privacy controls, or support export/redaction.

## Visual System

The website uses a dark game-oriented interface with:

- navy backgrounds;
- cyan/blue brand accents;
- gold/accent rank elements;
- green success and red danger states;
- blurred/gradient panels;
- grid/radial backgrounds; and
- Tailwind responsive grids.

This is implemented as source-level styling but was not documented as an
approved design system. The rewrite has no inherited visual requirement.

## Accessibility And Responsive Gaps

The audit did not find a dedicated accessibility specification or review.
Potential legacy concerns include:

- status conveyed strongly through color dots;
- placeholder or decorative controls without complete behavior;
- fixed non-resizable Electron window;
- raw log content in dense monospace layout;
- unclear focus/keyboard/error behavior for custom-styled controls;
- claims/buttons leading to incomplete flows; and
- no documented screen-reader, contrast, reduced-motion, zoom, mobile, or
  error-announcement acceptance criteria.

These are audit observations, not a complete WCAG assessment.

## Experience Lessons For Later Redesign

The legacy prototypes illustrate useful conceptual surfaces—discovery, account
setup, queue, private coordination, session status, and review—but they should
be redesigned from an approved journey. In particular:

- do not show fictional metrics or capability claims;
- label self-declared versus verified data truthfully;
- design no-match, decline, failure, timeout, recovery, block, report, and
  appeal states alongside the happy path;
- explain any matching/reputation effect;
- collect only necessary fields; and
- avoid making a desktop relay feel trustworthy through polish alone when its
  security/update model is unfinished.
