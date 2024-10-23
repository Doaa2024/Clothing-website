<?php
session_start();

$response = ['success' => false];

if (isset($_GET['total'])) {
    $_SESSION['total_price'] = $_GET['total'];

    $response['success'] = true;
}

header("Location: ../theme/checkout.php");

// End the script to ensure no further code is executed
exit();
