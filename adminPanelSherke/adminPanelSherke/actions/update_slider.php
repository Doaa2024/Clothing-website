<?php
require("../class/slider.class.php");

$slider = new Slider();

if ($_POST) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $images = $_FILES['images'];
    $slideOld = $slider->getSlider($id, $title, $description);
    $slide = $slider->updateSlider($id, $title, $description);


    // Check if any images were uploaded
    if (!empty($images['name'][0])) {
        // Iterate through each uploaded image
        foreach ($images['name'] as $k => $value) {
            // Check if the file has a valid extension
            $validExtensions = array("jpg", "jpeg", "png" . "webp");
            $extension = strtolower(pathinfo($images["name"][$k], PATHINFO_EXTENSION));

            if (in_array($extension, $validExtensions)) {
                // Move the file and insert into the database
                $image_name = $slider->movemultiplefiles($images, $k);
                if ($image_name !== false) {
                    $image = $slider->updateimage($id, $image_name);
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
                    'message' => 'Invalid file type. Please upload only images with .jpg, .jpeg, or .png or .webp extensions.'
                );
            }
        }
    } else {
        // Check if no images were uploaded and if the slide data was updated
        if (!empty($slideOld)) {
            $response = array(
                'status' => 'info',

                'message' => 'No changes made to the main_page'
            );
        } else {
            $response = array(
                'status' => 'success',
                'message' => 'Main_Page updated successfully'
            );
        }
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
