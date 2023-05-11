<?php
require_once 'auth_only.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PHP10 E</title>
</head>
<body>
    <h1>Form Menambahkan Data Meeting</h1>
    <form action="php10E_action.php" method="POST">
        <div>
            <label>Slot:</label>
            <input required name="slot" type="text">
        </div>
        <div>
            <label>Name:</label>
            <input required name="name" type="text">
        </div>
        <div>
            <label>Email:</label>
            <input required name="email" type="email">
        </div>
        <div>
            <button type="submit">Tambah</button>
        </div>
    </form>
</body>
</html>