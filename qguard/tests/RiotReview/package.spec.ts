import { test, expect } from '@playwright/test';

test('review guide links resolve and remain readable on desktop and mobile', async ({ page }, info) => {
    const errors: string[] = [];
    page.on('pageerror', error => errors.push(error.message));
    await page.goto('/');
    await expect(page.getByRole('heading', { name: 'Five teammates. Better company.' })).toBeVisible();
    await expect(page.getByText('Local preparation status', { exact: true })).toBeVisible();
    const links = await page.locator('a[href^="walkthrough.html"]').evaluateAll(elements => elements.map(e => e.getAttribute('href')!));
    for (const href of new Set(links)) {
        await page.goto('/' + href);
        await expect(page.locator('main h1')).toBeVisible();
        await expect(page.locator('.review-bar')).toContainText('Fictional data');
        await expect(page.locator('.riot-notice')).toContainText("QGuard isn't endorsed by Riot Games");
    }
    for (const width of [1440, 390]) {
        await page.setViewportSize({ width, height: 1000 });
        await page.goto('/');
        expect(await page.locator('.brand').evaluate((img: HTMLImageElement) => img.complete && img.naturalWidth > 0)).toBe(true);
        expect(await page.evaluate(() => document.documentElement.scrollWidth <= innerWidth + 1)).toBe(true);
        await page.screenshot({ path: info.outputPath(`review-guide-${width}.png`), fullPage: true });
    }
    expect(errors).toEqual([]);
});

test('packaged journey supports acceptance, code relay, closure and immutable feedback without a backend', async ({ page }, info) => {
    const requests: string[] = [];
    const errors: string[] = [];
    page.on('request', request => {
        if (['fetch', 'xhr', 'websocket'].includes(request.resourceType()) || request.method() !== 'GET') requests.push(request.url());
    });
    page.on('pageerror', error => errors.push(error.message));
    await page.goto('/walkthrough.html#queue');
    await page.locator('[data-action="form-team"]').click();
    await page.locator('[data-action="accept-offer"]').click();
    await page.locator('[data-action="sample-accept-peers"]').click();
    await expect(page).toHaveURL(/#team$/);
    await page.locator('#party-code').fill('SAMPLE-CODE');
    await page.getByRole('button', { name: 'Share with my team' }).click();
    await expect(page.getByText('SAMPLE-CODE', { exact: true })).toBeVisible();
    await page.locator('[data-action="lobby-check"]').click();
    await page.locator('[data-action="end-session"]').click();
    await page.locator('[data-action="confirm-end"]').click();
    await page.locator('[data-action="sample-end-peers"]').click();
    await expect(page).toHaveURL(/#session$/);
    await expect(page.locator('[data-action="find-next"]')).toBeDisabled();
    await page.locator('#rating-mina input[value="8"]').check();
    await page.getByRole('button', { name: 'Submit rating for Mina' }).click();
    await page.locator('[data-action="confirm-rating"]').click();
    await expect(page.locator('#rating-mina')).toContainText('Locked');
    await expect(page.locator('#rating-mina form')).toHaveCount(0);
    await page.screenshot({ path: info.outputPath('packaged-feedback.png'), fullPage: true });
    expect(requests).toEqual([]);
    expect(errors).toEqual([]);
});

test('export retains browser isolation and blocks outbound API calls', async ({ page, context }) => {
    await page.goto('/walkthrough.html#login');
    await page.locator('[data-action="guest"]').click();
    await page.locator('#handle').fill('ReviewSample');
    await page.getByRole('button', { name: /Continue to Riot/ }).click();
    await page.locator('[data-action="sample-connect"]').click();
    const second = await context.newPage();
    await second.goto('/walkthrough.html#profile');
    await expect(second.locator('.profile-identity')).toContainText('Ari');
    await page.goto('/walkthrough.html#profile');
    await expect(page.locator('.profile-identity')).toContainText('ReviewSample');
    const forbidden: string[] = [];
    await page.route('**/forbidden-api-probe', route => { forbidden.push(route.request().url()); return route.abort(); });
    const blocked = await page.evaluate(async () => {
        try { await fetch('/forbidden-api-probe'); return false; } catch { return true; }
    });
    expect(blocked).toBe(true);
    expect(forbidden).toEqual([]);
    await expect(page.locator('meta[http-equiv="Content-Security-Policy"]')).toHaveAttribute('content', /form-action 'none'/);
    await page.locator('[data-action="reset-demo"]').click();
    await page.goto('/walkthrough.html#profile');
    await expect(page.locator('.profile-identity')).toContainText('Ari');
    await second.close();
});
