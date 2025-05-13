<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MusaFind - Ноти</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/notes.css">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
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
        <h1>Збірка нот</h1>
        <p>Введіть ім'я або прізвище композитора</p>
        <input type="text" id="inpSearch" placeholder="Поле для вводу">
        <button onclick="result()">ЗНАЙТИ</button>
        <div id="tips"></div>
        <div id="files"></div>
    </main>
    <footer>
         <?php include "partials/footer_item.php";?>
    </footer>
    <script src="js/search.js"></script>
</body>

</html>