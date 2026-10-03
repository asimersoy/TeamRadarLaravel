import {test,expect} from '@playwright/test';
import {login,advanceClock} from './helpers';
test('socket outage polling, no-show removal and stale player access',async({browser})=>{
 test.setTimeout(150000);
 const contexts=await Promise.all(Array.from({length:5},()=>browser.newContext()));const pages=await Promise.all(contexts.map(c=>c.newPage()));
 try{
  // Refuse every WebSocket handshake for one browser, exercising actual polling with no live hint.
  await contexts[0].routeWebSocket(/.*/,ws=>ws.close());
  for(let i=0;i<5;i++){await login(pages[i],String.fromCharCode(99+i));await pages[i].getByRole('button',{name:'Start a party'}).click();await pages[i].getByRole('button',{name:"I'm ready"}).click();await pages[i].getByRole('button',{name:'Find teammates'}).click();}
  for(const p of pages)await p.getByRole('link',{name:'Open team room'}).click({timeout:75000});
  const roomUrl=pages[4].url();
  for(const p of pages.slice(0,2))await p.getByText('Team chat',{exact:true}).click();
  await pages[0].getByText('Someone has not joined',{exact:true}).click();await pages[0].getByRole('button',{name:'demo_g has not joined',exact:true}).click();await expect(pages[0].getByRole('alert')).toContainText('five minutes');
  await pages[1].getByLabel('Message to your team').fill('Polling works without a socket');await pages[1].getByRole('button',{name:'Send message'}).click();await expect(pages[0].getByText('Polling works without a socket',{exact:true})).toBeVisible({timeout:12000});
  await pages[0].getByLabel('Message to your team').fill('javascript:alert(1)');await pages[0].getByRole('button',{name:'Send message'}).click();await expect(pages[0].locator('[data-send-status]')).toContainText('not allowed');
  advanceClock(301);
  for(let i=0;i<4;i++){await pages[i].reload();await pages[i].getByText('Someone has not joined',{exact:true}).click();await pages[i].getByRole('button',{name:'demo_g has not joined',exact:true}).click();}
  await expect(pages[4].getByText('Response required before',{exact:false})).toBeVisible({timeout:12000});
  advanceClock(31);
  await expect(pages[1].getByText('This QGuard session was disbanded',{exact:false})).toBeVisible({timeout:75000});
  // Already-open socket is insufficient authority: subsequent message fetch must be denied.
  const denied=await pages[4].request.get(roomUrl+'/messages');expect(denied.status()).toBe(403);await pages[4].goto(roomUrl);await expect(pages[4].getByText('403',{exact:true})).toBeVisible();
  await pages[1].goto('/dashboard');await expect(pages[1].getByRole('button',{name:'Start a party'})).toBeVisible();
 }finally{for(const c of contexts)await c.close();}
});
