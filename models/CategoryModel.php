<?php 
/**
 * 
 */
Class CategoryModel extends Model 
{

    public function getCategories() 
    {
        $result = $this->connect->query("SELECT * FROM $this->table");
        $data = $result->fetch_all(MYSQLI_ASSOC);
        return $data;
    }

    public function create($data)
    {
        extract($data);
        $stmt = $this->connect->prepare("INSERT INTO $this->table (category) VALUES (?)");
        $stmt->bind_param('s', $category);
        $stmt->execute();
        $result = $stmt->insert_id;
        return $result;
    }
    
    public function update($data)
    {
        extract($data);
        $stmt = $this->connect->prepare("UPDATE $this->table SET category = ? WHERE id = $id");
        $stmt->bind_param('s', $category);
        $stmt->execute();
        $result = $stmt->insert_id;
        return $result;
    }

}
