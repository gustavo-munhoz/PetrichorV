<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "petrichorv";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if (!$conn->query($sql)) {
    die("Error creating database: " . $conn->error);
}

$conn->select_db($dbname);

$sql = "CREATE TABLE IF NOT EXISTS users (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) UNIQUE,
    email VARCHAR(255) UNIQUE,
    password VARCHAR(255)
)";
if (!$conn->query($sql)) {
    die("Error creating table users: " . $conn->error);
}

$sql = "CREATE TABLE IF NOT EXISTS products (
    id_product INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    price DECIMAL(10, 2),
    color VARCHAR(255),
    description VARCHAR(1024),
    image_url VARCHAR(255)
)";
if (!$conn->query($sql)) {
    die("Error creating table products: " . $conn->error);
}

$sql = "CREATE TABLE IF NOT EXISTS carts (
    id_cart INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT,
    FOREIGN KEY (id_user) REFERENCES users(id_user)
)";
if (!$conn->query($sql)) {
    die("Error creating table carts: " . $conn->error);
}

$sql = "CREATE TABLE IF NOT EXISTS cart_items (
    id_item INT AUTO_INCREMENT PRIMARY KEY,
    id_cart INT,
    id_product INT,
    count INT,
    FOREIGN KEY (id_cart) REFERENCES carts(id_cart),
    FOREIGN KEY (id_product) REFERENCES products(id_product)
)";
if (!$conn->query($sql)) {
    die("Error creating table cart_items: " . $conn->error);
}