<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$card = $_POST['card'];
$index = array_search($card, $_SESSION['hand']);
unset($_SESSION['hand'][$index]);
$_SESSION['hand'][] = rand(-13, 13);
$_SESSION['total'] = array_sum($_SESSION['hand']) + array_sum($_SESSION['board']);
$_SESSION['round']++;
header('location:sabacc.php');

?>