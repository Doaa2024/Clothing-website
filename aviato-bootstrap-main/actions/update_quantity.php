<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = $_POST['id'];
    $productSize = $_POST['size'];
    $newQuantity = $_POST['quantity'];

    // Validate input (optional)
    // Example: Check if $newQuantity is numeric and greater than zero

    // Update cart session data
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as &$cart_item) {
            if ($cart_item['id'] === $productId && $cart_item['size'] === $productSize) {
                $cart_item['quantity'] = $newQuantity;
                break; // Stop the loop once the item is found and updated
            }
        }
    }
}
