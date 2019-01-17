<?php
require_once 'models/UserModel.php';
require_once 'core/Function.php';
require_once ('Controller.php');
/**
 * 
 */
class LoginController extends Controller
{
	protected $model;
    function __construct() {
        $this->model = new UserModel();
    }

	public function login()
	{
		if (!empty($_POST)) { 
			$email = $_POST['email'];
            $user = $this->model->read();
            if(!$user) {
                $_SESSION['error_login'] = 'пользователь с указанным email не зарегистрирован';
                redirect('login');
            }    
            
            $password = $_POST['password'];
            
            if (md5($password) == $user['password']) {
                echo 'пароли равны';
                $_SESSION['error_login'] = '';
                $_SESSION['login_user_id'] = $user['id'];
                redirect('logout');
            } else {
                $_SESSION['error_login'] = 'пароли не равны';
                redirect('login');
            }
		} else { 				// если GET 
			$data = [];
			$this->view('login', $data);
		}
	}

	public function register()
	{
		if (!empty($_POST)) {    // если POST (поьзователь ввел данные и нажал СОХРАНИТЬ) 
			$errors = $this->checkRegister(); // валидация
            if ($errors) {
                $oldData = [
                    'email' => $_POST['email']
                ];
                redirect('register', $oldData, ['error' => $errors]);
            }
            $data = $_POST; var_dump($data);
            $userId = $this->model->create();
            $_SESSION['login_user_id'] = $userId;
            header('Location: index.php');
            exit();
		} else {                  // если GET
			$data = [];
			$this->view('register', $data);
		}
	}

    public function checkRegister()
    {
    	return False;
    }

    public function logout()
    {
        if (!empty($_POST) AND ($_POST['userName'] == '')) {
            $_SESSION['login_user_id'] = '';
            redirect('home');
        } else {
            $data = [
               'user'=> $this->model->readIdUser()['username']
            ];
            $this->view('logout',$data);
        }

    }

}