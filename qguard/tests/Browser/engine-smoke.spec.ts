import {test,expect} from '@playwright/test';
import {login} from './helpers';
test('core engine auth, five-player room, feedback and requeue smoke',async({browser,browserName})=>{
 test.setTimeout(150000);
 const contexts=await Promise.all(Array.from({length:5},()=>browser.newContext()));const pages=await Promise.all(contexts.map(c=>c.newPage()));
 const errors:string[]=[];pages.forEach(p=>p.on('pageerror',e=>errors.push(e.message)));
 try{
  for(const [i,label] of ['a','b','h','i','j'].entries()){
   await login(pages[i],label);await pages[i].getByRole('button',{name:'Start a party'}).click();await pages[i].getByRole('button',{name:"I'm ready"}).click();await pages[i].getByRole('button',{name:'Find teammates'}).click();
  }
  await expect(pages[0].getByRole('link',{name:'Open team room'})).toBeVisible({timeout:75000});
  await expect(pages[0].getByText('Your connections',{exact:true})).toBeVisible();
  await expect(pages[0].getByLabel('Riot ID')).toHaveCount(0);
  await pages[0].getByRole('link',{name:'Profile & settings',exact:true}).click();
  await expect(pages[0].getByRole('heading',{name:'Profile & settings',exact:true})).toBeVisible();
  await expect(pages[0].getByLabel('Riot ID')).toBeVisible();
  await expect(pages[0].getByLabel('Current password',{exact:true})).toBeVisible();
  await expect(pages[0].getByRole('complementary',{name:'Friends sidebar'})).toHaveCount(0);
  await pages[0].getByRole('link',{name:'Matchmaking',exact:true}).click();
  for(const p of pages){await p.getByRole('link',{name:'Open team room'}).click({timeout:75000});await expect(p.locator('.roster li')).toHaveCount(5);}
  for(const p of pages.slice(0,2)){await expect(p.getByLabel('Message to your team')).not.toBeVisible();await p.getByText('Team chat',{exact:true}).click();}
  const composer=pages[0].getByLabel('Message to your team');await composer.fill('Engine check '+browserName);await pages[0].getByText('Team chat',{exact:true}).click();await expect(composer).not.toBeVisible();await pages[0].getByText('Team chat',{exact:true}).press('Enter');await expect(composer).toHaveValue('Engine check '+browserName);await composer.press('Shift+Enter');await composer.pressSequentially('Second line');await expect(composer).toHaveValue('Engine check '+browserName+'\nSecond line');await composer.press('Enter');await expect(pages[1].locator('.messages p')).toHaveText('Engine check '+browserName+'\nSecond line',{timeout:12000});await expect(composer).toHaveValue('');
  for(const p of pages){await p.getByRole('button',{name:'Session ended',exact:true}).click();await expect(p.getByRole('heading',{name:'How was your team?'})).toBeVisible();await p.getByRole('button',{name:'Skip feedback',exact:true}).click();await expect(p.getByText('Feedback skipped. No ratings were invented.',{exact:true})).toBeVisible();}
  await expect(pages[0].getByRole('heading',{name:'Feedback window closed'})).toBeVisible({timeout:12000});await pages[0].goto('/dashboard');await expect(pages[0].getByRole('button',{name:'Start a party'})).toBeVisible();expect(errors).toEqual([]);
 }finally{for(const c of contexts)await c.close();}
});
