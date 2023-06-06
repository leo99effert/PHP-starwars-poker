<?php

session_start();
$_SESSION['round']++;
header('location:sabacc.php');

?>