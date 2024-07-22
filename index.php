<?php
require_once 'config/database.php';
require_once 'classes/QueryBuilder.php';
require_once 'controllers/ProductController.php';

// Database and query builder setup
$database = new Database();
$conn = $database->getConnection();
$queryBuilder = new QueryBuilder($conn);
$productController = new ProductController($queryBuilder);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['mass_delete'])) {
    $productController->deleteProducts($_POST['delete']);
}

$products = $productController->getAllProducts();
include 'views/product-list.php';
?>
