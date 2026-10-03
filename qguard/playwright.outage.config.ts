import {defineConfig,devices} from '@playwright/test';
export default defineConfig({testDir:'./tests/Recovery',workers:1,retries:0,use:{baseURL:'http://nginx',trace:'retain-on-failure',actionTimeout:15000,...devices['Desktop Chrome']}});
