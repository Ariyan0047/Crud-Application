<?php
include_once "../connection/connection.php";

$title = $prize = "";

if (isset($_POST["submit"])) {
  if (isset($_POST["title"])) {
    $title = $_POST["title"];
  }
  if (isset($_POST["prize"])) {
    $prize = $_POST["prize"];
  }

  $statement = $conn->prepare(
    "INSERT INTO products (title,prize) VALUES (:title,:prize)"
  );
  $statement->bindValue(":title", $title);
  $statement->bindValue(":prize", $prize);
  $statement->execute();
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

    <!-- FORM SECTION -->
    <div class="container mt-5 mb-5">
        <h1 class="display-4 text-center">insert product data</h1>
        <form action="insert.php" method="POST">
            <div class="form-group m-2">
                <label for="title" class="col-form-label-lg">product title</label>
                <input type="text" name="title" class="form-control form-control-lg" id="title"
                    placeholder="Enter product title" required>
            </div>
            <div class="form-group m-2">
                <label for="prize" class="col-form-label-lg">product prize</label>
                <input type="number" name="prize" class="form-control form-control-lg" id="prize"
                    placeholder="Enter product prize" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary btn-lg m-2 w-100">Submit</button>
        </form>
    </div>
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