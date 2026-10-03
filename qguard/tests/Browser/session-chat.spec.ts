import {test,expect} from '@playwright/test';
import {login,advanceClock} from './helpers';

test('private chat, retry, end and no-show response use separate player sessions',async({browser})=>{
 test.setTimeout(90000);
 const contexts=await Promise.all(Array.from({length:5},()=>browser.newContext()));const pages=await Promise.all(contexts.map(c=>c.newPage()));
 try{
  for(let i=0;i<5;i++){await login(pages[i],String.fromCharCode(99+i));await pages[i].getByRole('link',{name:'Open team room'}).click();}
  await expect(pages[0].getByText('Live updates connected · polling backup active',{exact:true})).toBeVisible();
  await pages[0].getByLabel('Message to your team').fill('<script>not executable</script> Hello team');await pages[0].getByRole('button',{name:'Send message'}).click();
  await expect(pages[1].getByText('<script>not executable</script> Hello team',{exact:true})).toBeVisible({timeout:10000});
  await contexts[0].setOffline(true);await pages[0].getByLabel('Message to your team').fill('Retry-safe message');await pages[0].getByRole('button',{name:'Send message'}).click();await expect(pages[0].locator('[data-send-status]')).toContainText('Failed');
  await contexts[0].setOffline(false);await pages[0].getByRole('button',{name:'Send message'}).click();await expect(pages[0].locator('[data-send-status]')).toHaveText('Sent');await expect(pages[1].getByText('Retry-safe message',{exact:true})).toHaveCount(1);
  advanceClock(301);
  for(let i=0;i<4;i++){await pages[i].reload();await pages[i].getByText('Someone has not joined',{exact:true}).click();await pages[i].getByRole('button',{name:'demo_g has not joined',exact:true}).click();}
  await expect(pages[4].getByText('Response required before',{exact:false})).toBeVisible({timeout:10000});
  await pages[4].getByRole('button',{name:'I joined',exact:true}).click();await expect(pages[4].locator('.roster')).toContainText('acknowledged');
  const roomUrl=pages[0].url();await pages[0].getByRole('button',{name:'Session ended',exact:true}).click();await expect(pages[0].getByRole('heading',{name:'How was your team?'})).toBeVisible();await pages[0].goto(roomUrl);await expect(pages[0].getByText('Your participation has ended.',{exact:false})).toBeVisible();
  await expect(pages[0].getByRole('button',{name:'Send message'})).not.toBeVisible({timeout:10000});
  await pages[0].getByRole('link',{name:'Return to dashboard'}).click();await expect(pages[0].getByRole('button',{name:'Start a party'})).toBeVisible();
  for(const width of [1280,390]){await pages[1].setViewportSize({width,height:900});expect(await pages[1].evaluate(()=>document.documentElement.scrollWidth<=innerWidth)).toBeTruthy();await pages[1].screenshot({path:`test-results/chat-${width}.png`,fullPage:true});}
 }finally{for(const c of contexts)await c.close();}
});
