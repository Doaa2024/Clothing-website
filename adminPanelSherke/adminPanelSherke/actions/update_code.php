<?php
require_once("../class/code.class.php");
$code = new Code();
if ($_POST) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $percentage = $_POST['percentage'];
    $limits = $_POST['limits'];
    $date = $_POST['date'];
    $existingCode = $code->getCodes($id, $name);
    if (empty($existingCode)) {
        $noUpdate = $code->getCodeById($id, $name, $percentage, $limits, $date);
        if (empty($noUpdate)) {
            $affected_rows = $code->updateCode($id, $name, $percentage, $limits, $date);

            if ($affected_rows === 0) {
                $response = array(
                    'status' => 'success',
                    'message' => 'Code updated successfully'
                );
            } else {
                $response = array(
                    'status' => 'error',
                    'message' => 'Something went wrong'
                );
            }
        } else {
            $response = array(
                'status' => 'error',
                'message' => ' No changes have done!'
            );
        }
    } else {
        $response = array(
            'status' => 'error',
            'message' => ' This Code already exists'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
