<?php include_once "./connection/connection.php"; ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="./style/style.css">
    <title>CRUD APPLICATION</title>
</head>

<body>

    <!-- HEADER SECTION -->
    <?php include_once "./templates/header.php"; ?>
    <!-- END HEADER SECTION -->

    <div class="container">
        <a href="./templates/insert.php" class="btn btn-info btn-lg w-100 mt-4">create new product</a>
    </div>

    <!-- DISPLAYING DATA -->
    <?php include_once "./templates/data.php"; ?>
    <!-- END DISPLAYING DATA -->

    <!-- FOOTER SECTION -->
    <?php include_once "./templates/footer.php"; ?>
    <!-- END FOOTER SECTION -->

</body>

</html>