<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>test title</title>
</head>
<body>
<?php
date_default_timezone_set('Asia/Yekaterinburg');

function photo() {
    $dir = './images';
    $fil = scandir($dir);

    for ($i = 2; $i < count($fil); $i++) {
        $path= $dir . DIRECTORY_SEPARATOR . $fil[$i];
        echo '<a href=' . $path .'><img src=' . $path . ' width=300px height=300px style="margin: 10px;"></a>';
    }
}
photo();

function logger() {
    $log = __DIR__ . DIRECTORY_SEPARATOR . 'logs';
    $log_files = scandir($log);

    if(!file_exists($log)) {

        mkdir($log, 0700, true);
    }

    $log_count = count($log_files) - 2;

    $date = date('c');

    if($log_count === 0) {
        file_put_contents($log . DIRECTORY_SEPARATOR . 'log.txt', $date . PHP_EOL, FILE_APPEND);
    } else {
        $last_log = end($log_files);

        $first_log = explode(PHP_EOL,file_get_contents($log .
            DIRECTORY_SEPARATOR . 'log.txt'));

        if(count($first_log) - 1 == 10) {
            $log_number = +preg_replace('/[^0-9]/', '', $last_log) + 1;
            file_put_contents($log . DIRECTORY_SEPARATOR . 'log' .
                $log_number . '.txt', file_get_contents($log .
                    DIRECTORY_SEPARATOR . 'log.txt') . PHP_EOL);
            file_put_contents($log . DIRECTORY_SEPARATOR . 'log.txt', $date . PHP_EOL);
        } else {
            file_put_contents($log . DIRECTORY_SEPARATOR .  'log.txt', $date . PHP_EOL, FILE_APPEND);
        }
    }
}
logger();
?>
</body>
</html>