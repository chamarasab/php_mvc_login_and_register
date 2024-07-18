# PHP API Project

This project is a simple PHP API for user registration and login. It is structured using an MVC pattern with a custom routing system.

## Table of Contents

- [Installation](#installation)
- [Directory Structure](#directory-structure)
- [Configuration](#configuration)
- [Usage](#usage)
- [API Endpoints](#api-endpoints)
- [Contributing](#contributing)
- [License](#license)

## Installation

1. **Clone the repository**:

   ```sh
   git clone https://github.com/yourusername/your-repo-name.git
   cd your-repo-name
   ```

2. **Install Composer dependencies**:
   Ensure you have [Composer](https://getcomposer.org/) installed. Then, run:

   ```sh
   composer install
   ```

3. **Set up your environment**:

   - Create a MySQL database for the project.
   - Update the database credentials in `src/config/config.php`.

4. **Run the PHP built-in server**:
   ```sh
   php -S localhost:8000 -t public
   ```

## Directory Structure

```
/your-api-project
│
├── /public
│   └── index.php
│
├── /src
│   ├── /controllers
│   │   └── UserController.php
│   ├── /models
│   │   └── UserModel.php
│   ├── /routes
│   │   └── web.php
│   ├── /core
│   │   ├── Router.php
│   │   ├── Controller.php
│   │   ├── Model.php
│   │   └── View.php
│   ├── /middlewares
│   │   └── AuthMiddleware.php
│   ├── /helpers
│   │   └── ResponseHelper.php
│   └── /config
│       └── config.php
│
├── /logs
│   └── app.log
│
└── composer.json
```

## Configuration

Update the database configuration in `src/config/config.php`:

```php
<?php

return [
    'db' => [
        'host' => 'localhost',
        'dbname' => 'your_database',
        'user' => 'your_username',
        'pass' => 'your_password'
    ],
    'log_file' => __DIR__ . '/../../logs/app.log'
];
?>
```

## API Endpoints

- Register

  - URL: /register
  - Method: POST
  - Body: JSON

  ```
  {
      "name": "John Doe",
      "email": "john.doe@example.com",
      "password": "securepassword"
  }
  ```

  - Response

  ```
    {
        "message": "User registered successfully"
    }
  ```

- Login

  - URL: /login
  - Method: POST
  - Body: JSON

  ```
    {
      "email": "john.doe@example.com",
      "password": "securepassword"
    }
  ```

      - Response
      ```
      {
        "message": "Login successful",
        "user": {
            "id": 1,
            "name": "John Doe",
            "email": "john.doe@example.com",
            "logged_at": "2024-07-18 12:34:56"
            }
        }
      ```
