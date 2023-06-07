<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if(in_array(0, $_SESSION['hand']) and
   in_array(2, $_SESSION['hand']) || in_array(-2, $_SESSION['hand']) and
   in_array(3, $_SESSION['hand']) || in_array(-3, $_SESSION['hand']))
       $_SESSION['idiots']++; 
else if(abs($_SESSION['total']) > 23) $_SESSION['bombs']++;
else $_SESSION['highscore'][] = abs($_SESSION['total']);

rsort($_SESSION['highscore']);
unset($_SESSION['round']);
unset($_SESSION['hand']);
unset($_SESSION['board']);
unset($_SESSION['total']);
header('location:sabacc.php');

?>