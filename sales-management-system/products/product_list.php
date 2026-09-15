<?php

require '../config/db.php';

$sql = "SELECT * FROM products ORDER BY product_code ASC";

$stmt = $pdo->query($sql);

$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>

    <title>商品管理</title>

    <link rel="stylesheet" href="../css/style.css">

</head>
<body>

<?php include '../includes/sidebar.php'; ?>

<div class="main">

    <div class="card">

        <h1>商品管理</h1>

        <br>

        <a href="product_add.php" class="btn btn-primary">
            + 商品追加
        </a>

        <br><br>

        <table class="table">

            <tr>
                <th>商品コード</th>
                <th>商品名</th>
                <th>価格</th>
                <th>在庫</th>
                <th>操作</th>
            </tr>

            <?php foreach($products as $product): ?>

            <tr>

                <td>
                    <?= $product['product_code'] ?>
                </td>

                <td>
                    <?= $product['product_name'] ?>
                </td>

                <td>
                    ¥<?= number_format($product['price']) ?>
                </td>

                <td>
                    <?= $product['stock'] ?>
                </td>

                <td>

                    <a
                        href="product_delete.php?code=<?= $product['product_code'] ?>"
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