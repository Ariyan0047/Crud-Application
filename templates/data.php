<?php

// include_once "../connection/connection.php";

$search = $_GET["search"] ?? "";
if ($search) {
  $statement = $conn->prepare(
    "SELECT * FROM products WHERE title LIKE :title ORDER BY id"
  );
  $statement->bindValue(":title", "%$search%");
} else {
  $statement = $conn->prepare("SELECT * FROM products ORDER BY id");
}
$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_ASSOC);
header("Location ../index.php");
?>

<div class="tab container mt-5 mb-2">
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
                    <a href="./templates/update.php?id=<?php echo $product[
                      "id"
                    ]; ?>" class="btn btn-warning btn-lg">edit</a>
                    <form action="./templates/delete.php" method="POST" style="display:inline-block;">
                        <input type="hidden" name="id" value="<?php echo $product[
                          "id"
                        ]; ?>">
                        <button type="submit" class="btn btn-danger btn-lg">delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>