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

	public function login()
	{
		if (!empty($_POST)) { 
            $user = $this->model->read($_POST['email']);
            if(!$user)             {
                splashMessage('пользователь с указанным email не зарегистрирован');
                redirect('/auth/login');
            }                
            
            if (md5($_POST['password']) == $user['password'])             {
                Auth::login($user['id']);     
                if ($_SESSION['profile_mem'])  {        // если запомнили, что после логина нужно вернутья в profile
                    $_SESSION['profile_mem'] = false;   // сбрасываем запоминание 
                    redirect('/auth/profile');          // и возвращаемся в profile
                }
                redirect('/');
            } else {
                splashMessage('пароли не равны');
                redirect('/auth/login');
            }
		} else {
			$data = [];
			$this->view('login', $data);
		}
	}


	public function register()
	{
		if (!empty($_POST)) {                         // если POST (поьзователь ввел данные и нажал СОХРАНИТЬ) 
			$errors = $this->checkRegister();                // валидация
            if ($errors) {
                $oldData = [
                    'email' => $_POST['email']
                ];
                redirect('/auth/register', $oldData, ['error' => $errors]);
            }
            $data = [
                'username'  => $_POST['username'],
                'email'     => $_POST['email'],
                'password'  => $_POST['password'],
                'admin'     => $_POST['admin'],
            ];
            $_SESSION['login_user_id'] = $this->model->create($data);
            redirect('/');
		} else {                  
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
        redirect('/');
    }


    public function profile()
    {
        if (empty( Auth::userId() )) {          //  если попали  в profole без пользователя 
            $_SESSION['profile_mem'] = true;    //  то запоминаем, что нужно будет вернуться после логина()
            redirect('/auth/login');                  //  и переходим в login
        }

        if (!empty($_POST)) {
            $_FILES['userfile']['name'] = auth::userId().'.jpg';
            $uploadDir = 'assets/images/avatar/';
            $uploadFileName = basename($_FILES['userfile']['name']);
            $uploadFile = $uploadDir . $uploadFileName;
            if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadFile)) {
                splashMessage('Файл корректен и был успешно загружен.');
            } else {
                splashMessage('Файл не загружен!');
            }

            $data = [
                'username'  => $_POST['username'],
                'email'     => $_POST['email'],
                'password'  => $_POST['passwordNew'],
                'admin'     => $_POST['admin'],
                'avatar'    => $uploadFileName,
                'id'        => $_SESSION['login_user_id']
            ];
            $this->model->update($data);
            redirect('/'); 

        } else {
            $user = $this->model->readIdUser();
            $this->view('profile', $user);
        }

    }




}