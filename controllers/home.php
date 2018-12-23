<?php
require 'models/model.php'; 

function indexHome(){
    $items  = getDataItems();
    $images = getDataImages();
    $noImage= getNoImage();
    $items  = array_map('writeArrItemPriceAndImage', $items);

    if (array_key_exists('id', $_GET)){                  // если $_GET содержит ключ 'id'
        $items  = array_filter($items, "filterIdItems"); // то оставляем в массиве только товары
    }                                                    // у которых 'id' совпадает с переданными в $_GET           
    
    registration();

    include 'templates/header.php';
    include 'templates/nav.php';
    include 'templates/home.php';
    include 'templates/footer.php';
}

// ---- выводит форму регистрации или приветствие ----//
function registration() {
        if (isset($_POST['userName'])) {                    // если в POST передано 'userName'
            $_SESSION['userName'] = $_POST['userName'];     // записываем 'userName' в $_SESSION 
        }
        $registred = !empty(trim($_SESSION['userName']));   // убираем пробелы
        if (!$registred) {                                  // если 'userName' не пустой 
            include 'templates/components/unregistred.php'; //      вызываем форму регистрации или приветствие  
        } else {                                            // иначе
            include 'templates/components/registred.php';   //      вызываем приветствие  
        }
}

// ---- проверяет равны ли id товара и id, переданный в $_GET ---- //
function filterIdItems($array) {
    $result = false;
    if ($array['id'] == $_GET['id']) {
            $result = True;
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

?>

