<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: php11D.php");
}
