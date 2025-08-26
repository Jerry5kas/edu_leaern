# Google Authentication Setup

This document explains how to set up Google OAuth authentication in the EduLearn LMS application.

## Prerequisites

1. Laravel 10.x
2. Laravel Socialite package (already installed)
3. Google Cloud Console account

## Setup Steps

### 1. Google Cloud Console Setup

1. Go to [Google Cloud Console](https://console.cloud.google.com/)
2. Create a new project or select an existing one
3. Enable the Google+ API (or Google Identity API)
4. Go to "Credentials" section
5. Click "Create Credentials" → "OAuth 2.0 Client IDs"
6. Choose "Web application" as the application type
7. Add authorized redirect URIs:
   - For local development: `http://localhost:8000/auth/google/callback`
   - For production: `https://yourdomain.com/auth/google/callback`
8. Copy the Client ID and Client Secret

### 2. Environment Configuration

Add the following to your `.env` file:

```env
GOOGLE_CLIENT_ID=your_google_client_id_here
GOOGLE_CLIENT_SECRET=your_google_client_secret_here
GOOGLE_REDIRECT_URI=http://localhost:8000/auth/google/callback
```

### 3. Database Structure

The application uses the following tables for authentication:

- `users` - Main user table with extended fields
- `social_accounts` - Stores social login information
- `communication_preferences` - User communication settings
- `user_addresses` - User address information
- `gdpr_requests` - GDPR compliance requests

### 4. Authentication Flow

#### Traditional Email/Password Authentication
1. User clicks "Log in" or "Join for Free" in navigation
2. Modal opens with email/password form
3. Form submits to `/login` or `/register` routes
4. User is authenticated and redirected to dashboard

#### Google OAuth Authentication
1. User clicks "Continue with Google" button
2. User is redirected to Google OAuth consent screen
3. After authorization, Google redirects back to `/auth/google/callback`
4. Application creates/updates user and social account records
5. User is logged in and redirected to dashboard

### 5. Features Implemented

- ✅ Google OAuth integration
- ✅ Traditional email/password authentication
- ✅ User registration and login
- ✅ Social account linking
- ✅ Role-based access control (Student role assigned by default)
- ✅ Communication preferences creation
- ✅ Last login tracking
- ✅ Session management
- ✅ Logout functionality
- ✅ Error handling and validation
- ✅ Responsive modal design

### 6. Routes

#### Public Routes
- `GET /` - Home page
- `GET /login` - Login form (redirects to modal)
- `POST /login` - Process login
- `GET /register` - Registration form (redirects to modal)
- `POST /register` - Process registration
- `GET /auth/google` - Google OAuth redirect
- `GET /auth/google/callback` - Google OAuth callback

#### Protected Routes
- `GET /dashboard` - User dashboard
- `GET /profile` - User profile
- `POST /logout` - Logout user
- `GET /test-auth` - Test authentication status

### 7. Models

- `User` - Main user model with relationships
- `SocialAccount` - Social login accounts
- `CommunicationPreference` - User communication settings
- `UserAddress` - User addresses
- `GdprRequest` - GDPR requests

### 8. Controllers

- `AuthController` - Traditional authentication
- `GoogleController` - Google OAuth handling
- `HomeController` - Home and dashboard
- `ProfileController` - User profile management

### 9. Testing

To test the authentication:

1. Start your Laravel development server:
   ```bash
   php artisan serve
   ```

2. Visit `http://localhost:8000`

3. Click "Log in" or "Join for Free" to open the authentication modal

4. Test both Google OAuth and email/password authentication

5. Check authentication status at `/test-auth` (requires login)

### 10. Troubleshooting

#### Common Issues

1. **Google OAuth Error**: Check your Google Cloud Console credentials and redirect URIs
2. **Database Errors**: Ensure all migrations are run and tables exist
3. **Session Issues**: Check your session configuration in `config/session.php`
4. **Route Errors**: Verify all routes are properly defined and middleware is applied

#### Debug Steps

1. Check Laravel logs: `storage/logs/laravel.log`
2. Verify environment variables are set correctly
3. Test Google OAuth credentials in Google Cloud Console
4. Check database connections and table structure

### 11. Security Considerations

- All passwords are hashed using Laravel's built-in hashing
- CSRF protection is enabled for all forms
- Session security is configured
- Input validation is implemented
- SQL injection protection through Eloquent ORM
- XSS protection through Blade templating

### 12. Next Steps

- Implement email verification
- Add password reset functionality
- Implement two-factor authentication
- Add more social login providers (Facebook, GitHub, etc.)
- Implement user profile management
- Add admin user management interface
