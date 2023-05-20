<?php

require_once 'koneksi.php';

try {
    $stmt = $pdo->prepare('SELECT * FROM meetings WHERE name LIKE ?');
    $stmt->execute([ '%'.$_GET['keyword'].'%' ]);

    if ($stmt) {
        echo json_encode($stmt->fetchAll());
    } else {
        echo "no suggestion";
    }
} catch (PDOException $ex) {
    echo $ex->getMessage();
}