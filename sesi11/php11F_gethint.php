<?php

require_once 'koneksi.php';

try {
    $stmt = $pdo->prepare('SELECT * FROM meetings WHERE name LIKE ?');
    $stmt->execute([ '%'.$_GET['keyword'].'%' ]);

    $hint = '';
    if ($stmt) {
        foreach ($stmt as $row) {
            if ($hint == "") {
                $hint = $row['name'];
            } else {
                $hint .= "," . $row['name'];
            }
        }
    }

    echo empty($hint) ? "no suggestion" : $hint;
} catch (PDOException $ex) {
    echo $ex->getMessage();
}