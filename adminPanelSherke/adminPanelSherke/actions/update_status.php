<?php
require_once("../class/order.class.php");
$order = new Order();

if ($_POST) {
    $id = $_POST['OrderID'];
    $status = $_POST['status'];
    $oldStatus = $order->getSatus($id, $status);
    if (empty($oldStatus)) {
        $affected_rows = $order->updateStatus($id, $status);

        if ($affected_rows === 0) {
            $response = array(
                'status' => 'success',
                'message' => 'Status updated successfully'
            );
        } else if ($affected_rows !== 0) {
            $response = array(
                'status' => 'info',
                'message' => 'No changes made to the Status'
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
            'message' => 'Status not updated!'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
