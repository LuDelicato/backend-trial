<!DOCTYPE html>
<html>
<head>
    <title>Products Add</title>
</head>
<body>
<h2>Add/Edit Product</h2>
<?php if (isset($errorMessage)) : ?>
    <p style="color: red;"><?= $errorMessage ?></p>
<?php endif; ?>
<form action="index.php?action=<?= $_GET['action'] ?>" method="post">

    <input type="hidden" name="id" value="<?= isset($product['id']) ? $product['id'] : '' ?>">
    <label for="sku">SKU:</label>
    <input type="text" name="sku" value="<?= isset($product['sku']) ? $product['sku'] : '' ?>" required><br>
    <label for="name">Name:</label>
    <input type="text" name="name" value="<?= isset($product['name']) ? $product['name'] : '' ?>" required><br>
    <label for="price">Price:</label>
    <input type="text" name="price" value="<?= isset($product['price']) ? $product['price'] : '' ?>" required><br>
    <label for="description">Description:</label>
    <textarea name="description"><?= isset($product['description']) ? $product['description'] : '' ?></textarea><br>

    <input type="submit" value="Submit">
</form>
<br>
<a href="index.php">Cancel</a>
</body>
</html>
