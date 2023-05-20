<?php
require_once 'auth_only.php';

if (!isset($_GET['slot'])) {
    return;
}

$meeting;
require_once 'koneksi.php';

try {
    $stmt = $pdo->prepare("SELECT * FROM meetings WHERE slot = ?");
    $stmt->execute([$_GET['slot']]);

    $meeting = $stmt->fetch();
} catch(PDOException $e) {
    die($e->getMessage());
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PHP10 G</title>
</head>
<body>
    <h1>Form Mengubah Data Meeting</h1>
    <form action="php11G_action.php" method="POST">
        <div>
            <label>Slot:</label>
            <input value="<?= $meeting['slot'] ?>" readonly name="slot" type="text">
        </div>
        <div>
            <label>Name:</label>
            <input value="<?= $meeting['name'] ?>" required name="name" type="text">
        </div>
        <div>
            <label>Email:</label>
            <input value="<?= $meeting['email'] ?>" required name="email" type="email">
        </div>
        <div>
            <button type="submit">Ubah</button>
        </div>
    </form>
</body>
</html>