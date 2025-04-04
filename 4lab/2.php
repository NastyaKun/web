<?php

$str = 'a1b2c3';
$result = preg_replace_callback(
    '/([0-9]+)/', // Регулярное выражение для поиска чисел
    function ($matches) {$number = (int)$matches[1]; return $number-10;}, $str);

echo $result;