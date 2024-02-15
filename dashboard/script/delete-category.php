<?php
include "connect.php";

$id = $_GET['Id'];

$sql = "DELETE FROM category WHERE categoryID = $id";
mysqli_query($mysqli, $sql);

header("Location: ../pages-category.php");
die();
