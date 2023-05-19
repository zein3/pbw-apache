<?php
require_once 'auth_only.php';

if (isset($_GET['slot']) && is_numeric($_GET['slot'])) {
    require_once 'koneksi.php';

    try {
        $stmt = $pdo->prepare("DELETE FROM meetings WHERE slot = ?");
        $stmt->execute([$_GET['slot']]);

        header("Location: ./php10F.php");
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}