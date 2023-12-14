# Clinic Management System

## Overview

The Clinic Management System is a web-based application designed to streamline and automate various aspects of clinic management. It provides functionalities for managing patients, prescriptions, bill payments, and generating revenue reports.

## Features

- **Patient Management:**
  - Add, view, edit, and delete patient records.
  - Search and filter patients.
  
- **Prescription Management:**
  - Create, view, edit, and delete prescriptions.
  
- **Bill Payment:**
  - Record and manage bill payments for patients.
  
- **User Management:**
  - Manage user accounts with roles and permissions.
  
- **Revenue Reports:**
  - Generate revenue reports based on a specified date range.

## Getting Started

### Prerequisites

Make sure you have the following software installed before setting up the Clinic Management System:

- [PHP](https://www.php.net/)
- [Laravel](https://laravel.com/)
- [MySQL](https://www.mysql.com/)
- [Composer](https://getcomposer.org/)

### Installation

1. **Clone the repository:**

   ```sh
   git clone https://git@github.com:ruchini/Clinic-Management-System.git

2. Navigate to the project directory:

    cd clinic-management-system
2. Install Composer Dependencies:
    ```sh
    composer install
3. Set Up Environment Variables:

   - Copy the .env.example file to .env and configure your database settings.
        ```sh
        DB_CONNECTION=mysql
        DB_HOST=your-database-host
        DB_PORT=your-database-port
        DB_DATABASE=your-database-name
        DB_USERNAME=your-database-username
        DB_PASSWORD=your-database-password


   - Generate an application key:

   ```sh 
   php artisan key: generate

4. Run Database Migrations and Seed the Database::
    ```sh
    php artisan migrate --seed
5. Serve the Application::
    ```sh
    php artisan serve
6. Visit http://localhost:8000 in your web browser.

## Usage

    - Log in with default credentials.
      there is one user in the system and user details are below. This user will create in the db, when migrate the db.
      user name: john
      email:john@example.com
      password: 1234567
    - Navigate through the dashboard to access different modules.
    - Manage patients, prescriptions, bill payments, and view revenue reports.
