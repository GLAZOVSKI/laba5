<?php
$fileName = 'fileTask8/users.txt';

if (isset($_POST['register'])) {
    $Fname = $_POST['Fname'];
    $Lname = $_POST['Lname'];
    $email = $_POST['email'];
    
    if (!empty($Fname) && !empty($Lname) && !empty($email)) {
      if (length($Fname, 2, 20)) {
          if (length($Lname, 2, 20)) {
              if (cyrillic($Fname)) {
                  if (cyrillic($Lname)) {
                    if (validEmail($email)) {
                        $data = $Lname.' '.$Fname.' '.$email;

                        if (is_registration($data, $fileName)) {
                            file_put_contents($fileName, "\r\n".$data, FILE_APPEND);
                            $success = 'Регистрация пройдена.';
                        }else {
                            $error = 'Такой пользователь существует.';
                        }
                    }else {
                        $error = 'Email введен некорректно.';
                    }
                  }else {
                      $error = 'Фамилия должна быть на кирилице.';
                  }
              }else {
                  $error = 'Имя должно быть на кирилице.';
              }
          }else {
              $error = 'Фамилия некорректной длины.';
          }
      }else {
         $error = 'Имя некорректной длины.';
      }
    }
}

function is_registration($str, $fileName) {
    $arrData = file($fileName);
    $pattern = '/\s+$/m';

    foreach ($arrData as $letter) {
        if (preg_replace($pattern, '', $letter) == $str) return false;
    }

    return true;
}

function validEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function cyrillic($str) {
    $count = iconv_strlen($str, 'UTF-8');

    for ($i = 0; $i < $count; $i++) {
        if (!preg_match("/[А-Яа-я]/mi", mb_substr($str, $i, 1))) return false;
    }

   return true;
}

function length($str, $min, $max){
    $count = iconv_strlen($str, 'UTF-8');
    return $count >= $min && $count <= $max;
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
    <title>8 задание</title>
</head>
<body class="bg-dark">
    <div class="container mt-4 col-6 bg-light rounded p-2 shadow">
            <div class="card-header">Регистрация</div>
            <form action="" method="post">
                <div class="form-group row mt-2">
                    <label for="Fname" class="col-md-2 col-form-label text-md-right">Имя <small class="text-danger">*</small></label>

                    <div class="col-md-8">
                        <input id="Fname" type="text" class="form-control" name="Fname" autofocus min="2" max="20" required>
                    </div>
                </div>

                <div class="form-group row mt-2">
                    <label for="Lname" class="col-md-2 col-form-label text-md-right">Фамилия <small class="text-danger">*</small></label>

                    <div class="col-md-8">
                        <input id="Lname" type="text" class="form-control" name="Lname" autofocus required>
                    </div>
                </div>

                <div class="form-group row mt-2">
                    <label for="email" class="col-md-2 col-form-label text-md-right">Email <small class="text-danger">*</small></label>

                    <div class="col-md-8">
                        <input id="email" type="email" class="form-control" name="email" autofocus required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-md-2 col-form-label text-md-right"></label>
                    <div class="col-md-8">
                        <button class="btn btn-success" name="register">Регистрация</button>
                    </div>
                </div>
            </form>

        <?php if (!empty($error)) { ?>
            <div class="form-group row mt-2">
                <label for="email" class="col-md-2 col-form-label text-danger text-md-right">Ошибка</label>
                <div class="col-md-8 text-danger mt-2"><?= $error; ?></div>
            </div>
        <?php } ?>

        <?php if (!empty($success)) { ?>
            <div class="form-group row mt-2">
                <label for="email" class="col-md-2 col-form-label text-success text-md-right">Успех</label>
                <div class="col-md-8 text-success mt-2"><?= $success; ?></div>
            </div>
        <?php } ?>

    </div>
</body>
</html>
