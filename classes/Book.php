<?php
require_once 'Product.php';

class Book extends Product {
    private $weight;

    public function __construct($sku, $name, $price, $weight) {
        parent::__construct($sku, $name, $price);
        $this->weight = $weight;
    }

    public function getAttribute() {
        return "Weight: " . $this->weight . " Kg";
    }

    public function save($conn) {
        $query = "INSERT INTO products (sku, name, price, type, attribute) VALUES (:sku, :name, :price, 'Book', :attribute)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':sku', $this->sku);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':price', $this->price);
        $stmt->bindParam(':attribute', $this->weight);
        return $stmt->execute();
    }
}
?>
