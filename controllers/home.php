<?php
require 'models/model.php'; 

function indexHome(){
    $items  = getDataItems();
    $images = getDataImages();
    $noImage= getNoImage();
    $items  = array_map('writeArrItemPriceAndImage',$items);

    include 'templates/header.php';
    include 'templates/nav.php';
    include 'templates/home.php';
    include 'templates/footer.php';
}

function getPrice($itemPrice)
{   
    if ($itemPrice['stock'] == 0) {
        $outPrice = 'нет в наличии';
    } else {
        if ($itemPrice['stock'] < 2) {
            $outPrice = $itemPrice['price'];
        } else {
            $outPrice = $itemPrice['price'] * (1 - $itemPrice['disc'] / 100);
        }
    }
    return($outPrice);
}

function getImage($f_images,$f_item,$f_NoImage)
{   
    $f_OutImage = $f_NoImage;
    foreach ($f_images as $f_image) {
        if ($f_item['id'] == $f_image['id']) {
            $f_OutImage = $f_image['img'];
            break;                 
        }
    }
    return($f_OutImage);    
}

function writeArrItemPriceAndImage($f_item){
    $images  = getDataImages();
    $noImage = getNoImage();
    $priceDisc = getPrice($f_item);//рассчет цены со скидкой
    $itemImage = getImage($images,$f_item,$noImage);//выбор картинки для товара
    $f_item['priceDisc'] = $priceDisc;//добавление нового элемента 'priceDisc' в массив
    $f_item['img'] = $itemImage;//добавление нового элемента 'img' в массив
    return $f_item;
}

//-----функция обрезает текст после заданного колличества символов. Текст обрезается до целого слова.
function cropString($str,$limit=20) {     
    $lim = (is_numeric($limit)) ? $limit : 20;  // проверка на число. Если не число, то принимаем = 20                     
    $arr = explode(' ', $str);                  // получение массива слов из строки. Разделители - "пробел".
    $string = '';                               // инициализация суммирующей строки

    foreach ($arr as $word) {
        $string = $string.' '. $word;           // добавляем к строке пробел и слово для каждого элемента массива
        if (strlen($string) >= $lim) {          // если длинна полученной строки больше заданной длинны
            $cropString = $string.'...';        //      то добавляем к строке "..." 
            break;                              //      и выходим из цикла
        }                                       //
        else                                    //
            $cropString = $string;              // иначе $outstring равно текущему значению строки (т.е если 
        }                                       //      заданное число больше длинны строки, то выведется вся строка)
    return $cropString;                         // результат
}

?>

