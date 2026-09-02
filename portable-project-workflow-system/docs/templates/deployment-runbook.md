# Deployment Runbook: {{Environment}}

Template status: inert

- **Status:** proposed
- **Commit/release:** {{Identity}}
- **Operator:** {{Role}}
- **Approval:** {{Owner gate}}

## Fixed Requirements

- {{Architecture, services, regions, security, data authority}}

## Exception Contract

Return `PASS`, `EXCEPTION`, or `NOT YET APPLICABLE` for each requirement. An
exception must state reason, effect, data-flow change, and proposed substitute
before activation.

## Pre-Deployment

- [ ] Secrets/access configured outside Git
- [ ] Snapshot created and checksum verified
- [ ] Restore test current
- [ ] Migration and rollback compatibility checked
- [ ] Public collection/publication gates identified

## Deployment Sequence

1. `{{command/action}}`

## Verification

- {{Health, routes, data, media, mail, logs, security, permissions}}

## Rollback

- **Trigger:** {{Condition}}
- **Steps:** {{Tested sequence}}
- **Recovery verification:** {{Checks}}

## Operator Report

| Requirement | Result | Evidence/exception |
| --- | --- | --- |
| {{item}} | {{PASS/etc.}} | {{evidence}} |
