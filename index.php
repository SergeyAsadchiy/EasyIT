<?php
session_start();
require 'config/config.php';
require 'core/database.php';

require 'controllers/HomeController.php';
require 'controllers/LoginController.php';

$config = config('db');
$db1 = DB::init($config);

$db = Database::getInstance($config);	//var_dump($db);
$db_connect = $db->connection;			//var_dump($db_connect);

// Routes
$param = (!empty($_SERVER['QUERY_STRING'])) ? $_SERVER['QUERY_STRING'] : 'home';
$routes = [
    ['url' => 'home', 		'do' => 'HomeController/index'],
    ['url' => 'login', 		'do' => 'LoginController/login'],
    ['url' => 'logout', 	'do' => 'LoginController/logout'],
    ['url' => 'register',	'do' => 'LoginController/register'],
    //['url' => 'auth/login_post', 'do' => 'LoginController/login']
];
$route = array_filter($routes, function ($el) use($param) {
    return ($el['url'] == $param);
});
var_dump($route);
//if (empty($route)) {header('Location: templates/page404.php');exit;}

$route = (array_values($route))[0];
list($contoller, $action) = explode('/', $route['do']);
var_dump($_SESSION);

$c = new $contoller();
$c->$action();