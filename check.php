<?php
session_start();

$answer = $_GET['answer'];
$result = $_SESSION['a'] * $_SESSION['b'];

if ($answer !== '') {
    if ($answer == $result) {
        $_SESSION['message'] = 'Правильно!';
        $_SESSION['positive'] = $_SESSION['positive'] + 1;
        unset($_SESSION['a'], $_SESSION['b']);
    } else {
        $_SESSION['message'] = 'Не правильно! ( Ответ:  ' . $result . '  )';
        $_SESSION['negative'] = $_SESSION['negative'] + 1;
    }
} else {
    $_SESSION['message'] = '***';
}

$_SESSION['submit'] = 'submit';

header('Location: index.php');