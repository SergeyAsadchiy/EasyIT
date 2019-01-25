<?php 
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
        if($data) {
            $_SESSION['error_login'] = $data;
            $_SESSION['error_class'] = $class;
        } else {
            $message['data'] = $_SESSION['error_login'];
            $message['class'] = $_SESSION['error_class'];
            $_SESSION['error_login'] = '';
            $_SESSION['error_class'] = '';
            return $message;
        }
    }