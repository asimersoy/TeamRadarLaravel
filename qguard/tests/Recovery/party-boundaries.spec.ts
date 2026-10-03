import {test,expect} from '@playwright/test';
import {login,addFriend,removeFirstFriend} from '../Browser/helpers';
test('friend cancel, busy recipient, revoked and full invitations, leave and queue cancellation',async({browser})=>{
 test.setTimeout(120000);const labels=['a','b','h','i','j','observer'];const contexts=await Promise.all(labels.map(()=>browser.newContext()));const pages=await Promise.all(contexts.map(c=>c.newPage()));
 try{
  for(const [i,label] of labels.entries())await login(pages[i],label);const a=pages[0];
  if(await a.getByRole('button',{name:'Disband party'}).count()){await a.getByRole('button',{name:'Disband party'}).click();await expect(a.getByRole('button',{name:'Start a party'})).toBeVisible();}
  while(await a.locator('.friend-options').count()){const count=await a.locator('.friend-options').count();await removeFirstFriend(a);await expect(a.locator('.friend-options')).toHaveCount(count-1);}
  await addFriend(a,'demo_b');await a.getByRole('button',{name:'Cancel request'}).click();await expect(a.getByRole('button',{name:'Cancel request'})).toHaveCount(0);
  for(let i=1;i<6;i++){await addFriend(a,'demo_'+labels[i]);await pages[i].reload();await pages[i].getByRole('button',{name:'Accept friend',exact:true}).click();await expect(pages[i].locator('.friend-options')).toHaveCount(1);}
  await a.getByRole('button',{name:'Start a party'}).click();await pages[5].getByRole('button',{name:'Start a party'}).click();await a.getByLabel('Invite a friend by handle').fill('demo_observer');await a.getByRole('button',{name:'Send party invitation'}).click();await expect(a.getByRole('alert')).toContainText('active party');await pages[5].getByRole('button',{name:'Disband party'}).click();
  await a.getByLabel('Invite a friend by handle').fill('demo_b');await a.getByRole('button',{name:'Send party invitation'}).click();await a.getByRole('button',{name:/Revoke invitation/}).click();await expect(a.getByRole('button',{name:/Revoke invitation/})).toHaveCount(0);await pages[1].reload();await expect(pages[1].getByRole('button',{name:'Accept invitation'})).toHaveCount(0);
  for(let i=1;i<6;i++){await a.getByLabel('Invite a friend by handle').fill('demo_'+labels[i]);await a.getByRole('button',{name:'Send party invitation'}).click();await expect(a.getByRole('button',{name:/Revoke invitation/})).toHaveCount(i);}
  for(let i=1;i<5;i++){await pages[i].reload();await pages[i].getByRole('button',{name:'Accept invitation'}).click();await expect(pages[i].getByRole('button',{name:'Leave party'})).toBeVisible();}
  await pages[5].reload();await pages[5].getByRole('button',{name:'Accept invitation'}).click();await expect(pages[5].getByRole('alert')).toContainText('full');
  await pages[4].getByRole('button',{name:'Leave party'}).click();await expect(pages[4].getByRole('button',{name:'Start a party'})).toBeVisible();await a.reload();await a.getByRole('button',{name:'Disband party'}).click();await expect(a.getByRole('button',{name:'Start a party'})).toBeVisible();
  // The old invitation becomes unusable after disband; there is no stale accept UI.
  await pages[5].reload();await expect(pages[5].getByRole('button',{name:'Accept invitation'})).toHaveCount(0);
  await a.getByRole('button',{name:'Start a party'}).click();await a.getByRole('button',{name:"I'm ready"}).click();await a.getByRole('button',{name:'Find teammates'}).click();await a.getByRole('button',{name:'Cancel queue'}).click();await expect(a.getByRole('button',{name:'Find teammates'})).toBeVisible();await a.getByRole('button',{name:'Disband party'}).click();
  for(let i=0;i<5;i++){await removeFirstFriend(a);await expect(a.locator('.friend-options')).toHaveCount(4-i);}
 }finally{for(const c of contexts)await c.close();}
});
