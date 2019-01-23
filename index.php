<?php
session_start();
require_once 'config/config.php';
require_once 'core/database.php';
require_once 'core/functions.php';

spl_autoload_register(function($className){	
	if (file_exists('controllers/'	.$className.'.php')) require_once 'controllers/'.$className.'.php';
	if (file_exists('models/'		.$className.'.php')) require_once 'models/'		.$className.'.php';
	if (file_exists('core/'			.$className.'.php')) require_once 'core/'		.$className.'.php';

});

$config = config('db');
$db = DB::init($config);

var_dump($_GET);

// Routes
$param = (!empty($_SERVER['QUERY_STRING'])) ? $_SERVER['QUERY_STRING'] : 'home';
$routes = [
    ['url' => 'home', 		'do' => 'HomeController/index'],
    ['url' => 'login', 		'do' => 'LoginController/login'],
    ['url' => 'logout', 	'do' => 'LoginController/logout'],
    ['url' => 'register',	'do' => 'LoginController/register'],
    ['url' => 'profile',	'do' => 'LoginController/profile'],
];
$route = array_filter($routes, function ($el) use($param) {
    return ($el['url'] == $param);
});
var_dump($route);
if (empty($route)) {header('Location: templates/page404.php');exit;}

$route = (array_values($route))[0];
list($contoller, $action) = explode('/', $route['do']);

$c = new $contoller();
$c->$action();