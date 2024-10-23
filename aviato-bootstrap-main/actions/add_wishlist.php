<?php
$lifetime = 60 * 60 * 24 * 30; // 30 days
session_set_cookie_params($lifetime);
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    // Initialize wishlist if it doesn't exist
    if (!isset($_SESSION['wishlist'])) {
        $_SESSION['wishlist'] = array();
    }

    // Check if product is already in wishlist
    if (!in_array($id, $_SESSION['wishlist'])) {
        $_SESSION['wishlist'][] = $id;
    }
}
