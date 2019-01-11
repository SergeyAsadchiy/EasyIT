<?php
require '../config/config.php';
require 'controll_admin.php';



$adminController = new AdminController();
$adminController->index();