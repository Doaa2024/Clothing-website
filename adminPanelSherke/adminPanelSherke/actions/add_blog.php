<?php
require_once("../class/blog.class.php");
$blog = new Blog();
if ($_POST) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $type = $_POST['type'];
    $images = $_FILES['images'];
    $result = $blog->getblog($title);
    if ($result) {
        $response = array(
            'status' => 'error',
            'message' => 'The title of the post is already exists'
        );
    } else {

        $insertion = $blog->insertBlog($title, $description, $type);

        foreach ($images['name'] as $k => $value) {
            // Check if the file has a valid extension
            $validExtensions = array("jpg", "jpeg", "png");
            $extension = strtolower(pathinfo($images["name"][$k], PATHINFO_EXTENSION));

            if (in_array($extension, $validExtensions)) {
                // Move the file and insert into the database
                $image_name = $blog->movemultiplefiles($images, $k);
                $image = $blog->updateimage($insertion, $image_name);

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
