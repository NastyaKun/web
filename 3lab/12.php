<?php
$Arr1 = [1, 2, 3, 4, 5];
$average = array_sum($Arr1) / count($Arr1);
echo "Среднее арифметическое: " . $average . "\n";


$sum = array_sum(range(1, 100));
echo "Сумма чисел от 1 до 100: " . $sum . "\n";


$Arr2 = [1, 4, 9, 16, 25];
$squareRoots = array_map('sqrt', $Arr2);
echo "Массив с квадратными корнями: " . implode(", ", $squareRoots) . "\n";


$alphabet = range('a', 'z');
$number = range(1, 26);
$Arr3 = array_combine($alphabet, $number);
print_r($Arr3);


$str = '1234567890';
$two = str_split($str, 2);
$sumtwo = array_sum($two);
echo "cумма пар чисел: $sumtwo";
