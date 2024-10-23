<?php
require_once('DAL.class.php');

class Products extends DAL
{
    function getProductByID($productid)
    {
        $sql = "SELECT * FROM product WHERE product_id=$productid";
        return $this->getdata($sql);
    }
    public function getimages($id)
    {
        $sql = "Select * from images where productID=$id";
        return $this->getdata($sql);
    }
    function getProductByCategory($productid)
    {
        $sql = "SELECT *
                FROM product
                WHERE category_id = (
                    SELECT category_id
                    FROM product
                    WHERE product_id = $productid
                )
                ORDER BY RAND()
                LIMIT 4";

        return $this->getdata($sql);  // Assuming getdata method handles executing the SQL query
    }
}
