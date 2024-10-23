<?php
require_once("../class/products.class.php");
$products = new Products();
if ($_POST) {
    $productname = $_POST['productname'];
    $categoryid = $_POST['selectedCategoryId'];
    $price = $_POST['price'];
    $discount = $_POST['discount'];
    $general = $_POST['general_description'];
    $deep = $_POST['deep_description'];
    $images = $_FILES['images'];
    $product = $products->getProduct($productname);
    $result = $product;
    if ($result) {
        $response = array(
            'status' => 'error',
            'message' => 'The name of the product is already exists'
        );
    } else {

        $productidforimage = $products->insertProduct($productname, $categoryid, $price, $discount, $general, $deep);

        foreach ($images['name'] as $k => $value) {
            // Check if the file has a valid extension
            $validExtensions = array("jpg", "jpeg", "png", "webp");
            $extension = strtolower(pathinfo($images["name"][$k], PATHINFO_EXTENSION));

            if (in_array($extension, $validExtensions)) {
                // Move the file and insert into the database
                $image_name = $products->movemultiplefiles($images, $k);
                $image = $products->insertimage($image_name, $productidforimage);

                $response = array(
                    'status' => 'success',
                    'message' => 'Product added successfully'
                );
            } else {
                $response = array(
                    'status' => 'error',
                    'message' => 'Invalid file type. Please upload only images with .jpg, .jpeg, or .png extensions.'
                );
            }
        }
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
