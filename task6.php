<?php
function blockBrowser($browser) {
    if(strpos($_SERVER['HTTP_USER_AGENT'], $browser)) {
        die("Этот сайт не поддерживает браузер Edge");
    }
}
blockBrowser('Edg');
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>6 задание</title>
</head>
<body>
    <div class="container mt-4">
        Этот сайт поддерживает ваш браузер.
    </div>
</body>
</html>
