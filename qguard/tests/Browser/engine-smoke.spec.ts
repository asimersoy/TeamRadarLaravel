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
  for(const p of pages){await p.getByRole('link',{name:'Open team room'}).click({timeout:75000});await expect(p.locator('.roster li')).toHaveCount(5);}
  await pages[0].getByLabel('Message to your team').fill('Engine check '+browserName);await pages[0].getByRole('button',{name:'Send message'}).click();await expect(pages[1].getByText('Engine check '+browserName,{exact:true})).toBeVisible({timeout:12000});
  for(const p of pages){await p.getByRole('button',{name:'Session ended',exact:true}).click();await expect(p.getByRole('heading',{name:'How was your team?'})).toBeVisible();await p.getByRole('button',{name:'Skip feedback',exact:true}).click();await expect(p.getByText('Feedback skipped. No ratings were invented.',{exact:true})).toBeVisible();}
  await expect(pages[0].getByRole('heading',{name:'Feedback window closed'})).toBeVisible({timeout:12000});await pages[0].goto('/dashboard');await expect(pages[0].getByRole('button',{name:'Start a party'})).toBeVisible();expect(errors).toEqual([]);
 }finally{for(const c of contexts)await c.close();}
});
