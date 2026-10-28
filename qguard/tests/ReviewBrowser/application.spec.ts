import {test,expect} from '@playwright/test';
import {login} from '../Browser/helpers';
import {readFileSync} from 'node:fs';
const turkish:Record<string,string> = JSON.parse(readFileSync(new URL('../../lang/tr.json', import.meta.url),'utf8'));

for (const locale of ['en','tr'] as const) {
const text = (key:string) => locale === 'tr' ? (turkish[key as keyof typeof turkish] ?? key) : key;

test(`${locale}: five accounts accept, share a code, chat, close together and submit private immutable feedback`,async({browser},info)=>{
  // Five WebKit renderers at 1440px exceed the local 4 GiB Docker VM; keep all
  // five real accounts and assertions, using a standard 720p desktop viewport.
  const viewport=info.project.name==='webkit'?{width:1280,height:720}:{width:1440,height:1000};
  const contexts=await Promise.all(Array.from({length:5},()=>browser.newContext({viewport})));
  const pages=await Promise.all(contexts.map(c=>c.newPage()));
  const errors:string[]=[];pages.forEach(p=>p.on('pageerror',e=>errors.push(e.message)));
  try {
    for(let i=0;i<5;i++) {
      const p=pages[i];await login(p,['a','b','c','d','e'][i]);
      if(locale==='tr'){await p.getByLabel('Interface language').selectOption('tr');await p.getByRole('button',{name:'Apply language'}).click();await expect(p.locator('html')).toHaveAttribute('lang','tr');}
      await p.getByRole('button',{name:text('Start a party'),exact:true}).click();
      await p.getByLabel(text('Confirm rank for this queue attempt')).selectOption('10');
      await p.getByRole('button',{name:text('Confirm current rank'),exact:true}).click();
      await expect(p.getByRole('status')).toContainText(text('Rank confirmed for your next queue attempt.'));
      await p.getByRole('button',{name:text("I'm ready"),exact:true}).click();
    }
    for(const p of pages)await p.getByRole('button',{name:text('Find teammates'),exact:true}).click();
    // schedule:work begins on a minute boundary after a fresh test-stack start.
    // This allows scheduler startup, not extra time to accept an existing offer.
    await Promise.all(pages.map(p=>expect(p.getByRole('dialog')).toBeVisible({timeout:75000})));
    // WebKit needs the captured context foregrounded when five pages are open.
    await pages[0].bringToFront();
    // Linux WebKit screenshot capture with five renderers exceeds the local VM.
    // Chromium/Firefox capture these views; WebKit keeps all behavioral checks.
    if(info.project.name!=='webkit')await pages[0].screenshot({path:info.outputPath('offer.png'),fullPage:false});
    for (const p of pages) {
      await p.bringToFront();
      await p.getByRole('button',{name:text('Accept match'),exact:true}).click();
    }
    await Promise.all(pages.map(p=>expect(p).toHaveURL(/rooms\/\d+$/,{timeout:15000})));
    const room=pages[0].url();expect(pages.every(p=>p.url()===room)).toBe(true);
    const host=pages[0];await host.getByLabel(text('Enter your party code')).fill('QGuard-Ab12');await host.getByRole('button',{name:text('Share code with team')}).click();
    await expect(pages[1].locator('.party-code')).toHaveText('QGuard-Ab12');
    await pages[1].getByRole('button',{name:text('Copy code'),exact:true}).click();
    await expect(pages[1].locator('.party-code').locator('..').getByRole('status')).toBeVisible();
    await pages[1].getByLabel(text('Team chat'),{exact:true}).click();
    await pages[1].getByLabel(text('Message to your team')).fill('Ready for a good game.');await pages[1].getByRole('button',{name:text('Send message')}).click();
    await expect(pages[1].locator('[data-send-status]')).toHaveText(text('Sent'));
    for(const p of pages)await p.getByRole('button',{name:text('I joined and checked the roster'),exact:true}).click();
    await host.getByRole('link',{name:text('Sessions'),exact:true}).click();
    await host.getByRole('link',{name:text('Return to session'),exact:true}).first().click();
    await host.getByLabel(text('Team chat'),{exact:true}).click();
    await expect(host.getByText('Ready for a good game.',{exact:true})).toBeVisible();
    await host.getByLabel(text('Message to your team')).fill('Back after checking history.');
    await host.getByRole('button',{name:text('Send message'),exact:true}).click();
    await expect(pages[1].getByText('Back after checking history.',{exact:true})).toBeVisible();
    await host.getByLabel(text('Team chat'),{exact:true}).click();
    await host.bringToFront();
    await host.evaluate(()=>scrollTo(0,0));
    if(info.project.name!=='webkit')await host.screenshot({path:info.outputPath(`room-${viewport.width}.png`),fullPage:true});
    await host.getByRole('button',{name:text('Session ended'),exact:true}).click();
    await expect(host.getByText(locale==='tr' ? /1 \/ 3 bitirme isteği/ : /1 \/ 3 end requests/)).toBeVisible();
    await pages[1].getByRole('button',{name:text('Session ended'),exact:true}).click();
    await pages[2].getByRole('button',{name:text('Session ended'),exact:true}).click();
    await Promise.all(pages.map(p=>expect(p).toHaveURL(/sessions\/\d+$/,{timeout:15000})));
    const detail=host.url();
    await host.goto('/dashboard');await expect(host.getByText(text('Finish your previous session feedback.'),{exact:true})).toBeVisible();
    await host.getByRole('link',{name:text('Open required ratings')}).click();await expect(host).toHaveURL(detail);
    for(let i=0;i<5;i++) {
      const p=pages[i];p.on('dialog',d=>d.accept());
      while(await p.locator('.feedback-grid form').count()) {
        const before=await p.locator('.feedback-grid form').count();
        const form=p.locator('.feedback-grid form').first();
        await form.locator('input[type=radio][value="8"]').check();
        if(i===0) {const slider=form.getByRole('slider').first();await slider.focus();await p.keyboard.press('ArrowRight');await p.keyboard.press('ArrowLeft');}
        await form.getByRole('button',{name:text('Submit rating'),exact:true}).click();
        await expect(p.getByRole('status')).toContainText(text('Rating submitted and locked.'));
        await expect(p.locator('.feedback-grid form')).toHaveCount(before-1);
      }
      await expect(p.getByText(text('Your feedback is complete. You can find another team.'),{exact:true})).toBeVisible();
    }
    // Remaining checks use only the host; release other renderers before capture.
    for(const c of contexts.slice(1))await c.close();
    await host.setViewportSize({width:390,height:1000});await host.screenshot({path:info.outputPath('feedback-390.png'),fullPage:true});
    expect(await host.evaluate(()=>document.documentElement.scrollWidth<=innerWidth+1)).toBe(true);
    await host.goto('/sessions');await expect(host.getByRole('heading',{name:text('Good games. Shared history.')})).toBeVisible();
    await host.getByRole('link',{name:text('Connections'),exact:true}).click();await expect(host.getByRole('heading',{name:text('Bring your people.')})).toBeVisible();
    await host.getByRole('link',{name:text('Profile & settings'),exact:true}).first().click();await expect(host.getByRole('heading',{name:text('How teammates describe you')})).toBeVisible();
    expect(errors).toEqual([]);
  }finally{for(const c of contexts)await c.close();}
});

}
