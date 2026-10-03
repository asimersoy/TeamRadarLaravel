import { defineConfig, devices } from '@playwright/test';

export default defineConfig({
    testDir: './tests/Browser',
    fullyParallel: false,
    workers: 1,
    retries: 0,
    maxFailures: 1,
    reporter: 'list',
    use: { baseURL: process.env.BASE_URL ?? 'http://localhost:8121', trace: 'retain-on-failure', actionTimeout: 10000 },
    projects: [
        { name: 'chromium', use: { ...devices['Desktop Chrome'] } },
        { name: 'firefox', testMatch: /engine-smoke\.spec\.ts/, use: { ...devices['Desktop Firefox'] } },
        { name: 'webkit', testMatch: /engine-smoke\.spec\.ts/, use: { ...devices['Desktop Safari'] } },
    ],
});
