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
var_dump($_GET);

$param['page'] = isset($_GET['page']) ? $_GET['page'] : 'home';
$param['act'] = isset($_GET['act']) ? $_GET['act'] : 'index';


var_dump($param);
//exit;
$name = $param['page'];
$act = $param['act'];

$routes = [
    ['url' => 'home/index', 'do' => 'HomeController/index'],
    //['url' => 'auth/login', 'do' => 'LoginController/index'],
    //['url' => 'auth/login_post', 'do' => 'LoginController/login']
    ['url' => 'login/index', 'do' => 'LoginController/index'],
    ['url' => 'login/check', 'do' => 'LoginController/check'],
    ['url' => 'registration/save', 'do' => 'LoginController/save']
];

$route = array_filter($routes, function ($el) use($name, $act) {
    return ($el['url'] == $name.'/'.$act);
});

$route = (array_values($route))[0];
var_dump($route);

list($contoller, $action) = explode('/', $route['do']);
var_dump($contoller);
var_dump($action);
$c = new $contoller();
$c->$action();



