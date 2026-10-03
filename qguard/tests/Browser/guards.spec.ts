import {test,expect} from '@playwright/test';
import {credentials,login} from './helpers';
test('account and setup validation, field association, queued edits and session expiry',async({page,context})=>{
 await page.goto('/dashboard');await expect(page).toHaveURL(/login/);
 await page.getByLabel('Email',{exact:true}).fill(credentials().unranked.email);await page.getByLabel('Password',{exact:true}).fill('intentionally-invalid');await page.getByRole('button',{name:'Sign in',exact:true}).click();
 await expect(page.getByRole('alert')).toContainText('credentials');await expect(page.getByLabel('Email',{exact:true})).toHaveAttribute('aria-describedby','validation-errors');await expect(page.getByRole('alert')).toBeFocused();
 await login(page,'unranked');await page.getByRole('button',{name:'Start a party'}).click();await page.getByRole('button',{name:"I'm ready"}).click();await expect(page.getByRole('alert')).toContainText('placed rank');
 await page.getByLabel('Declared Competitive rank').selectOption('10');await page.getByRole('button',{name:'Save game profile'}).click();await page.getByRole('button',{name:"I'm ready"}).click();await page.getByRole('button',{name:'Find teammates'}).click();await expect(page.getByRole('button',{name:'Cancel queue'})).toBeVisible();
 await page.getByLabel('Declared Competitive rank').selectOption('11');await page.getByRole('button',{name:'Save game profile'}).click();await expect(page.getByRole('button',{name:'Find teammates'})).toBeVisible();await expect(page.locator('.roster')).toContainText('Not ready');
 await page.getByRole('button',{name:'Disband party'}).click();await page.getByLabel('Exact friend handle').fill('demo_unranked');await page.getByRole('button',{name:'Send friend request'}).click();await expect(page.getByRole('alert')).toBeVisible();
 await page.getByLabel('Current password',{exact:true}).fill('invalid-current');await page.getByLabel('New password',{exact:true}).fill('synthetic-replacement-123');await page.getByLabel('Confirm new password').fill('synthetic-replacement-123');await page.getByRole('button',{name:'Change password',exact:true}).click();await expect(page.getByLabel('Current password',{exact:true})).toHaveAttribute('aria-invalid','true');
 await page.getByLabel('Public handle',{exact:true}).fill('demo_unranked_temp');await page.getByRole('button',{name:'Save public handle'}).click();await expect(page.getByRole('heading',{name:'Welcome, demo_unranked_temp'})).toBeVisible();await page.getByLabel('Public handle',{exact:true}).fill('demo_unranked');await page.getByRole('button',{name:'Save public handle'}).click();
 // Restore this fixture's explicitly unknown rank; no fixed credentials are changed.
 await page.getByLabel('Declared Competitive rank').selectOption('');await page.getByRole('button',{name:'Save game profile'}).click();
 for(const width of [1280,390]){await page.setViewportSize({width,height:900});expect(await page.evaluate(()=>document.documentElement.scrollWidth<=innerWidth)).toBeTruthy();await page.screenshot({path:`test-results/validation-${width}.png`,fullPage:true});}
 await context.clearCookies();await page.reload();await expect(page).toHaveURL(/login/);
 const noCsrf=await context.request.post('/login',{data:{email:credentials().a.email,password:'invalid'}});expect(noCsrf.status()).toBe(419);
 await page.goto('/login');await page.getByLabel('Email',{exact:true}).fill(credentials().unverified.email);await page.getByLabel('Password',{exact:true}).fill(credentials().unverified.password);await page.getByRole('button',{name:'Sign in',exact:true}).click();await expect(page.getByRole('heading',{name:'Check your email'})).toBeVisible();
});
