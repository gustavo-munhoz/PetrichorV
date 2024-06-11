<?php
global $conn;
include 'db.php';
session_start();

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT id_user FROM users WHERE username = ? OR email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    echo json_encode(["success" => false, "message" => "Username or email already exists"]);
    $stmt->close();
    exit;
}

$sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
$stmt->bind_param("sss", $username, $email, $hashedPassword);
if ($stmt->execute()) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "message" => "Failed to register user"]);
}

$stmt->close();
