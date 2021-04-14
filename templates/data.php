<?php
$statement = $conn->prepare("SELECT * FROM products ORDER BY id");
$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mt-5 mb-5">
    <table class="table table-striped text-center">
        <thead>
            <tr>
                <th scope="col">product id</th>
                <th scope="col">title</th>
                <th scope="col">prize</th>
                <th scope="col">created at</th>
                <th scope="col">update/delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
            <tr>
                <th><?php echo htmlspecialchars($product["id"]); ?></th>
                <td><?php echo htmlspecialchars($product["title"]); ?></td>
                <td><?php echo htmlspecialchars($product["prize"]); ?> tk</td>
                <td><?php echo htmlspecialchars($product["created_at"]); ?></td>
                <td>
                    <button class="btn btn-warning btn-lg">edit</button>
                    <button class="btn btn-danger btn-lg">delete</button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>