<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: php10A.php");
}
