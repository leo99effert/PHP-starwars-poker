<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$_SESSION['hand'][] = rand(-13, 13);
$_SESSION['total'] = array_sum($_SESSION['hand']) + array_sum($_SESSION['board']);
$_SESSION['round']++;
header('location:sabacc.php');

?>