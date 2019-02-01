<?php
require_once 'models/UserModel.php';
require_once 'core/functions.php';
require_once ('Controller.php');
/**
 * 
 */
class LoginController extends Controller
{
    use Validation;

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
		if (!empty($_POST)) {
			$errors = $this->checkInputData();
            if ($errors) {

                $oldData['username']    = !empty($_POST['username']) ? $_POST['username'] : '';
                $oldData['email']       = !empty($_POST['email'])    ? $_POST['email']    : '';
                $oldData['password']    = !empty($_POST['password']) ? $_POST['password'] : '';

                $this->view('register', $oldData);

            } else {
                $data = [
                    'username'  => $_POST['username'],
                    'email'     => $_POST['email'],
                    'password'  => $_POST['password'],
                ];
                $_SESSION['login_user_id'] = $this->model->create($data);
                redirect('/');
            }

		} else {                  
			$data = [
                'username' => '',
                'email' => '',
                'password' => ''
            ];
			$this->view('register', $data);
		}
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

            $errorsCommon  = $this->checkInputData();
            if (md5($_POST['password']) !== auth::userPassword()) {
                $errorsProfile =True;
                splashMessage('введен неверный пароль');
            } else $errorsProfile =false;
            
            if ($errorsCommon or $errorsProfile) {

                $oldData['username']    = !empty($_POST['username'])    ? $_POST['username']    : '';
                $oldData['email']       = !empty($_POST['email'])       ? $_POST['email']       : '';
                $oldData['password']    = !empty($_POST['password'])    ? $_POST['password']    : '';
                $oldData['passwordNew'] = !empty($_POST['passwordNew']) ? $_POST['passwordNew'] : '';

                $this->view('profile', $oldData);

            } else {

                if (!empty($_FILES['userfile']['name'])) {
                    $_FILES['userfile']['name'] = auth::userId().'.jpg';
                    $uploadDir = 'assets/images/avatar/';
                    $uploadFileName = basename($_FILES['userfile']['name']);
                    $uploadFile = $uploadDir . $uploadFileName;
        
                    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadFile)) {
                        splashMessage('Файл корректен и был успешно загружен.');
                    } else {
                        splashMessage('Файл не загружен!');
                    }
                }
    
                $data['id']         = $_SESSION['login_user_id'];
                $data['username']   = !empty($_POST['username'])    ? $_POST['username']    : null;
                $data['email']      = !empty($_POST['email'])       ? $_POST['email']       : null;
                $data['password']   = !empty($_POST['passwordNew']) ? $_POST['passwordNew'] : null;
                $data['avatar']     = !empty($uploadFileName)       ? $uploadFileName       : null;
    
                $this->model->update($data);
                redirect('/');
            } 

        } else {
            $user = $this->model->readIdUser();
            $this->view('profile', $user);
        }

    }




}