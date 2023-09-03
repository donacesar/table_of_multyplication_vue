<?php
session_start();
$_SESSION['positive'] = 0;
$_SESSION['negative'] = 0;
unset($_SESSION['message'], $_SESSION['a'], $_SESSION['b']);
header('Location: index.php');