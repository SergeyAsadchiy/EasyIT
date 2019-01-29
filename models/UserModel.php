<?php
//require_once ('Model.php');
class UserModel extends Model
{
    protected $table = 'users';
    
    public function create($data)
    {
        extract($data);
        $password = md5($password);
        
        $stmt = $this->connect->prepare("INSERT INTO users (username, email, password, admin) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('ssss', $username, $email, $password, $admin);
        $stmt->execute();
        $result = $stmt->insert_id;
        return $result;
    }

    public function read($email)
    {
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

        public function update($data)
    {
        extract($data);
        $password = md5($password);

        $stmt = $this->connect->prepare("UPDATE users SET username = ?, email = ?, password = ?, admin = ?, avatar = ? WHERE id = ?");
        $stmt->bind_param('sssssi', $username, $email, $password, $admin, $avatar, $id);
        var_dump($stmt);
        $stmt->execute();
        $result = $stmt->insert_id;
        return $result;
    }
}