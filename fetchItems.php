<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);


function fetchItems() {
    $url = "https://riskofrain2api.herokuapp.com/api/everyItem";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    if (!$response) {
        die('Erro na chamada cURL: ' . curl_error($ch));
    }

    curl_close($ch);

    $items = json_decode($response, true);
    return processItems($items);
}

function processItems($items) {
    $processedItems = [];
    foreach ($items as $item) {
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
        case 'Orange' || "Blue":
            return 20.00;
        case 'Red':
            return 30.00;
        case 'Yellow' || "Purple":
            return 25.00;
        default:
            return 5.00;
    }
}
