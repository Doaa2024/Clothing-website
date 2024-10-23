<?php
require_once("../class/categories.class.php");
$categories = new Categories();

if ($_POST) {
    $id = $_POST['categoryId'];
    $newName = $_POST['categoryName'];
    $existingName = $_POST['existingCategoryName'];

    if ($newName === $existingName) {
        $response = array(
            'status' => 'info',
            'message' => 'No changes made to the category'
        );

        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }

    $existingCategory = $categories->getCategory($newName);

    if (!$existingCategory) {
        $affected_rows = $categories->updateCategory($id, $newName);

        if ($affected_rows === 0) {
            $response = array(
                'status' => 'success',
                'message' => 'Category updated successfully'
            );
        } else if ($affected_rows !== 0) {
            $response = array(
                'status' => 'info',
                'message' => 'No changes made to the category'
            );
        } else {
            $response = array(
                'status' => 'error',
                'message' => 'Something went wrong'
            );
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        $response = array(
            'status' => 'error',
            'message' => 'Category with this name already exists'
        );

        header('Content-Type: application/json');
        echo json_encode($response);
    }
}
