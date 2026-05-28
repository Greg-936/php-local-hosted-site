# Classic PHP Site

A small beginner-friendly PHP website built with XAMPP, reusable includes, and a contact form.

## Run Locally
1. Place the project folder in XAMPP's document root:
   - `C:\xampp\htdocs\classic-php-site`
2. Start XAMPP and enable both services:
   - Apache
   - MySQL
3. Open in your browser:
   - `http://localhost/classic-php-site`

## Database Setup
1. Open phpMyAdmin or use MySQL CLI.
2. Create the database:

```sql
CREATE DATABASE classic_php_site CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```
3. Use the database and create the messages table:

```sql
USE classic_php_site;

CREATE TABLE messages (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(150) NOT NULL,
  message TEXT NOT NULL,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Database Configuration
The database connection settings are stored in `includes/db.php`.
Default values:
- host: `localhost`
- user: `root`
- password: `` (empty)
- database: `classic_php_site`

If your setup differs, update `includes/db.php` accordingly.

## Contact Form
- `contact.php` now saves validated messages to MySQL.
- The form validates empty fields and email format.
- Successful saves display a confirmation message.
- If the database is unavailable, the page shows a helpful error.

## Notes
- Keep the design classic and simple.
- If Apache fails to start, check for port conflicts on `80` or `443`.
- If PHP code appears raw in the browser, ensure you access the site using `http://localhost/...`.
