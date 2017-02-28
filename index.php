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
