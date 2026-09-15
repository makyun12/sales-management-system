<?php

session_start();

require 'config/db.php';

$error = '';

if(isset($_POST['login'])) {

    $user_id = $_POST['user_id'];
    $password = $_POST['password'];

    $sql = "
    SELECT *
    FROM users
    WHERE user_id = ?
    ";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([$user_id]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user && password_verify($password, $user['password'])) {

        $_SESSION['user'] = $user['user_id'];

        $_SESSION['name'] = $user['user_name'];

        $_SESSION['role'] = $user['role'];

        header("Location: dashboard.php");

        exit;

    } else {

        $error = "ログイン失敗";

    }
}

?>

<!DOCTYPE html>
<html>
<head>

    <title>Login</title>

    <link rel="stylesheet" href="css/style.css">

</head>
<body>

<div class="main">

    <div class="card">

        <h1>Login</h1>

        <br>

        <?php if($error): ?>

            <p style="color:red;">
                <?= $error ?>
            </p>

        <?php endif; ?>

        <form method="POST">

            <div class="form-group">

                <label>User ID</label>

                <input
                    type="text"
                    name="user_id"
                    required
                >

            </div>

            <div class="form-group">

                <label>Password</label>

                <input
                    type="password"
                    name="password"
                    required
                >

            </div>

            <button
                type="submit"
                name="login"
                class="btn btn-primary"
            >
                Login
            </button>

        </form>

    </div>

</div>

</body>
</html>