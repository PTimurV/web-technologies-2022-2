<!doctype html>
<html lang="ru">

<?php
$title = 'заголовок';
$h1 = 'h1';
$year = date('Y');

function timeNow() {
    $hour = date('H') + 2;
    $minute = date('i');

    if ($hour == 1 || $hour == 21) {
        $hStr = ' час';
    } elseif ($hour >= 5 && $hour <= 20){
        $hStr = ' часов';
    } else {
        $hStr = ' часа';
    }

    if (($minute < 20) && ($minute > 10)) {
        $mStr = ' минут.';
    }elseif ((($minute % 10) >= 2) && (($minute % 10) <= 4)) {
        $mStr = ' минуты.';
    } elseif (($minute % 10) === 1) {
        $mStr = ' минута.';
    }  else {
        $mStr = ' минут.';
    }

    return $hour . $hStr . ' ' . $minute . $mStr;
}

$result = timeNow();
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, 
    maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title  ?></title>
</head>

<body>
<h1><?= $h1 ?></h1>
<h1><?= $year ?></h1>

<h1> Текущее время: <?= $result ?></h1>
</body>
</html>
