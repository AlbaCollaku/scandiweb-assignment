<?php
class AddProductController {
    private $queryBuilder;

    public function __construct($queryBuilder) {
        $this->queryBuilder = $queryBuilder;
    }

    public function saveProduct($data) {
        $sku = $data['sku'];
        $name = $data['name'];
        $price = $data['price'];
        $type = $data['productType'];

        switch ($type) {
            case 'DVD':
                $attribute = $data['size'];
                $typeId = 0;
                break;
            case 'Book':
                $attribute = $data['weight'];
                $typeId = 1;
                break;
            case 'Furniture':
                $attribute = $data['height'] . 'x' . $data['width'] . 'x' . $data['length'];
                $typeId = 2;
                break;
            default:
                throw new Exception("Invalid product type");
        }

        if ($this->isSkuUnique($sku)) {
            $this->queryBuilder->insert('products', [
                'sku' => $sku,
                'name' => $name,
                'price' => $price,
                'type' => $typeId,
                'attribute' => $attribute
            ]);
        } else {
            throw new Exception("SKU must be unique");
        }
    }

    private function isSkuUnique($sku) {
        $result = $this->queryBuilder->select('products', 'COUNT(*) as count', 'sku = "' . $sku . '"');
        return $result[0]['count'] == 0;
    }
}
?>
