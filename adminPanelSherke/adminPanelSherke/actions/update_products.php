<?php
require("../class/products.class.php");

$products = new Products();

if ($_POST) {
    $id = $_POST['id'];
    $name = $_POST['product_name'];
    $categories = $_POST['cat_id'];
    $price = $_POST['price'];
    $categories = $_POST['cat_id'];
    $price = $_POST['price'];
    $general = $_POST['general_description'];
    $deep = $_POST['deep_description'];
    $images = $_FILES['images'];
    $discount = $_POST['discount'];
    $prod = $products->getproducts($name, $id);
    $result = $prod;

    if ($result) {
        $response = array(
            'status' => 'error',
            'message' => 'The name of the product already exists'
        );
    } else {
        $product = $products->updateProduct($id, $name, $categories, $price,  $discount, $general, $deep);

        // Check if any images were uploaded
        if (!empty($images['name'][0])) {
            // Iterate through each uploaded image
            foreach ($images['name'] as $k => $value) {
                // Check if the file has a valid extension
                $validExtensions = array("jpg", "jpeg", "png", "webp");
                $extension = strtolower(pathinfo($images["name"][$k], PATHINFO_EXTENSION));

                if (in_array($extension, $validExtensions)) {
                    // Move the file and insert into the database
                    $image_name = $products->movemultiplefiles($images, $k);
                    if ($image_name !== false) {
                        $image = $products->insertimage($image_name, $id);
                    } else {
                        $response = array(
                            'status' => 'error',
                            'message' => 'Failed to move file or invalid file type.'
                        );
                        break; // Exit the loop if an error occurs
                    }

                    $response = array(
                        'status' => 'success',
                        'message' => 'Product updated successfully'
                    );
                } else {
                    $response = array(
                        'status' => 'error',
                        'message' => 'Invalid file type. Please upload only images with .jpg, .jpeg, or .png extensions.'
                    );
                }
            }
        } else {
            // No images were uploaded, update product data only
            $response = array(
                'status' => 'success',
                'message' => 'Product updated successfully'
            );
        }
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
