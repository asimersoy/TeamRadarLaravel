import { defineConfig, devices } from '@playwright/test';

export default defineConfig({
    testDir: './tests/RiotReview',
    outputDir: process.env.REVIEW_RESULTS ?? './test-results/riot-review',
    workers: 1,
    retries: 0,
    maxFailures: 1,
    reporter: 'list',
    use: {
        baseURL: process.env.BASE_URL ?? 'http://127.0.0.1:4173',
        trace: 'retain-on-failure',
        actionTimeout: 10000,
    },
    projects: [
        { name: 'chromium', use: { ...devices['Desktop Chrome'] } },
        { name: 'firefox', use: { ...devices['Desktop Firefox'] } },
        { name: 'webkit', use: { ...devices['Desktop Safari'] } },
    ],
});
