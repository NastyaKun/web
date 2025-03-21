<?php
function ten(int $num1, int $num2): bool
{
    return ($num1 + $num2) > 10;
}
echo "1 + 2 больше 10? " . (ten(1, 2) ? 'Да' : 'Нет') . "\n";
echo "12 + 3 больше 10? " . (ten(12, 3) ? 'Да' : 'Нет') . "\n";


function equal(int $num1, int $num2): bool
{
    return $num1 === $num2;
}
echo "1 и 1 равны? " . (equal(1, 1) ? 'Да' : 'Нет') . "\n"; // Вывод: 5 и 5 равны? Да
echo "2 и 3 равны? " . (equal(2, 3) ? 'Да' : 'Нет') . "\n"; // Вывод: 5 и 6 равны? Нет


$test = 0;
echo (($test == 0) ? 'верно' : ''). "\n"; // Сокращенная запись



$age = 92;
if ($age < 10 || $age > 99)
{
    echo "Возраст находится вне диапазона 10-99" . "\n";
}
else
{
    $ageStr = (string)$age;
    $sum = (int)$ageStr[0] + (int)$ageStr[1];

    if ($sum <= 9)
    {
        echo "Сумма цифр однозначна" . "\n";
    }
    else
    {
        echo "Сумма цифр двузначна" . "\n";
    }
}



$arr = [1, 2, 3, 12];
if (count($arr) === 3)
{
    echo "Массив содержит 3 элемента, сумма элементов: " . array_sum($arr) . "\n";
} else {
    echo "Массив содержит не 3 элемента" . "\n";
}
