<?php

include 'db.php';

function addToCart($userId, $productId, $quantity) {
    global $conn;  // Supõe que você já tenha uma conexão aberta disponível

    // Verifica se o usuário já tem um carrinho
    $sql = "SELECT id_cart FROM carts WHERE id_user = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Pega o id_cart se já existir
        $row = $result->fetch_assoc();
        $cartId = $row['id_cart'];
    } else {
        // Cria um novo carrinho se não existir
        $sql = "INSERT INTO carts (id_user) VALUES (?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $cartId = $stmt->insert_id;  // Pega o ID do novo carrinho criado
    }

    // Verifica se o produto já está no carrinho
    $sql = "SELECT * FROM cart_items WHERE id_cart = ? AND id_product = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $cartId, $productId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Se já está no carrinho, atualiza a quantidade
        $sql = "UPDATE cart_items SET count = count + ? WHERE id_cart = ? AND id_product = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iii", $quantity, $cartId, $productId);
    } else {
        // Se não está no carrinho, adiciona como um novo item
        $sql = "INSERT INTO cart_items (id_cart, id_product, count) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iii", $cartId, $productId, $quantity);
    }
    $stmt->execute();

    echo "Item added to cart successfully.";
}
