import {defineConfig, devices} from '@playwright/test';
export default defineConfig({
  testDir:'./tests/ReviewBrowser', workers:1, fullyParallel:false, retries:0, maxFailures:1,
  reporter:'list', timeout:120000,
  use:{baseURL:process.env.BASE_URL??'http://localhost:8121', trace:'retain-on-failure', actionTimeout:10000},
  projects:[{name:'chromium',use:{...devices['Desktop Chrome']}},{name:'firefox',use:{...devices['Desktop Firefox']}},{name:'webkit',use:{...devices['Desktop Safari']}}],
});
