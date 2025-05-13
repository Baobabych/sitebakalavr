<?php
error_reporting(E_ERROR);
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Include library files
require 'lib/phpmailer/src/Exception.php';
require 'lib/phpmailer/src/PHPMailer.php';
require 'lib/phpmailer/src/SMTP.php';

include 'database/db_connect.php';

// Перевіряємо, якщо користувач авторизований то відправляємо на профілю
if (isset($_SESSION['email'])) {
    header("Location: profile.php");
    exit();
}

$message = "";
$err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Prepare and execute
    $stmt = $conn->prepare("SELECT email FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    //якщо існує такий email в БД
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($db_password);
        $stmt->fetch();

        $key =  bin2hex(random_bytes(6 / 2));
        $sql = $conn->prepare("UPDATE users SET password=? WHERE email=?");
        $sql->bind_param("ss", md5($key),$email);
        $sql->execute();


        $mail = new PHPMailer; //From email address and name
        $mail->From = "alexa.pavlii@gmail.com";
        $mail->FromName = "MusaFind"; //To address and name
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->Encoding = 'base64'; 
        $mail->Subject = "Зміна паролю MusaFind";
        $mail->Body = "<i>Ваш новий пароль для входу: {$key}</i>";


        //$message = "Новий пароль було відправлено на Ваш Email: {$key}";


        if(!$mail->send()) {
            $message =  "Mailer Error: " . $mail->ErrorInfo;
        } else {
            $message = "Новий пароль було відправлено на Ваш Email";
        }



    } else {
        $err = "Такий Email адрес не зареєстрований";
    }

    //закриаємо запит і з'єднання з БД
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MusaFind - Запит на зміну пароля</title>
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
    <h2 style="text-align: center">Запит на зміну пароля</h2>
    <?php
    //Виводимо помилки якщо є
    if(!empty($err)){
        echo "<p>".$err."</p>";
    }
    ?>
    <?php if(empty($message)){ ?>
    <form action="reset_password.php" method="post">
        <input type="text" name="email" placeholder="Email"><br>
        <button type="submit">Відправити</button>
    </form>
    <?php
    }else{
        echo "<h3 style='color:green'>".$message."</h3>";
    }
    ?>

</main>
<footer>
      <?php include "partials/footer_item.php";?>
</footer>
</body>
<script src="js/search.js"></script>
</html>
