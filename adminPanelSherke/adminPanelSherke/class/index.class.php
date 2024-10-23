<?php
require_once('DAL.class.php');

class Index extends DAL
{
    function getProductsperCategory()
    {
        $sql = "SELECT 
    categories_name,
    COUNT(p.product_id) AS product_count
FROM 
    categories 
LEFT JOIN 
    product p 
ON 
    categories_id = p.category_id
GROUP BY 
    categories_name;";
        return $this->getdata($sql);
    }
    function getCustomerNb()
    {
        $sql = "SELECT COUNT(DISTINCT CustomerID) AS number_of_customers
FROM orders;
";
        return $this->getdata($sql);
    }
    function getOrderNb()
    {
        $sql = "SELECT COUNT(OrderID) AS number_of_orders
FROM orders;
";
        return $this->getdata($sql);
    }
    function getTotalRevenue()
    {
        $sql = "SELECT SUM(TotalAmount) AS total_amount
FROM orders;
";
        return $this->getdata($sql);
    }
    function getTopCustomer()
    {
        $sql = "SELECT c.UserName, SUM(o.TotalAmount) AS total_revenue
FROM orders o
JOIN customers c ON o.CustomerID = c.CustomerID
GROUP BY c.UserName
ORDER BY total_revenue DESC
LIMIT 1;
";
        return $this->getdata($sql);
    }
    function getTopProducts()
    {
        $sql = "SELECT p.product_id, p.product_name, SUM(oi.Quantity) AS total_quantity_sold
FROM orderItems oi
JOIN product p ON oi.ProductID = p.product_id
GROUP BY p.product_id, p.product_name
ORDER BY total_quantity_sold DESC
LIMIT 5;


";
        return $this->getdata($sql);
    }
    function revenueMonth()
    {
        $sql = "SELECT DATE_FORMAT(OrderDate, '%Y-%m') AS month, SUM(TotalAmount) AS total_revenue
FROM orders
GROUP BY month
ORDER BY month ASC;
";
        return $this->getdata($sql);
    }
}
