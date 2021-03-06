<?php
include_once "../connection/connection.php";

$title = $prize = "";
$errors = [];

// GETTING DATA FOR SPECIFIC USER
$id = $_GET["id"] ?? null;

if (!$id) {
  header("Location: ../index.php");
}

if ($id) {
  $statement = $conn->prepare("SELECT * FROM products WHERE id = :id");
  $statement->bindValue(":id", $id);
  $statement->execute();
  $user = $statement->fetchAll(PDO::FETCH_ASSOC);
}

if (isset($_POST["submit"])) {
  if (isset($_POST["title"])) {
    $title = $_POST["title"];
  }
  if (isset($_POST["prize"])) {
    $prize = $_POST["prize"];
  }

  if (!$title) {
    $err = "product title is empty";
    array_push($errors, $err);
  }

  if (!$prize) {
    $err = "product prize is empty";
    array_push($errors, $err);
  }

  if (empty($errors)) {
    $statement = $conn->prepare(
      "UPDATE products SET title = :title, prize = :prize WHERE id = :id"
    );
    $statement->bindValue(":id", $id);
    $statement->bindValue(":title", $title);
    $statement->bindValue(":prize", $prize);
    $statement->execute();
    header("Location: ../index.php");
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/style.css">
    <title>CRUD APPLICATION</title>
</head>

<body>

    <?php if (!empty($errors)): ?>
    <div class="container alert alert-danger">
        <?php foreach ($errors as $error): ?>
        <h1>
            <?php echo $error; ?>
        </h1>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <!-- FORM SECTION -->
    <?php foreach ($user as $item): ?>
    <div class="container mt-5 mb-5">
        <h1 class="display-4 text-center">insert product data</h1>
        <form action="" method="POST">
            <div class="form-group mt-2 mb-2">
                <label for="title" class="col-form-label-lg">product title</label>
                <input type="text" name="title" class="form-control form-control-lg" id="title"
                    placeholder="Enter product title" value="<?php echo htmlspecialchars(
                      $item["title"]
                    ); ?>">
            </div>
            <div class="form-group mt-2 mb-2">
                <label for="prize" class="col-form-label-lg">product prize</label>
                <input type="number" name="prize" class="form-control form-control-lg" id="prize"
                    placeholder="Enter product prize" value="<?php echo htmlspecialchars(
                      $item["prize"]
                    ); ?>">
            </div>
            <button type="submit" name="submit" class="btn btn-primary btn-lg mt-2 w-100">Submit</button>
        </form>
    </div>
    <?php endforeach; ?>
    <!-- END FORM SECTION -->

    <!-- SCRIPT TAGES -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"
        integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"
        integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous">
    </script>
    <!-- END SCRIPT TAGES -->

</body>

</html>