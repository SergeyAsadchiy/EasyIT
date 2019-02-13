<?php 
//---- функция обрезает текст после заданного колличества 
//     символов. Текст обрезается до целого слова.
function cropString($str,$limit = 20) {     
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

    function redirect($route)
    {
        header('Location: '.$route);
        exit;
    }

    function splashMessage($data = false, $class = 'info')
    {   
        if (empty($_SESSION['error_message'])) $_SESSION['error_message'] = ''; // инициализация в новой сессии
        if (empty($_SESSION['error_class'])) $_SESSION['error_class'] = '';     //

        if($data) {
            $_SESSION['error_message'] = $data;
            $_SESSION['error_class'] = $class;
        } else {
            $message['data'] = $_SESSION['error_message'];
            $message['class'] = $_SESSION['error_class'];
            $_SESSION['error_message'] = '';
            $_SESSION['error_class'] = '';
            return $message['data'];
        }
    }

    function rus2translit($string) {
        $converter = array(
            'а' => 'a',   'б' => 'b',   'в' => 'v',
            'г' => 'g',   'д' => 'd',   'е' => 'e',
            'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
            'и' => 'i',   'й' => 'y',   'к' => 'k',
            'л' => 'l',   'м' => 'm',   'н' => 'n',
            'о' => 'o',   'п' => 'p',   'р' => 'r',
            'с' => 's',   'т' => 't',   'у' => 'u',
            'ф' => 'f',   'х' => 'h',   'ц' => 'c',
            'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
            'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
            'э' => 'e',   'ю' => 'yu',  'я' => 'ya',
            
            'А' => 'A',   'Б' => 'B',   'В' => 'V',
            'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
            'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
            'И' => 'I',   'Й' => 'Y',   'К' => 'K',
            'Л' => 'L',   'М' => 'M',   'Н' => 'N',
            'О' => 'O',   'П' => 'P',   'Р' => 'R',
            'С' => 'S',   'Т' => 'T',   'У' => 'U',
            'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
            'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
            'Ь' => '\'',  'Ы' => 'Y',   'Ъ' => '\'',
            'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
        );
        return strtr($string, $converter);
    }
    
    function str2url($str) {
        // переводим в транслит
        $str = rus2translit($str);
        // в нижний регистр
        $str = strtolower($str);
        // заменям все ненужное нам на "-"
        $str = preg_replace('~[^-a-z0-9_]+~u', '-', $str);
        // удаляем начальные и конечные '-'
        $str = trim($str, "-");
        return $str;
    }