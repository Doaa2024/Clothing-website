<?php
require_once("../class/products.class.php");
$products = new Products();
if ($_POST) {
    $id = $_POST['image_id'];
    $image = $products->deleteimage($id);
    if ($image === 0) {
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
