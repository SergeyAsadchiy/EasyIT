<?php
session_start();
require_once 'config/config.php';
require_once 'core/database.php';
require_once 'core/functions.php';


// TODO сделать циклом с массивом
spl_autoload_register(
    function($className){
        $pathClass = ['controllers/', 'models/', 'core/', 'admin/'];
        foreach ($pathClass as $path) {
            if (file_exists($path.$className.'.php')) require_once $path.$className.'.php';
        }
    }
);

$config = config('db');
$db = DB::init($config);

//CSV::writeToFile('assets/files/text.txt');
//CSV::readFromFile('assets/files/text.txt');

$param = $_GET;

// Routes
$url = $_SERVER['REQUEST_URI'];

$url = explode('?', $url)[0];

$routes = [
    ['url' => '', 				    'do' => 'HomeController/index'],
    ['url' => '/', 				    'do' => 'HomeController/index'],
    ['url' => 'home',               'do' => 'HomeController/index'],
    ['url' => '/home',              'do' => 'HomeController/index'],        
    ['url' => '/auth/login',        'do' => 'LoginController/login'],
    ['url' => '/auth/logout', 	    'do' => 'LoginController/logout'],
    ['url' => '/auth/register',	    'do' => 'LoginController/register'],
    ['url' => '/auth/profile',	    'do' => 'LoginController/profile'],
    ['url' => '/adminka',           'do' => 'AdminController/index'],
    ['url' => '/adminka/editItem',  'do' => 'AdminController/editItem'],
];

$route = array_filter($routes, function ($el) use ($url) {
    return ($el['url'] == $url or $el['url'].'/' == $url);
});
if (empty($route)) {header('Location: templates/page404.php');exit;}

$route = (array_values($route))[0];
list($controller, $action) = explode('/', $route['do']);
    //var_dump($controller);
    //var_dump($action);
$c = new $controller();
$c->$action();