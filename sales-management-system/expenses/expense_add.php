<?php

require '../config/db.php';

if(isset($_POST['submit'])) {

    $expense_date = $_POST['expense_date'];
    $expense_name = $_POST['expense_name'];
    $expense_amount = $_POST['expense_amount'];
    $memo = $_POST['memo'];

    $user_id = 'admin';

    $sql = "
    INSERT INTO expenses(
        expense_date,
        expense_name,
        expense_amount,
        memo,
        user_id
    )
    VALUES(?,?,?,?,?)
    ";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        $expense_date,
        $expense_name,
        $expense_amount,
        $memo,
        $user_id
    ]);

    header("Location: expense_list.php");
}

?>

<!DOCTYPE html>
<html>
<head>

    <title>経費登録</title>

    <link rel="stylesheet" href="../css/style.css">

</head>
<body>

<?php include '../includes/sidebar.php'; ?>

<div class="main">

    <div class="card">

        <h1>経費登録</h1>

        <form method="POST">

            <div class="form-group">

                <label>経費日</label>

                <input
                    type="date"
                    name="expense_date"
                    required
                >

            </div>

            <div class="form-group">

                <label>経費名</label>

                <input
                    type="text"
                    name="expense_name"
                    required
                >

            </div>

            <div class="form-group">

                <label>金額</label>

                <input
                    type="number"
                    name="expense_amount"
                    required
                >

            </div>

            <div class="form-group">

                <label>メモ</label>

                <input
                    type="text"
                    name="memo"
                >

            </div>

            <button
                type="submit"
                name="submit"
                class="btn btn-primary"
            >
                登録
            </button>

        </form>

    </div>

</div>

</body>
</html>