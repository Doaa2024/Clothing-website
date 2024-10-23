
<?php
session_start();
require_once('../class/order.class.php');
$orders = new Order();
$response = array('success' => false);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $customer_id = $orders->getCustomerID($username);
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $zipcode = $_POST['zipcode'];
    $city = $_POST['city'];
    $total_price = $_POST['total_price'];
    $order = $orders->insertOrder($customer_id[0]['CustomerID'], $total_price, $phone, $address, $zipcode, $city);

    // Process each cart item
    foreach ($_SESSION['cart'] as $item) {
        foreach ($_SESSION['cart'] as $item) {
            // Insert order items

            // Get the current quantity from the database
            $oldQuantity = $orders->getQuantity($item['id']);

            // Calculate the new quantity
            $newQuantity = $oldQuantity[0]['quantity'] - $item['quantity'];
            if ($newQuantity < 0) {
                $orderItems = $orders->insertOrderItems($order, $item['id'], $item['size'],   $oldQuantity[0]['quantity'], $item['price']);
            } else {
                $orderItems = $orders->insertOrderItems($order, $item['id'], $item['size'], $item['quantity'], $item['price']);
            }
            $newQuantity = max(0, $newQuantity);

            // Update the quantity in the database
            $orders->setQuantity($item['id'], $newQuantity);
        }

        // Coupon handling
        if (isset($_SESSION['coupon_id'])) {
            $couponId = $_SESSION['coupon_id'];

            // Check if the limits session variable is set
            if (isset($_SESSION['limits']) && $_SESSION['limits'] > 0) {
                // Decrement the limits

                $_SESSION['limits'] -= 1;

                // Ensure the limits do not go below zero
                if ($_SESSION['limits'] < 0) {
                    $_SESSION['limits'] = 0;
                }

                // Update the coupon limits in the database
                $orders->setLimits($_SESSION['coupon_id'], $_SESSION['limits']);

                if (isset($_SESSION['username'])) {
                    $username = $_SESSION['username']; // Ensure this is set correctly
                    $used = $orders->getUsed($_SESSION['coupon_id']);
                    $used_by = explode("/", $used[0]['used_by']);
                    if (!in_array($username, $used_by)) {
                        $used_by[] = $username;
                    }
                    $used_by_str = implode("/", $used_by);

                    // Update the used_by field in the database
                    $orders->setUsed($_SESSION['coupon_id'], $used_by_str);
                }
            }
        }
    }

    $response['success'] = true;
    unset($_SESSION['cart']);
    unset($_SESSION['limits']);
    unset($_SESSION['coupon_id']);
}


header('Content-Type: application/json');
echo json_encode($response);
