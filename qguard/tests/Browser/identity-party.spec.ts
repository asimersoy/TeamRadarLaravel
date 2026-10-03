import { test, expect } from '@playwright/test';
import { randomBytes } from 'node:crypto';
import { login, addFriend, removeFirstFriend } from './helpers';

async function emailLink(request: any, email: string, fragment: string) {
    let url = '';
    await expect.poll(async () => {
        const messages = await (await request.get('http://mail:8025/api/v1/messages')).json();
        for (const message of messages.messages ?? []) {
            if (message.To?.some((to: any) => to.Address === email)) {
                const body = await (await request.get(`http://mail:8025/api/v1/message/${message.ID}`)).json();
                const match = (body.Text ?? '').match(/https?:\/\/[^\s<>]+/g)?.find((link: string) => link.includes(fragment));
                if (match) { url = match; return true; }
            }
        }
        return false;
    }).toBe(true);
    return url;
}

test('register, verify using local mail, reset and sign in through the real UI', async ({page,request}) => {
    const handle = 'browser_'+randomBytes(4).toString('hex'); const email = handle+'@example.test';
    const password = randomBytes(20).toString('hex');
    await page.goto('/register'); await page.getByLabel('Public handle').fill(handle);
    await page.getByLabel('Email',{exact:true}).fill(email);
    await page.getByLabel('Password',{exact:true}).fill(password); await page.getByLabel('Confirm password').fill(password);
    await page.getByRole('button',{name:'Create account',exact:true}).click();
    await expect(page.getByRole('heading',{name:'Check your email'})).toBeVisible();
    await page.goto(await emailLink(request,email,'verify-email/'));
    await expect(page.getByRole('heading',{name:'Matchmaking',exact:true})).toBeVisible();
    await page.getByRole('button',{name:'Sign out'}).click();
    await page.goto('/forgot-password'); await page.getByLabel('Email').fill(email); await page.getByRole('button',{name:'Send reset link'}).click();
    await page.goto(await emailLink(request,email,'reset-password/'));
    const replacement = randomBytes(20).toString('hex');
    await page.getByLabel('Password',{exact:true}).fill(replacement); await page.getByLabel('Confirm password').fill(replacement);
    await page.getByRole('button',{name:'Save new password'}).click();
    await page.getByLabel('Email',{exact:true}).fill(email); await page.getByLabel('Password',{exact:true}).fill(replacement);
    await page.getByRole('button',{name:'Sign in',exact:true}).click(); await expect(page).toHaveURL(/dashboard/);
});

test('two independent players become friends and form a partial party', async ({browser}) => {
    const aContext = await browser.newContext(); const bContext = await browser.newContext();
    const a = await aContext.newPage(); const b = await bContext.newPage(); await login(a,'a'); await login(b,'b');
    if (await a.getByRole('button',{name:'Disband party'}).count()) { await a.getByRole('button',{name:'Disband party'}).click(); await expect(a.getByRole('button',{name:'Start a party'})).toBeVisible(); }
    if (await a.locator('.friend-options').count()) { await removeFirstFriend(a); await expect(a.locator('.friend-options')).toHaveCount(0); }
    await a.getByText('Add a friend',{exact:true}).press('Enter');
    await a.getByLabel('Exact friend handle').fill('demo_b');
    // The dashboard polls; it must not collapse an open form or discard its draft.
    await a.waitForResponse(response => response.url().includes('/livewire') && response.request().method()==='POST' && response.status()===200);
    await expect(a.getByRole('button',{name:'Send friend request'})).toBeVisible();
    await expect(a.getByLabel('Exact friend handle')).toHaveValue('demo_b');
    await addFriend(a, 'demo_b');
    await b.reload(); await b.getByRole('button',{name:'Accept friend',exact:true}).click();
    await a.getByRole('button',{name:'Start a party'}).click();
    await a.getByRole('button',{name:'Invite demo_b to party',exact:true}).click();
    await b.reload(); await b.getByRole('button',{name:'Accept invitation'}).click();
    await expect(b.getByText('2 / 5 players',{exact:false})).toBeVisible();
    await a.reload(); await expect(a.getByText('2 / 5 players',{exact:false})).toBeVisible();
    await a.getByRole('button',{name:"I'm ready"}).click(); await b.getByRole('button',{name:"I'm ready"}).click();
    for (const width of [1280,390]) { await a.setViewportSize({width,height:900}); expect(await a.evaluate(()=>document.documentElement.scrollWidth <= innerWidth)).toBeTruthy(); await a.screenshot({path:`test-results/dashboard-${width}.png`,fullPage:true}); }
    await a.getByRole('button',{name:'Disband party'}).click(); await expect(a.getByRole('button',{name:'Start a party'})).toBeVisible();
    await b.reload(); await expect(b.getByRole('button',{name:'Start a party'})).toBeVisible();
    await removeFirstFriend(a);
    await aContext.close(); await bContext.close();
});
