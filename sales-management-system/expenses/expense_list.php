<?php

require '../config/db.php';

$sql = "
SELECT *
FROM expenses
ORDER BY expense_id DESC
";

$stmt = $pdo->query($sql);

$expenses = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>

    <title>経費一覧</title>

    <link rel="stylesheet" href="../css/style.css">

</head>
<body>

<?php include '../includes/sidebar.php'; ?>

<div class="main">

    <div class="card">

        <h1>経費一覧</h1>

        <br>

        <a href="expense_add.php" class="btn btn-primary">
            + 経費登録
        </a>

        <br><br>

        <table class="table">

            <tr>
                <th>ID</th>
                <th>経費日</th>
                <th>経費名</th>
                <th>金額</th>
                <th>メモ</th>
                <th>操作</th>
            </tr>

            <?php foreach($expenses as $expense): ?>

            <tr>

                <td>
                    <?= $expense['expense_id'] ?>
                </td>

                <td>
                    <?= $expense['expense_date'] ?>
                </td>

                <td>
                    <?= $expense['expense_name'] ?>
                </td>

                <td>
                    ¥<?= number_format($expense['expense_amount']) ?>
                </td>

                <td>
                    <?= $expense['memo'] ?>
                </td>

                <td>

                    <a
                        href="expense_delete.php?id=<?= $expense['expense_id'] ?>"
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