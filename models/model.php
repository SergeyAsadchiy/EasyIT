<?php 
/**
 * 
 */
class Model
{
    protected $connect;
    public $table;
    
    function __construct() {
        $this->connect = DB::connection();
    }

    public function readId($id)
    {
        $stmt = $this->connect->prepare("SELECT * FROM $this->table WHERE id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();
        return $data;
    }

    public function deleteId($id) 
    {
        $stmt = $this->connect->prepare("DELETE FROM $this->table WHERE id = ? ");
        $stmt->bind_param('i', $id);
        $result = $stmt->execute();
        return $result;
    }

    public function  count()
    {
        $stmt = $this->connect->prepare("SELECT COUNT(*) FROM $this->table");
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_row();
        return $data[0];
    }
}
