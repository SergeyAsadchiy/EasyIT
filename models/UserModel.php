<?php
//require_once ('Model.php');
class UserModel extends Model
{
    public $table = 'users';
    
    public function create($data)
    {
        extract($data);
        $password = md5($password);
        
        $stmt = $this->connect->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param('sss', $username, $email, $password);
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

        $stmt = $this->connect->prepare("UPDATE users SET username = ?, email = ? WHERE id = ?");
        $stmt->bind_param('ssi', $username, $email, $id);
        $stmt->execute();
        $result['userNameEmail'] = $stmt->insert_id; 

        if (!empty($password)) {
            $password = md5($password);
            $stmt = $this->connect->prepare("UPDATE users SET password = ? WHERE id = ?");
            $stmt->bind_param('si', $password, $id);
            $stmt->execute();
            $result['password'] = $stmt->insert_id;
        }

        if (!empty($avatar)) {
            $stmt = $this->connect->prepare("UPDATE users SET avatar = ? WHERE id = ?");
            $stmt->bind_param('si', $avatar, $id);
            $stmt->execute();
            $result['avatar'] = $stmt->insert_id;
        }

        return $result;
    }

}

     
