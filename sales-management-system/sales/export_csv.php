<?php

require '../config/db.php';

$start_date = $_GET['start_date'];
$end_date = $_GET['end_date'];

header('Content-Type: text/csv; charset=UTF-8');
header('Content-Disposition: attachment; filename="sales.csv"');

echo "\xEF\xBB\xBF";

$output = fopen('php://output', 'w');

fputcsv($output, [
    'ID',
    '売上日',
    '商品コード',
    '数量',
    '合計金額',
    '支払方法'
]);

$sql = "
SELECT
    sales_id,
    sales_date,
    product_code,
    quantity,
    total_price,
    payment_method
FROM sales
WHERE sales_date BETWEEN ? AND ?
ORDER BY sales_date ASC
";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    $start_date,
    $end_date
]);

while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

    fputcsv($output, [
        $row['sales_id'],
        $row['sales_date'],
        $row['product_code'],
        $row['quantity'],
        $row['total_price'],
        $row['payment_method']
    ]);

}

fclose($output);

exit;