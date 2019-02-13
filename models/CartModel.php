<?php 
/**
 * 
 */
class CartModel extends Model
{
    public $table = 'cart';

    public function create($data)
    {
        extract($data);
        $stmt = $this->connect->prepare("INSERT INTO $this->table (user_id, item_id, price, count) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('iiii', $user_id, $item_id, $price, $count);
        $stmt->execute();
        $result = $stmt->insert_id;
        return $result;
    }

    public function read($id)
    {
        $stmt = $this->connect->prepare("SELECT c.*,p.name,p.img FROM cart AS c JOIN products AS p ON p.id = c.item_id WHERE c.user_id = ? ");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $res = $stmt->get_result();
        $result = $res->fetch_all(MYSQLI_ASSOC);
        return $result;
    }

    public function deleteItem($data) {
        extract($data);
        var_dump($user_id);
        var_dump($item_id);
                                     //   DELETE FROM cart WHERE user_id = 45 AND item_id = 1   
                                     //DELETE FROM $this->table WHERE $user_id = ? AND $item_id = ?
        $stmt = $this->connect->prepare("DELETE FROM $this->table WHERE user_id = ? AND item_id = ?");

        $stmt->bind_param('ii', $user_id, $item_id);
        $result = $stmt->execute();
        return $result;
    }
}