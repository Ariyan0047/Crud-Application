<?php
$statement = $conn->prepare("SELECT * FROM products ORDER BY id");
$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mt-5 mb-5">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">product id</th>
                <th scope="col">title</th>
                <th scope="col">prize</th>
                <th scope="col">created at</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
            <tr>
                <th scope="row"><?php echo htmlspecialchars(
                  $product["id"]
                ); ?></th>
                <td><?php echo htmlspecialchars($product["title"]); ?></td>
                <td><?php echo htmlspecialchars($product["prize"]); ?></td>
                <td><?php echo htmlspecialchars($product["created_at"]); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>