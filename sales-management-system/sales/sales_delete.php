<?php

require '../config/db.php';

$id = $_GET['id'];

$sql = "DELETE FROM sales WHERE sales_id = ?";

$stmt = $pdo->prepare($sql);

$stmt->execute([$id]);

header("Location: sales_list.php");

?>