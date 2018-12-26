<?php
require 'models/model.php'; 

function indexHome() {
    $items  = getDataItems();
    $images = getDataImages();
    $noImage= getNoImage();
    $items  = $recentItems = array_map('writeArrItemPriceAndImage', $items);

    $items  = filterIdItem($items);// оставляет в массиве только отфильтрованный по id товар----//
                                   // и записывает этот id в $_SESSION['recentItems'] (просмотренные товары)

    include 'templates/header.php';
    UserRegistration();
    include 'templates/nav.php';
    userConfirmCookies();
    include 'templates/home.php';
    showRecentViewed($recentItems); 
    include 'templates/footer.php';
}

//---- выводит 3 недавно просмотренных товара (без дублирования)----//
function showRecentViewed($items) {
    $_SESSION['recentItems'] = array_unique($_SESSION['recentItems']);     // убираем дублирование
    $_SESSION['recentItems'] = array_slice ($_SESSION['recentItems'],0,3); // отсавляем 3 элемента 
    include 'templates/components/RecentViewed.php';
}

// ---- выводит форму подтверждения cookies ----//
// ! - работает только если вызывается до 'templates/home.php'
function userConfirmCookies() {

    $ucc = 'userConfirmCookies'; // чтобы легче читался код

    if (isset($_POST[$ucc]) AND $_POST[$ucc] == 'on') {
        setcookie($ucc, 'YES');
    }

    // После нажатия 'confirm' cookie создалась, но она пустая до первого  обновления (? почему).
    // Поэтому что бы повторно не выводилась форма подтверждения cookies, проверяем еще и $_POST[].
    if ((!isset($_COOKIE[$ucc]) OR $_COOKIE[$ucc] != 'YES')     
    AND (!isset($_POST[$ucc])   OR $_POST[$ucc]   != 'on')) {
        include 'templates/components/userConfirmCookies.php';
    }
}

// ---- выводит форму регистрации или приветствие ----//
function userRegistration() {
    if (isset($_POST['userName'])) {                    // если в POST передано 'userName'
        $_SESSION['userName'] = $_POST['userName'];     // записываем 'userName' в $_SESSION 
    }

    $Registred =                                        // зарегистрирован
        (  isset($_SESSION['userName']) and             // если существует 'userName' и
        !empty(trim($_SESSION['userName']))  ) ;        // 'userName' не пустой (после удаления пробелов)
    
    if ($Registred) {                                   // если зарегистрирован 
        include 'templates/components/registred.php';   //      вызываем приветствие  
    } else {                                            // иначе
        include 'templates/components/unregistred.php'; //      вызываем форму регистрации       
    }
}

//---- оставляет в массиве только отфильтрованный товар ----//
function filterIdItem($items) {
    if (array_key_exists('id', $_GET)){                     // если $_GET содержит ключ 'id'
        $items  = array_filter($items, "equal_Id_Item_GET");// то оставляем в массиве только товар
    }                                                       // у которого 'id' совпадает с переданными в $_GET
    return $items;                                               
}

// ---- проверяет равны ли id товара и id, переданный в $_GET ---- //
//      и записывает это id в начало $_SESSION['recentItems']
// вызывается в function filterIdItem()
function equal_Id_Item_GET($array) {
    $result = false;
    if ($array['id'] == $_GET['id']) {
        $result = True;

        if (!isset($_SESSION['recentItems'])) {
            $_SESSION['recentItems'] = array();          
        }
        array_unshift($_SESSION['recentItems'], $array['id']);    
    }
    return $result;
}

// ---- рассчитывает цену со скидкой для текущего товара ---- //
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

// ---- подставляет изображение товара либо NoImage ---- //
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

// ---- добавляет новые элементы 'priceDisc' и 'img' в массив ---- //
function writeArrItemPriceAndImage($f_item){
    $images  = getDataImages();
    $noImage = getNoImage();
    $priceDisc = getPrice($f_item);                 //рассчет цены со скидкой
    $itemImage = getImage($images,$f_item,$noImage);//выбор картинки для товара
    $f_item['priceDisc'] = $priceDisc;              //добавление нового элемента 'priceDisc' в массив
    $f_item['img'] = $itemImage;                    //добавление нового элемента 'img' в массив
    return $f_item;
}

//---- функция обрезает текст после заданного колличества 
//     символов. Текст обрезается до целого слова.
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
            $cropString = $string;              // иначе $outString равно текущему значению строки (т.е если 
        }                                       //      заданное число больше длинны строки, то выведется вся строка)
    return $cropString;                         // результат
}

//---- запись массива в *.csv файл -------------------
function writeToFileFromArray($fileName) {
    $fName = fopen($fileName,"w");                      // открываем файл для записи 
    $items = getDataItems();                            // получаем исходный массив

    $firstRow = implode(';', array_keys($items[0]));    // получаем строку из ключей 
    fwrite($fName,$firstRow.PHP_EOL);                   // записываем в файл - заголовок
    foreach ($items as $item) {                         // для каждого товара            
        $row = implode(';', array_values($item));           // получаем строку из значений
        fwrite($fName,$row.PHP_EOL);                        // записывам в файл
    }
    fclose($fName);                                     // закрываем файл
}

//---- чтение из *.csv файла -------------------------
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