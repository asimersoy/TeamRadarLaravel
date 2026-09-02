# Privacy, Data, And Legal Review

## Trigger

Use when collecting, storing, transmitting, logging, analyzing, exposing,
retaining, deleting, or inferring personal or sensitive data, or when making
privacy, legal, commercial-disclosure, or compliance claims.

## Evidence Separation

Maintain four distinct records:

1. verified repository behavior;
2. owner-approved business behavior;
3. effective deployment/provider facts;
4. qualified legal conclusions.

Code inspection cannot establish the final provider, legal basis, operational
access, or compliance. Counsel should confirm a concrete proposed flow rather
than design the whole product from an open-ended request.

## Workflow

1. Inventory fields, purposes, sources, recipients, storage, logs, access,
   retention, deletion, backups, jurisdictions, and subprocessors.
2. Minimize collection and prevent unnecessary sensitive free text.
3. Define access controls, incident handling, data-subject or user request
   handling, and deletion/hold behavior.
4. Gate public collection behind a configuration or release control until the
   actual notice, mailbox/channel, deployment facts, and assigned legal review
   are ready.
5. Give deployment operators prescriptive requirements and ask them to report
   `PASS`, `EXCEPTION`, or `NOT YET APPLICABLE` with evidence.
6. Give counsel a compact matrix of unresolved legal conclusions.
7. Verify public text against the deployed flow immediately before enabling
   real collection.

## Boundaries

Do not expose secrets, internal routing, environment values, unfinished-state
language, or unnecessary technical detail in public notices. Do not describe
negative repository evidence as a permanent public promise. Do not add a
vendor or tracking service without routing its data flow and updating records.

## Completion Evidence

Record the data-flow inventory, security controls, provider facts, legal
verdict and limitations, notice/version evidence, collection gate state,
deletion and restore behavior, and residual obligations.
