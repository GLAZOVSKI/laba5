<?php
saveIP($_SERVER['SERVER_ADDR']);

function saveIP($ip, $fileName = 'fileTask7/ips.txt') {
    $arrIP = file($fileName); // Строки из файла в массив
    $flag = false; // Переключатель найденного ip в массиве

    for ($i = 0; $i < count($arrIP); $i++) {
        if (clearIP($arrIP[$i]) == $ip) {
            $count = clearCount($arrIP[$i]) + 1;

            $newDataIP = clearIP($arrIP[$i]).'::'.$count; // Новая строка с IP и счетчиком

            $arrIP[$i] = $newDataIP."\r\n";
            $flag = true;
            break;
        }
    }

    if (!$flag) {
        $arrIP[] = $ip . "::0\r\n";
    }

    file_put_contents($fileName, $arrIP, LOCK_EX);
}

function clearIP($ip) { // Отчищает ip от счетчика
    $patternIP = '/\s|::.+|\s/m';
    return preg_replace($patternIP, '', $ip);
}

function clearCount($ip):int { // Отчищает счетчик от ip
    $patternCount = '/.+::/m';
    return preg_replace($patternCount, '', $ip);
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
    <title>7 задание</title>
</head>
<body>
<div class="container mt-2">
    <h4>Ваш IP: <?= $_SERVER['SERVER_ADDR']; ?> </h4>
</div>
</body>
</html>
