<?php
require_once 'models/model.php'; 
/**
 * 
 */
class LoginController
{
    
    public function index() {
		echo "login/index";
		$data = null;
		$this->view('login', $data);
    }
    
    public function view($template, $data) {
        //extract($data);
        include 'templates/'.$template.'.php';
    }


}