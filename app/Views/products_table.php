<!DOCTYPE html>
<html>
<head>
    <title>Product List</title>
</head>
<body>
<h2>Product List</h2>

<table>
    <tr>
        <th>ID</th>
        <th>SKU</th>
        <th>Name</th>
        <th>Price</th>
        <th>Description</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php foreach ($products as $product): ?>
        <tr>
            <td><?= $product['id'] ?></td>
            <td><?= $product['sku'] ?></td>
            <td><?= $product['name'] ?></td>
            <td><?= $product['price'] ?></td>
            <td><?= $product['description'] ?></td>
            <td><a href="index.php?action=edit&id=<?= $product['id'] ?>">Edit</a></td>
            <td><a href="index.php?action=delete&id=<?= $product['id'] ?>">Delete</a></td>
        </tr>
    <?php endforeach; ?>
</table>
<br>
<a href="index.php?action=add">Add New Product</a>
</body>
</html>
