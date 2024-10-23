<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['id'];

    // Initialize wishlist session array if not already initialized
    if (!isset($_SESSION['wishlist'])) {
        $_SESSION['wishlist'] = array();
    }

    if (in_array($product_id, $_SESSION['wishlist'])) {
        // Remove from wishlist
        $_SESSION['wishlist'] = array_diff($_SESSION['wishlist'], array($product_id));
        echo 'removed';
    } else {
        // Add to wishlist
        $_SESSION['wishlist'][] = $product_id;
        echo 'added';
    }
}
