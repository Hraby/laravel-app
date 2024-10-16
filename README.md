# Laravel App
Booking web app build with Laravel

# Instalation
## Requirements
- PHP 8.1 or higher
- Composer
- Node.js and NPM
## Steps to Install and Run

### Install PHP dependencies

Install all required PHP dependencies using Composer:

```
composer install
```

### Install JavaScript dependencies

Install all required NPM dependencies for the frontend:

```
npm install
```

### Set up the environment

Copy the .env.example file to .env and update the environment settings as needed:

```
cp .env.example .env
```

Then, generate an application key:

```
php artisan key:generate
```

### Set up the database

Update the .env file with your database credentials. Then, run the following commands to create the tables and seed the database:

```
php artisan migrate
php artisan db:seed
```
### Start the development server

Run the following command to start the Laravel development server:
```
php artisan serve
```
This will serve the app on http://localhost:8000.

### Build the frontend assets

To compile and build the frontend assets (CSS, JavaScript, etc.), run the following command:

```
npm run dev
```

### Access the application

Open your browser and go to http://localhost:8000 to view the application.

# Routes
Basic site routes.


| **URL**                     | **Description**                                 | **View Path**                                      |
|-----------------------------|-------------------------------------------------|----------------------------------------------------|
| `/`             | Homepage         | `resources/views/index.blade.php`             |
| `/dashboard`                | Dashboard for authenticated users (admin area). | `resources/views/dashboard/index.blade.php`        |
| `/dashboard/hotel`         | List of hotels.                                 | `resources/views/dashboard/hotel/index.blade.php`  |
| `/dashboard/hotel/create`   | Create a new hotel.                             | `resources/views/dashboard/hotel/create.blade.php` |
| `/dashboard/hotel/{hotel}/edit` | Edit a specific hotel.                      | `resources/views/dashboard/hotel/edit.blade.php`   |
| `/dashboard/reservations` | List of reservations.                      | `resources/views/dashboard/reservations/index.blade.php`   |
| `/hotel/{slug}`             | Show hotel details.           | `resources/views/hotel/show.blade.php`             |
| `/hotel`             | Search hotels           | `resources/views/hotel/index.blade.php`             |
| `/reservations`             | My reservations          | `resources/views/reservations/index.blade.php`             |
