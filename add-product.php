<?php
require_once 'config/database.php';
require_once 'classes/QueryBuilder.php';
require_once 'controllers/AddProductController.php';

// Database and query builder setup
$database = new Database();
$conn = $database->getConnection();
$queryBuilder = new QueryBuilder($conn);
$addProductController = new AddProductController($queryBuilder);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $addProductController->saveProduct($_POST);
        header('Location: index.php');
        exit();
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}

include 'views/add-product.php';
?>
