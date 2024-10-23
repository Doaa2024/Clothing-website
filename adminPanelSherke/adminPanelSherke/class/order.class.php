<?php
require_once('DAL.class.php');

class Order extends DAL
{
    function getAllOrders()
    {
        $sql = "SELECT * From orders";
        return $this->getdata($sql);
    }
    function getAllOrderItems($orderID)
    {
        $sql = "SELECT * From orderItems where OrderID='$orderID'";
        return $this->getdata($sql);
    }

    function updateStatus($id, $status)
    {
        $sql = "UPDATE orders SET Status='$status' WHERE OrderID='$id'";
        return $this->execute($sql);
    }
    function getSatus($orderID, $status)
    {
        $sql = "SELECT * From orders where OrderID='$orderID' and Status='$status'";
        return $this->getdata($sql);
    }
}
