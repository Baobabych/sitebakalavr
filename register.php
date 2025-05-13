<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include 'database/db_connect.php';

// Перевіряємо, якщо користувач авторизований то відправляємо на профілю
if (isset($_SESSION['email'])) {
    header("Location: profile.php");
    exit();
}


$success = "";
$err = "";
$listErr = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(empty($username)){
        $listErr['name'] = "Введіть ім'я";
    }

    if(empty($email)){
        $listErr['email'] = "Введіть email адресу";
    }

    if(empty($password)){
        $listErr['pass'] = "Введіть пароль";
    }

    if($username && $email) {
        // Перевіряємо чи існує користувач з таким email
        $checkEmailStmt = $conn->prepare("SELECT email FROM users WHERE email = ?");
        $checkEmailStmt->bind_param("s", $email);
        $checkEmailStmt->execute();
        $checkEmailStmt->store_result();

        if ($checkEmailStmt->num_rows > 0) {
            $listErr['email'] = "Користувач з таким Email вже існує";
        } else {
            // Prepare and bind
            $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $username, $email, md5($password));

            if ($stmt->execute()) {
                $success = "Аккаунт успішно створено";
            } else {
                $err = "Помилка: " . $stmt->error;
            }

            $stmt->close();
        }

        $checkEmailStmt->close();
    }
    $conn->close();

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MusaFind - Реєстрація</title>
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
    <h1>Реєстрація</h1>
    <?php
        //Виводимо помилки якщо є
        if(!empty($err)){
            echo "<p>".$err."</p>";
        }
    ?>
    <?php if(empty($success)){ ?>
    <form action="register.php" method="post">
        <input type="text" name="username" placeholder="Ім'я">
        <?php  if(!empty($listErr) && isset($listErr['name'])){
            echo "<strong style='color: red; margin-left: 20px'>".$listErr['name']."</strong><br>";
        } ?>
        <input type="text" name="email" placeholder="Email">
        <?php  if(!empty($listErr) && isset($listErr['email'])){
            echo "<strong style='color: red;margin-left: 20px'>".$listErr['email']."</strong><br>";
        } ?>
        <input type="password" name="password" placeholder="Password"><br>
        <?php  if(!empty($listErr) && isset($listErr['pass'])){
            echo "<strong style='color: red;margin-left: 20px'>".$listErr['pass']."</strong><br>";
        } ?>
        <button type="submit">Відправити</button>
    </form>
    <?php }else{
        echo "<strong style='color: green; font-size: 24px;text-align: center'>".$success."</strong>";
        echo '<p style="color:blue"><a href="menu_item.php">Авторизація</a></p>';
    } ?>
</main>
<footer>
      <?php include "partials/footer_item.php";?>
</footer>
</body>
<script src="js/search.js"></script>
</html>