<?php

include 'db.php';

global $conn;

$itemId = $_POST['itemId'];

$response = ['success' => false, 'message' => ''];

try {
    // Prepare and execute the first delete statement
    $sql = 'DELETE FROM cart_items WHERE id_product = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $itemId);
    $stmt->execute();

    if ($stmt->affected_rows > 0 || $stmt->errno == 0) {
        // Prepare and execute the second delete statement
        $sql = 'DELETE FROM products WHERE id_product = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $itemId);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $response['success'] = true;
            $response['message'] = 'Item removed successfully from products and carts.';
        } else {
            $response['message'] = 'Item removed from carts but failed to remove from products.';
        }
    } else {
        $response['message'] = 'Failed to remove item from .';
    }

    $stmt->close();
} catch (Exception $e) {
    $response['message'] = 'An error occurred: ' . $e->getMessage();
}

header('Content-Type: application/json');

echo json_encode($response);