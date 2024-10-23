<?php
$lifetime = 60 * 60 * 24 * 30; // 30 days
session_set_cookie_params($lifetime);
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $size = $_POST['size'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $product = array(
        'id' => $id,
        'size' => $size,
        'quantity' => $quantity,
        'price' => $price
    );

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    $product_found = false;
    $product_added = true;

    // Update quantity if product already in cart
    foreach ($_SESSION['cart'] as &$cart_product) {
        if ($cart_product['id'] == $id && $cart_product['size'] == $size) {
            $cart_product['quantity'] += $quantity;
            $product_found = true;
            $product_added = false;
            break;
        }
    }

    if (!$product_found) {
        $_SESSION['cart'][] = $product;
    }
    header('Content-Type: application/json');
    // Return JSON response
    echo json_encode(array('product_added' => $product_added));
}
