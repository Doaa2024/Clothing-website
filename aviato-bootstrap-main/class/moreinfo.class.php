<?php
require_once('DAL.class.php');

class Info extends DAL
{
    function getAllInfo()
    {
        $sql = "SELECT * FROM moreinfo";
        return $this->getdata($sql);
    }
    public function getDetails($id)
    {
        $sql = " SELECT p.product_name, i.image_name
        FROM product p
        JOIN images i ON p.product_id = i.productID
        WHERE p.product_id = $id";
        return $this->getdata($sql);
    }
}
