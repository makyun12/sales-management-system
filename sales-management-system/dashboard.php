<?php
require 'includes/auth.php';
?>

<?php
require 'config/db.php';
$totalSales = $pdo->query(
"SELECT IFNULL(SUM(total_price),0) FROM sales"
)->fetchColumn();
$totalExpenses = $pdo->query(
"SELECT IFNULL(SUM(expense_amount),0) FROM expenses"
)->fetchColumn();
$netSales = $totalSales - $totalExpenses;
?>
<!DOCTYPE html>
<html>
<head>
 <title>Dashboard</title>
 <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="sidebar">

    <h2>売上管理</h2>

    <a href="dashboard.php">
        Dashboard
    </a>

    <a href="sales/sales_list.php">
        売上一覧
    </a>

    <a href="sales/sales_add.php">
        売上登録
    </a>

    <a href="expenses/expense_list.php">
        経費管理
    </a>

    <a href="products/product_list.php">
        商品管理
    </a>

    <a href="logout.php">
        Logout
    </a>

</div>
<div class="main">
 <h1>Dashboard</h1>
 <div class="card">
 <h2>売上合計</h2>
 <p>¥<?= number_format($totalSales) ?></p>
 </div>
 <div class="card">
 <h2>経費合計</h2>
 <p>¥<?= number_format($totalExpenses) ?></p>
 </div>
 <div class="card">
 <h2>純売上</h2>
 <p>¥<?= number_format($netSales) ?></p>
 </div>
</div>
</body>
</html>
