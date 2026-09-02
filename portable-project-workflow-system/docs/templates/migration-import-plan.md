# Migration And Import Plan: {{Name}}

Template status: inert

- **Authoritative source:** {{Path/revision}}
- **Target:** {{Database/environment}}
- **Stable identity:** {{Slug/key}}
- **Status:** proposed

## Safety Contract

- **May insert:** {{Rules}}
- **May update:** {{Rules}}
- **Must skip/protect:** {{Published, deleted, auth, manual data}}
- **Must preserve:** {{Fields/relationships}}
- **Conflict behavior:** {{Block/report}}

## Commands And Gates

1. Validate: `{{command}}`
2. Disposable dry run: `{{command}}`
3. Target backup: `{{method}}`
4. Authorized dry run: `{{command}}`
5. Write: `{{command}}`
6. Idempotence/reconciliation: `{{command}}`

## Rollback

- {{Transaction, down migration, restore, verification}}

## Evidence

- {{Totals, per-record differences, tests, rendering, approval}}
