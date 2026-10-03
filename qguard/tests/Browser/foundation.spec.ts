import { test, expect } from '@playwright/test';

for (const width of [1280, 390]) {
    test(`foundation renders without overflow at ${width}px`, async ({ page }) => {
        await page.setViewportSize({ width, height: 900 });
        const errors: string[] = [];
        page.on('pageerror', error => errors.push(error.message));
        await page.goto('/');
        await expect(page.getByRole('heading', { level: 1 })).toContainText('Your next game.');
        await expect(page.getByText('Account access and matchmaking', { exact: false })).toBeVisible();
        await page.keyboard.press('Tab');
        await expect(page.getByRole('link', { name: 'Skip to content' })).toBeFocused();
        expect(await page.evaluate(() => document.documentElement.scrollWidth <= window.innerWidth)).toBeTruthy();
        expect(errors).toEqual([]);
        await page.screenshot({ path: `test-results/foundation-${width}.png`, fullPage: true });
    });
}
