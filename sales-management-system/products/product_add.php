<?php

require '../config/db.php';

if(isset($_POST['submit'])) {

    $product_code = $_POST['product_code'];
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    $sql = "
    INSERT INTO products(
        product_code,
        product_name,
        price,
        stock
    )
    VALUES(?,?,?,?)
    ";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        $product_code,
        $product_name,
        $price,
        $stock
    ]);

    header("Location: product_list.php");
}

?>

<!DOCTYPE html>
<html>
<head>

    <title>商品追加</title>

    <link rel="stylesheet" href="../css/style.css">

</head>
<body>

<?php include '../includes/sidebar.php'; ?>

<div class="main">

    <div class="card">

        <h1>商品追加</h1>

        <form method="POST">

            <div class="form-group">

                <label>商品コード</label>

                <input
                    type="text"
                    name="product_code"
                    required
                >

            </div>

            <div class="form-group">

                <label>商品名</label>

                <input
                    type="text"
                    name="product_name"
                    required
                >

            </div>

            <div class="form-group">

                <label>価格</label>

                <input
                    type="number"
                    name="price"
                    required
                >

            </div>

            <div class="form-group">

                <label>在庫</label>

                <input
                    type="number"
                    name="stock"
                    required
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