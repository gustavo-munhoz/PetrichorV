<?php

include 'db.php';

session_start();

$userId = $_SESSION['userId'];

global $conn;

$sql = "SELECT id_cart FROM carts WHERE id_user = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();
$stmt->bind_result($cartId);
$stmt->fetch();
$stmt->close();

if(!$cartId){
    echo json_encode(['success' => false,'msg'=> 'Cart not found']);
}

$sql = 'DELETE FROM cart_items WHERE id_cart = ?';
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $cartId);
$result = $stmt->execute();
$stmt->close();

if ($result){
    echo json_encode(['success'=> true,'msg' => 'Purchase completed']);
} else{
    echo json_encode(['success'=> false,'msg' => 'Error clearing cart']);
}