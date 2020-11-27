<?php
session_start();

if (isset($_SESSION['Fname']) && isset($_SESSION['Lname'])) {
    $date = date('G');

    if ($date > 0 && $date < 5) {
        $hello = "Доброй ночи, {$_SESSION['Fname']} {$_SESSION['Lname']}!";
    }elseif ($date > 5 && $date < 11) {
        $hello = "Доброе утро, {$_SESSION['Fname']} {$_SESSION['Lname']}!";
    }elseif ($date > 5 && $date < 11) {
        $hello = "Добрый день, {$_SESSION['Fname']} {$_SESSION['Lname']}!";
    }elseif ($date > 16 && $date < 23) {
        $hello = "Добрый вечер, {$_SESSION['Fname']} {$_SESSION['Lname']}!";
    }
}
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Другая страница сайта</title>
</head>
<body>
    <div class="container">
        <header class="card-header mb-4">
            <a href="/task4.php">Главная страница</a>
        </header>

        <div class="mb-4">
            <span class="h2"><?= $hello; ?></span>
        </div>
    </div>
</body>
</html>