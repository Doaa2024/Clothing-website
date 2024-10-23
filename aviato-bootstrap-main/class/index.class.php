<?php
require_once('DAL.class.php');

class Index extends DAL
{
    function getAllIndex()
    {
        $sql = "SELECT * FROM slide_show";
        return $this->getdata($sql);
    }
    function getAllProduct()
    {
        $sql = "SELECT * FROM product ORDER BY RAND() LIMIT 6";
        return $this->getdata($sql);
    }
    function getAllProducts($offset, $itemsPerPage)
    {
        $sql = "SELECT * 
FROM product
ORDER BY RAND()
LIMIT $offset, $itemsPerPage;
";
        return $this->getdata($sql);
    }

    public function getimages($id)
    {
        $sql = "Select * from images where productID=$id";
        return $this->getdata($sql);
    }
    function getCount()
    {
        $sql = "SELECT COUNT(*) AS total_products FROM product";
        return $this->getdata($sql);
    }
}
