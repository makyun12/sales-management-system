<?php
require '../config/db.php';
if (isset($_POST['submit'])) {
    $sales_date = $_POST['sales_date'];
    $product_code = $_POST['product_code'];
    $quantity = $_POST['quantity'];
    $payment_method = $_POST['payment_method'];
    $user_id = 'admin';
    $stmt = $pdo->prepare(
        "SELECT price FROM products WHERE product_code=?"
    );
    $stmt->execute([$product_code]);
    $price = $stmt->fetchColumn();
    $total_price = $price * $quantity;
    $sql = "INSERT INTO sales(
 sales_date,
 product_code,
 quantity,
 total_price,
 payment_method,
 user_id
 )
 VALUES(?,?,?,?,?,?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $sales_date,
        $product_code,
        $quantity,
        $total_price,
        $payment_method,
        $user_id
    ]);
    $updateStock = $pdo->prepare(
        "UPDATE products
     SET stock = stock - ?
     WHERE product_code = ?"
    );

    $updateStock->execute([
        $quantity,
        $product_code
    ]);
    header("Location: sales_list.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>売上登録</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<?php include '../includes/sidebar.php'; ?>

<div class="main">
        <div class="card">
            <h1>売上登録</h1>
            <form method="POST">
                <div class="form-group">
                    <label>売上日</label>
                    <input type="date" name="sales_date" required>
                </div>
                <div class="form-group">
                    <label>商品</label>

                    <select name="product_code" required>

                        <option value="">
                            選択してください
                        </option>

                        <?php
                        $products = $pdo->query(
                            "SELECT * FROM products"
                        );

                        foreach ($products as $product):
                            ?>

                            <option value="<?= $product['product_code'] ?>">

                                <?= $product['product_name'] ?>

                                (¥<?= number_format($product['price']) ?>)

                            </option>

                        <?php endforeach; ?>

                    </select>
                </div>
                <div class="form-group">
                    <label>販売数</label>
                    <input type="number" name="quantity" required>
                </div>
                <div class="form-group">
                    <label>支払方法</label>
                    <select name="payment_method">
                        <option>現金</option>
                        <option>カード</option>
                        <option>QR決済</option>
                    </select>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">
                    登録
                </button>
            </form>
        </div>
    </div>
</body>

</html>