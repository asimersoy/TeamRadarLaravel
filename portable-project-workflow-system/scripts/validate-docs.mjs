#!/usr/bin/env node

import { existsSync, readFileSync, readdirSync, statSync } from 'node:fs';
import { dirname, extname, join, normalize, relative, resolve } from 'node:path';
import { fileURLToPath } from 'node:url';

const root = resolve(dirname(fileURLToPath(import.meta.url)), '..');
const failures = [];

const requiredFiles = [
  'README.md',
  'NEW-PROJECT-PROMPT.md',
  'AGENTS.md',
  'docs/README.md',
  'docs/current-state.md',
  'docs/decisions.md',
  'docs/open-questions.md',
  'docs/deferred-work.md',
  'docs/history/README.md',
  'docs/system/documentation-policy.md',
  'docs/system/task-routing-checklist.md',
  'docs/system/workflow-and-review.md',
  'docs/system/qa-and-completion.md',
  'docs/system/git-and-release.md',
  'docs/system/workflow-coverage.md',
  'docs/procedures/product-planning.md',
  'docs/procedures/code-and-implementation.md',
  'docs/procedures/agent-delegation.md',
  'docs/procedures/content-lifecycle.md',
  'docs/procedures/research-sourcing-and-search.md',
  'docs/procedures/decision-and-recommendation-safety.md',
  'docs/procedures/privacy-data-and-legal.md',
  'docs/procedures/external-review.md',
  'docs/procedures/design-and-rendered-review.md',
  'docs/procedures/audit-and-reconciliation.md',
  'docs/procedures/migration-and-import.md',
  'docs/procedures/deployment-backup-and-rollback.md',
  'docs/procedures/experiments.md',
  'docs/procedures/interruption-and-recovery.md',
  'docs/procedures/deferral-and-owner-review.md',
  'docs/templates/README.md',
  'docs/templates/activity-log.md',
  'docs/templates/review-impact-record.md',
];

function walk(directory) {
  if (!existsSync(directory)) return [];

  return readdirSync(directory).flatMap((entry) => {
    const path = join(directory, entry);
    return statSync(path).isDirectory() ? walk(path) : [path];
  });
}

for (const file of requiredFiles) {
  if (!existsSync(join(root, file))) {
    failures.push(`missing required file: ${file}`);
  }
}

const markdownFiles = [
  join(root, 'README.md'),
  join(root, 'AGENTS.md'),
  ...walk(join(root, 'docs')),
].filter((file) => extname(file) === '.md');

const linkPattern = /\[[^\]]*\]\(([^)]+)\)/g;
for (const file of markdownFiles) {
  const content = readFileSync(file, 'utf8');

  for (const match of content.matchAll(linkPattern)) {
    let target = match[1].trim();
    if (
      !target ||
      target.startsWith('#') ||
      /^[a-z][a-z\d+.-]*:/i.test(target) ||
      target.includes('{{')
    ) {
      continue;
    }

    target = target.replace(/^<|>$/g, '').split('#')[0].split(' "')[0];
    const resolved = normalize(resolve(dirname(file), decodeURIComponent(target)));
    if (!existsSync(resolved)) {
      failures.push(`${relative(root, file)}: unresolved link ${match[1]}`);
    }
  }
}

const templatesDir = join(root, 'docs/templates');
const templateFiles = walk(templatesDir)
  .filter((file) => extname(file) === '.md' && !file.endsWith('/README.md'));

for (const file of templateFiles) {
  const content = readFileSync(file, 'utf8');
  if (!content.includes('Template status: inert')) {
    failures.push(
      `${relative(root, file)}: missing the required inert-template marker`,
    );
  }
}

const registerFiles = [
  join(root, 'docs/decisions.md'),
  join(root, 'docs/open-questions.md'),
  join(root, 'docs/deferred-work.md'),
];
const seenIds = new Map();
const headingIdPattern = /^#{1,3}\s+((?:DEC|OQ|DW)-\d{3,})\b/gm;

for (const file of registerFiles) {
  const content = readFileSync(file, 'utf8');
  for (const match of content.matchAll(headingIdPattern)) {
    const id = match[1];
    if (seenIds.has(id)) {
      failures.push(
        `duplicate project-record ID ${id}: ${seenIds.get(id)} and ` +
          relative(root, file),
      );
    } else {
      seenIds.set(id, relative(root, file));
    }
  }
}

if (failures.length) {
  console.error(
    `Documentation validation failed with ${failures.length} issue(s):`,
  );
  failures.forEach((failure) => console.error(`- ${failure}`));
  process.exit(1);
}

const procedureCount = walk(join(root, 'docs/procedures'))
  .filter((file) => extname(file) === '.md').length;

console.log(
  `Documentation validation passed: ${markdownFiles.length} Markdown files, ` +
    `${procedureCount} procedures, ${templateFiles.length} inert templates.`,
);
