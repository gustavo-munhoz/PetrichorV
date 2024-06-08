<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "petrichorv";

$conn = new mysqli($servername, $username, $password);

$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
$conn->query($sql);

$conn->select_db($dbname);

$sql = "CREATE TABLE IF NOT EXISTS users (
id_user INT AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(255) UNIQUE,
email VARCHAR(255) UNIQUE,
password VARCHAR(255)
)";
$conn->query($sql);

$sql = "CREATE TABLE IF NOT EXISTS products (
id_product INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255),
price DECIMAL(10, 2),
description VARCHAR(255),
image_url VARCHAR(255)
)";
$conn->query($sql);

$sql = "CREATE TABLE IF NOT EXISTS carts (
id_cart INT AUTO_INCREMENT PRIMARY KEY,
id_user INT,
FOREIGN KEY (id_user) REFERENCES users(id_user)
)";
$conn->query($sql);

$sql = "CREATE TABLE IF NOT EXISTS cart_itens (
id_item INT AUTO_INCREMENT PRIMARY KEY,
id_cart INT,
id_product INT,
count INT,
FOREIGN KEY (id_cart) REFERENCES carrinhos(id_cart),
FOREIGN KEY (id_product) REFERENCES produtos(id_product)
)";
$conn->query($sql);

echo "Database and tables created successfully.";
$conn->close();