# Wanderlust Airline — Monorepo

Demo app to manage **flights and passengers**.  
This monorepo contains a **PHP backend (Apache)** and some **frontend** assets/examples.

## ✨ Features
- Home page with links:
  - Passenger and Flight Report
  - Passenger Entry Form
- MySQL connection (sample DB: `airportdb`)
- Clean URLs via Apache `.htaccess`

## 📁 Project structure
Wonderlust/
├── backend/ # PHP backend code
│ ├── public/ # DocumentRoot (index.php, assets, pages)
│ │ └── .htaccess
│ ├── config/ # config.php + .env (not in git)
│ └── .env.example
├── frontend/ # static/front-end materials
└── database/
└── schema.sql # SQL dump creating sample DB airportdb

markdown
Copy code

## 🧰 Requirements
- PHP 8.1+ with Apache (XAMPP/MAMP/WAMP **or** Docker)
- MySQL/MariaDB 10.4+
- Git
- (optional) Node.js if you want to work on `frontend/`

## 🚀 Quick start (XAMPP / Windows)
1. **Import the database**  
   Open `http://localhost/phpmyadmin` → **Import** → choose `database/schema.sql`.  
   You should see a DB named **`airportdb`** with tables.

2. **Environment variables**  
   Copy `backend/.env.example` → `backend/.env` and set:
   ```env
   APP_ENV=local
   APP_URL=http://localhost

   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_NAME=airportdb
   DB_USER=root
   DB_PASS=
Apache DocumentRoot
XAMPP → Apache → Config → httpd.conf

apache
Copy code
DocumentRoot "C:/.../wonderlust/backend/public"
<Directory "C:/.../wonderlust/backend/public">
  AllowOverride All
  Require all granted
</Directory>
Ensure mod_rewrite is enabled (the line LoadModule rewrite_module ... not commented).
Restart Apache.

Open the app → http://localhost

## 💡 Does the database only work with XAMPP?
No. XAMPP is just a local bundle. The app works with any MySQL server (Docker, hosting provider, VPS).
Use the correct credentials in backend/.env:

Local XAMPP: DB_HOST=127.0.0.1, user root, usually empty password

Docker: DB_HOST=db (service name)

Production host: provider’s host/user/password/DB name

## 🐳 Optional: Docker (dev)
Example docker-compose.yml:

yaml
Copy code
version: "3.9"
services:
  db:
    image: mysql:8
    environment:
      MYSQL_DATABASE: airportdb
      MYSQL_ROOT_PASSWORD: root
    ports:
      - "3306:3306"
  web:
    image: php:8.2-apache
    volumes:
      - ./backend:/var/www/html
    ports:
      - "8080:80"
Start with:

bash
Copy code
docker compose up -d
Then open http://localhost:8080.

## 🔐 Security / Secrets

Never commit credentials: keep them in backend/.env (already git-ignored).

If you ever use Google/Maps keys in the browser, restrict them in Google Cloud (HTTP referrers + only the APIs you use).

If a secret leaked in the repo: rotate/delete it at the provider, remove from code, and (optionally) clean git history.

🧪 DB connection test (optional)
Create backend/public/db-test.php:

php
Copy code
<?php
require_once __DIR__ . '/../config/config.php';
$mysqli = @new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, (int)DB_PORT);
echo $mysqli->connect_errno ? 'KO: '.$mysqli->connect_error : 'OK: '.DB_NAME;
Visit http://localhost/db-test.php and delete the file after testing.

## 📦 Deploy (production)
Shared hosting (Apache + PHP + MySQL)

Upload only backend/

Set DocumentRoot to backend/public

Create/import DB, set correct credentials in backend/.env

Enable HTTPS (provider panel)

VPS

Install Apache + PHP 8.2 + MySQL

Clone repo to /var/www/wonderlust

VirtualHost pointing to /var/www/wonderlust/backend/public

Put production .env, restart Apache

## 📝 License
MIT

👤 Author
Tommaso Rea (Famirtom)
