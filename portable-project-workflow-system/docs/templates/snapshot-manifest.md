# Snapshot Manifest: {{Snapshot Name}}

Template status: inert

## Identity

- **Created:** {{Timestamp}}
- **Purpose:** {{Pre-change/post-fix/review/rollback}}
- **Source:** {{Path/environment}}
- **Snapshot:** {{Path/location}}
- **Branch/commit/schema:** {{Identity}}

## Contents

- {{Counts, inclusions, exclusions, status distribution}}

## Integrity

- **Manifest/checksum algorithm:** {{SHA-256 path}}
- **Verification command:** `{{command}}`
- **Verification result:** {{Result/date/agent}}

## Restore Test

- {{Target, method, result, limitations}}

## Freeze And Access Rule

This snapshot is evidence, not a working directory. Do not edit, normalize,
rename, delete, or import it without the recorded authorization and procedure.
