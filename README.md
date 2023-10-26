# Authentication with MVC PHP and MySQL Database

Welcome to our project on Authentication with MVC PHP and MySQL Database. This project provides a strong foundation for implementing an authentication system in your web applications.

## Database Configuration

- Copy the `.env_example` file as `.env`.
- Add your database information in the `.env` file.

## Importing the Database

- Create a new MySQL database.
- Import the `users.sql` file located in the `/database` directory to set up the database structure with sample data.
-  admin account "admin@test.com" --- password "123456"
-  user account "user@gmail.com"  --- password "123456"

## Installing Dependencies

Make sure you have Composer installed on your system, then execute the following command:

```bash
composer install
```


This will load the required files and dependencies, including AltoRouter specified in the `composer.json` file.

## Starting the Project

- Navigate to the `/public` directory using the following command:

```bash
cd public/
```


- Run a local PHP server using the following command:

```bash
php -S localhost:8000
```


This will start the project, and you can access it by opening a browser and visiting the URL `http://localhost:8000`.

Feel free to explore the code to understand the application's structure and functionality.

---

Don't forget to check the project's license for usage and distribution terms.
