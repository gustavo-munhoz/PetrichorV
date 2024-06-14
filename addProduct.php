<?php

include 'db.php';

global $conn;

$name = $_POST['productName'];
$description = $_POST['productDescription'];
$color = $_POST['productColor'];
$price = $_POST['productPrice'];
$image = $_FILES['productImage'];

$imageFileName = uniqid('image_') . '_' . $image['name'];

$targetDirectory = 'images/';

$targetFilePath = $targetDirectory . $imageFileName;

if(move_uploaded_file($image['tmp_name'], $targetFilePath)){

    $sql = "INSERT INTO products (name, color, description, image_url, price) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssd", $name, $color, $description, $targetFilePath, $price);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Product added successfully.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to add product: ' . $stmt->error]);
    }
} else {
    $error = error_get_last();
    echo json_encode(['success' => false, 'message' => 'Failed to upload image to path: ' . $targetFilePath, 'error' => $error['message']]);
}