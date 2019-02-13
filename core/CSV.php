<?php 
/**
 * 
 */
class CSV
{

    public static function writeToFile($fileName)
    {
        $fName = fopen($fileName,"w");                      // открываем файл для записи 
        $model  = new ItemModel;
        $items  = $model->getDataItems(0, $this->model->count());                   // получаем из DB 	 массив объектов-товаров
        $items  = array_map('get_object_vars',$items);		// преобразовываем в массив массивов-товаров

	    $firstRow = implode(';', array_keys($items[0]));    // получаем строку из ключей 
	    fwrite($fName,$firstRow.PHP_EOL);                   // записываем в файл - заголовок
	    foreach ($items as $item) {                         // для каждого товара            
	        $row = implode(';', array_values($item));           // получаем строку из значений
	        fwrite($fName,$row.PHP_EOL);                        // записывам в файл
	    }
	    fclose($fName);                                     // закрываем файл
    }

    public static function readFromFile($fileName)
    {
    	$fName = fopen($fileName,"r");                      // открываем файл для чтения
    	$array = file($fileName,FILE_IGNORE_NEW_LINES);     // фомируем массив из строк файла(удаляем PHP_EOL)
	
    	$arrayKey = explode(';',$array[0]);                     // формируем массив ключей из нулевой строки (ключи)
    	$arrayValueString = array_slice($array,1,count($array));// формируем массив без ключей (обрезаем 0-ю строку)
    	foreach ($arrayValueString as $valueString) {       // для кадой строки массива:
    	    $arrayValue = explode(';',$valueString);                // получаем из строки массив (id, name...)
    	    $items[] = array_combine($arrayKey, $arrayValue);       // формируем новый массив, в кот. пишем
    	}                                                           // ключи из $arrayKey и значения массива 
    	                                                            // из текущей строки $arrayValue
    	var_dump($items);
    	fclose($fName);
    	return $items;
    }

    
}    
