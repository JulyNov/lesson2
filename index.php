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

function Paragraf(array $stroki, bool $flag = false) {
    if ($flag === true) {
        return   implode(' ', $stroki);
    }
    foreach ($stroki as $value){
        echo '<p>' . $value . '</p>';
    }
    return null;
}

echo Paragraf($StringArr);
echo Paragraf($StringArr,true);

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
    $summ = $numbers[0];

    $i = 0;
    foreach ($numbers as $value) {
        $i++;
        if ($i === 1) {
            continue;
        }
        if (!ctype_digit((string)$value)) {
            throw new ErrorException('Неккоректное число');
        }
        switch ($operation) {
            case '+':
                $summ += $value;
                break;
            case '-':
                $summ -= $value;
                break;
            case '*':
                $summ *= $value;
                break;
            case '/':
                $summ /= $value;
                break;
            default:
                throw new ErrorException('Неверная арифметическая операция');

        }
    }
    echo $summ;
}


try {
    Calc($NumberArr, $operation);
} catch (Exception $exception) {
    echo $exception->getMessage() . '<br>';
}

/*Задание #3

Функция должна принимать переменное число аргументов.
Первым аргументом обязательно должна быть строка, обозначающая арифметическое действие, которое необходимо выполнить со всеми передаваемыми аргументами.
Остальные аргументы это целые и/или вещественные числа.

Пример вызова: calcEverything(‘+’, 1, 2, 3, 5.2);
Результат: 1 + 2 + 3 + 5.2 = 11.2*/
