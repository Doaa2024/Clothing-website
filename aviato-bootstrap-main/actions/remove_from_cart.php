<?php
session_start();

if (isset($_POST['id']) && isset($_POST['size'])) {
    $id = $_POST['id'];
    $size = $_POST['size'];

    foreach ($_SESSION['cart'] as $key => $cart_item) {
        if ($cart_item['id'] == $id && $cart_item['size'] == $size) {
            unset($_SESSION['cart'][$key]);
            break;
        }
    }

    // Reindex the array to remove gaps
    $_SESSION['cart'] = array_values($_SESSION['cart']);
    echo 'success';
}
