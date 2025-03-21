<?php
function increaseEnthusiasm(string $str): string
{
    return $str . "!";
}
echo increaseEnthusiasm("Hello") . "\n"; // Вывод: Hello!

function repeatThreeTimes(string $str): string
{
    return $str . $str . $str;
}
echo repeatThreeTimes("cat") . "\n";

echo increaseEnthusiasm(repeatThreeTimes("Behemoth")) . "\n"; // Вывод: funfunfun!


function cut(string $str, int $length = 10): string
{
    return substr($str, 0, $length);
}
echo cut("Hello cat Behemoth") . "\n";
echo cut("Hello cat Behemoth", 5) . "\n";


function ARecursive(array $arr, int $index = 0): void
{
    if (isset($arr[$index]))
    {
        echo $arr[$index] . "\n";
        ARecursive($arr, $index + 1);
    }
}
ARecursive([1, 2, 3, 4, 5]);


function digit(int $number1): int
{
    while ($number1 > 9)
    {
        $number1 = array_sum(str_split((string) $number1));
    }
    return $number1;
}
echo "сумма цифр ". digit(12345) . "\n";
