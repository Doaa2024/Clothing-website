<?php
require_once('../class/filter.class.php');

$filterInstance = new Filter();
$categoryFilter = $_POST['filter_category'] ?? 'all';
$sortFilter = $_POST['filter_sort'] ?? 'rand';
$page = isset($_POST['page']) ? (int)$_POST['page'] : 1;
$itemsPerPage = 6; // Adjust as needed
$offset = ($page - 1) * $itemsPerPage;

// Base SQL query based on category and sort filter
if ($categoryFilter === 'all') {
    switch ($sortFilter) {
        case 'recent':
            $baseSql = "SELECT product.*, images.image_name AS product_image
FROM product
LEFT JOIN images ON product.product_id = images.productID
GROUP BY product.product_id
ORDER BY product.product_id DESC";
            break;
        case 'bests':
            $baseSql = "SELECT product.*, images.image_name AS product_image, COALESCE(SUM(orderItems.Quantity), 0) AS total_quantity_sold
FROM product
LEFT JOIN images ON product.product_id = images.productID
LEFT JOIN orderItems ON product.product_id = orderItems.ProductID
GROUP BY product.product_id
ORDER BY total_quantity_sold DESC";
            break;
        case 'highest':
            $baseSql = "SELECT product.*, images.image_name AS product_image
FROM product
LEFT JOIN images ON product.product_id = images.productID
GROUP BY product.product_id
ORDER BY price DESC";
            break;
        case 'lowest':
            $baseSql = "SELECT product.*, images.image_name AS product_image
FROM product
LEFT JOIN images ON product.product_id = images.productID
GROUP BY product.product_id
ORDER BY price ASC";
            break;
        default:
            $baseSql = "SELECT product.*, images.image_name AS product_image
FROM product
LEFT JOIN images ON product.product_id = images.productID
GROUP BY product.product_id
ORDER BY RAND()";
            break;
    }
} else {
    switch ($sortFilter) {
        case 'recent':
            $baseSql = "SELECT product.*, images.image_name AS product_image
FROM product
LEFT JOIN images ON product.product_id = images.productID
WHERE product.category_id = '$categoryFilter'
GROUP BY product.product_id
ORDER BY product.product_id DESC";
            break;
        case 'bests':
            $baseSql = "SELECT product.*, images.image_name AS product_image, COALESCE(SUM(orderItems.Quantity), 0) AS total_quantity_sold
FROM product
LEFT JOIN images ON product.product_id = images.productID
LEFT JOIN orderItems ON product.product_id = orderItems.ProductID
WHERE product.category_id = '$categoryFilter'
GROUP BY product.product_id
ORDER BY total_quantity_sold DESC";
            break;
        case 'highest':
            $baseSql = "SELECT product.*, images.image_name AS product_image
FROM product
LEFT JOIN images ON product.product_id = images.productID
WHERE product.category_id = '$categoryFilter'
GROUP BY product.product_id
ORDER BY price DESC";
            break;
        case 'lowest':
            $baseSql = "SELECT product.*, images.image_name AS product_image
FROM product
LEFT JOIN images ON product.product_id = images.productID
WHERE product.category_id = '$categoryFilter'
GROUP BY product.product_id
ORDER BY price ASC";
            break;
        default:
            $baseSql = "SELECT product.*, images.image_name AS product_image
FROM product
LEFT JOIN images ON product.product_id = images.productID
WHERE product.category_id = '$categoryFilter'
GROUP BY product.product_id
ORDER BY RAND()";
            break;
    }
}

// Add pagination to the SQL query
$paginatedSql = $baseSql . " LIMIT $offset, $itemsPerPage";
$products = $filterInstance->performQuery($paginatedSql);

// Get the total number of products based on filter
$totalProductsArray = $filterInstance->performQuery($baseSql);
$totalProducts = count($totalProductsArray);

// Calculate total pages
$totalPages = ceil($totalProducts / $itemsPerPage);

// Debugging statements
error_log("Category Filter: $categoryFilter");
error_log("Sort Filter: $sortFilter");
error_log("Page: $page");
error_log("Items Per Page: $itemsPerPage");
error_log("Offset: $offset");
error_log("Base SQL: $baseSql");
error_log("Paginated SQL: $paginatedSql");
error_log("Total Products: $totalProducts");

// Prepare response
$response = [
    'products' => $products,
    'totalPages' => $totalPages,
    'currentPage' => $page
];

header('Content-Type: application/json');
echo json_encode($response);
