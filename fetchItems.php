<?php
include 'db.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);


function fetchItems() {
    global $conn;

    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);

    if (!$result) {
        echo "Error: " . $conn->error;
    } else {
        if ($result->num_rows > 0) {
            $items = [];
            while ($row = $result->fetch_assoc()) {
                $item = new stdClass();
                $item->id = $row['id_product'];
                $item->name = $row['name'];
                $item->color = $row['color'];
                $item->description = $row['description'];
                $item->image = $row['image_url'];
                $item->price = $row['price'];
                $items[] = $item;
            }
        } else {
            $url = "https://riskofrain2api.herokuapp.com/api/everyItem";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            if (!$response) {
                die('Erro na chamada cURL: ' . curl_error($ch));
            }
            curl_close($ch);
            $apiItems = json_decode($response, true);

            $items = processItems($apiItems);
            foreach ($items as $item) {
                $sql = "INSERT INTO products (name, color, description, image_url, price) VALUES (?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssssd", $item->name, $item->color, $item->description, $item->image, $item->price);
                $stmt->execute();
            }
        }
        return $items;
    }
}

function processItems($apiItems) {
    $processedItems = [];
    foreach ($apiItems as $item) {
        $processedItem = new stdClass();
        $processedItem->name = $item['itemName'];
        $processedItem->color = $item['color'];
        $processedItem->description = $item['description'];
        $processedItem->image = $item['itemImage'];
        $processedItem->price = determinePrice($item['color']);
        $processedItems[] = $processedItem;
    }
    return $processedItems;
}

function determinePrice($color) {
    switch ($color) {
        case 'White':
            return 10.00;
        case 'Green':
            return 15.00;
        case 'Orange':
        case "Blue":
            return 20.00;
        case 'Red':
            return 30.00;
        case 'Yellow':
        case "Purple":
            return 25.00;
        default:
            return 5.00;
    }
}