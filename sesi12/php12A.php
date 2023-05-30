<?php

require_once 'koneksi.php';

try {
    $sql = "SELECT * FROM meetings";
    $stmt = $pdo->query($sql)->fetchAll();

    if ($stmt) {
        foreach($stmt as $row) {
            $item[] = [
                'slot' => $row['slot'],
                'name' => $row['name'],
                'email' => $row['email']
            ];
        }
    }

    $response = [
        'status' => '200 OK',
        'data' => $item
    ];

    header('Content-type: application/json');
    echo json_encode($response);
} catch(PDOException $ex) {
    exit("PDO Error: ".$ex->getMessage()."<br>");
}