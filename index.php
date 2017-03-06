<?php

//Задание #1
//Функция должна принимать массив строк и выводить каждую строку в отдельном параграфе (тег <p>)
//Если в функцию передан второй параметр true, то возвращать (через return) результат в виде одной объединенной строки.
///

$StringArr = [
    'Один',
    'Два Два',
    'Три Три ТРи',
    'Четыре Четыре Четыре Четыре',
    'Пять Пять Пять Пять Пять',
];

function Paragraf(array $stroki, bool $flag = false)
{
    if ($flag === true) {
        return implode(' ', $stroki);
    }
    foreach ($stroki as $value) {
        echo '<p>' . $value . '</p>';
    }
    return null;
}

echo Paragraf($StringArr);
echo Paragraf($StringArr, true);

echo '<hr>';
//Задание #2
//
//Функция должна принимать 2 параметра:
//массив чисел, строку, обозначающую арифметическое действие,    которое нужно выполнить со всеми элементами массива.
//Функция должна вывести результат на экран.
//Функция должна обрабатывать любой ввод, в том числе некорректный и выдавать сообщения об этом


$NumberArr = [1, 2, 1, 4, 5, 6];
$operation = '/';

function Calc(array $numbers, $operation)
{

    echo implode($operation, $numbers) . '=';
    $sum = $numbers[0];

    $i = 0;
    foreach ($numbers as $value) {
        $i++;
        if (!is_numeric($value)) {
            throw new ErrorException('Неккоректное число');
        }
        if ($i === 1) {
            continue;
        }
        switch ($operation) {
            case '+':
                $sum += $value;
                break;
            case '-':
                $sum -= $value;
                break;
            case '*':
                $sum *= $value;
                break;
            case '/':
                $sum /= $value;
                break;
            default:
                throw new ErrorException('Неверная арифметическая операция');

        }
    }
    echo $sum;
}


try {
    Calc($NumberArr, $operation);
} catch (Exception $exception) {
    echo $exception->getMessage() . '<br>';
}
echo '<hr>';
/*Задание #3

Функция должна принимать переменное число аргументов.
Первым аргументом обязательно должна быть строка, обозначающая арифметическое действие, которое необходимо выполнить со всеми передаваемыми аргументами.
Остальные аргументы это целые и/или вещественные числа.

Пример вызова: calcEverything(‘+’, 1, 2, 3, 5.2);
Результат: 1 + 2 + 3 + 5.2 = 11.2*/

function calcEverything($operation)
{
    $sum = func_get_arg(1);
    $string = $sum;
    for ($i = 2, $i_max = func_num_args(); $i < $i_max; $i++) {
        $value = func_get_arg($i);
        $string .= ' ' . $operation . ' ' . $value;
        if (!is_numeric($value)) {
            throw new ErrorException('Неккоректное число');
        }
        switch ($operation) {
            case '+':
                $sum += $value;
                break;
            case '-':
                $sum -= $value;
                break;
            case '*':
                $sum *= $value;
                break;
            case '/':
                $sum /= $value;
                break;
            default:
                throw new ErrorException('Неверная арифметическая операция');
        }

    }
    echo $string . ' = ' . $sum;
}

try {
    calcEverything('+', 2, 3, 4.5);
} catch (Exception $exception) {
    echo $exception->getMessage() . '<br>';
}
echo '<hr>';


/*
 * Задание #4
 *
 * Функция должна принимать два параметра – целые числа.
 * Если в функцию передали 2 целых числа, то функция должна отобразить таблицу умножения размером со значения параметров, переданных в функцию. (Например если передано 8 и 8, то нарисовать от 1х1 до 8х8). Таблица должна быть выполнена с использованием тега <table>
 *  В остальных случаях выдавать корректную ошибку.
 */

function PifagorTable($x, $y)
{
    if (!is_int($x) || !is_int($y)) {
        throw new ErrorException('Неккоректное число');
    }

    echo 'Таблица умножения<br>' . "\n";
    echo '<table cellspacing="0" border="1" cellpadding="5">' . PHP_EOL;
    for ($i = 1; $i <= $x; $i++) {
        echo "\t<tr>\n";
        for ($j = 1; $j <= $y; $j++) {
            $sum = $i * $j;
            echo "\t\t<td>$sum</td>\n";
        }
        echo "\t</tr>\n";
    }
    echo '</table><hr>' . PHP_EOL;
}


try {
    PifagorTable(8, 5);
} catch (Exception $exception) {
    echo $exception->getMessage() . '<br>';
}


///*Задание #5
//
//Написать две функции.
//Функция №1 принимает 1 строковый параметр и возвращает true, если строка является палиндромом*, false в противном случае. Пробелы и регистр не должны учитываться.
//Функция №2 выводит сообщение в котором на русском языке оговаривается результат из функции №1*/

$str = 'Мат и тут и там';

function Palindrom($str)
{
    $str = strtolower($str);
    $str = preg_replace('/\W/', '', $str);
    $strR = strrev($str);
    return $str === $strR;
}

$flag = Palindrom($str);

function PalindromEcho(bool $flag, $str)
{
    if ($flag === true) {
        echo $str . '<br> Это полиндром <hr>';

    } else {
        echo $str . '<br> Это не похоже на полиндром <hr>';
    }
}

PalindromEcho($flag, $str);

//Задание #6 (выполняется после вебинара “ВСТРОЕННЫЕ ВОЗМОЖНОСТИ ЯЗЫКА”)
//
//Выведите информацию о текущей дате в формате 31.12.2016 23:59
//Выведите unixtime время соответствующее 24.02.2016 00:00:00.

echo date('m.d.y H:i:s') . '<br>';
echo strtotime('24.02.2016 00:00:00') . '<hr>';

//Задание #7 (выполняется после вебинара “ВСТРОЕННЫЕ ВОЗМОЖНОСТИ ЯЗЫКА”)
//Дана строка: “Карл у Клары украл Кораллы”. удалить из этой строки все заглавные буквы “К”.
//Дана строка “Две бутылки лимонада”. Заменить “Две”, на “Три”. По желанию дополнить задание.

$Karl = 'Карл у Клары украл Кораллы';
$Limonad = 'Две бутылки лимонада';
$count = 'Три';

echo str_replace('К', '', $Karl) . '<br>';
echo str_replace('Две', $count, $Limonad) . '<hr>';

//Задание #8 (выполняется после вебинара “ВСТРОЕННЫЕ ВОЗМОЖНОСТИ ЯЗЫКА”)
//Напишите функцию, которая с помощью регулярных выражений, получит информацию о переданных RX пакетах из переданной строки:
//Пример строки: “RX packets:950381 errors:0 dropped:0 overruns:0 frame:0. “
//Если кол-во пакетов более 1000, то выдавать сообщение: “Сеть есть”
//Если в переданной в функцию строке есть “:)”, то нарисовать смайл в ASCII и не выдавать сообщение из пункта №3. Смайл должен храниться в отдельной функции
//

$RX = 'RX packets:1001 errors:0 dropped:0 overruns:0 frame:0.';

function Packets ($RX){
    if (preg_match('/:\\)/', $RX, $match)){
        Smail ();
        return;
    }

    preg_match('/packets:(\d+)/', $RX, $match);
      if ($match[1] > 1000){
        echo   'Сеть есть <hr>';
    }
    else
        echo 'Сети нет';
}

function Smail (){
    echo '&#128513; <hr>';

}

Packets($RX);
