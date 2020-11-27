<?php
session_start();

if (isset($_POST['saveName']) && !empty($_POST['Fname']) && !empty($_POST['Lname'])) {
    $_SESSION['Fname'] = $_POST['Fname'];
    $_SESSION['Lname'] = $_POST['Lname'];
}

if (isset($_POST['deleteName'])) {
    unset($_SESSION['Fname']);
    unset($_SESSION['Lname']);
}

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

    $form = '<form action="" method="post">
                <button name="deleteName" class="btn btn-danger">Изменить имя</button>
            </form>';

}else {
    $form = '<form action="" method="post">
                <div class="input-group mb-3">
                  <input type="text" class="form-control" name="Fname" placeholder="Введите ваше имя" aria-describedby="basic-addon2">
                   <input type="text" class="form-control" name="Lname" placeholder="Введите вашу фамилию" aria-describedby="basic-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-outline-success" name="saveName">Сохранить</button>
                  </div>
                </div>
            </form>';
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
    <title>4 задание</title>
</head>
<body>
    <div class="container">
        <header class="card-header mb-4">
            <a href="fileTask4/page.php">Другая страница</a>
        </header>

        <div class="mb-4">
            <span class="h2"><?= $hello; ?></span>
        </div>

        <?= $form; ?>
    </div>
</body>
</html>