<?php
function getDistance($x,$y) {
    $x1 = (int)$x[0];
    $x2 = (int)$x[1];
    $y1 = (int)$y[0];
    $y2 = (int)$y[1];

    return sqrt((pow($x2 - $x1, 2)) + (pow($y2 - $y1, 2)));
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
    <title>Задание 1</title>
</head>
<body>
<div class="container mt-3">
    <h4>Нахождение расстояния между двумя точками в декартовой системе координат.</h4>
    <form action="" method="POST" enctype="application/x-www-form-urlencoded">
        <div class="pt-2">
            <label for="x1">Введите X1</label>
            <input type="number" name="x[]" id="x1"><br>

            <label for="x2">Введите X2</label>
            <input type="number" name="x[]" id="x2"><br>

            <label for="y1">Введите Y1</label>
            <input type="number" name="y[]" id="y1"><br>

            <label for="y2">Введите Y2</label>
            <input type="number" name="y[]" id="y2"><br>

            <input type="submit" class="btn btn-outline-primary mt-2" name="calc" value="Рассчитать">

            <div class="mt-2">
                <?php
                    if (isset($_POST['calc'])) {
                        echo "Растояние = ".getDistance($_POST['x'], $_POST['y']);
                    }
                ?>
            </div>
        </div>
    </form>
</div>
</body>
</html>
