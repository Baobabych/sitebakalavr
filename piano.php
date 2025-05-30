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
    <title>MusaFind - Зіграти мелодію</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/quiz.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Carattere:400|Alegreya+SC:400,400i,500,500i,700,700i,800,800i,900,900i|Pattaya:400">
    <style>
        .nowplaying {
            line-height: 1;
            color: #eee;
            text-shadow: 0 0 5rem #028ae9;
            transition: all .07s ease;
        }

        .keys {
            display: block;
            width: 100%;
            height: 350px;
            max-width: 880px;
            position: relative;
            margin: 40px auto 20px;
            cursor: none;
        }

        .key {
            position: relative;
            border: 4px solid black;
            border-radius: .5rem;
            transition: all .07s ease;
            display: block;
            box-sizing: border-box;
            z-index: 2;
        }

        .key:not(.sharp) {
            float: left;
            width: 10%;
            height: 100%;
            background: rgba(255, 255, 255, .8);
        }

        .key.sharp {
            position: absolute;
            width: 6%;
            height: 60%;
            background: #000;
            color: #eee;
            top: 0;
            z-index: 3;
        }

        .key[data-key="87"] {
            left: 7%;
        }

        .key[data-key="69"] {
            left: 17%;
        }

        .key[data-key="84"]  {
            left: 37%;
        }

        .key[data-key="89"] {
            left: 47%;
        }

        .key[data-key="85"] {
            left: 57%;
        }

        .key[data-key="79"] {
            left: 77%;
        }

        .key[data-key="80"] {
            left: 87%;
        }

        .playing {
            transform: scale(.95);
            border-color: #028ae9;
            box-shadow: 0 0 1rem #028ae9;
        }

        .hints {
            display: block;
            width: 100%;
            opacity: 0;
            position: absolute;
            bottom: 7px;
            transition: opacity .3s ease-out;
            font-size: 20px;
        }

        .keys:hover .hints {
            opacity: 1;
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
    <h1>Зіграйте свою мелодію</h1>
    <div class="nowplaying"></div>
    <div class="keys">
        <div data-key="65" class="key" data-note="C">
            <span class="hints">A</span>
        </div>
        <div data-key="87" class="key sharp" data-note="C#">
            <span class="hints">W</span>
        </div>
        <div data-key="83" class="key" data-note="D">
            <span class="hints">S</span>
        </div>
        <div data-key="69" class="key sharp" data-note="D#">
            <span class="hints">E</span>
        </div>
        <div data-key="68" class="key" data-note="E">
            <span class="hints">D</span>
        </div>
        <div data-key="70" class="key" data-note="F">
            <span class="hints">F</span>
        </div>
        <div data-key="84" class="key sharp" data-note="F#">
            <span class="hints">T</span>
        </div>
        <div data-key="71" class="key" data-note="G">
            <span class="hints">G</span>
        </div>
        <div data-key="89" class="key sharp" data-note="G#">
            <span class="hints">Y</span>
        </div>
        <div data-key="72" class="key" data-note="A">
            <span class="hints">H</span>
        </div>
        <div data-key="85" class="key sharp" data-note="A#">
            <span class="hints">U</span>
        </div>
        <div data-key="74" class="key" data-note="B">
            <span class="hints">J</span>
        </div>
        <div data-key="75" class="key" data-note="C">
            <span class="hints">K</span>
        </div>
        <div data-key="79" class="key sharp" data-note="C#">
            <span class="hints">O</span>
        </div>
        <div data-key="76" class="key" data-note="D">
            <span class="hints">L</span>
        </div>
        <div data-key="80" class="key sharp" data-note="D#">
            <span class="hints">P</span>
        </div>
        <div data-key="186" class="key" data-note="E">
            <span class="hints">;</span>
        </div>
    </div>

    <audio data-key="65" src="http://carolinegabriel.com/demo/js-keyboard/sounds/040.wav"></audio>
    <audio data-key="87" src="http://carolinegabriel.com/demo/js-keyboard/sounds/041.wav"></audio>
    <audio data-key="83" src="http://carolinegabriel.com/demo/js-keyboard/sounds/042.wav"></audio>
    <audio data-key="69" src="http://carolinegabriel.com/demo/js-keyboard/sounds/043.wav"></audio>
    <audio data-key="68" src="http://carolinegabriel.com/demo/js-keyboard/sounds/044.wav"></audio>
    <audio data-key="70" src="http://carolinegabriel.com/demo/js-keyboard/sounds/045.wav"></audio>
    <audio data-key="84" src="http://carolinegabriel.com/demo/js-keyboard/sounds/046.wav"></audio>
    <audio data-key="71" src="http://carolinegabriel.com/demo/js-keyboard/sounds/047.wav"></audio>
    <audio data-key="89" src="http://carolinegabriel.com/demo/js-keyboard/sounds/048.wav"></audio>
    <audio data-key="72" src="http://carolinegabriel.com/demo/js-keyboard/sounds/049.wav"></audio>
    <audio data-key="85" src="http://carolinegabriel.com/demo/js-keyboard/sounds/050.wav"></audio>
    <audio data-key="74" src="http://carolinegabriel.com/demo/js-keyboard/sounds/051.wav"></audio>
    <audio data-key="75" src="http://carolinegabriel.com/demo/js-keyboard/sounds/052.wav"></audio>
    <audio data-key="79" src="http://carolinegabriel.com/demo/js-keyboard/sounds/053.wav"></audio>
    <audio data-key="76" src="http://carolinegabriel.com/demo/js-keyboard/sounds/054.wav"></audio>
    <audio data-key="80" src="http://carolinegabriel.com/demo/js-keyboard/sounds/055.wav"></audio>
    <audio data-key="186" src="http://carolinegabriel.com/demo/js-keyboard/sounds/056.wav"></audio>

</main>

<footer>
     <?php include "partials/footer_item.php";?>
</footer>

<script>
    const keys = document.querySelectorAll(".key"),
        note = document.querySelector(".nowplaying"),
        hints = document.querySelectorAll(".hints");

    function playNote(e) {
        const audio = document.querySelector(`audio[data-key="${e.keyCode}"]`),
            key = document.querySelector(`.key[data-key="${e.keyCode}"]`);

        if (!key) return;

        const keyNote = key.getAttribute("data-note");

        key.classList.add("playing");
        note.innerHTML = keyNote;
        audio.currentTime = 0;
        audio.play();
    }

    function removeTransition(e) {
        if (e.propertyName !== "transform") return;
        this.classList.remove("playing");
    }

    function hintsOn(e, index) {
        e.setAttribute("style", "transition-delay:" + index * 50 + "ms");
    }

    hints.forEach(hintsOn);

    keys.forEach(key => key.addEventListener("transitionend", removeTransition));

    window.addEventListener("keydown", playNote);

</script>

</body>

</html>