<?php
session_start();
echo"hello";
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

ini_set('display_errors',1);
error_reporting(E_ALL);

$config = config('db');
$db = DB::init($config);

$config_PDO = config('db_PDO');
$db_PDO = DB_PDO::init($config_PDO);



//CSV::writeToFile('assets/files/text.txt');
//CSV::readFromFile('assets/files/text.txt');

$param = $_GET;
//var_dump($param);

// Routes
if (!empty($_SERVER['REQUEST_URI'])) {
    $url = trim($_SERVER['REQUEST_URI'], '');
}
$url = explode('?', $url)[0];

$routes = [
    ['url' => '', 				    'do' => 'HomeController/index'      ],
    ['url' => '/', 				    'do' => 'HomeController/index'      ],
    ['url' => 'home',               'do' => 'HomeController/index'      ],
    ['url' => '/home',              'do' => 'HomeController/index'      ],

    ['url' => '/auth/login',        'do' => 'LoginController/login'     ],
    ['url' => '/auth/logout', 	    'do' => 'LoginController/logout'    ],
    ['url' => '/auth/register',	    'do' => 'LoginController/register'  ],
    ['url' => '/auth/profile',	    'do' => 'LoginController/profile'   ],

    ['url' => '/adminka',           'do' => 'AdminController/index'     ],
    ['url' => '/adminka/addItem',   'do' => 'AdminController/addItem'   ],
    ['url' => '/adminka/editItem',  'do' => 'AdminController/editItem'  ],
    ['url' => '/adminka/deleteItem','do' => 'AdminController/deleteItem'],

    ['url' => '/category',          'do' => 'CategoryController/show'   ],
    ['url' => '/category/add',      'do' => 'CategoryController/add'    ],
    ['url' => '/category/edit',     'do' => 'CategoryController/edit'   ],
    ['url' => '/category/delete',   'do' => 'CategoryController/delete' ],

    ['url' => '/cart',              'do' => 'CartController/show'       ],
    ['url' => '/cart/add',          'do' => 'CartController/add'        ],
    ['url' => '/cart/edit',         'do' => 'CartController/edit'       ],
    ['url' => '/cart/delete',       'do' => 'CartController/delete'     ],
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