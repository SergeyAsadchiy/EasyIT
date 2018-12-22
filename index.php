<?php
require 'config/config.php';
require 'controllers/home.php';
indexHome();

//-----------------------------------------------------
$str='Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit itaque, sequi accusamus molestias laudantium accusantium minus animi excepturi nobis esse ex recusandae maxime optio rem, neque amet voluptatibus, enim adipisci. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit itaque, sequi accusamus molestias laudantium accusantium minus animi excepturi nobis esse ex recusandae maxime optio rem, neque amet voluptatibus, enim adipisci.models/Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit itaque, sequi accusamus molestias laudantium accusantium minus animi excepturi nobis esse ex recusandae maxime optio rem, neque amet voluptatibus, enim adipisci.';
$num=58;

print_r(cropString($str,$num));
echo "<br>";


//-----------------------------------------------------
$fileName = "assets/files/new.csv";

writeToFileFromArray($fileName);

$res = readFromFileToArray($fileName);
var_dump($res);

//----- запись массива в *.csv файл -------------------
function writeToFileFromArray($fileName) {
    $fName = fopen($fileName,"w");                      // открываем файл для записи 
    $items = getDataItems();                            // получаем исходный массив

    $firstRow = implode(';', array_keys($items[0]));    // получаем строку из ключей 
    fwrite($fName,$firstRow.PHP_EOL);                   // записываем в файл - заголовок
    foreach ($items as $item) {                         // для каждого товара            
        $row = implode(';', array_values($item));       // получаем строку из значений
        fwrite($fName,$row.PHP_EOL);                    // записывам в файл
    }
    fclose($fName);                                     // закрываем файл
}

//----- чтение из *.csv файла -------------------------
function readFromFileToArray($fileName) {
    $fName = fopen($fileName,"r");                      // открываем файл для чтения
    $array = file($fileName,FILE_IGNORE_NEW_LINES);     // фомируем массив из строк файла(удаляем PHP_EOL)

    $arrayKey = explode(';',$array[0]);                     // формируем массив ключей из нулевой строки (ключи)
    $arrayValueString = array_slice($array,1,count($array));// формируем массив без ключей (обрезаем 0-ю строку)
    foreach ($arrayValueString as $valueString) {       // для кадой строки массива:
        $arrayValue = explode(';',$valueString);                // получаем из строки массив (id, name...)
        $items[] = array_combine($arrayKey, $arrayValue);       // формируем новый массив, в кот. пишем
    }                                                           // ключи из $arrayKey и значения массива 
                                                                // из текущей строки $arrayValue          
    fclose($fName);
    return $items;
}
