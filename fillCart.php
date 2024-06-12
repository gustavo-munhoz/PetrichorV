<?php

include 'db.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);

function fetchCart($userId){
    global $conn;

    $sql = 'SELECT id_cart FROM carts WHERE id_user = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $stmt->bind_result($cartId);
    $stmt->fetch();
    $stmt->close();

    if (!$cartId){
        return [];
    }

    $sql = "SELECT id_product, count FROM cart_items WHERE id_cart = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $cartId);
    $stmt->execute();
    $result = $stmt->get_result();
    $items = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();

    if(empty($items)){
        return [];
    }

    $productDetails = [];
    $itemIds = array_column($items, 'id_product');
    $placeholders = implode(',', array_fill(0, count($itemIds),'?'));
    $types = str_repeat('i', count($itemIds));

    $sql = "SELECT id_product, name, price, color, description, image_url FROM products WHERE id_product IN ($placeholders)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param($types, ...$itemIds);
    $stmt->execute();
    $result = $stmt->get_result();
    $products = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();

    foreach ($products as $product){
        foreach($items as $item){
            if($product['id_product'] == $item['id_product']){
                $productDetails[] = [
                    'id' => $product['id_product'],
                    'image' => $product['image_url'],
                    'name' => $product['name'],
                    'price' => $product['price'],
                    'quantity' => $item['count']
                ];
            }
        }
    }

    return $productDetails;
}
