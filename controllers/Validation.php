<?php 

trait Validation
{
	public function checkInputData()    
    {
    	if ($_POST['username']  == '') {splashMessage('введите логин');  $result = true;}
        else 
        if ($_POST['email']     == '') {splashMessage('введите e-mail'); $result = true;}
        else
        if ($_POST['password']  == '') {splashMessage('введите пароль'); $result = true;}
        else 
        $result = false;
        return $result;
    }
}