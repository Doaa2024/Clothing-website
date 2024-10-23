<?php
require("../class/about.class.php");

$about = new About();

if ($_POST) {
    $description = $_POST['description'];
    $olddescription = $_POST['olddescription'];
    $images = $_FILES['images'];
    $abouts = $about->updateAbout($description);


    // Check if any images were uploaded
    if (!empty($images['name'][0])) {
        // Iterate through each uploaded image
        foreach ($images['name'] as $k => $value) {
            // Check if the file has a valid extension
            $validExtensions = array("jpg", "jpeg", "png");
            $extension = strtolower(pathinfo($images["name"][$k], PATHINFO_EXTENSION));

            if (in_array($extension, $validExtensions)) {
                // Move the file and insert into the database
                $image_name = $about->movemultiplefiles($images, $k);
                if ($image_name !== false) {
                    $image = $about->updateimage($image_name);
                    $response = array(
                        'status' => 'success',
                        'message' => 'Product updated successfully'
                    );
                } else {
                    $response = array(
                        'status' => 'error',
                        'message' => 'Failed to move file or invalid file type.'
                    );
                    break; // Exit the loop if an error occurs
                }
            } else {
                $response = array(
                    'status' => 'error',
                    'message' => 'Invalid file type. Please upload only images with .jpg, .jpeg, or .png extensions.'
                );
            }
        }
    } else {
        // Check if no images were uploaded and if the slide data was updated
        if ($description === $olddescription) {
            $response = array(
                'status' => 'info',

                'message' => 'No changes made to the blog'
            );
        } else {
            $response = array(
                'status' => 'success',
                'message' => 'Blog updated successfully'
            );
        }
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
