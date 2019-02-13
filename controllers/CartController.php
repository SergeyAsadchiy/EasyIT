<?php

/**
 * 
 */
class CartController extends Controller
{

	protected $model;

    function __construct() {
        $this->model = new CartModel();
    }

    public function show()
    {
        $data = [
            'items' => $this->model->read(Auth::userId())
        ];
//        var_dump($data);exit();
        $this->view('cart', $data);
    }

    public function add()
    {
        if (isset($_POST['count'])) {
            if ($_POST['count'] > 0){
                $data = [
                    'item_id'   => $_POST['item_id'],
                    'price'     => $_POST['price'],
                    'count'     => $_POST['count'],
                    'user_id'   => Auth::UserID()
                ];
                $this->model->create($data);
            }
            redirect('/');
        }
    }

/**
 * Удаляет товар по ID из корзины зарегистрированного пользователя 
 */
    public function delete()
    {
        if (isset($_GET['item_id'])) {
            $data = [
                'item_id'   => (int)$_GET['item_id'],
                'user_id'   => Auth::UserID()
                ];            
            $this->model->deleteItem($data);
            redirect('/cart');
        }
    }


}