<?php
$items = [
    ['id' => '1', 'name' => 'Монитор',      'price' => '1200.00', 'stock' => '5', 'disc' => '10'],
    ['id' => '2', 'name' => 'Компьютер',    'price' => '4200.00', 'stock' => '7', 'disc' => '10'],
    ['id' => '3', 'name' => 'Ноутбук',      'price' => '7700.00', 'stock' => '2', 'disc' => '10'],
    ['id' => '4', 'name' => 'Принтер',      'price' => '1800.00', 'stock' => '1', 'disc' => '10'],
    ['id' => '5', 'name' => 'Стол',         'price' => '1100.00', 'stock' => '0', 'disc' => '20'],
    ['id' => '6', 'name' => 'Стул',         'price' => '2200.00', 'stock' => '0', 'disc' => '20'],
    ['id' => '7', 'name' => 'Шкаф',         'price' => '1260.00', 'stock' => '8', 'disc' => '20'],
    ['id' => '8', 'name' => 'Кресло',       'price' => '4250.00', 'stock' => '9', 'disc' => '20'],
    ['id' => '9', 'name' => 'Диван',        'price' => '9800.00', 'stock' => '1', 'disc' => '30'],
];

$noImage = 'img/Noimage.png';

$images = [
    ['id' => '1', 'img' => 'img/monitor.jpeg'],
    ['id' => '2', 'img' => 'img/computer.jpg'],
    ['id' => '3', 'img' => 'img/notebook.jpg'],
    ['id' => '4', 'img' => 'img/printer.jpg'],
    ['id' => '7', 'img' => 'img/wardrobe.jpg'],
    ['id' => '8', 'img' => 'img/armchair.jpg']
];

$description = "Some quick example text to build on the card title and make up the bulk of the card's content.";

/* 
//--------- Вариант с foreach через промежуточный массив $result
$result=[];
foreach ($items as $item) {
	$priceDisc=getPrice($item);//рассчет цены со скидкой
	$priceImg=getImage($images,$item,$noImage);//выбор картинки для товара
	$result[]=writeArrItem($item,$priceDisc,$priceImg);
}*/

/*
//--------- Вариант через array_map и безимянную функцию. !-объявлены global переменные
$items=array_map(function($item) {
    global $images;
    global $noImage;
    $priceDisc=getPrice($item);//рассчет цены со скидкой
    $itemImage=getImage($images,$item,$noImage);//выбор картинки для товара
    $item=writeArrItem($item,$priceDisc,$itemImage);//добавление новых элементов в массив
    return($item);
},$items);*/

//--------- Вариант через array_map и функцию.
$items=array_map('writeArrItemPriceAndImage',$items);

include 'template/template.php';

//-------------------------------------------------------------------
function getPrice($itemPrice)
{	
    if ($itemPrice['stock']==0) {
        $outPrice='нет в наличии';
    } else {
        if ($itemPrice['stock']<2) {
            $outPrice=$itemPrice['price'];
        } else {
            $outPrice=$itemPrice['price']*(1-$itemPrice['disc']/100);
        }
	}
	return($outPrice);
}

function getImage($f_images,$f_item,$f_NoImage)
{	
	$f_OutImage=$f_NoImage;
	foreach ($f_images as $f_image) {
        if ($f_item['id']==$f_image['id']) {
            $f_OutImage=$f_image['img'];
            break;                 
        }
    }
	return($f_OutImage);	
}

function writeArrItem($f_ArrItem,$f_WrPriceDisc,$f_WrImages)
{	
	$f_ArrItem['priceDisc']=$f_WrPriceDisc;
	$f_ArrItem['img']=$f_WrImages;
	return($f_ArrItem);
}

function writeArrItemPriceAndImage($f_item){
    global $images;
    global $noImage;
    $priceDisc=getPrice($f_item);//рассчет цены со скидкой
    $itemImage=getImage($images,$f_item,$noImage);//выбор картинки для товара
    $f_item['priceDisc']=$priceDisc;//добавление нового элемента 'priceDisc' в массив
    $f_item['img']=$itemImage;//добавление нового элемента 'img' в массив
    return $f_item;
}
?>


