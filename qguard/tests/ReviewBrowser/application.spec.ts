import {test,expect} from '@playwright/test';
import {login} from '../Browser/helpers';

test('five real accounts accept, share a code, chat, close together and submit private immutable feedback',async({browser},info)=>{
  const contexts=await Promise.all(Array.from({length:5},()=>browser.newContext({viewport:{width:1440,height:1000}})));
  const pages=await Promise.all(contexts.map(c=>c.newPage()));
  const errors:string[]=[];pages.forEach(p=>p.on('pageerror',e=>errors.push(e.message)));
  try {
    for(let i=0;i<5;i++) {
      const p=pages[i];await login(p,['a','b','c','d','e'][i]);
      await p.getByRole('button',{name:'Start a party',exact:true}).click();
      await p.getByLabel('Confirm rank for this queue attempt').selectOption('10');
      await p.getByRole('button',{name:'Confirm current rank',exact:true}).click();
      await expect(p.getByRole('status')).toContainText('Rank confirmed');
      await p.getByRole('button',{name:"I'm ready",exact:true}).click();
    }
    for(const p of pages)await p.getByRole('button',{name:'Find teammates',exact:true}).click();
    await Promise.all(pages.map(p=>expect(p.getByRole('dialog')).toBeVisible({timeout:15000})));
    await pages[0].screenshot({path:info.outputPath('offer.png'),fullPage:false});
    await Promise.all(pages.map(p=>p.getByRole('button',{name:'Accept match',exact:true}).click()));
    await Promise.all(pages.map(p=>expect(p).toHaveURL(/rooms\/\d+$/,{timeout:15000})));
    const room=pages[0].url();expect(pages.every(p=>p.url()===room)).toBe(true);
    const host=pages[0];await host.getByLabel('Enter your party code').fill('QGuard-Ab12');await host.getByRole('button',{name:'Share code with team'}).click();
    await expect(pages[1].locator('.party-code')).toHaveText('QGuard-Ab12');
    await pages[1].getByRole('button',{name:'Copy code',exact:true}).click();
    await expect(pages[1].getByText(/^(Code copied|Copy unavailable\. Select the code and copy it manually\.)$/)).toBeVisible();
    await pages[1].getByLabel('Team chat',{exact:true}).click();
    await pages[1].getByLabel('Message to your team').fill('Ready for a good game.');await pages[1].getByRole('button',{name:'Send message'}).click();
    await expect(pages[1].locator('[data-send-status]')).toHaveText('Sent');
    for(const p of pages)await p.getByRole('button',{name:'I joined and checked the roster',exact:true}).click();
    await host.getByRole('link',{name:'Sessions',exact:true}).click();
    await host.getByRole('link',{name:'Return to session',exact:true}).first().click();
    await host.getByLabel('Team chat',{exact:true}).click();
    await expect(host.getByText('Ready for a good game.',{exact:true})).toBeVisible();
    await host.getByLabel('Message to your team').fill('Back after checking history.');
    await host.getByRole('button',{name:'Send message',exact:true}).click();
    await expect(pages[1].getByText('Back after checking history.',{exact:true})).toBeVisible();
    await host.getByLabel('Team chat',{exact:true}).click();
    await host.evaluate(()=>scrollTo(0,0));
    await host.screenshot({path:info.outputPath('room-1440.png'),fullPage:true});
    await host.getByRole('button',{name:'Session ended',exact:true}).click();
    await expect(host.getByText(/1 \/ 3 end requests/)).toBeVisible();
    await pages[1].getByRole('button',{name:'Session ended',exact:true}).click();
    await pages[2].getByRole('button',{name:'Session ended',exact:true}).click();
    await Promise.all(pages.map(p=>expect(p).toHaveURL(/sessions\/\d+$/,{timeout:15000})));
    const detail=host.url();
    await host.goto('/dashboard');await expect(host.getByText('Finish your previous session feedback.',{exact:true})).toBeVisible();
    await host.getByRole('link',{name:'Open required ratings'}).click();await expect(host).toHaveURL(detail);
    for(let i=0;i<5;i++) {
      const p=pages[i];p.on('dialog',d=>d.accept());
      while(await p.locator('.feedback-grid form').count()) {
        const before=await p.locator('.feedback-grid form').count();
        const form=p.locator('.feedback-grid form').first();
        await form.locator('input[type=radio][value="8"]').check();
        if(i===0) {const slider=form.getByRole('slider').first();await slider.focus();await p.keyboard.press('ArrowRight');await p.keyboard.press('ArrowLeft');}
        await form.getByRole('button',{name:'Submit rating',exact:true}).click();
        await expect(p.getByRole('status')).toContainText('Rating submitted and locked.');
        await expect(p.locator('.feedback-grid form')).toHaveCount(before-1);
      }
      await expect(p.getByText('Your feedback is complete. You can find another team.',{exact:true})).toBeVisible();
    }
    await host.setViewportSize({width:390,height:1000});await host.screenshot({path:info.outputPath('feedback-390.png'),fullPage:true});
    expect(await host.evaluate(()=>document.documentElement.scrollWidth<=innerWidth+1)).toBe(true);
    await host.goto('/sessions');await expect(host.getByRole('heading',{name:'Good games. Shared history.'})).toBeVisible();
    await host.getByRole('link',{name:'Connections',exact:true}).click();await expect(host.getByRole('heading',{name:'Bring your people.'})).toBeVisible();
    await host.getByRole('link',{name:'Profile & settings',exact:true}).first().click();await expect(host.getByRole('heading',{name:'How teammates describe you'})).toBeVisible();
    expect(errors).toEqual([]);
  }finally{for(const c of contexts)await c.close();}
});
