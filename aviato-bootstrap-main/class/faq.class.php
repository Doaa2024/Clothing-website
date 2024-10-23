<?php
require_once('DAL.class.php');

class FAQ extends DAL
{
    function getAllFAQ()
    {
        $sql = "SELECT * FROM faq";
        return $this->getdata($sql);
    }
}
