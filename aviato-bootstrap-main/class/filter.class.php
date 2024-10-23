<?php
require_once('DAL.class.php');

class Filter extends DAL
{
    public function performQuery($query)
    {
        return $this->getdata($query);
    }
    function getAllCategories()
    {
        $sql = "SELECT * FROM categories";
        return $this->getdata($sql);
    }
}
