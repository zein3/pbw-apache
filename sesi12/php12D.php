<?php

require_once 'koneksi.php';

try {
    parse_str(file_get_contents("php://input"), $_DELETE);
    $slot = $_DELETE['slot'];

    $stmt = $pdo->prepare("DELETE FROM meetings WHERE slot = :slot");
    $results = $stmt->execute([
        'slot' => $slot
    ]);

    if ($results) {
        $msg = "Data berhasil dihapus";
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