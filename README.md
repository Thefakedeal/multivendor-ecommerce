# Multi-Vendor E-Commerce Platform

A web-based multi-vendor e-commerce platform built with Laravel. The application is designed to bring multiple sellers together in a single marketplace where customers can discover and purchase products.

## Overview

This project explores the development of an e-commerce marketplace with Laravel, focusing on server-side application development, database management, and the core workflows involved in an online shopping platform.

The multi-vendor model allows a marketplace to support multiple sellers rather than restricting product sales to a single store.

## Features

The platform is intended to support the following core e-commerce workflows:

- **Product Catalog:** Organize and display products in an online storefront.
- **Multi-Vendor Marketplace:** Structure the application around multiple sellers.
- **User Authentication:** Manage user registration and login.
- **Product Management:** Support product creation and management.
- **Shopping Experience:** Provide a foundation for browsing and purchasing products.
- **Database Integration:** Store and manage application data using Laravel's database tools.

*Note: Confirm each feature against the current implementation before treating this list as a complete description of the application.*

## Technology Stack

| Technology | Purpose |
|---|---|
| PHP | Server-side programming |
| Laravel 8 | Web application framework |
| Laravel UI | Authentication and frontend scaffolding |
| MySQL | Relational database, if configured |
| Composer | PHP dependency management |
| Node.js and npm | Frontend asset dependencies and build tools |
| Spatie Laravel Sluggable | Slug generation for supported models |

## Getting Started

Follow these steps to set up the project locally.

### Prerequisites

Make sure you have the following installed:

- PHP version compatible with the project
- Composer
- Node.js and npm
- A database supported by Laravel

### 1. Clone the Repository

```bash
git clone https://github.com/Thefakedeal/multivendor-ecommerce.git
cd multivendor-ecommerce
```

### 2. Install PHP Dependencies

```bash
composer install
```

### 3. Configure Environment Variables

Create your local environment file:

```bash
cp .env.example .env
```

Open `.env` and configure the application and database settings for your environment.

For a MySQL database, the configuration typically looks like this:

```env
APP_NAME="Multi-Vendor E-Commerce"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
```

Replace the database placeholders with your local configuration.

### 4. Generate the Application Key

```bash
php artisan key:generate
```

### 5. Run Database Migrations

Create the database specified in your environment configuration, then run:

```bash
php artisan migrate
```

If the project includes seeders for sample data, you can populate the database with:

```bash
php artisan db:seed
```

### 6. Install Frontend Dependencies

If you want to compile the project's frontend assets, install the npm dependencies:

```bash
npm install
```

Use the build command defined in `package.json`. For example:

```bash
npm run dev
```

### 7. Start the Development Server

```bash
php artisan serve
```

Open the application at:

http://localhost:8000

## Project Structure

The application follows Laravel's conventional project structure.

```text
multivendor-ecommerce/
├── app/
│   ├── Console/
│   ├── Exceptions/
│   ├── Http/
│   │   ├── Controllers/
│   │   └── Middleware/
│   ├── Models/
│   └── Providers/
├── bootstrap/
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
├── routes/
│   ├── api.php
│   ├── channels.php
│   ├── console.php
│   └── web.php
├── storage/
├── tests/
├── .env.example
├── artisan
├── composer.json
└── package.json
```

Some directories and files may differ depending on the current implementation.

## Development

Laravel provides several commands to help with development.

Clear the application cache:

```bash
php artisan cache:clear
```

Clear the configuration cache:

```bash
php artisan config:clear
```

Run the automated tests:

```bash
php artisan test
```

## Future Improvements

Potential areas for further development include:

- Enhanced product search and filtering
- Vendor dashboards and store management
- Order tracking and fulfillment workflows
- Payment gateway integration
- Product ratings and reviews
- Administrative reporting and analytics
- Automated testing and performance optimization

These are potential enhancements, not a statement that they are currently implemented.

## Author

**Samir Shrestha**

- GitHub: [@Thefakedeal](https://github.com/Thefakedeal)
- Portfolio: [samirshrestha.info.np](https://samirshrestha.info.np)
- LinkedIn: [Samir Shrestha](https://www.linkedin.com/in/samir-shrestha-16050a210)

---

Built with Laravel.
