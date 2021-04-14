<?php

include_once "../connection/connection.php";

$id = $_POST["id"] ?? null;
$statement = $conn->prepare("DELETE FROM products WHERE id = :id");
$statement->bindValue(":id", $id);
$statement->execute();
header("Location: ../index.php");
?>