<?php
require_once 'auth_only.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (empty($_POST['slot']) || empty($_POST['name']) || empty($_POST['email'])) {
        die("400: Bad User Input");
    }

    require_once 'koneksi.php';
    try {
        $stmt = $pdo->prepare("INSERT INTO meetings (slot, name, email) VALUES (?, ?, ?)");
        $stmt->execute([
            $_POST['slot'],
            $_POST['name'],
            $_POST['email']
        ]);

        header("Location: ./php10F.php");
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}