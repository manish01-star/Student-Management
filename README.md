<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

<p align="center">
  <a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Student Management System (Laravel)

A full-featured **Student Management System** built with **Laravel**, **PHP**, **MySQL**, and **JavaScript**.  
This project allows you to manage students, track attendance, add/edit/delete student records, and includes a simple admin panel.

---

## Features

- User-friendly interface
- Add, edit, delete student records
- Upload student profile photos
- Database-driven CRUD operations
- Responsive design (desktop + mobile)
- Admin panel for management

---

## Installation / Setup

Follow these steps to run the project locally:

1. **Clone the repository**  
```bash
git clone https://github.com/manish01-star/Student-Management.git
cd Student-Management

# Install PHP dependencies using Composer
composer install

# Create .env file from example
copy .env.example .env  # For Windows
php artisan key:generate

# Configure database in .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=student_management
DB_USERNAME=root
DB_PASSWORD=

## Database Setup

1. Open phpMyAdmin (XAMPP).  
2. Create a new database: `student_management`.  
3. Go to **Import** tab → choose `Database/student_management.sql` → click **Go**.  
4. Update `.env` database credentials if needed.  
5. Run migrations & seeders if necessary:
```bash
php artisan migrate --seed

# Serve project locally
php artisan serve


# Open your browser at: http://127.0.0.1:8000