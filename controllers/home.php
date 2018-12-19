<?php
include 'models/model.php'; 
include 'config/config.php';
$noImage=getNoImage();

//echo getcwd();

function indexHome(){
    $items=getDataItems();
    $images=getDataImages();
    $items=array_map('writeArrItemPriceAndImage',$items);

    include 'templates/header.php';
    include 'templates/nav.php';
    include 'templates/home.php';
    include 'templates/footer.php';
}

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

function writeArrItemPriceAndImage($f_item){
    global $images;
    global $noImage;
    $priceDisc=getPrice($f_item);//рассчет цены со скидкой
    $itemImage=getImage($images,$f_item,$noImage);//выбор картинки для товара
    $f_item['priceDisc']=$priceDisc;//добавление нового элемента 'priceDisc' в массив
    $f_item['img']=$itemImage;//добавление нового элемента 'img' в массив
    return $f_item;
}

/*
// функция нужна если добавление в массив делать через промежуточный массив result[] или через array_map и безимянную функцию.
function writeArrItem($f_ArrItem,$f_WrPriceDisc,$f_WrImages)
{   
    $f_ArrItem['priceDisc']=$f_WrPriceDisc;
    $f_ArrItem['img']=$f_WrImages;
    return($f_ArrItem);
}*/
?>

