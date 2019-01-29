<?php
session_start();
require_once 'config/config.php';
require_once 'core/database.php';
require_once 'core/functions.php';

// TODO сделать циклом с массивом
spl_autoload_register(function($className){
	if (file_exists('controllers/'	.$className.'.php')) require_once 'controllers/'.$className.'.php';
	if (file_exists('models/'		.$className.'.php')) require_once 'models/'		.$className.'.php';
	if (file_exists('core/'			.$className.'.php')) require_once 'core/'		.$className.'.php';

});

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
    ['url' => '/auth/loadAvatar',   'do' => 'LoginController/loadAvatar'],
    
//    ['url' => 'home',           'do' => 'HomeController/index'],        
//    ['url' => 'login',          'do' => 'LoginController/login'],
//    ['url' => 'logout',         'do' => 'LoginController/logout'],
//    ['url' => 'register',       'do' => 'LoginController/register'],
//    ['url' => 'profile',        'do' => 'LoginController/profile'],
//    ['url' => 'loadAvatar',     'do' => 'LoginController/loadAvatar'],
];

$route = array_filter($routes, function ($el) use ($url) {
    return ($el['url'] == $url or $el['url'].'/' == $url);
});
if (empty($route)) {header('Location: templates/page404.php');exit;}

$route = (array_values($route))[0];
list($contoller, $action) = explode('/', $route['do']);

$c = new $contoller();
$c->$action();