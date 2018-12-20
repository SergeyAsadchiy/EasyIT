<?php
require 'config/config.php';
require 'controllers/home.php';
indexHome();



$str='Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit itaque, sequi accusamus molestias laudantium accusantium minus animi excepturi nobis esse ex recusandae maxime optio rem, neque amet voluptatibus, enim adipisci. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit itaque, sequi accusamus molestias laudantium accusantium minus animi excepturi nobis esse ex recusandae maxime optio rem, neque amet voluptatibus, enim adipisci.models/Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit itaque, sequi accusamus molestias laudantium accusantium minus animi excepturi nobis esse ex recusandae maxime optio rem, neque amet voluptatibus, enim adipisci.';
$num=250;

//-----функция обрезает текст после заданного колличества символов. Текст обрезается до целого слова.
function cropString($str,$limit=20) {     
    $lim = (is_numeric($limit)) ? $limit : 20;  // проверка на число. Если не число, то принимаем = 20                     
    $arr = explode(' ', $str);                  // получение массива слов из строки. Разделители - "пробел".
    $string = '';                               // инициализация суммирующей строки

    foreach ($arr as $word) {
        $string = $string.' '. $word;           // добавляем к строке пробел и слово для каждого элемента массива
        if (strlen($string) >= $lim) {          // если длинна полученной строки больше заданной длинны
            $outstring = $string.'...';         //      то добавляем к строке "..." 
            break;                              //      и выходим из цикла
        }                                       //
        else                                    //
            $cropString = $string;              // иначе $outstring равно текущему значению строки (т.е если 
        }                                       //      заданное число больше длинны строки, то выведется вся строка)
    return $cropString;                         // результат
}

$result = cropString($str,$num);
print_r($result);
