<?php
require("../class/moreinfo.class.php");

$info = new MoreInfo();

if ($_POST) {
    $name = $_POST['name'];
    $number = $_POST['number'];
    $facebook = $_POST['facebook'];
    $instagram = $_POST['instagram'];
    $twitter = $_POST['twitter'];
    $pinterest = $_POST['pinterest'];
    $location = $_POST['location'];
    $email = $_POST['email'];
    $shipping = $_POST['shipping'];
    $infos = $info->getInfo($name, $number, $facebook, $instagram, $twitter, $pinterest, $location, $email, $shipping);
    if (!empty($infos)) {
        $response = array(
            'status' => 'info',

            'message' => 'No changes made to the info'
        );
    } else {
        $info = $info->updateInfo($name, $number, $facebook, $instagram, $twitter, $pinterest, $location, $email, $shipping);
        $response = array(
            'status' => 'success',
            'message' => 'Info updated successfully'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
