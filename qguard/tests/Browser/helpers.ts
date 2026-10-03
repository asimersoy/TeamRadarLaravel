import { expect, Page } from '@playwright/test';
import { readFileSync,writeFileSync,existsSync } from 'node:fs';
export function advanceClock(seconds:number){
    const path='/fixtures/app/private/browser-clock.json';
    const current=existsSync(path)?JSON.parse(readFileSync(path,'utf8')).offset_seconds:0;
    writeFileSync(path,JSON.stringify({offset_seconds:current+seconds}));
}
export const credentials = () => JSON.parse(readFileSync('/fixtures/app/private/demo-credentials.json', 'utf8'));
export async function login(page: Page, label: string) {
    const user = credentials()[label];
    await page.goto('/login');
    await page.getByLabel('Email', {exact:true}).fill(user.email);
    await page.getByLabel('Password', {exact:true}).fill(user.password);
    await page.getByRole('button', {name:'Sign in',exact:true}).click();
    await expect(page).toHaveURL(/dashboard/);
}
