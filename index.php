<?php
require 'controllers/home.php';
indexHome();
//require 'controllers/admin.php';
//indexAdmin();



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
