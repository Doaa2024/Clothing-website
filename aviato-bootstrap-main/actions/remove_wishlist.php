<?php
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];


    foreach ($_SESSION['wishlist'] as $key => $wishlist_item) {
        if ($wishlist_item == $id) {
            unset($_SESSION['wishlist'][$key]);
            break;
        }
    }

    // Reindex the array to remove gaps
    $_SESSION['wishlist'] = array_values($_SESSION['wishlist']);
    header("Location: ../theme/wishlist.php");
    exit();
}
