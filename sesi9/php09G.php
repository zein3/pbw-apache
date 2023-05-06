<?php

if (!isset($_GET['slot'])) {
    return;
}

$meeting;
$db_hostname = "localhost";
$db_database = "sembilan";
$db_username = "sembilan";
$db_password = "sembilan";
$db_charset = "utf8mb4";
$dsn = "mysql:host=$db_hostname;dbname=$db_database;charset=$db_charset";
$opt = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false
);

try {
    $pdo = new PDO($dsn, $db_username, $db_password, $opt);
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

    <title>PHP09 G</title>
</head>
<body>
    <h1>Form Mengubah Data Meeting</h1>
    <form action="php09G_action.php" method="POST">
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