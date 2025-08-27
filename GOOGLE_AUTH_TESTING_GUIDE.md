# Google Authentication Testing Guide

This guide provides step-by-step instructions to test all the Google authentication scenarios you mentioned.

## Prerequisites

1. **Laravel Development Server Running**
   ```bash
   php artisan serve
   ```

2. **Database Migrations Run**
   ```bash
   php artisan migrate
   ```

3. **Environment Variables Set**
   - `GOOGLE_CLIENT_ID`
   - `GOOGLE_CLIENT_SECRET`
   - `GOOGLE_REDIRECT_URI`

## Test Scenarios

### 1. Can I sign up with Gmail?

**Test Steps:**
1. Open your browser and go to `http://127.0.0.1:8000`
2. Click "Login" in the navigation
3. Click "Continue with Google"
4. Choose a Gmail account that hasn't been used before
5. Authorize the application

**Expected Result:**
- User should be created in the database
- User should be logged in automatically
- User should be redirected to `/dashboard`
- Success message should appear

**Verification:**
```sql
-- Check if user was created
SELECT * FROM users WHERE email = 'your-gmail@gmail.com';

-- Check if social account was linked
SELECT * FROM social_accounts WHERE provider_email = 'your-gmail@gmail.com';
```

### 2. Can I sign in with the same email multiple times?

**Test Steps:**
1. Log out from the application
2. Click "Login" again
3. Click "Continue with Google"
4. Choose the same Gmail account used in test 1
5. Authorize the application

**Expected Result:**
- User should be logged in (not create a new account)
- `last_login_at` should be updated
- User should be redirected to `/dashboard`

**Verification:**
```sql
-- Check last login was updated
SELECT name, email, last_login_at FROM users WHERE email = 'your-gmail@gmail.com';
```

### 3. Can I switch between Gmail accounts?

**Test Steps:**
1. Log out from the application
2. Click "Login" again
3. Click "Continue with Google"
4. Click "Use another account" on Google's consent screen
5. Choose a different Gmail account
6. Authorize the application

**Expected Result:**
- New user should be created for the different email
- User should be logged in with the new account
- Both accounts should exist in the database

**Verification:**
```sql
-- Check both users exist
SELECT name, email FROM users WHERE email IN ('account1@gmail.com', 'account2@gmail.com');
```

### 4. How does it redirect to dashboard or return to URL?

**Test Steps:**
1. Try accessing a protected page like `/dashboard` while logged out
2. You should be redirected to login
3. Complete Google OAuth
4. Check where you end up

**Expected Result:**
- Should redirect to the originally requested page (`/dashboard`)
- If no intended URL, should redirect to `/dashboard`

### 5. Is it compatible with every environment?

**Test Steps:**
1. Run the test script:
   ```bash
   php test_google_auth.php
   ```
2. Check all tests pass

**Expected Result:**
- All environment variables should be set
- Database connection should work
- Google OAuth configuration should be valid

### 6. Is it reliable to work with all devices and Gmail?

**Test Steps:**
1. Test on different browsers (Chrome, Firefox, Safari, Edge)
2. Test on mobile devices
3. Test with different Gmail accounts (personal, business, etc.)
4. Test with accounts that have 2FA enabled

**Expected Result:**
- Should work consistently across all browsers
- Should work on mobile devices
- Should handle different Gmail account types

## Manual Testing Checklist

### Environment Setup
- [ ] Laravel server is running
- [ ] Database is accessible
- [ ] Google OAuth credentials are configured
- [ ] All required packages are installed

### Basic Functionality
- [ ] Home page loads without errors
- [ ] Login modal opens when clicking "Login"
- [ ] Google OAuth button is visible
- [ ] Google OAuth redirects to Google consent screen

### User Registration
- [ ] New Gmail account creates new user
- [ ] User data is saved correctly
- [ ] Social account is linked
- [ ] User is logged in automatically
- [ ] User is redirected to dashboard

### User Login
- [ ] Existing Gmail account logs in existing user
- [ ] Last login time is updated
- [ ] User is redirected to dashboard
- [ ] No duplicate users are created

### Account Switching
- [ ] Can switch between different Gmail accounts
- [ ] Each account creates/uses separate user
- [ ] No conflicts between accounts

### Error Handling
- [ ] Invalid Google credentials show proper error
- [ ] Network errors are handled gracefully
- [ ] Database errors are logged
- [ ] User sees appropriate error messages

## Debugging

### Check Logs
```bash
tail -f storage/logs/laravel.log
```

### Check Database
```sql
-- Check users table
SELECT id, name, email, email_verified_at, last_login_at FROM users;

-- Check social accounts
SELECT * FROM social_accounts;

-- Check communication preferences
SELECT * FROM communication_preferences;
```

### Common Issues

1. **"Something went wrong with Google login"**
   - Check Google OAuth credentials in `.env`
   - Verify redirect URI matches Google Console
   - Check Laravel logs for specific error

2. **User not being created**
   - Check database connection
   - Verify User model fillable fields
   - Check if required fields are present

3. **Redirect not working**
   - Check session configuration
   - Verify intended URL handling
   - Check route definitions

4. **Modal not opening**
   - Check JavaScript console for errors
   - Verify Alpine.js is loaded
   - Check modal component structure

## Performance Testing

### Load Testing
- Test with multiple concurrent users
- Monitor database performance
- Check memory usage during OAuth flow

### Security Testing
- Verify CSRF protection is working
- Check session security
- Test with invalid/malicious data

## Browser Compatibility

### Desktop Browsers
- [ ] Chrome (latest)
- [ ] Firefox (latest)
- [ ] Safari (latest)
- [ ] Edge (latest)

### Mobile Browsers
- [ ] Chrome Mobile
- [ ] Safari Mobile
- [ ] Firefox Mobile

## Gmail Account Types

### Personal Accounts
- [ ] Regular Gmail accounts
- [ ] Gmail accounts with 2FA
- [ ] Gmail accounts with app passwords

### Business Accounts
- [ ] Google Workspace accounts
- [ ] Business accounts with SSO
- [ ] Accounts with custom domains

## Success Criteria

All tests should pass with:
- ✅ No errors in browser console
- ✅ No errors in Laravel logs
- ✅ Proper user creation and login
- ✅ Correct redirect behavior
- ✅ Consistent behavior across devices
- ✅ Proper error handling
- ✅ Security measures working

## Reporting Issues

If you encounter issues:

1. **Document the exact steps** that led to the problem
2. **Include browser and device information**
3. **Check Laravel logs** for error details
4. **Test with different Gmail accounts** to isolate the issue
5. **Verify environment configuration** is correct

## Support

For additional help:
- Check the Laravel documentation
- Review Google OAuth documentation
- Check Laravel Socialite documentation
- Review the application logs for specific error messages
