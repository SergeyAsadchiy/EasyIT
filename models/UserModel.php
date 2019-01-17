<?php
require_once ('Model.php');
class UserModel extends Model
{
    protected $table = 'users';
    
    public function create()
    {
        $username = $_POST['username'];
        $email =    $_POST['email'];
        $password = md5($_POST['password']);

        $stmt = $this->connect->prepare("INSERT INTO users (username,email, password) VALUES (? ,? ,?)");
        var_dump($stmt);
        $stmt->bind_param('sss', $username, $email, $password);
        $stmt->execute();
        $result = $stmt->insert_id;var_dump($result);
        return $result;
    }

    public function read()
    {
        $email = $_POST['email'];
        $stmt = $this->connect->prepare('SELECT * FROM users WHERE email = ?');
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();
        return $data;
    }

    public function readIdUser()
    {
        $id = $_SESSION['login_user_id'];
        $stmt = $this->connect->prepare('SELECT * FROM users WHERE id = ?');
        $stmt->bind_param('s', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();
        return $data;
    }
}