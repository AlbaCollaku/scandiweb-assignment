<!DOCTYPE html>
<html>
<head>
    <title>Product List</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
    <?php include 'views/templates/header.php'; ?>

    <div class="container">
        <form method="post" action="index.php">
            <div class="product-list">
                <?php foreach ($products as $product): ?>
                    <div class="product-item">
                        <input type="checkbox" class="delete-checkbox" name="delete[]" value="<?= $product['sku'] ?>">
                        <p><?= $product['sku'] ?></p>
                        <p><?= $product['name'] ?></p>
                        <p>$<?= $product['price'] ?></p>
                        <p><?= $product['attribute'] ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </form>
    </div>

    <?php include 'views/templates/footer.php'; ?>
</body>
</html>
