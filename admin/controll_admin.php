<?php
require '../models/model.php'; 
$model  = new Model;
        $items  = $model->getDataItems();
        var_dump($items);
/**
 * 
 */
class AdminController
{
    
    public function index(){

        $model  = new Model;
        $items  = $model->getDataItems();
        $this->view('templ_admin', $items);
    }


    public function view($template, $data){
        include $template.'.php';
    }


}
