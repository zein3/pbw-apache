<?php

function getAll() {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://localhost/praktikum/sesi12/php12A.php");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $output = curl_exec($ch);

    $data = json_decode($output, true);

    echo "<table>";
    foreach($data['data'] as $row) {
        echo "<tr>";
        echo "<td>".$row['slot']."</td>";
        echo "<td>".$row['name']."</td>";
        echo "<td>".$row['email']."</td>";
        echo "</tr>";
    }
    echo "</table>";
}

function post(int $slot, string $name, string $email) {
    $ch = curl_init();
    $data = [
        'slot' => $slot,
        'name' => $name,
        'email' => $email
    ];

    curl_setopt($ch, CURLOPT_URL,"http://localhost/praktikum/sesi12/php12B.php");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    
    curl_exec($ch);
    curl_close($ch);
}

function put(int $slot, string $name, string $email) {
    $ch = curl_init();
    $data = [
        'slot' => $slot,
        'name' => $name,
        'email' => $email
    ];

    curl_setopt($ch, CURLOPT_URL,"http://localhost/praktikum/sesi12/php12C.php");
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    
    curl_exec($ch);
    curl_close($ch);
}

function delete(int $slot) {
    $ch = curl_init();
    $data = [
        'slot' => $slot
    ];

    curl_setopt($ch, CURLOPT_URL,"http://localhost/praktikum/sesi12/php12D.php");
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    
    curl_exec($ch);
    curl_close($ch);
}

getAll();