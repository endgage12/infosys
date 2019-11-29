<?php 
    $name = 'Иванов Иван';
    $email = 'ivan@yandex.ru';
    $phone = '+7(903)123 20 56';
    $today = date("F j, Y, g:i a");

    $file = 'excel.csv';
    $tofile = "'$name';'$email';'$phone';'$today'\n";
    $bom = "\xEF\xBB\xBF";
    @file_put_contents($file, $bom . $tofile . file_get_contents($file));
?>
