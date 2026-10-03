import {test,expect} from '@playwright/test';
import {login,advanceClock} from './helpers';
test('premade feedback restriction, partial-input error, rank observation and deadline recovery',async({browser})=>{
 test.setTimeout(150000);const contexts=await Promise.all(Array.from({length:5},()=>browser.newContext()));const pages=await Promise.all(contexts.map(c=>c.newPage()));
 try{
  for(const [i,label] of ['a','b','h','i','j'].entries())await login(pages[i],label);
  await pages[0].getByLabel('Exact friend handle').fill('demo_b');await pages[0].getByRole('button',{name:'Send friend request'}).click();await expect(pages[0].getByLabel('Exact friend handle')).toHaveValue('');await pages[1].reload();await pages[1].getByRole('button',{name:'Decline friend'}).click();await expect(pages[1].getByRole('button',{name:'Decline friend'})).toHaveCount(0);
  await pages[0].reload();await pages[0].getByLabel('Exact friend handle').fill('demo_b');await pages[0].getByRole('button',{name:'Send friend request'}).click();await expect(pages[0].getByLabel('Exact friend handle')).toHaveValue('');await pages[1].reload();await pages[1].getByRole('button',{name:'Accept friend',exact:true}).click();await expect(pages[1].getByRole('button',{name:'Remove friend'})).toBeVisible();
  await pages[0].getByRole('button',{name:'Start a party'}).click();await pages[0].getByLabel('Invite a friend by handle').fill('demo_b');await pages[0].getByRole('button',{name:'Send party invitation'}).click();await expect(pages[0].getByLabel('Invite a friend by handle')).toHaveValue('');await pages[1].reload();await pages[1].getByRole('button',{name:'Decline invitation'}).click();await expect(pages[1].getByRole('button',{name:'Decline invitation'})).toHaveCount(0);
  await pages[0].reload();await pages[0].getByLabel('Invite a friend by handle').fill('demo_b');await pages[0].getByRole('button',{name:'Send party invitation'}).click();await expect(pages[0].getByLabel('Invite a friend by handle')).toHaveValue('');await pages[1].reload();await pages[1].getByRole('button',{name:'Accept invitation'}).click();await expect(pages[1].getByText('2 / 5 players',{exact:false})).toBeVisible();
  await pages[0].reload();await pages[0].getByRole('button',{name:"I'm ready"}).click();await pages[1].getByRole('button',{name:"I'm ready"}).click();await pages[0].getByRole('button',{name:'Find teammates'}).click();
  for(const p of pages.slice(2)){await p.getByRole('button',{name:'Start a party'}).click();await p.getByRole('button',{name:"I'm ready"}).click();await p.getByRole('button',{name:'Find teammates'}).click();}
  // A prior scenario advances the private clock; schedule:work resumes at the next minute.
  for(const p of pages){await p.getByRole('link',{name:'Open team room'}).click({timeout:75000});await p.getByRole('button',{name:'Session ended',exact:true}).click();}
  await expect(pages[0].getByText('Original premade teammate:',{exact:false})).toBeVisible();await expect(pages[0].getByRole('combobox',{name:'Communication for demo_b',exact:true})).toHaveCount(0);
  await expect(pages[0].getByText('The ten-minute window starts',{exact:false})).toBeVisible();
  await pages[0].getByRole('combobox',{name:'Communication for demo_h',exact:true}).selectOption('7');await pages[0].getByRole('button',{name:'Finalize feedback',exact:true}).click();await expect(pages[0].getByRole('alert')).toContainText('all three');await expect(pages[0].getByRole('alert')).toBeFocused();
  for(const dimension of ['Sportsmanship','Effort'])await pages[0].getByRole('combobox',{name:`${dimension} for demo_h`,exact:true}).selectOption('7');
  await pages[0].getByRole('combobox',{name:"Did demo_h's in-game rank match their declared rank?",exact:true}).selectOption('different');
  for(const width of [1280,390]){await pages[0].setViewportSize({width,height:900});expect(await pages[0].evaluate(()=>document.documentElement.scrollWidth<=innerWidth)).toBeTruthy();await pages[0].screenshot({path:`test-results/feedback-${width}.png`,fullPage:true});}
  await pages[0].getByRole('button',{name:'Finalize feedback',exact:true}).click();await expect(pages[0].getByRole('heading',{name:'Your feedback is finalized'})).toBeVisible();
  await pages[1].goto('/dashboard');await pages[1].getByRole('link',{name:/Feedback for session/}).click();await expect(pages[1].getByRole('button',{name:'Skip feedback',exact:true})).toBeVisible();
  advanceClock(601);
  await expect(pages[1].getByRole('heading',{name:'Feedback window closed'})).toBeVisible({timeout:12000});await expect(pages[1].getByRole('button',{name:'Finalize feedback',exact:true})).toHaveCount(0);
  await pages[0].goto('/dashboard');await pages[0].getByRole('button',{name:'Remove friend'}).click();
 }finally{for(const c of contexts)await c.close();}
});
