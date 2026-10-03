import {test,expect} from '@playwright/test';
import {login} from './helpers';
test('pending feedback settles after reports; cleared admin reviews full evidence',async({browser})=>{
 test.setTimeout(90000);
 const contexts=await Promise.all(Array.from({length:6},()=>browser.newContext()));const pages=await Promise.all(contexts.map(c=>c.newPage()));
 for(let i=0;i<5;i++){
  await login(pages[i],String.fromCharCode(99+i));
  if(await pages[i].getByRole('link',{name:'Open team room'}).count()){await pages[i].getByRole('link',{name:'Open team room'}).click();await pages[i].getByRole('button',{name:'Session ended',exact:true}).click();}
  else{await pages[i].getByRole('link',{name:/Feedback for session/}).click();}
  await expect(pages[i].getByRole('heading',{name:'How was your team?'})).toBeVisible();
 }
 const sessionId=pages[0].url().split('/').pop();
 async function rate(index:number,handle:string,value:string){for(const dimension of ['Communication','Sportsmanship','Effort'])await pages[index].getByRole('combobox',{name:`${dimension} for ${handle}`,exact:true}).selectOption(value);}
 await rate(0,'demo_d','1');await pages[0].getByRole('button',{name:'Finalize feedback',exact:true}).click();await expect(pages[0].getByRole('heading',{name:'Your feedback is finalized'})).toBeVisible();
 for(const [index,category] of [[1,'Used harmful, unsportsmanlike language'],[2,'Left the game before completion']] as const){
  await rate(index,'demo_c',index===1?'8':'9');const card=pages[index].locator('section').filter({has:pages[index].getByRole('heading',{name:'demo_c',exact:true})});
  await card.getByText('Dishonorable actions',{exact:true}).click();await card.getByLabel(category,{exact:true}).check();await card.getByLabel('Report details for demo_c').fill('Synthetic report for review');
  await pages[index].getByRole('button',{name:'Finalize feedback',exact:true}).click();await expect(pages[index].getByRole('heading',{name:'Your feedback is finalized'})).toBeVisible();
 }
 for(const index of [3,4]){await pages[index].getByRole('button',{name:'Skip feedback',exact:true}).click();}
 await expect(pages[0].getByRole('heading',{name:'Feedback window closed'})).toBeVisible({timeout:10000});
 await pages[1].goto('/dashboard');await expect(pages[1].locator('.score strong')).toHaveText('50.0');
 await pages[0].goto('/dashboard');await expect(pages[0].locator('.score strong')).not.toHaveText('50.0');
 await pages[0].goto('/rooms/'+sessionId);await expect(pages[0].getByText('Honor 50.0',{exact:true})).toHaveCount(5);
 await login(pages[5],'admin');await pages[5].getByRole('link',{name:'Human review',exact:true}).click();await pages[5].getByLabel('Evidence filter').selectOption('automatic');
 await pages[5].getByRole('link',{name:new RegExp(`Session #${sessionId}$`)}).click();await expect(pages[5].getByRole('heading',{name:'Automatic outgoing-rating invalidation'})).toBeVisible();
 await pages[5].getByText('Conduct reports',{exact:true}).click();await expect(pages[5].getByText(/Synthetic report for review/).first()).toBeVisible();
 await pages[5].getByLabel('Internal review note').fill('Reviewed synthetic evidence. No penalty.');await pages[5].getByRole('button',{name:'Save review'}).click();await expect(pages[5].getByRole('status').filter({hasText:'Review saved'})).toBeVisible();
 await pages[5].screenshot({path:'test-results/admin-case.png',fullPage:true});
 await pages[0].goto('/admin/cases');await expect(pages[0].getByText('403',{exact:true})).toBeVisible();
 await pages[0].goto('/feedback/'+sessionId);await pages[0].getByRole('combobox',{name:'Teammate',exact:true}).selectOption({label:'demo_d'});await pages[0].getByLabel('What happened?').fill('Synthetic late evidence');await pages[0].getByRole('button',{name:'Send late evidence'}).click();await expect(pages[0].getByRole('status').filter({hasText:'Late evidence sent'})).toBeVisible();
 await pages[0].screenshot({path:'test-results/feedback-closed.png',fullPage:true});
 for(const c of contexts)await c.close();
});
