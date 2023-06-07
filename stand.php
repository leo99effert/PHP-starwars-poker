<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$_SESSION['round']++;
header('location:sabacc.php');

?>