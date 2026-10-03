import { randomBytes } from 'node:crypto';
import { existsSync, writeFileSync } from 'node:fs';
import { fileURLToPath } from 'node:url';

const target = fileURLToPath(new URL('../.env', import.meta.url));
if (existsSync(target)) {
    console.log('Existing .env preserved. No secrets were changed.');
} else {
    const secret = () => randomBytes(32).toString('hex');
    const key = () => `base64:${randomBytes(32).toString('base64')}`;
    writeFileSync(target, [
        `APP_KEY=${key()}`, `TEST_APP_KEY=${key()}`,
        `DB_PASSWORD=${secret()}`, `TEST_DB_PASSWORD=${secret()}`,
        `REVERB_APP_KEY=${secret()}`, `REVERB_APP_SECRET=${secret()}`,
        '',
    ].join('\n'), { flag: 'wx', mode: 0o600 });
    console.log('Created local-only .env with independent development/test secrets.');
}
