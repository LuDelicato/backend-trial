# backend-trial

must have xampp or another similar program to use MySQL db.
must run composer install
run composer require vlucas/phpdotenv

Need to create the db:
CREATE DATABASE IF NOT EXISTS sharesolutions;

Need to create table:
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    sku VARCHAR(50) UNIQUE NOT NULL,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    description TEXT
);

run from public folder the index.php
Have fun!

