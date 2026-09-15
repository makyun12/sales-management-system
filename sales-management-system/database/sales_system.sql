CREATE DATABASE sales_system;
USE sales_system;
CREATE TABLE users (
user_id VARCHAR(20) PRIMARY KEY,
user_name VARCHAR(50),
password VARCHAR(255),
role VARCHAR(20)
);
CREATE TABLE products (
product_code VARCHAR(20) PRIMARY KEY,
product_name VARCHAR(100),
price INT,
stock INT
);
CREATE TABLE sales (
sales_id INT AUTO_INCREMENT PRIMARY KEY,
sales_date DATE,
product_code VARCHAR(20),
quantity INT,
total_price INT,
payment_method VARCHAR(20),
user_id VARCHAR(20),
created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE expenses (
expense_id INT AUTO_INCREMENT PRIMARY KEY,
expense_date DATE,
expense_name VARCHAR(100),
expense_amount INT,
memo VARCHAR(255),
user_id VARCHAR(20),
created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
