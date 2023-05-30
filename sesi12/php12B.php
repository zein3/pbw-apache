<?php

require_once 'koneksi.php';

try {
    $slot = $_POST['slot'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    $stmt = $pdo->prepare("INSERT INTO meetings (slot, name, email) VALUES (:slot, :name, :email)");
    $results = $stmt->execute([
        'slot' => $slot,
        'name' => $name,
        'email' => $email
    ]);

    if ($results) {
        $msg = "Data berhasil ditambahkan";
    } else {
        $msg = "Gagal";
    }

    $response = [
        'status' => '201 Created',
        'message' => $msg
    ];

    header('Content-type: application/json');
    echo json_encode($response);
} catch(PDOException $ex) {
    header('Content-type: application/json');
    echo json_encode([
        'status' => '400 Bad Request',
        'error' => $ex->getMessage()
    ]);
}