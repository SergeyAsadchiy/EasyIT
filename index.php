<?php
require 'config/config.php';
require 'controllers/home.php';
session_start();
indexHome();

//-----------------------------------------------------
$str='Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit itaque, sequi accusamus molestias laudantium accusantium minus animi excepturi nobis esse ex recusandae maxime optio rem, neque amet voluptatibus, enim adipisci. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit itaque, sequi accusamus molestias laudantium accusantium minus animi excepturi nobis esse ex recusandae maxime optio rem, neque amet voluptatibus, enim adipisci.models/Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit itaque, sequi accusamus molestias laudantium accusantium minus animi excepturi nobis esse ex recusandae maxime optio rem, neque amet voluptatibus, enim adipisci.';
$num=58;

print_r(cropString($str,$num));
echo "<br>";

//-----------------------------------------------------
$fileName = "assets/files/new.csv";

writeToFileFromArray($fileName);

$res = readFromFileToArray($fileName);
var_dump($res);

//-----------------------------------------------------


