<?php
require('DAL.class.php');

class Checkout extends DAL
{

    public function selectcode($code)
    {
        $sql = "SELECT * FROM `couponcode` where code_name='$code'";
        $client = $this->getdata($sql);
        return $client;
    }
}
