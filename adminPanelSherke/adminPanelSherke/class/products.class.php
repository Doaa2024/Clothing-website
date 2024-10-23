<?php
require_once('DAL.class.php');

class Products extends DAL
{
    function getAllProducts()
    {
        $sql = "SELECT product.*, images.image_name as product_image FROM product LEFT JOIN images ON product_id = images.productID GROUP BY product_id";
        return $this->getdata($sql);
    }
    function insertProduct($productname, $categoryid, $price,  $discount, $general, $deep)
    {
        $sql = "INSERT INTO product (product_name, category_id, price,  quantity,small_description,large_description) 
            VALUES ('$productname', '$categoryid', '$price',  '$discount','$general','$deep')";
        return $this->execute($sql);
    }
    function getProduct($productname)
    {
        $sql = "SELECT * FROM product WHERE product_name='$productname'";
        return $this->getdata($sql);
    }
    public function getproducts($name, $id)
    {
        $sql = "select * from product where product_name='$name' and product_id!='$id'";
        return $this->getdata($sql);
    }
    function getProductByID($productid)
    {
        $sql = "SELECT * FROM product WHERE product_id=$productid";
        return $this->getdata($sql);
    }
    function deleteProduct($id)
    {
        $sql = "DELETE FROM product where product_id=$id";
        return $this->execute($sql);
    }
    function updateProduct($id, $productname, $categoryid, $price,  $discount, $general, $deep)
    {
        $sql = "UPDATE product SET 
        product_name='$productname', 
        category_id='$categoryid', 
        price='$price', 
    
        small_description='$general', 
        large_description='$deep', 
        quantity='$discount'
    WHERE product_id=$id";

        return $this->execute($sql);
    }

    public function getimages($id)
    {
        $sql = "Select * from images where productID=$id";
        return $this->getdata($sql);
    }
    public function insertimage($image_name, $product)
    {

        $sql = "insert into images (image_name,productID) VALUES ('$image_name','$product')";
        return $this->execute($sql);
    }
    public function deleteimage($id)
    {
        $sql = "DELETE FROM images WHERE image_id='$id'";
        return $this->execute($sql);
    }
}
