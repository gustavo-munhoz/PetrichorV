<?php
global $conn;
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['password'])) {
    $userInput = $_POST['username'];
    $passInput = $_POST['password'];

    $sql = "SELECT id_user, password FROM users WHERE username = ? OR email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $userInput, $userInput);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($passInput, $row['password'])) {
            $_SESSION['loggedIn'] = true;
            $_SESSION['userId'] = $row['id_user'];
            echo json_encode(["success" => true, "user_id" => $row['id_user']]);
        } else {
            echo json_encode(["success" => false, "message" => "Invalid password"]);
        }
    } else {
        echo json_encode(["success" => false, "message" => "User not found"]);
    }
    $stmt->close();
} else {
    echo json_encode(["success" => false, "message" => "Invalid request"]);
}
