<?php
$a = 10;
$b = 3;

 echo $a % $b. "\n";

 if ($b == 0) {echo "Деление на ноль недопустимо.\n";}
 else {
    if ($a % $b == 0) {
        echo "a делится на b без остатка. Результат деления: " . $a / $b. "\n";
    }
    else
    {
        echo "a делится на b с остатком. Остаток от деления: " . $a % $b . "\n";
    }
}

 $st = pow(2,10);
 $s = sqrt(245);

 $numbers = [4, 2, 5, 19, 13, 0, 10];
$sumNumbers = 0;
foreach ($numbers as $number) {
    $sumNumbers += pow($number, 2);
}
$sumNumbers = sqrt($sumNumbers);
echo "Корень из суммы квадратов элементов массива: ". $sumNumbers. "\n";

$sqrt379 = sqrt(379);
echo "Корень из 379: ". $sqrt379. "\n";
echo "До целых: " . round($sqrt379) . "\n";
echo "До десятых: " . round($sqrt379, 1) . "\n";
echo "До сотых: " . round($sqrt379, 2) . "\n";

$sqrt587= sqrt(587);
$floorValue = floor($sqrt587);
$ceilValue = ceil($sqrt587);
$roundingResults = ["floor" => $floorValue, "ceil" => $ceilValue];
echo "Корень из 587: ". $sqrt587. "\n";
echo "Округление в меньшую сторону: " . $roundingResults["floor"] . "\n";
echo "Округление в большую сторону: " . $roundingResults["ceil"] . "\n";

$numbers2 = [4, -2, 5, 19, -130, 0, 10];
echo "Минимальное число: " . min($numbers2) . "\n";
echo "Максимальное число: " . max($numbers2) . "\n";

echo "Случайное число от 1 до 100: " . rand(1, 100) . "\n";
$randomNumbers = [];
for ($i = 0; $i < 10; $i++)
{
    $randomNumbers[] = rand(1, 100);
}
echo "Массив из 10 случайных чисел: " . implode(", ", $randomNumbers) . "\n";

$a = 5;
$b = 4;
echo '|a - b| = ', abs($a - $b), "\n";

$Arr = [1, 2, -1, -2, 3, -3];
$newArr = array_map(function ($num) {return abs($num);}, $Arr);
echo '[' . implode(', ', $newArr) . ']' . "\n";


function Divisors(int $number): array
{
    $div = [];
    for ($i = 1; $i <= $number; $i++)
    {
        if ($number % $i == 0)
        {
            $div[] = $i;
        }
    }
    return $div;
}
$number = 100;
$div = Divisors($number);
echo "Делители числа " . $number . ": [" . implode(", ", $div) . "]" . "\n";


$Arr1 = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$sum = 0;
$count = 0;
foreach ($Arr1 as $value) {
    if ($sum <= 10) {
        $sum += $value;
        $count++;
    }
}
echo "Для получения суммы больше 10, надо сложить первые {$count} чисел.";