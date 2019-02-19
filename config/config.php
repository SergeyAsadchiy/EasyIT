<?php 

function getNoImage() {
	$noImage='assets/images/Noimage.png';
	return $noImage;
}

function config($type) {
    $all_config = [
        'db' => [
            'host' 		=> 'localhost',
            'user' 		=> 'root',
            'password' 	=> '',
            'db' 		=> 'shop'
        ],
        
        'db_PDO' => [
            'host'      => 'localhost',
            'db'        => 'shop',
            'charset'   => 'utf8mb4',
            'user'      => 'root',
            'password'  => ''
        ],
    ];
    $result = $all_config[$type];
    return $result;
}

