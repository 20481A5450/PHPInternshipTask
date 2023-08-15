# User Registration and Login System

This project demonstrates a simple user registration and login system using PHP, MySQL, and regular expressions for form validation. It includes responsive registration and login pages with client-side and server-side validation.

## Features

- User registration with fields: Name, Email, Password, Address, Phone Number
- Password hashing for security
- User login with email and password
- Regular expression-based form validation for email and password
- MySQL database for data storage

## Project Structure

- login.html: Login page HTML with client-side validation and link to registration page.
- registration.html: Registration page HTML with client-side validation and link to login page.
- register.php: PHP script to handle user registration and store data in the MySQL database.
- login.php: PHP script to handle user login and validate credentials against the database.
- style.css: CSS stylesheet for styling the login and registration pages.
- README.md: Project documentation (you're reading it now).

## Getting Started

1. Set up a web server with PHP and MySQL support (e.g., XAMPP, WAMP, MAMP, or a cloud hosting platform).
2. Create a MySQL database and update database credentials in register.php and login.php.
3. Place the HTML, PHP, and CSS files in your web server's root directory (e.g., htdocs or www folder).
4. Access the login page (login.html) and registration page (registration.html) in your web browser.

## Usage

1. Access the login page by navigating to http://localhost/login.html in your web browser.
2. If you don't have an account, click the "Register here" link to navigate to the registration page (registration.html).
3. Fill out the registration form with valid information and click the "Register" button.
4. Upon successful registration, you'll be redirected to the login page.
5. Enter your registered email and password to log in.

## Notes

- For security reasons, consider using HTTPS when deploying on a live server.
- This project provides a basic demonstration and should be enhanced with additional security measures for production use.
