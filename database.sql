CREATE DATABASE zakat_app;
USE zakat_app;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100),
    email VARCHAR(100),
    password VARCHAR(255)
);

CREATE TABLE assets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    year INT,
    gold DECIMAL(10,2),
    silver DECIMAL(10,2),
    cash DECIMAL(10,2),
    zakat_payable DECIMAL(10,2),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);