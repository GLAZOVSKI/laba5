<?php
$fileName = 'fileTask2/content.txt';

if(isset($_POST['save'])) {
 file_put_contents($fileName, $_POST['text'], LOCK_EX);
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
    <title>Задание 2</title>
</head>
<body>
<div class="container mt-3">
    <h4>Запись данных в файл</h4>

    <form action="" method="post">
        <textarea class="col-md-12" rows="5" placeholder="Введите текст" name="text"><?= file_get_contents($fileName); ?></textarea><br>
        <button class="btn btn-primary" name="save">Сохранить</button>
    </form>

</div>
</body>
</html>
