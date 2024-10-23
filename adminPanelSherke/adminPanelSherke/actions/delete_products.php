<?php
require_once("../class/products.class.php");
$products = new Products();
if ($_POST) {
    $id = $_POST['id'];
    $product = $products->deleteProduct($id);
    $result = $id;
    if ($product === 0) {
        $response = array(
            'status' => 'success',
            'message' => 'Deleted'
        );
    } else {

        $response = array(
            'status' => 'Failed',
            'message' => 'Something Went Wrong'
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response); // Output the JSON response
}
