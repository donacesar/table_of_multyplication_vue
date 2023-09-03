<?php
session_start();
include "helpers.php";
if (!isset($_SESSION['submit'])) {
    header('Location: clear_form.php');
}
unset ($_SESSION['submit']);

//showSession();

if (!isset($_SESSION['positive'])) $_SESSION['positive'] = 0;
if (!isset($_SESSION['negative'])) $_SESSION['negative'] = 0;
if (!isset($_SESSION['message'])) $_SESSION['message'] = '&nbsp';
if ($_SESSION['message'] !== '***' and !isset($_SESSION['a'])) {
    $_SESSION['a'] = rand(0, 10);
    $_SESSION['b'] = rand(0, 10);
}
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="js/jquery-3.6.1.min.js"></script>
    <script src="js/keyboard.js"></script>
    <link rel="stylesheet" href="main.css">
    <title>Умножение</title>
</head>
<body class="bg-zinc-400 noselect">
<div class="py-8 px-8 max-w-sm mx-auto bg-white rounded-xl shadow-lg space-y-2 sm:py-4 sm:flex sm:items-center sm:space-y-0 sm:space-x-6 bg-zinc-200 my-1">
    <div class="text-center space-y-2 sm:text-left rounded-xl py-8 px-8 bg-zinc-100">
        <div class="space-y-0.5">
            <div><p class="text-lg text-blue-900 font-semibold">Правильных ответов: <?= $_SESSION['positive'] ?></p>
            </div>
            <div><p class="text-lg text-red-900 font-semibold">Неправильных ответов: <?= $_SESSION['negative'] ?></p>
            </div>
            <div class="my-spin text-lg text-black font-semibold"><?php if (isset($_SESSION['message'])) echo $_SESSION['message']; ?></div>
        </div>
        <div>
            <form class="form-input px-4 py-3 rounded-full shadow-sm" action="check.php">

                <div style="margin-bottom: 20px" class="animate-bounce">
                    <p class="text-2xl text-cyan-900 font-semibold">
                        <span class="shadow-lg rounded-lg bg-zinc-50 py-1 px-5">
                            <?= $_SESSION['a'] . ' &#215 ' . $_SESSION['b'] . '=' ?>
                        </span>
                    </p>
                </div>
                <div style="margin-bottom: 20px"><input type="number" inputmode="decimal" name="answer" id="answer"
                                                        autofocus class="form-input px-2 py-1 rounded-full shadow-xl">
                </div>

                <!--keyboard-->
                <div class="keyboard my-3 text-lg">
                    <div class="row">
                        <div class="shadow-xl" id="num1">1</div>
                        <div class="shadow-xl" id="num2">2</div>
                        <div class="shadow-xl" id="num3">3</div>
                        <div class="shadow-xl" id="num4">4</div>
                    </div>
                    <div class="row">
                        <div class="shadow-xl" id="num5">5</div>
                        <div class="shadow-xl" id="num6">6</div>
                        <div class="shadow-xl" id="num7">7</div>
                        <div class="shadow-xl" id="num8">8</div>
                    </div>
                    <div class="row">
                        <div class="shadow-xl" id="num9">9</div>
                        <div class="shadow-xl" id="num0">0</div>
                        <div class="shadow-xl" id="num-del"><</div>
                    </div>

                </div>


                <div style="margin-bottom: 25px" class="shadow-sm">
                    <button type="submit"
                            class="px-4 py-1 text-sm text-black font-semibold rounded-full border border-black hover:text-white hover:bg-black hover:border-transparent focus:outline-none focus:ring-2 focus:ring-black focus:ring-offset-2 shadow-xl">
                        Проверить
                    </button>
                </div>
                <div style="margin-bottom: 15px">
                    <button class="px-4 py-1 text-sm text-black font-semibold rounded-full border border-black hover:text-white hover:bg-red-300 hover:border-transparent focus:outline-none focus:ring-2 focus:ring-black focus:ring-offset-2 shadow-xl">
                        <a href="reset.php">СБРОС</a></button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>

