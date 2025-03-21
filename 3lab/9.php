<?php
$ArrSize = 5;
$xArr = [];
for ($i = 1; $i <= $ArrSize; $i++)
{
    $xArr[] = str_repeat('x', $i);
}
echo "Массив из 'x': [" . implode(", ", $xArr) . "]" . "\n";


function arrayFill(string $value, int $size): array
{
    return array_fill(0, $size, $value);
}
echo "Массив из 'e' размером 7: [" . implode(", ", arrayFill('e', 7)) . "]" . "\n";


$Arr1 = [[1, 2, 3], [4, 6], [9]];
$sum = 0;
foreach ($Arr1 as $innerArr1) {
    foreach ($innerArr1 as $number) {
        $sum += $number;
    }
}
echo "Сумма элементов массива: " . $sum . "\n";


$Arr3 = [];
$counter = 1;
for ($i = 0; $i < 3; $i++)
{
    $innerArr3 = [];
    for ($j = 0; $j < 3; $j++)
    {
        $innerArr3[] = $counter;
        $counter++;
    }
    $Arr3[] = $innerArr3;
}
echo "Массив: " . "\n";
foreach ($Arr3 as $innerArr3) {echo "[" . implode(", ", $innerArr3) . "]" . "\n";}


$num = [2, 5, 3, 9];
$result = ($num[0] * $num[1]) + ($num[2] * $num[3]);
echo "Результат вычислений: " . $result . "\n";


$user = [
    'name' => 'Анастасия',
    'surname' => 'Кунгурцева',
    'patronymic' => 'Александровна'
];
echo "ФИО: " . $user['surname'] . " " . $user['name'] . " " . $user['patronymic'] . "\n";


$date = [
    'year' => date('Y'),
    'month' => date('m'),
    'day' => date('d')
];
echo "Дата: " . $date['year'] . "-" . $date['month'] . "-" . $date['day'] . "\n";


$arr = ['a', 'b', 'c', 'd', 'e'];
echo "Количество элементов в массиве: " . count($arr) . "\n";


$arr = ['a', 'b', 'c', 'd', 'e'];
echo "Последний элемент массива: " . end($arr) . "\n";
$last = array_pop($arr); // Удаляем последний элемент
$penultimate = end($arr);
echo "Предпоследний элемент массива: " . $penultimate . "\n";
