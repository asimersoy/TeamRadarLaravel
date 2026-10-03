import { test, expect } from '@playwright/test';
import { login } from './helpers';
test('five separate browsers queue and recover their matched roster; outsider denied',async({browser})=>{
    test.setTimeout(60000);
    const contexts=await Promise.all(Array.from({length:6},()=>browser.newContext()));
    const pages=await Promise.all(contexts.map(c=>c.newPage()));
    for(let i=0;i<5;i++){
        await login(pages[i],String.fromCharCode(99+i));
        await pages[i].getByRole('button',{name:'Start a party'}).click();
        await pages[i].getByRole('button',{name:"I'm ready"}).click();
        await expect(pages[i].locator('.roster')).toContainText('Ready');
        await pages[i].getByRole('button',{name:'Find teammates'}).click();
        await expect(pages[i].getByRole('button',{name:'Cancel queue'}).or(pages[i].getByRole('link',{name:'Open team room'}))).toBeVisible();
    }
    for(let i=0;i<5;i++){
        await expect(pages[i].getByRole('link',{name:'Open team room'})).toBeVisible({timeout:20000});
        await pages[i].getByRole('link',{name:'Open team room'}).click();
        await expect(pages[i].getByRole('heading',{name:'Your five are here.'})).toBeVisible();
        await expect(pages[i].locator('.roster li')).toHaveCount(5);
        await expect(pages[i].getByText('Honor 50.0',{exact:true})).toHaveCount(5);
    }
    await login(pages[5],'observer');await pages[5].goto(pages[0].url());await expect(pages[5].getByText('403',{exact:true})).toBeVisible();
    await pages[0].screenshot({path:'test-results/matched-room.png',fullPage:true});
    for(const c of contexts)await c.close();
});
