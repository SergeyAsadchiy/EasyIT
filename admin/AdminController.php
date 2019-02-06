<?php
/**
 * 
 */
class AdminController
{   
    public function index(){

        //$model  = new ItemModel;
        //$items  = $model->getDataItems();

        $data = [
            'items' => Items::GetItems(),
        ];
        $this->view('templ_admin', $data);
    }

    public function view($template, $data) {
        extract($data);
        include 'admin/'.$template.'.php';
    }

    public function editItem()
    {
        if (!empty($_POST)) {
            # code...
        } else {
            $data = [
                'item' => Items::GetItem($_GET['id']),
            ];
            $this->view('itemForm', $data);
        }
        
    }
}
