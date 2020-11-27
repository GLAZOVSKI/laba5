<?php
$fileName = 'fileTask3/list.txt';

if (isset($_POST['save']) && !empty($_POST['check'])) {
    $lines = file($fileName); // Массив строк из файла
    $selectStrings = $_POST['check']; // Выбранные строки
    $newArrStrings = [];

    foreach ($lines as $key => $value) {
        $flag = false;

        foreach ($selectStrings as $k => $v) {
            if ($key == $k) {
                $flag = true;
                break;
            }
        }

        if ($flag) continue; // Пропустить строку если она помечена

        $newArrStrings[] = $value;
    }

    file_put_contents($fileName, $newArrStrings);
}

$lines = file($fileName);
$content = '';
$numLine = 0;

foreach ($lines as $line) {
    $content .= '
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="check['.$numLine.']" id="'.$numLine.'">
                <label class="form-check-label" for="'.$numLine.'">'.$line.'</label>
            </div>
    ';
    $numLine++;
}

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Задание 3</title>
</head>
<body>
<div class="container mt-3">
    <h4>Список из файла</h4>
    <form action="" method="post">
        <?= $content; ?>
        <button class="btn btn-primary mt-2" name="save">Сохранить</button>
    </form>
</div>
</body>
</html>
