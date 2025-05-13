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
    <title>MusaFind - Епохи</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/era.css">
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
        <div class="content">
            <img onclick="plusSlides(-1)" src="img/arrowSmall.png" alt="">
            <div class="back1 back">
                <div class="text">
                    <h2>БАРОКО</h2>
                    <p>Розкіш, декорації, контрастність та шквал емоцій</p>
                    <form action="barocco.php">
                        <button>ТЕЛЕПОРТАЦІЯ</button>
                    </form>
                    <div class="outerRects">
                        <div class="rects">
                            <div class="active" onclick="currentSlide(1)"></div>
                            <div onclick="currentSlide(2)"></div>
                            <div onclick="currentSlide(3)"></div>
                            <div onclick="currentSlide(4)"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="back2 back">
                <div class="text">
                    <h2>КЛАСИЦИЗМ</h2>
                    <p>Простота, ясність, раціональність та гармонія.</p>
                    <form action="classicism.php">
                        <button>ТЕЛЕПОРТАЦІЯ</button>
                    </form>
                    <div class="outerRects">
                        <div class="rects">
                            <div onclick="currentSlide(1)"></div>
                            <div class="active" onclick="currentSlide(2)"></div>
                            <div onclick="currentSlide(3)"></div>
                            <div onclick="currentSlide(4)"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="back3 back">
                <div class="text">
                    <h2>РОМАНТИЗМ</h2>
                    <p>Експресивність, індивідуалізм, політ фантазії. "Інтелект помиляється, а почуття - ніколи!"</p>
                    <form action="romanticism.php">
                        <button>ТЕЛЕПОРТАЦІЯ</button>
                    </form>
                    <div class="outerRects">
                        <div class="rects">
                            <div onclick="currentSlide(1)"></div>
                            <div onclick="currentSlide(2)"></div>
                            <div class="active" onclick="currentSlide(3)"></div>
                            <div onclick="currentSlide(4)"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="back4 back">
                <div class="text">
                    <h2>МОДЕРНІЗМ</h2>
                    <p>Експериментаторство, новаторство, різноманітність та відмова від традиційних музичних норм.</p>
                    <form action="modernism.php">
                        <button>ТЕЛЕПОРТАЦІЯ</button>
                    </form>
                    <div class="outerRects">
                        <div class="rects">
                            <div onclick="currentSlide(1)"></div>
                            <div onclick="currentSlide(2)"></div>
                            <div onclick="currentSlide(3)"></div>
                            <div class="active" onclick="currentSlide(4)"></div>
                        </div>
                    </div>
                </div>
            </div>
            <img onclick="plusSlides(1)" class="rot" src="img/arrowSmall.png" alt="">
        </div>
    </main>
    <footer>
        <?php include "partials/footer_item.php";?>
    </footer>
</body>
<script src="js/carousel.js"></script>
</html>