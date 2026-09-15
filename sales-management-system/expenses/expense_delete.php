<?php

require '../config/db.php';

$id = $_GET['id'];

$sql = "DELETE FROM expenses WHERE expense_id = ?";

$stmt = $pdo->prepare($sql);

$stmt->execute([$id]);

header("Location: expense_list.php");

?>