<?php

if(!empty($_POST['username']) && !empty($_POST['password'])) {
    $pdo = new PDO("mysql:host=localhost;dbname=sembilan;charset=utf8mb4", "sembilan", "sembilan");
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->execute([$_POST['username'], $_POST['password']]);

    if ($stmt->rowCount() >= 1) {
        // berhasil login
        session_start();
        $_SESSION['username'] = $_POST['username'];
        header("Location: ./php10F.php");
    } else {
        echo "username atau password salah";
    }

} else {
    echo "username atau password kosong";
}