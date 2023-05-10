<?php
session_start();

if (time() - $_SESSION['timestamp'] > 5) {
    session_unset();
    session_destroy();
    header('Location: ./form1Session.php');
}

if (isset($_REQUEST['address'])) {
    $_SESSION['address'] = $_REQUEST['address'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?= $_SESSION['item'] . '<br>' ?>
    <?= $_SESSION['address'] . '<br>' ?>
</body>
</html>

<?php
session_unset();
session_destroy();