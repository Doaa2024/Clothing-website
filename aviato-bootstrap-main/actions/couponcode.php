<?php
// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Include necessary files and start the session
    include("../class/checkout.class.php");
    session_start();

    // Instantiate the Checkout class
    $checkout = new Checkout();

    // Retrieve and sanitize the coupon code from POST request
    $code = isset($_POST['code']) ? trim($_POST['code']) : '';


    // Check if the code is not empty
    if (empty($code)) {
        $response = array(
            'status' => 'error',
            'message' => 'Coupon code is required.'
        );
    } else {
        // Fetch the coupon details using the provided code
        $coupon = $checkout->selectcode($code);
        $result = $coupon;

        // Check if the coupon exists
        if ($result == null) {
            $response = array(
                'status' => 'error',
                'message' => 'Wrong Coupon Code name.'
            );
        } else {
            // Check if the coupon usage limit has been reached
            if ($result[0]['limits'] == 0) {
                $response = array(
                    'status' => 'error',
                    'message' => 'Exceeded the limit.'
                );
            } else {
                // Check if the coupon has expired
                if ($result[0]['expiry_date'] < date("Y-m-d")) {
                    $response = array(
                        'status' => 'error',
                        'message' => 'Coupon has expired.'
                    );
                } else {
                    // Check if the user is logged in
                    if (isset($_SESSION['username'])) {
                        $client_id = $_SESSION['username'];
                        $used_by = explode("/", $coupon[0]['used_by']);

                        // Check if the coupon has already been used by the current user
                        if (in_array($client_id, $used_by)) {
                            $response = array(
                                'status' => 'error',
                                'message' => 'You cannot use the code two times.'
                            );
                        } else {
                            // Valid coupon for logged in user
                            $response = array(
                                'status' => 'success',
                                'message' => 'Correct Coupon Code.',
                                'discount' => $coupon[0]['percentage'],
                                'limits' => $coupon[0]['limits'],
                                'expiry_date' => $coupon[0]['expiry_date']
                            );
                            $_SESSION['coupon_discount'] = $coupon[0]['percentage'];
                            $_SESSION['limits'] = $coupon[0]['limits'];
                            $_SESSION['coupon_id'] = $coupon[0]['code_id'];
                        }
                    } else {
                        // Valid coupon for guest user
                        $response = array(
                            'status' => 'success',
                            'message' => 'Correct Coupon Code!',
                            'discount' => $coupon[0]['percentage'],
                            'limits' => $coupon[0]['limits'],
                            'expiry_date' => $coupon[0]['expiry_date']
                        );
                        $_SESSION['coupon_discount'] = $coupon[0]['percentage'];
                        $_SESSION['limits'] = $coupon[0]['limits'];
                        $_SESSION['coupon_id'] = $coupon[0]['code_id'];
                    }
                }
            }
        }
    }

    // Send JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // Redirect to cart page for non-POST requests
    echo '<script>window.location.href="cart.php";</script>';
}
