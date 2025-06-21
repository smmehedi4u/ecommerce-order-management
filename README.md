# Ecommerce Application

This is a basic setup guide with database seeders included for initial data population.

## Requirements

- PHP >= 8.2
- Composer
- MySQL or any other supported database

## Installation

Follow these steps to set up the project on your local machine:

### 1. Clone the repository

```bash
git clone https://github.com/smmehedi4u/ecommerce-order-management.git
cd ecommerce-order-management
````

### 2. Install dependencies

```bash
composer install
```

### 3. Create a `.env` file

```bash
cp .env.example .env
```

Update `.env` with your database credentials and other environment-specific values.

### 4. Generate application key

```bash
php artisan key:generate
```

### 5. Run migrations and seeders

```bash
php artisan migrate --seed
```

This command will create the necessary database tables and populate them with sample data.

### 6. Run the development server

```bash
php artisan serve
```

Visit `http://localhost:8000` in your browser to view the application.

Super Admin: `superadmin@example.com`<br>
Admin: `admin@example.com`<br>
Outlet1: `outlet1@example.com`<br>
Outlet2: `outlet2@example.com`<br>

Password: `12345678`

## Additional Commands

### Running only seeders

```bash
php artisan db:seed
```

### Refresh migrations and seed again

```bash
php artisan migrate:refresh --seed
```
