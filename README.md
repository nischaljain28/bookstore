<H1 align="center">Bookstore</H1>

## About

This is a simple book management system built with Laravel. It allows users to add, edit, and delete books, as well as search for books by title, author, or genre.

## Technologies Used

* PHP 8
* Laravel 9
* MySQL
* Bootstrap


## Getting Started

To get started with this project, follow these steps:

1. Clone the repository to your local machine using the command 
```bash
git clone https://github.com/example/book-management-system.git
```

2. Navigate to the project directory using the command
```bash
cd bookstore
```

3. Create a .env file by copying the .env.example file and filling in the necessary database credentials: 
```bash
cp .env.example .env
```

4. Install the required dependencies using the command
```bash
composer install
```

5. Generate a new application key using the command
```bash
php artisan key:generate
```
6. Create a Database name *bookstore* using the following mysql command
```sql
CREATE DATABASE bookstore;
```

7. Run the database migrations using the command 
```bash
php artisan migrate
```

8. Seed the database with some sample data using the command 
```bash
php artisan db:seed
```

9. Start the server using the command 
```bash
php artisan serve.
```

10. Login Using the following Credentials 
    * ### Admin
        - *UserName* : admin@bookstore.com
        - *password* : password
    * ### User
        - *UserName* : user@bookstore.com
        - *password* : password

## Usage

Once the application is up and running, you can use the following features:

- View a list of all books
- Search for books by title, author, isbn, genre in Date range
- Add a new book
- Edit an existing book
- Delete a books