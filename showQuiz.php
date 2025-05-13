<?php
session_start();
require_once 'database/db_connect.php';
require_once "lib/lib.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MusaFind - Вікторина</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/quiz.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Carattere:400|Alegreya+SC:400,400i,500,500i,700,700i,800,800i,900,900i|Pattaya:400">
</head>
<body>
<header>
    <div>
        <img src="img/key.png" alt="">
        <a class="logotxt" href="index.php">Musa Find</a>
    </div>
    <nav>
        <?php include "partials/menu_item.php";?>
    </nav>
</header>
<main>
    <div id="err" style="display: none" class="quizContent"><p>Помилка:данної вікторини не існує.</p></div>
    <p style="text-align: center; color:red;">Час до завершення: <span id="timer">30:00</span></p>
    <ol id="quiz"></ol>
    <button id="submit" onclick="submitQuiz()">Перевірити відповіді</button>
    <p id="res"></p>
</main>
<footer>
     <?php include "partials/footer_item.php";?>
</footer>

<script src="js/quiz.js"></script>



</body>

</html>