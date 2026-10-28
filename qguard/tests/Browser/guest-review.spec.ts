import { test, expect, Page } from '@playwright/test';

const route = async (page: Page, hash: string) => { await page.goto('/guest#' + hash); };
const action = (page: Page, name: string) => page.locator(`[data-action="${name}"]`);
async function formTeam(page: Page) {
    await route(page, 'queue');
    await action(page, 'form-team').click();
    await expect(page.getByRole('dialog')).toBeVisible();
    await action(page, 'accept-offer').click();
    await action(page, 'sample-accept-peers').click();
    await expect(page).toHaveURL(/#team$/);
}

test('guest entry uses the packaged design, keeps tabs isolated and makes no service calls', async ({page, context}) => {
    const failures: string[] = [], requests: string[] = [];
    page.on('pageerror', e => failures.push(e.message));
    await page.goto('/login');
    page.on('request', r => { if (!['document', 'image'].includes(r.resourceType())) requests.push(r.url()); });
    await page.getByRole('link', {name:'Continue as guest'}).click();
    await action(page, 'guest').click();
    await page.locator('#handle').fill('SampleA');
    await page.getByRole('button', {name:/Continue to Riot/}).click();
    await action(page, 'sample-connect').click();
    const second = await context.newPage();
    await route(second, 'profile');
    await expect(second.locator('.profile-identity')).toContainText('Ari');
    await route(page, 'profile');
    await expect(page.locator('.profile-identity')).toContainText('SampleA');
    await action(page, 'reset-demo').click();
    await route(second, 'profile');
    await expect(second.locator('.profile-identity')).toContainText('Ari');
    expect(failures).toEqual([]);
    expect(requests).toEqual([]);
});

test('all five accept before activation, a missing solo acceptor leaves and an accepter returns', async ({page}) => {
    await page.clock.install();
    await route(page,'queue'); await action(page,'form-team').click();
    await action(page,'accept-offer').click();
    await action(page,'sample-decline-peer').click();
    await expect(page).toHaveURL(/#queue$/);
    await page.clock.fastForward(20001);
    await expect(page.getByRole('dialog')).not.toBeVisible();
    await expect(page).toHaveURL(/#queue$/);
    await action(page,'form-team').click();
    await page.clock.fastForward(20001);
    await expect(page).toHaveURL(/#dashboard$/);
    await formTeam(page);
    await expect(page.getByRole('heading',{name:'Your five is ready.'})).toBeVisible();
});

test('shared closure blocks requeue, opens required cards and keeps each submitted card immutable', async ({page}) => {
    await page.clock.install(); await formTeam(page);
    await page.locator('#party-code').fill('FICTIONAL');
    await page.getByRole('button',{name:'Share with my team'}).click();
    await action(page,'lobby-check').click();
    await action(page,'end-session').click(); await action(page,'confirm-end').click();
    await expect(page.locator('[data-end-clock]')).toHaveText('300');
    await route(page,'dashboard'); await action(page,'find-match').click();
    await expect(page).toHaveURL(/#team$/);
    await page.clock.fastForward(299000);
    await expect(page).toHaveURL(/#team$/);
    await page.clock.fastForward(1001);
    await expect(page).toHaveURL(/#session$/);
    await route(page,'team');
    await expect(page.getByText('Team text is now read-only.')).toBeVisible();
    await expect(page.locator('form[data-form=chat]')).toHaveCount(0);
    await route(page,'session');
    await expect(action(page,'find-next')).toBeDisabled();
    await page.locator('#rating-mina input[value="8"]').check();
    await page.getByRole('button',{name:'Submit rating for Mina'}).click();
    await action(page,'confirm-rating').click();
    await expect(page.locator('#rating-mina')).toContainText('Locked');
    await expect(page.locator('#rating-mina form')).toHaveCount(0);
    await expect(page.locator('#rating-atlas form')).toHaveCount(1);
    await route(page,'dashboard'); await action(page,'find-match').click();
    await expect(page).toHaveURL(/#session$/);
});

test('three distinct requests close sooner; unanswered discrepancy closes without pre-play feedback', async ({page}) => {
    await formTeam(page); await route(page,'discrepancy?state=waiting');
    await expect(page.getByText('There is no abstain option or separate voting timeout.',{exact:false})).toBeVisible();
    await action(page,'end-session').click(); await action(page,'confirm-end').click();
    await action(page,'sample-end-peers').click();
    await expect(page).toHaveURL(/#session\?state=disbanded$/);
    await expect(page.getByRole('heading',{name:'No ratings required.'})).toBeVisible();
});

test('only self sees descriptor layout and excluded authors still have required cards', async ({page}) => {
    await route(page,'profile?state=teammate');
    await expect(page.locator('.summary-scale')).toHaveCount(0);
    await route(page,'profile');
    await expect(page.locator('.summary-scale')).toHaveCount(2);
    await expect(page.getByText('Visible only to you.',{exact:false})).toBeVisible();
    await route(page,'session?state=excluded-author');
    await expect(page.getByText('Feedback is still required')).toBeVisible();
    await expect(page.locator('form[data-form="rating"]')).toHaveCount(4);
});

test('desktop/mobile changed screens render without overflow and preserve the approved identity', async ({page}, info) => {
    const errors: string[] = []; page.on('pageerror', e=>errors.push(e.message));
    for (const width of [1440,390]) {
        await page.setViewportSize({width,height:1000});
        for (const hash of ['welcome','acceptance','team?state=ending','discrepancy?state=waiting','session?state=excluded-author','profile','profile?state=teammate']) {
            await route(page,hash);
            await expect(page.locator('.brand-image')).toBeVisible();
            expect(await page.evaluate(()=>document.documentElement.scrollWidth <= innerWidth+1)).toBe(true);
            await page.screenshot({path:info.outputPath(`${width}-${hash.replace(/[^a-z]+/g,'-')}.png`),fullPage:true});
        }
    }
    expect(errors).toEqual([]);
});


test('closing and reopening the acceptance dialog does not restart its deadline', async ({page}, info) => {
    await page.clock.install(); await route(page,'queue');
    await action(page,'form-team').click();
    await page.clock.fastForward(10000);
    await page.keyboard.press('Escape');
    await action(page,'form-team').click();
    await expect(page.locator('[data-offer-clock]')).toHaveText('10');
    await page.screenshot({path:info.outputPath('acceptance-dialog.png'),fullPage:false});
    await page.clock.fastForward(10001);
    await expect(page).toHaveURL(/#dashboard$/);
});

test('every catalog route remains renderable after behavior reconciliation', async ({page}, info) => {
    test.skip(info.project.name !== 'chromium', 'Cross-engine changed-flow coverage is in the preceding tests.');
    const failures: string[] = []; page.on('pageerror', e=>failures.push(e.message));
    await route(page,'review');
    const routes = await page.locator('.catalog-card .state-links a').evaluateAll(links=>links.map(a=>a.getAttribute('href')!));
    for (const hash of routes) {
        await page.goto('/guest'+hash);
        await expect(page.locator('main h1')).toBeVisible();
        expect(await page.evaluate(()=>document.documentElement.scrollWidth <= innerWidth+1),hash).toBe(true);
    }
    expect(failures).toEqual([]);
    console.log('Catalog routes checked:',routes.length);
});

for (const scenario of ['member declines', 'self misses deadline', 'independent solo declines']) {
    test(`premade acceptance: ${scenario}`, async ({page}, info) => {
        await page.clock.install();
        await route(page,'friends');
        await page.locator('[data-action="invite-friend"][data-name="Mina"]').click();
        await page.locator('[data-action="invite-friend"][data-name="Vega"]').click();
        await route(page,'queue');
        await action(page,'form-team').click();
        await expect(page.getByRole('dialog')).toContainText('Your premade: Ari, Mina, Vega');
        if (scenario !== 'self misses deadline') await action(page,'accept-offer').click();
        if (scenario === 'member declines') await action(page,'sample-decline-premade').click();
        if (scenario === 'independent solo declines') await action(page,'sample-decline-peer').click();
        await action(page,'sample-accept-peers').click();
        await page.clock.fastForward(20001);
        await expect(page).toHaveURL(scenario === 'independent solo declines' ? /#queue$/ : /#party$/);
        await expect(page.locator('#toast')).toContainText(scenario === 'independent solo declines' ? 'search continues together' : 'Your party stays together');
        const saved = await page.evaluate(()=>JSON.parse(sessionStorage.getItem('qguard_design_review_v2')!));
        expect(saved.party).toEqual(['Ari','Mina','Vega']);
        expect(saved.sessionActive).toBe(false);
        expect(saved.owed).toBe(false);
        if (scenario !== 'independent solo declines') expect(saved.queueStarted).toBeNull();
        if (scenario === 'member declines') await page.screenshot({path:info.outputPath('premade-stopped.png'),fullPage:false});
    });
}

test('private descriptor sketches distinguish zero, two, three and independent trait qualification', async ({page}, info) => {
    for (const width of [1440,390]) {
        await page.setViewportSize({width,height:1000});
        await route(page,'profile?state=new');
        await expect(page.getByText('No feedback yet.',{exact:true})).toHaveCount(2);
        await expect(page.locator('.summary-scale .progress-track')).toHaveCount(0);
        await route(page,'profile?state=insufficient');
        await expect(page.getByText('Not enough feedback yet.',{exact:true})).toHaveCount(2);
        await expect(page.locator('.summary-scale .progress-track')).toHaveCount(0);
        await route(page,'profile?state=mixed');
        await expect(page.locator('.summary-scale .progress-track')).toHaveCount(1);
        await expect(page.getByText('Not enough feedback yet.',{exact:true})).toHaveCount(1);
        expect(await page.evaluate(()=>document.documentElement.scrollWidth<=innerWidth+1)).toBe(true);
        await page.screenshot({path:info.outputPath(`descriptor-mixed-${width}.png`),fullPage:true});
        await route(page,'profile');
        await expect(page.locator('.summary-scale .progress-track')).toHaveCount(2);
        await route(page,'profile?state=teammate');
        await expect(page.locator('.summary-scale')).toHaveCount(0);
    }
});
