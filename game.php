<?php

session_start();

if (!isset($_SESSION['round'])) {
    $_SESSION['round'] = 1;
}
if (!isset($_SESSION['hand'])) {
    $_SESSION['hand'] = [rand(-10, 10), rand(-10, 10)];
}
if (!isset($_SESSION['board'])) {
    $_SESSION['board'] = [];
}
if (!isset($_SESSION['total'])) {
    $_SESSION['total'] = array_sum($_SESSION['hand']) + array_sum($_SESSION['board']);
}
if (!isset($_SESSION['highscore'])) {
    $_SESSION['highscore'] = [];
}
if (!isset($_SESSION['bombs'])) {
    $_SESSION['bombs'] = 0;
}
if (!isset($_SESSION['idiots'])) {
    $_SESSION['idiots'] = 0;
}

?>