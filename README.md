
# 🐘 PHP + MySQL Web Application

This project is a web-based application built using PHP and MySQL. It demonstrates CRUD operations (Create, Read, Update, Delete), user authentication, and database interaction with a simple and clean interface.

## 📌 Features

* User Registration & Login System
* Role-based Authentication (Admin, User, etc.)
* MySQL Database Integration
* CRUD Operations (Add, Edit, Delete, View Records)
* File/Image Upload (if applicable)
* Responsive UI using Bootstrap
* Error Handling and Validation
* Secure Password Hashing
* Session Management

## 🛠️ Technologies Used

* **Frontend:** HTML, CSS, Bootstrap
* **Backend:** PHP (v8.x)
* **Database:** MySQL (v8.x)
* **Web Server:** Apache (XAMPP/LAMP/WAMP recommended)

## 🗃️ Folder Structure

```
/your-project/
├── config/            # Database & session config
├── includes/          # Header, footer, reusable components
├── assets/            # CSS, images, JS
├── dashboard/         # Protected user area
├── index.php          # Landing/Login page
├── register.php       # Registration form
├── login.php          # Login script
├── logout.php         # Logout script
└── README.md          # This file
```

## ⚙️ Installation

1. **Clone the repository:**

   ```
   git clone https://github.com/your-username/your-project.git
   ```

2. **Move the project to your XAMPP/WAMP `htdocs` folder.**

3. **Create a database:**

   * Open phpMyAdmin
   * Create a database (e.g., `myapp_db`)
   * Import the `database.sql` file (if provided)

4. **Configure database connection:**

   * Open `config/db.php`
   * Set your database credentials:

     ```php
     $host = 'localhost';
     $db   = 'myapp_db';
     $user = 'root';
     $pass = '';
     ```

5. **Start Apache and MySQL using XAMPP/WAMP.**

6. **Visit the project:**

   ```
   http://localhost/your-project/
   ```

## 🔐 Default Roles & Credentials (Optional)

| Role  | Email                                         | Password |
| ----- | --------------------------------------------- | -------- |
| Admin | [admin@example.com](mailto:admin@example.com) | admin123 |
| User  | [user@example.com](mailto:user@example.com)   | user123  |

> You can change or remove these in the database or through the UI.

## 🧪 Testing & Usage

* Register a new user or log in with test credentials.
* Try performing add/edit/delete actions.
* Logout and test access control for restricted pages.



