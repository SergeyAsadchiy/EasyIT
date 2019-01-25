<?php
require_once 'models/UserModel.php';
require_once 'core/functions.php';
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

    public function splashMessage($data)
    {
        $_SESSION['error_login'] = $data;
    }

	public function login()
	{
		if (!empty($_POST)) 
        { 
			$email   = $_POST['email'];
            $password= $_POST['password'];
            $user = $this->model->read();
            if(!$user) 
            {
                $this->splashMessage('пользователь с указанным email не зарегистрирован');
                redirect('login');
            }                
            
            if (md5($password) == $user['password']) 
            {
                $_SESSION['error_login'] = null;
                Auth::login($user['id']);     
                if ($_SESSION['profile_mem']) {         // если запомнили, что после логина нужно вернутья в profile
                    $_SESSION['profile_mem'] = false;   // сбрасываем запоминание 
                    redirect('profile');                // и возвращаемся в profile
                }
                redirect('home');
            } else {
                $this->splashMessage('пароли не равны');
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
            redirect('/');
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
        Auth::logout();
        redirect('home');
    }


    public function profile()
    {
        if (empty( Auth::userId() )) {          //  если попали  в profole без пользователя 
            $_SESSION['profile_mem'] = true;    //  то запоминаем, что нужно будет вернуться
            redirect('login');                  //  и переходим в login
        }

        if (!empty($_POST)) {
            //... обработка данных формыю. запись в базу
        } else {
            $user = $this->model->readIdUser();
            $this->view('profile', $user);
        }

    }

    public function loadAvatar()
    {
        $_FILES['userfile']['name'] = auth::userId().'.jpg';
        var_dump($_FILES);

        $uploaddir = 'assets/images/avatar/';
        $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
        var_dump($uploadfile);
        
        if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
            $this->splashMessage('Файл корректен и был успешно загружен.');
            redirect('profile');
        }else {
            $this->splashMessage('Файл не загружен!');
            redirect('profile');
        }

    }



}