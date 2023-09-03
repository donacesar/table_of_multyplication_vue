<?php
session_start();
unset($_SESSION['message']);
$_SESSION['submit'] = 'submit';
header('Location: index.php');