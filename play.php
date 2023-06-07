<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$card = $_POST['card'];
$index = array_search($card, $_SESSION['hand']);
unset($_SESSION['hand'][$index]);
$_SESSION['board'][] = $card;
$_SESSION['round']++;
header('location:sabacc.php');

?>