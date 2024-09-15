<?php
$product = getrow("products",$_GET['id']);
$card_item = [
    "title" => $product['title'],
    "price" => $product['price'],
    "quantity" => 1,
    "image" => $product['image'],
    "total" => $product['price']
];
$_SESSION['card'][$product['id']] = $card_item;
$_SESSION['added-to-card'] = "Item Added To Card";
redirect("shop");