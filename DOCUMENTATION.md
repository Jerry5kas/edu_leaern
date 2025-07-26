# EduLearn LMS - Complete Documentation

## Table of Contents
1. [Project Overview](#project-overview)
2. [Technology Stack](#technology-stack)
3. [Installation & Setup](#installation--setup)
4. [Project Structure](#project-structure)
5. [Database Schema](#database-schema)
6. [Authentication System](#authentication-system)
7. [Controllers & Routes](#controllers--routes)
8. [Views & Frontend](#views--frontend)
9. [Features & Functionality](#features--functionality)
10. [Configuration](#configuration)
11. [Development Guidelines](#development-guidelines)
12. [Deployment](#deployment)
13. [Troubleshooting](#troubleshooting)

## Project Overview

**EduLearn LMS** is a Learning Management System built with Laravel 10, designed to provide a comprehensive platform for educational content delivery and management. The system supports both student and administrator roles with Google OAuth integration for seamless authentication.

### Key Features
- **Multi-role Authentication**: Separate authentication for students and administrators
- **Google OAuth Integration**: Social login using Google accounts
- **Profile Management**: User profile updates with image upload
- **Role-based Access Control**: Permission management using Spatie Laravel Permission
- **Modern UI**: Built with Tailwind CSS and responsive design
- **Course Management**: Basic course viewing functionality

## Technology Stack

### Backend
- **PHP 8.1+**: Core programming language
- **Laravel 10.10**: PHP web framework
- **MySQL/PostgreSQL**: Database system
- **Laravel Sanctum**: API authentication
- **Laravel Socialite**: Social authentication
- **Spatie Laravel Permission**: Role and permission management

### Frontend
- **Tailwind CSS 3.4**: Utility-first CSS framework
- **Vite**: Build tool and development server
- **Blade Templates**: Laravel's templating engine
- **Alpine.js**: Lightweight JavaScript framework (if used)

### Development Tools
- **Laravel Pint**: PHP code style fixer
- **PHPUnit**: Testing framework
- **Laravel Sail**: Docker development environment

## Installation & Setup

### Prerequisites
- PHP 8.1 or higher
- Composer
- Node.js and npm
- MySQL/PostgreSQL database
- Git

### Step-by-Step Installation

1. **Clone the Repository**
   ```bash
   git clone <repository-url>
   cd edu_learn_lms
   ```

2. **Install PHP Dependencies**
   ```bash
   composer install
   ```

3. **Install Node.js Dependencies**
   ```bash
   npm install
   ```

4. **Environment Configuration**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Configure Database**
   Edit `.env` file with your database credentials:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=edu_learn_lms
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

6. **Configure Google OAuth**
   Add Google OAuth credentials to `.env`:
   ```env
   GOOGLE_CLIENT_ID=your_google_client_id
   GOOGLE_CLIENT_SECRET=your_google_client_secret
   GOOGLE_REDIRECT_URI=http://localhost:8000/auth/google/callback
   ```

7. **Run Database Migrations**
   ```bash
   php artisan migrate
   ```

8. **Seed Database (Optional)**
   ```bash
   php artisan db:seed
   ```

9. **Build Frontend Assets**
   ```bash
   npm run build
   ```

10. **Start Development Server**
    ```bash
    php artisan serve
    ```

### Quick Setup with Laravel Sail
```bash
./vendor/bin/sail up -d
./vendor/bin/sail artisan migrate
./vendor/bin/sail npm run build
```

## Project Structure

```
edu_learn_lms/
├── app/
│   ├── Console/
│   ├── Exceptions/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/
│   │   │   │   └── AdminController.php
│   │   │   ├── Auth/
│   │   │   │   ├── GoogleController.php
│   │   │   │   └── ProfileController.php
│   │   │   ├── Controller.php
│   │   │   └── HomeController.php
│   │   ├── Kernel.php
│   │   └── Middleware/
│   │       ├── Admin/
│   │       │   └── AdminMiddleware.php
│   │       └── [Other middleware files]
│   ├── Models/
│   │   ├── Admin.php
│   │   └── User.php
│   └── Providers/
├── config/
├── database/
│   ├── factories/
│   ├── migrations/
│   └── seeders/
├── public/
├── resources/
│   ├── css/
│   ├── js/
│   └── views/
│       ├── admin/
│       ├── auth/
│       ├── components/
│       ├── course/
│       └── layouts/
├── routes/
├── storage/
└── tests/
```

## Database Schema

### Users Table
```sql
CREATE TABLE users (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    email_verified_at TIMESTAMP NULL,
    password VARCHAR(255) NOT NULL,
    google_id VARCHAR(255) NULL,
    profile VARCHAR(255) NULL,
    remember_token VARCHAR(100) NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);
```

### Admins Table
```sql
CREATE TABLE admins (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);
```

### Permission Tables (Spatie Laravel Permission)
- `roles` - User roles
- `permissions` - System permissions
- `model_has_roles` - Role assignments
- `model_has_permissions` - Permission assignments
- `role_has_permissions` - Role-permission relationships

## Authentication System

### User Authentication
- **Traditional Login**: Email/password authentication
- **Google OAuth**: Social login using Google accounts
- **Session-based**: Uses Laravel's session authentication

### Admin Authentication
- **Separate System**: Independent admin authentication
- **Manual Registration**: Admin registration through dedicated form
- **Session Management**: Separate session handling for admins

### Authentication Flow

#### Google OAuth Flow
1. User clicks "Login with Google"
2. Redirected to Google OAuth consent screen
3. User authorizes the application
4. Google redirects back with authorization code
5. Application exchanges code for access token
6. User profile is retrieved and stored
7. User is logged in and redirected to dashboard

#### Admin Authentication Flow
1. Admin accesses `/admin/login`
2. Enters email and password
3. Credentials are validated against admins table
4. Admin is logged in and redirected to admin dashboard

## Controllers & Routes

### Web Routes (`routes/web.php`)

#### Public Routes
- `GET /` - Home page (login view)
- `GET /dashboard` - User dashboard
- `GET /courses` - Course listing
- `GET /courses/show` - Course details

#### Authentication Routes
- `GET /auth/login` - Google OAuth redirect
- `GET /auth/google/callback` - Google OAuth callback
- `GET /profile` - User profile page
- `POST /profile/update` - Update user profile

#### Admin Routes
- `GET /admin/login` - Admin login form
- `POST /admin/login` - Admin login processing
- `GET /admin/register` - Admin registration form
- `POST /admin/register` - Admin registration processing
- `GET /admin/dashboard` - Admin dashboard

### Controllers

#### HomeController
```php
class HomeController extends Controller
{
    public function login() // Returns welcome view
    public function dashboard() // Returns dashboard with user data
}
```

#### GoogleController
```php
class GoogleController extends Controller
{
    public function redirectToGoogle() // Redirects to Google OAuth
    public function handleGoogleCallback() // Processes OAuth callback
}
```

#### ProfileController
```php
class ProfileController extends Controller
{
    public function profile() // Shows user profile
    public function updateProfile() // Updates profile with image upload
}
```

#### AdminController
```php
class AdminController extends Controller
{
    public function loginForm() // Shows admin login form
    public function login() // Processes admin login
    public function registerForm() // Shows admin registration form
    public function register() // Processes admin registration
    public function dashboard() // Shows admin dashboard
}
```

## Views & Frontend

### Layout Structure
- **Master Layout** (`resources/views/components/layouts/master.blade.php`) - Main application layout
- **Admin Layout** (`resources/views/components/layouts/admin.blade.php`) - Admin-specific layout
- **Auth Layout** (`resources/views/components/layouts/auth.blade.php`) - Authentication layout

### Key Views

#### Public Views
- `welcome.blade.php` - Landing page with login options
- `dashboard.blade.php` - User dashboard

#### Admin Views
- `admin/login.blade.php` - Admin login form
- `admin/register.blade.php` - Admin registration form
- `admin/dashboard.blade.php` - Admin dashboard

#### Auth Views
- `auth/profile.blade.php` - User profile management

#### Course Views
- `course/index.blade.php` - Course listing
- `course/show.blade.php` - Course details

### Component Structure
```
components/
├── dashboard/
│   ├── courses.blade.php
│   ├── header.blade.php
│   ├── playlist.blade.php
│   ├── starter.blade.php
│   └── top-instructors.blade.php
├── home/
│   ├── download.blade.php
│   ├── feauture-card.blade.php
│   ├── goal.blade.php
│   └── hero.blade.php
├── layouts/
├── partials/
│   ├── footer.blade.php
│   ├── header.blade.php
│   └── nav.blade.php
└── storysets/
    └── edu1.blade.php
```

### Frontend Technologies
- **Tailwind CSS**: Utility-first CSS framework
- **Vite**: Modern build tool for fast development
- **Blade Components**: Reusable UI components
- **Responsive Design**: Mobile-first approach

## Features & Functionality

### Core Features

#### 1. User Management
- User registration and authentication
- Profile management with image upload
- Google OAuth integration
- Role-based access control

#### 2. Admin Panel
- Separate admin authentication
- Admin registration system
- Admin dashboard
- User management capabilities

#### 3. Course System
- Course listing functionality
- Course detail views
- Basic course management structure

#### 4. Profile Management
- Profile image upload
- Profile information updates
- Secure file storage

### Security Features
- **CSRF Protection**: Built-in Laravel CSRF protection
- **Password Hashing**: Secure password storage
- **Input Validation**: Request validation on all forms
- **File Upload Security**: Validated image uploads
- **Session Security**: Secure session management

## Configuration

### Environment Variables
```env
# Application
APP_NAME="EduLearn LMS"
APP_ENV=local
APP_KEY=base64:your-app-key
APP_DEBUG=true
APP_URL=http://localhost:8000

# Database
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=edu_learn_lms
DB_USERNAME=root
DB_PASSWORD=

# Google OAuth
GOOGLE_CLIENT_ID=your-google-client-id
GOOGLE_CLIENT_SECRET=your-google-client-secret
GOOGLE_REDIRECT_URI=http://localhost:8000/auth/google/callback

# File Storage
FILESYSTEM_DISK=local
```

### Key Configuration Files
- `config/app.php` - Application configuration
- `config/auth.php` - Authentication configuration
- `config/database.php` - Database configuration
- `config/services.php` - Third-party service configuration
- `config/permission.php` - Permission system configuration

## Development Guidelines

### Coding Standards
- Follow PSR-12 coding standards
- Use Laravel Pint for code formatting
- Write meaningful commit messages
- Document complex functions and classes

### Database Conventions
- Use snake_case for table and column names
- Include timestamps on all tables
- Use proper foreign key constraints
- Follow Laravel naming conventions

### Security Best Practices
- Always validate user input
- Use prepared statements (Laravel handles this)
- Implement proper authorization checks
- Sanitize file uploads
- Use HTTPS in production

### Testing
```bash
# Run all tests
php artisan test

# Run specific test file
php artisan test --filter=UserTest

# Run tests with coverage
php artisan test --coverage
```

## Deployment

### Production Requirements
- PHP 8.1+
- MySQL 8.0+ or PostgreSQL 13+
- Composer
- Node.js 16+
- Web server (Apache/Nginx)

### Deployment Steps

1. **Server Setup**
   ```bash
   # Update system
   sudo apt update && sudo apt upgrade
   
   # Install PHP and extensions
   sudo apt install php8.1 php8.1-fpm php8.1-mysql php8.1-mbstring php8.1-xml php8.1-curl
   
   # Install Composer
   curl -sS https://getcomposer.org/installer | php
   sudo mv composer.phar /usr/local/bin/composer
   
   # Install Node.js
   curl -fsSL https://deb.nodesource.com/setup_16.x | sudo -E bash -
   sudo apt-get install -y nodejs
   ```

2. **Application Deployment**
   ```bash
   # Clone repository
   git clone <repository-url> /var/www/edu_learn_lms
   cd /var/www/edu_learn_lms
   
   # Install dependencies
   composer install --optimize-autoloader --no-dev
   npm install
   npm run build
   
   # Set permissions
   sudo chown -R www-data:www-data /var/www/edu_learn_lms
   sudo chmod -R 755 /var/www/edu_learn_lms
   sudo chmod -R 775 storage bootstrap/cache
   ```

3. **Environment Configuration**
   ```bash
   cp .env.example .env
   php artisan key:generate
   # Edit .env with production settings
   ```

4. **Database Setup**
   ```bash
   php artisan migrate --force
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

5. **Web Server Configuration**

   **Nginx Configuration:**
   ```nginx
   server {
       listen 80;
       server_name your-domain.com;
       root /var/www/edu_learn_lms/public;
       
       add_header X-Frame-Options "SAMEORIGIN";
       add_header X-Content-Type-Options "nosniff";
       
       index index.php;
       
       charset utf-8;
       
       location / {
           try_files $uri $uri/ /index.php?$query_string;
       }
       
       location = /favicon.ico { access_log off; log_not_found off; }
       location = /robots.txt  { access_log off; log_not_found off; }
       
       error_page 404 /index.php;
       
       location ~ \.php$ {
           fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
           fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
           include fastcgi_params;
       }
       
       location ~ /\.(?!well-known).* {
           deny all;
       }
   }
   ```

### SSL Configuration
```bash
# Install Certbot
sudo apt install certbot python3-certbot-nginx

# Obtain SSL certificate
sudo certbot --nginx -d your-domain.com

# Auto-renewal
sudo crontab -e
# Add: 0 12 * * * /usr/bin/certbot renew --quiet
```

## Troubleshooting

### Common Issues

#### 1. Permission Errors
```bash
# Fix storage permissions
sudo chown -R www-data:www-data storage
sudo chmod -R 775 storage

# Fix cache permissions
sudo chown -R www-data:www-data bootstrap/cache
sudo chmod -R 775 bootstrap/cache
```

#### 2. Google OAuth Issues
- Verify Google OAuth credentials in `.env`
- Check redirect URI matches Google Console settings
- Ensure HTTPS is used in production

#### 3. Database Connection Issues
```bash
# Clear config cache
php artisan config:clear

# Check database connection
php artisan tinker
DB::connection()->getPdo();
```

#### 4. Asset Compilation Issues
```bash
# Clear npm cache
npm cache clean --force

# Reinstall dependencies
rm -rf node_modules package-lock.json
npm install

# Rebuild assets
npm run build
```

### Debug Mode
```bash
# Enable debug mode
APP_DEBUG=true

# View logs
tail -f storage/logs/laravel.log

# Clear all caches
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

### Performance Optimization
```bash
# Optimize for production
composer install --optimize-autoloader --no-dev
php artisan config:cache
php artisan route:cache
php artisan view:cache
npm run build
```

## Support & Maintenance

### Regular Maintenance Tasks
- Update dependencies monthly
- Monitor error logs
- Backup database regularly
- Update SSL certificates
- Monitor disk space

### Backup Strategy
```bash
# Database backup
mysqldump -u username -p database_name > backup.sql

# Application backup
tar -czf app_backup.tar.gz /var/www/edu_learn_lms

# Automated backup script
#!/bin/bash
DATE=$(date +%Y%m%d_%H%M%S)
mysqldump -u username -p database_name > backup_$DATE.sql
tar -czf app_backup_$DATE.tar.gz /var/www/edu_learn_lms
```

### Monitoring
- Set up error monitoring (Sentry, Bugsnag)
- Monitor application performance
- Set up uptime monitoring
- Configure log rotation

---

**Documentation Version**: 1.0  
**Last Updated**: January 2025  
**Maintained By**: Development Team

For additional support or questions, please refer to the Laravel documentation or contact the development team. 