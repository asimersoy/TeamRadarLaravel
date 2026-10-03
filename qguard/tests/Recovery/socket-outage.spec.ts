import {test,expect} from '@playwright/test';
import {writeFileSync} from 'node:fs';
import {login} from '../Browser/helpers';
test('actual Reverb stop and restart recovers on the same pages',async({browser})=>{
 test.setTimeout(180000);const contexts=await Promise.all(Array.from({length:5},()=>browser.newContext()));const pages=await Promise.all(contexts.map(c=>c.newPage()));
 try{
  for(const [i,label] of ['a','b','h','i','j'].entries()){await login(pages[i],label);await pages[i].getByRole('button',{name:'Start a party'}).click();await pages[i].getByRole('button',{name:"I'm ready"}).click();await pages[i].getByRole('button',{name:'Find teammates'}).click();}
  for(const p of pages)await p.getByRole('link',{name:'Open team room'}).click({timeout:75000});
  await expect(pages[0].locator('[data-connection]')).toContainText('Live updates connected');writeFileSync('/fixtures/app/private/outage-phase.json',JSON.stringify({phase:'connected'}));
  await expect(pages[0].locator('[data-connection]')).toContainText(/disconnected|unavailable/,{timeout:60000});
  await pages[1].getByLabel('Message to your team').fill('Delivered during server outage');await pages[1].getByRole('button',{name:'Send message'}).click();await expect(pages[0].getByText('Delivered during server outage',{exact:true})).toBeVisible({timeout:15000});
  writeFileSync('/fixtures/app/private/outage-phase.json',JSON.stringify({phase:'polling_verified'}));
  await expect(pages[0].locator('[data-connection]')).toContainText('Live updates connected',{timeout:60000});
  await pages[0].getByLabel('Message to your team').fill('Delivered after reconnect');await pages[0].getByRole('button',{name:'Send message'}).click();await expect(pages[1].getByText('Delivered after reconnect',{exact:true})).toBeVisible({timeout:15000});
  for(const p of pages){await p.getByRole('button',{name:'Session ended',exact:true}).click();await p.getByRole('button',{name:'Skip feedback',exact:true}).click();}
  writeFileSync('/fixtures/app/private/outage-phase.json',JSON.stringify({phase:'complete'}));
 }finally{for(const c of contexts)await c.close();}
});
