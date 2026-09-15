<?php
require '../config/db.php';

$sql = "
SELECT 
    sales.sales_id,
    sales.sales_date,
    products.product_name,
    sales.quantity,
    sales.total_price,
    sales.payment_method
FROM sales
LEFT JOIN products
ON sales.product_code = products.product_code
ORDER BY sales.sales_id DESC
";

$stmt = $pdo->query($sql);
$sales = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>売上一覧</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<?php include '../includes/sidebar.php'; ?>



<div class="main">

    <div class="card">

        <h1>売上一覧</h1>

        <br>

<form method="GET" action="export_csv.php">

    <div class="form-group">

        <label>開始日</label>

        <input
            type="date"
            name="start_date"
            required
        >

    </div>

    <div class="form-group">

        <label>終了日</label>

        <input
            type="date"
            name="end_date"
            required
        >

    </div>

    <button
        type="submit"
        class="btn btn-primary"
    >
        CSV出力
    </button>

</form>

<br>

        <br>

        <a href="sales_add.php" class="btn btn-primary">
            + 売上登録
        </a>

        <br><br>

        <table class="table">

            <tr>
                <th>ID</th>
                <th>売上日</th>
                <th>商品名</th>
                <th>数量</th>
                <th>合計金額</th>
                <th>支払方法</th>
                <th>操作</th>
            </tr>

            <?php foreach($sales as $sale): ?>

            <tr>
                <td><?= $sale['sales_id'] ?></td>

                <td><?= $sale['sales_date'] ?></td>

                <td><?= $sale['product_name'] ?></td>

                <td><?= $sale['quantity'] ?></td>

                <td>
                    ¥<?= number_format($sale['total_price']) ?>
                </td>

                <td><?= $sale['payment_method'] ?></td>

                <td>
                    <a 
                        href="sales_delete.php?id=<?= $sale['sales_id'] ?>"
                        class="btn btn-danger"
                        onclick="return confirm('削除しますか？')"
                    >
                        削除
                    </a>
                </td>
            </tr>

            <?php endforeach; ?>

        </table>

    </div>

</div>

</body>
</html>