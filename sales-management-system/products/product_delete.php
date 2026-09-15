<?php

require '../config/db.php';

$code = $_GET['code'];

$sql = "DELETE FROM products WHERE product_code = ?";

$stmt = $pdo->prepare($sql);

$stmt->execute([$code]);

header("Location: product_list.php");

?>