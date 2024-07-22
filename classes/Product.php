<?php
abstract class Product {
    protected $sku;
    protected $name;
    protected $price;

    public function __construct($sku, $name, $price) {
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
    }

    abstract public function getAttribute();
    abstract public function save($conn);

    public static function getAll($conn) {
        $query = "SELECT * FROM products ORDER BY sku";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return array_map(function($product) {
            return self::mapProduct($product);
        }, $products);
    }

    public static function delete($conn, $skus) {
        if (empty($skus)) {
            return false;
        }
        $placeholders = implode(',', array_fill(0, count($skus), '?'));
        $query = "DELETE FROM products WHERE sku IN ($placeholders)";
        $stmt = $conn->prepare($query);
        return $stmt->execute($skus);
    }

    private static function mapProduct($product) {
        switch ($product['type']) {
            case 0:
                return new DVD($product['sku'], $product['name'], $product['price'], $product['attribute']);
            case 1:
                return new Book($product['sku'], $product['name'], $product['price'], $product['attribute']);
            case 2:
                $dimensions = explode('x', $product['attribute']);
                return new Furniture($product['sku'], $product['name'], $product['price'], $dimensions[0], $dimensions[1], $dimensions[2]);
            default:
                throw new Exception("Unknown product type");
        }
    }
}
?>
