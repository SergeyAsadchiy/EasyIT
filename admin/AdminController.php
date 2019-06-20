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
            'items' => $this->model->getDataItems(0, $this->model->count()),
        ];
        $this->view('templ_admin', $data);
    }

    public function view($template, $data) {
        extract($data);
        include 'admin/'.$template.'.php';
    }

    public function addItem()
    {
        if (!empty($_POST)) {
            if (!empty($_FILES['userfile']['name'])) {
//              $_FILES['userfile']['name'] = $_POST['id'].'.jpg';
                $uploadDir = 'assets/images/products/';
                $uploadFileName = basename($_FILES['userfile']['name']);
                $uploadFile = $uploadDir . $uploadFileName;
                var_dump($uploadFile);
                if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadFile)) {
                    splashMessage('Файл корректен и был успешно загружен.');
                } else {
                    splashMessage('Файл не загружен!');
                }
            }

            $data['category_id'] = !empty($_POST['category_id'  ])  ? $_POST['category_id']  : null;
            $data['name'    ]    = !empty($_POST['name'         ])  ? $_POST['name'       ]  : null;
            $data['price'   ]    = !empty($_POST['price'        ])  ? $_POST['price'      ]  : null;
            $data['stock'   ]    = !empty($_POST['stock'        ])  ? $_POST['stock'      ]  : null;
            $data['disc'    ]    = !empty($_POST['disc'         ])  ? $_POST['disc'       ]  : null;
            $data['img'     ]    = !empty($uploadFileName       )   ? $uploadFileName        : null;
            $data['description'] = !empty($_POST['description'  ])  ? $_POST['description']  : null;
            $this->model->addItem($data);
            redirect('/adminka');
        } else {
            $data = [];
            $this->view('addItemForm', $data);
        }

    }

    public function editItem()
    {
        if (!empty($_POST)) {
            if (!empty($_FILES['userfile']['name'])) {
//              $_FILES['userfile']['name'] = $_POST['id'].'.jpg';
                $uploadDir = 'assets/images/products/';
                $uploadFileName = basename($_FILES['userfile']['name']);
                $uploadFile = $uploadDir . $uploadFileName;
                var_dump($uploadFile);
                if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadFile)) {
                    splashMessage('Файл корректен и был успешно загружен.');
                } else {
                    splashMessage('Файл не загружен!');
                }
            }

            $data['category_id'] = !empty($_POST['category_id'  ])  ? $_POST['category_id']  : null;
            $data['id'      ]    = !empty($_POST['id'           ])  ? $_POST['id'         ]  : null;
            $data['name'    ]    = !empty($_POST['name'         ])  ? $_POST['name'       ]  : null;
            $data['price'   ]    = !empty($_POST['price'        ])  ? $_POST['price'      ]  : null;
            $data['stock'   ]    = !empty($_POST['stock'        ])  ? $_POST['stock'      ]  : null;
            $data['disc'    ]    = !empty($_POST['disc'         ])  ? $_POST['disc'       ]  : null;
            $data['img'     ]    = !empty($uploadFileName       )   ? $uploadFileName        : null;
            $data['description'] = !empty($_POST['description'  ])  ? $_POST['description']  : null;

            $this->model->updateItem($data);
            redirect('/adminka');
        } else {
            $data = [
                'item' => $this->model->readId($_GET['id']),
            ];
            $this->view('editItemForm', $data);
        }

    }

    public function deleteItem()
    {
        $this->model->deleteId($_GET['id']);
        redirect('/adminka');
    }

}
