<?php
session_start();
require_once 'database/db_connect.php';
require_once "lib/lib.php";
$quizs = getAllQuiz($conn);

// Функція для генерації класів клавіш
function getPianoClass($index) {
    $pattern = [1,0,1,0,1,1,0,1,0,1,0,1]; // Паттерн чорних клавіш (1 - чорна)
    return $pattern[$index % count($pattern)] ? 'black' : 'white';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MusaFind - Список вікторин</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/quiz.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Carattere:400|Alegreya+SC:400,400i,500,500i,700,700i,800,800i,900,900i|Pattaya:400">
    <style>

        .piano_container{
            display: flex;
            justify-content: center;
            align-items: flex-end;
            margin: 20px;
            font-family: sans-serif;
            position: relative;
        }

        .piano {
            position: relative;
            display: flex;
        }

        .white-key {
            position: relative;
            width: 80px;
            height: 300px;
            background: white;
            border: 1px solid black;
            text-align: center;
            line-height: 280px;
            text-decoration: none;
            color: black !important;
            font-weight: bold;
            z-index: 1;
            margin-right: -1px;
            box-sizing: border-box;
        }

        .white-key:hover {
            background: #e0e0e0;
            color:#000;
        }

        .black-key {
            position: relative;
            text-align: center;
            line-height: 280px;
            width: 80px;
            height: 180px;
            background: black;
            margin-left: -25px;
            z-index: 3;
            text-decoration: none;
            border-radius: 0 0 5px 5px;
            color:#fff;
            justify-content: center;
            text-align: center;
        }

        .black-key:hover {
            background: #333;
            color:#fff;
        }

        .black-key.spacer {
            visibility: hidden;
            pointer-events: none;
        }
    </style>
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
        <div class="title">
            <h1>Виберіть вікторину для проходження:</h1>
        </div>

        <?php if(!empty($quizs)): ?>
            <div class="piano_container">
                <div class="piano">
                    <?php foreach ($quizs as $index => $quiz): ?>
                        <?php if ($quiz['quiz_name'] % 2 !== 0): ?>
                            <a href="showQuiz.php?id=<?= $quiz['quiz_name'] ?>"
                               class="white-key"
                               onmouseenter="playSound('sound<?= $index+1 ?>')">
                                <?= htmlspecialchars($quiz['quiz_name']) ?>
                            </a>
                        <?php else: ?>
                            <a href="showQuiz.php?id=<?= $quiz['quiz_name'] ?>"
                               class="black-key"
                               onmouseenter="playSound('sound<?= $index+1 ?>')">
                                <?= htmlspecialchars($quiz['quiz_name']) ?>
                            </a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <audio id="sound1" src="sounds/do.mp3"></audio>
                <audio id="sound2" src="sounds/re.mp3"></audio>
                <audio id="sound3" src="sounds/mi.mp3"></audio>
                <audio id="sound4" src="sounds/fa.mp3"></audio>
                <audio id="sound5" src="sounds/sol.mp3"></audio>
                <audio id="sound6" src="sounds/do.mp3"></audio>
                <audio id="sound7" src="sounds/re.mp3"></audio>
                <audio id="sound8" src="sounds/mi.mp3"></audio>
                <audio id="sound9" src="sounds/fa.mp3"></audio>
                <audio id="sound10" src="sounds/sol.mp3"></audio>
                <audio id="sound11" src="sounds/do.mp3"></audio>
                <audio id="sound12" src="sounds/re.mp3"></audio>
                <audio id="sound13" src="sounds/mi.mp3"></audio>
                <audio id="sound14" src="sounds/fa.mp3"></audio>


            </div>
        <?php else: ?>
            <p class="no-quizzes">На даний час немає активних вікторин</p>
        <?php endif; ?>
    </main>
    <footer>
       <?php include "partials/footer_item.php";?>
    </footer>

    <script>
        function playSound(id) {
            const sound = document.getElementById(id);
            if (sound) {
                sound.currentTime = 0;
                sound.play();
            }
        }
    </script>

</body>

</html>