<?php
require_once 'auth_only.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (empty($_POST['slot']) || empty($_POST['name']) || empty($_POST['email'])) {
        die("400: Bad User Input");
    }

    require_once 'koneksi.php';
    try {
        $stmt = $pdo->prepare("UPDATE meetings SET name = ?, email = ? WHERE slot = ?");
        $stmt->execute([
            $_POST['name'],
            $_POST['email'],
            $_POST['slot']
        ]);

        header("Location: ./php10F.php");
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}