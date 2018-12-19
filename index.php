<?php
require 'controllers/home.php';
indexHome();
//require 'controllers/admin.php';
//indexAdmin();


$str='Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit itaque, sequi accusamus molestias laudantium accusantium minus animi excepturi nobis esse ex recusandae maxime optio rem, neque amet voluptatibus, enim adipisci. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit itaque, sequi accusamus molestias laudantium accusantium minus animi excepturi nobis esse ex recusandae maxime optio rem, neque amet voluptatibus, enim adipisci.models/Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit itaque, sequi accusamus molestias laudantium accusantium minus animi excepturi nobis esse ex recusandae maxime optio rem, neque amet voluptatibus, enim adipisci.';
$num='';

//-----функция обрезает текст после заданного колличества символов. Текст обрезается после целого слова.
function cropString($str,$limit=20) {     
    //$lim = (is_numeric($limit)) ? $limit : 20;  // проверка на число. Если не число, то принимаем = 20                     
    $arr = explode(' ', $str);                  // получение массива слов из строки. Разделители - "пробел".
    $string = '';                               // инициализация суммирующей строки

    foreach ($arr as $word) {
        $string = $string.' '. $word;           // добавляем к строке пробел и слова для каждого элемента массива
        if (strlen($string) >= $limit) {          // если длинна полученной строки больше заданной длинны
            $outstring = $string.'...';         //      то добавляем к строке "..." 
            break;                              //      и выходим из цикла
        }                                       //
        else  
            $outstring = $string;               // иначе $outstring равно текущему значению строки (т.е если 
        }                                       //      заданное число больше длинны строки, то выведется вся строка)
    return $outstring;                          // результат
}

$result = cropString($str,$num);
print_r($result);


/* 
//--------- Вариант с foreach через промежуточный массив $result. 
//  ! раскомментировать функцию writeArrItem()  в 'controllers/home.php'!
$result=[];
foreach ($items as $item) {
	$priceDisc=getPrice($item);//рассчет цены со скидкой
	$priceImg=getImage($images,$item,$noImage);//выбор картинки для товара
	$result[]=writeArrItem($item,$priceDisc,$priceImg);
}*/


/*
//--------- Вариант через array_map и безимянную функцию. 
//  ! объявлены global переменные
//  ! раскомментировать функцию writeArrItem()  в 'controllers/home.php'!
$items=array_map(function($item) {
    global $images;
    global $noImage;
    $priceDisc=getPrice($item);//рассчет цены со скидкой
    $itemImage=getImage($images,$item,$noImage);//выбор картинки для товара
    $item=writeArrItem($item,$priceDisc,$itemImage);//добавление новых элементов в массив
    return($item);
},$items);*/


/*
//--------- Вариант через array_map и функцию.
$items=array_map('writeArrItemPriceAndImage',$items);

function writeArrItemPriceAndImage($f_item){
    global $images;
    global $noImage;
    $priceDisc=getPrice($f_item);//рассчет цены со скидкой
    $itemImage=getImage($images,$f_item,$noImage);//выбор картинки для товара
    $f_item['priceDisc']=$priceDisc;//добавление нового элемента 'priceDisc' в массив
    $f_item['img']=$itemImage;//добавление нового элемента 'img' в массив
    return $f_item;
}
*/
