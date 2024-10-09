# Laravel Blog Application

This is a simple blog application built with Laravel that allows users to register, create posts, and comment on them.

## Table of Contents

- [Requirements](#requirements)
- [Installation](#installation)
- [Environment Configuration](#environment-configuration)
- [Database Migration and Seeding](#database-migration-and-seeding)
- [Usage](#usage)

## Requirements

Before you begin, ensure you have met the following requirements:

- PHP >= 8.0
- Composer
- A web server (e.g., Apache, Nginx) or Laravel
- MySQL DB

## Installation

1. **Clone the Repository**:

   ```bash
   git clone https://github.com/159753x/new-blog-app.git
   cd new-blog-app
   ```

2.Install Composer Dependencies:

Run the following command to install the required PHP packages:

  
   ```bash 
   composer install
   ```

## Environment Configuration

1. Copy the Example Environment File:

Create a copy of the .env.example file and rename it to .env

It should include something like this:

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=blogapp
DB_USERNAME=root
DB_PASSWORD=
```
## Database Migration and Seeding

Use the following command to create the necessary database tables:
```bash
php artisan migrate
php artisan db:seed
```
This command will run the seeder classes defined in your application.

## Usage

You can now serve the application with:
```bash
php artisan serve
```

Your instance of application should be available at http://localhost:8000.



   
