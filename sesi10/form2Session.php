<?php
session_start();
if (isset($_REQUEST['item'])) {
    $_SESSION['item'] = $_REQUEST['item'];
    $_SESSION['timestamp'] = time();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form 2</title>
</head>
<body>
    <form action="processSession.php" method="POST">
        <label>Address: </label>
        <input type="text" name="address">
        <input type="submit" value="Send">
    </form>
</body>
</html>