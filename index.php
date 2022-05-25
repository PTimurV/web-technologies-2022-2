<!DOCTYPE html>
<html lang='ru'>
<?php

function first($a, $b) {
    if($a >= 0 && $b >= 0) {
        return $a - $b;
    }
    else if($a < 0 && $b < 0) {
        return $a * $b;
    }
    else {
        return $a + $b;
    }

}

function second() {
    $a = mt_rand(0, 15);
    $str="";
    for ($i = $a; $i <= 15; $i++) {
        switch ($i) {
            default:
                $str .= $i . ' ';
        }
    }
    echo $str;
}

function third($arg1, $arg2, $operation){
    switch ($operation){
        case 'Сложение': return $arg1 + $arg2;
        case 'Разность': return $arg1 - $arg2;
        case 'Произведение': return $arg1 * $arg2;
        case 'Деление': return $arg1 / $arg2;
        default: return 'Ошибка';
    }
}

$year = date('Y');

function fifth() {
    $i = 0;

    do {
        if ($i == 0) {
            echo $i . ' – это ноль' . '<br>';
        } elseif ($i% 2 == 1) {
            echo $i . ' – нечетное число' . '<br>';
        } else {
            echo $i . ' – четное число' . '<br>';;
        }
        $i++;
    } while ($i <= 10);

}

function sixth() {
    $obls = [
        'Московская область' => ['Москва', 'Зеленоград', 'Клин'],
        'Ленинградская область' => ['Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт'],
        'Рязанская область' => ['Рязань', 'Касимов', 'Рыбное', 'Ряжск']
    ];

    foreach ($obls as $obl => $city) {
        echo $obl.':'.'<br>';
        for ($i = 0; $i < count($city); $i++){
            if($i == count($city) - 1) {
                echo $city[$i] .'.';
            } else {
                echo $city[$i] .', ';
            }
        }
        echo '<br>';
    }
}

function seventh($str) {
    $a = [
        'a' => 'a',
        'б' => 'b',
        'в' => 'v',
        'г' => 'g',
        'д' => 'd',
        'е' => 'e',
        'ё' => 'yo',
        'ж' => 'zh',
        'з' => 'z',
        'и' => 'i',
        'й' => 'y',
        'к' => 'k',
        'л' => 'l',
        'м' => 'm',
        'н' => 'n',
        'о' => 'o',
        'п' => 'p',
        'р' => 'r',
        'с' => 's',
        'т' => 't',
        'у' => 'u',
        'ф' => 'f',
        'х' => 'h',
        'ц' => 'c',
        'ч' => 'ch',
        'ш' => 'sh',
        'щ' => 'sch',
        'ъ' => '',
        'ы' => 'y',
        'ь' => '',
        'э' => 'e',
        'ю' => 'yu',
        'я' => 'ya',
    ];

    return strtr($str, $a);
}

function eight() {
    $arr = [
        'mersedes' => ['E-class' => ['Трехдверные' =>['a', 's'], 'Пятидверные'],
            'AMG'],
        'bmw' => ['M-5' => ['Sport', 'F'], 'X-6'
        => ['Sport']]
    ];
    return '<ul>' . menu($arr) . '</ul>';
}

function menu($arr){
    $struct = '';

    foreach($arr as $item => $value) {
        if(!is_array($value)) {
            $struct .= '<li>' . $value . '</li>';
        } else {
            $struct .= '<li>' . $item . '</li>';
            $struct .= '<ul>' . menu($value) . '</ul>';
        }

    }

    return $struct;
}


?>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>hi</title>
</head>
<body>

<h1> Задание 1: </h1>
<h2>числа 3 и -5: <?= first(3, -5) ?></h2>
<h2>числа 6 и 4: <?= first(6, 4) ?></h2>
<h2>числа -2 -7: <?= first(-2, -7) ?></h2>

<h1> Задание 2: </h1>
<h2> <?= second() ?></h2>

<h1> Задание 3: </h1>
<h2>Аргументы 3 и 5</h2>
<h2> Сложение <?= third(3, 5, 'Сложение') ?></h2>
<h2> Разность <?= third(3, 5, 'Разность') ?></h2>
<h2> Произведение <?= third(3, 5, 'Произведение') ?></h2>
<h2> Деление <?= third(3, 5, 'Деление') ?></h2>

<h1> Задание 4: </h1>
<h2> Текущий год: <?= $year ?></h2>

<h1> Задание 5: </h1>
<h2> <?= fifth() ?></h2>

<h1> Задание 6: </h1>
<h2> <?= sixth() ?></h2>

<h1> Задание 7: </h1>
<h2> <?= seventh('привет мир') ?></h2>

<h1> Задание 8: </h1>
<div> <?= eight() ?></div>
</body>
</html>