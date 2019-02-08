<?php
/**
 * 
 */
class AdminController
{   

    protected $model;
    protected $table;
    function __construct() {
        $this->model = new ItemModel();
        $this->model->table = "products";
    }

    public function index() {

        $data = [
            'items' => $this->model->getDataItems(),
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
            var_dump($_FILES);
            if (!empty($_FILES['userfile']['name'])) {
                //$_FILES['userfile']['name'] = $_POST['id'].'.jpg';
                $uploadDir = 'assets/images/';
                $uploadFileName = basename($_FILES['userfile']['name']);
                $uploadFile = $uploadDir . $uploadFileName;
                var_dump($uploadFile);
                if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadFile)) {
                    splashMessage('Файл корректен и был успешно загружен.');
                } else {
                    splashMessage('Файл не загружен!');
                }
            }

            $data = [
                'id'     => $_POST['id'],
                'name'   => $_POST['name'],
                'price'  => $_POST['price'],
                'stock'  => $_POST['stock'],
                'disc'   => $_POST['disc'],
                'img'    => $uploadFileName,
                'description' => $_POST['description']
            ];
            $this->model->updateItem($data);
            redirect('/adminka');
        } else {
            $data = [
                'item' => $this->model->readId($_GET['id']),
            ];
            $this->view('itemForm', $data);
        }
        
    }

    public function deleteItem()
    {
        $this->model->deleteId($_GET['id']);
        redirect('/adminka');
    }

}
