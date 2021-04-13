<?php
// dsn string defines the connection to the database
$dsn = "mysql:host=localhost;port=3306;dbname=products_crud";
$conn = new PDO($dsn, "root", "");
// thows exception if there's any error
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>