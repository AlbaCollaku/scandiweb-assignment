<?php
class ProductController {
    private $queryBuilder;

    public function __construct($queryBuilder) {
        $this->queryBuilder = $queryBuilder;
    }

    public function getAllProducts() {
        return $this->queryBuilder->select('products');
    }

    public function deleteProducts($skus) {
        if (!is_array($skus)) {
            $skus = [$skus];
        }
        // Debug statement to check SKUs being deleted
        echo "Deleting SKUs: " . implode(', ', $skus);
        return $this->queryBuilder->delete('products', $skus);
    }
}
?>
