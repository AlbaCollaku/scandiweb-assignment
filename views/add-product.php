<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Product List</title>
        <link rel="stylesheet" type="css" href="assets/css/style.css">
           
        <script src="assets/js/script.js"></script>

    </head>
    <body>
    <?php include 'views/templates/header.php'; ?>

    <div class="container">
        <?php if (isset($error)): ?>
            <div class="error"><?= $error ?></div>
        <?php endif; ?>

        <form id="product_form" method="post" action="add-product.php">
            <div>
                <label for="sku">SKU:</label>
                <input type="text" id="sku" name="sku" required>
            </div>
            <div>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div>
                <label for="price">Price ($):</label>
                <input type="number" id="price" name="price" required>
            </div>
            <div>
                <label for="productType">Type:</label>
                <select id="productType" name="productType" required onchange="handleProductTypeChange()">
                    <option value="" disabled selected>Select type</option>
                    <option value="DVD">DVD</option>
                    <option value="Book">Book</option>
                    <option value="Furniture">Furniture</option>
                </select>
            </div>
            <div id="typeAttributes"></div>
            <div>
                <input type="submit" value="Save">
                <button type="button" onclick="window.location.href='index.php'">Cancel</button>
            </div>
        </form>
    </div>

        <?php include 'views/templates/footer.php'; ?>
    </body>
</html>
