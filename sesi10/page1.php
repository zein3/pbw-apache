<?php
require_once 'mylibrary.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page1</title>
</head>
<body>
    <h2>Hello visitor!</h2>
    <p>This is your page request no <?= count_requests() ?></p>
    <span>
        <a href="./page1.php">Continue</a>
        |
        <a href="./finish.php">Finish</a>
    </span>
</body>
</html>