<?php

require_once 'koneksi.php';

try {
    parse_str(file_get_contents("php://input"), $_PUT);
    $slot = $_PUT['slot'];
    $name = $_PUT['name'];
    $email = $_PUT['email'];

    $stmt = $pdo->prepare("UPDATE meetings SET name = :name, email = :email WHERE slot = :slot");
    $results = $stmt->execute([
        'slot' => $slot,
        'name' => $name,
        'email' => $email
    ]);

    if ($results) {
        $msg = "Data berhasil diubah";
    } else {
        $msg = "Gagal";
    }

    $response = [
        'status' => '200 Ok',
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