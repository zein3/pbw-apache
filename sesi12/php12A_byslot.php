<?php

require_once 'koneksi.php';
header('Content-type: application/json');

if (!isset($_GET['slot'])) {
    echo json_encode([
        'status' => '400 Bad Request'
    ]);
}

try {
    $slot = $_GET['slot'];
    $stmt = $pdo->prepare('SELECT * FROM meetings WHERE slot = :slot');
    $stmt->execute(['slot' => $slot]);

    $results = $stmt->fetch();
    if ($results) {
        echo json_encode([
            'status' => '200 OK',
            'data' => $results
        ]);
    } else {
        echo json_encode([
            'status' => '200 OK',
            'data' => [],
            'message' => 'data not found'
        ]);
    }
} catch(PDOException $ex) {
    exit("PDO Error: ".$ex->getMessage()."<br>");
}