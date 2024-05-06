# PHP User Registration and File Management Project

![Screenshot](C:\Users\User\Desktop\wbp project\screenshots\register.png)
![Screenshot](C:\Users\User\Desktop\wbp project\screenshots\signin.png)
![Screenshot](C:\Users\User\Desktop\wbp project\screenshots\dashboard.png)


This PHP project provides user registration, login, and file management functionalities. It aims to ensure security through password hashing, prevent XSS attacks, and allow users to securely upload and download files.

## Features

- **User Registration**: Allows users to register with a username and password.
- **Secure Password Storage**: Utilizes password hashing to securely store user passwords.
- **Session Management**: Implements session management for user authentication.
- **XSS Attack Prevention**: Includes functions to prevent XSS attacks when handling user input.
- **File Upload**: Allows authenticated users to upload files securely.
- **Dashboard**: Displays uploaded files in a user-friendly dashboard interface.
- **File Download**: Authenticated users can download their uploaded files.
- **User Logout**: Provides an option for users to log out securely.

## Getting Started

To set up this project locally, follow these steps:

1. Clone the repository:
   ```sh
   git clone git@github.com:Neeraj-gupta2005/php_repository.git
   
2. Set up a web server environment (e.g., Apache, Nginx) with PHP and MySQL support.

3. Import the database schema provided in the `database.sql` file to set up the required database tables.

4. Configure the database connection settings in the appropriate files (e.g., `connection.php`).

5. Access the project through your web browser and start using the registration, login, and file management features.

Usage
-----

1. **User Registration**: Visit the registration page to create a new account.
2. **User Login**: Log in using your registered username and password.
3. **File Upload**: Once logged in, navigate to the file upload page to securely upload files.
4. **Dashboard**: View your uploaded files in the dashboard.
5. **File Download**: Download your uploaded files from the dashboard.
6. **User Logout**: Click on the logout button to securely log out from your account.

Security
--------

- Always use strong, unique passwords for user accounts.
- Regularly update the project dependencies and review security best practices.
- Monitor and audit user input to prevent potential security vulnerabilities.


Contact
-------

For questions, support, or feedback, please contact neerajKgupta33@gmail.com .

Acknowledgements
----------------

This project uses Font Awesome icons for its user interface.
