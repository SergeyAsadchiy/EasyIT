<?php 
/**
 * 
 */
Class ItemModel extends Model 
{
    public $table = 'products';
    public function getDataItems($start, $limit) 
    {
        
        if (empty($_GET['category_id'])) {
            $stmt = $this->connect->prepare('SELECT * FROM products LIMIT ?, ?');
            $stmt->bind_param('ii', $start, $limit);
            $stmt->execute();
            $result = $stmt->get_result();            
        }
        if (!empty( $_GET['category_id'])) {
            $id   = $_GET['category_id'];
            $stmt = $this->connect->prepare('SELECT * FROM products WHERE category_id = ? LIMIT ?, ?');
            $stmt->bind_param('iii', $id, $start, $limit);
            $stmt->execute();
            $result = $stmt->get_result();
        }    
        $itemsData = $result->fetch_all(MYSQLI_ASSOC);

        $itemsDataObj = [];
        foreach ($itemsData as $item) {             // для каждого массива товара в исходном массиве
            $itemsDataObj[] = new Item($item);      // формируем массив объектов класса Item      
        }
        return $itemsDataObj;                       // возвращаем массив объектов класса Item
    }

    public function addItem($data)
    {
        extract($data);
        
        $stmt = $this->connect->prepare("INSERT INTO $this->table (name, description, price, stock, disc, img, category_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('ssdiisi', $name, $description, $price, $stock, $disc, $img, $category_id);
        $stmt->execute();
        $result = $stmt->insert_id;
        return $result; 
    }
    
    public function updateItem($data)
    {
        extract($data);
        $stmt = $this->connect->prepare("UPDATE $this->table SET name = ?, description = ?, price = ?, stock = ?, disc = ?, category_id = ? WHERE id = $id");
        $stmt->bind_param('ssdiii', $name, $description, $price, $stock, $disc, $category_id);
        $stmt->execute();
        $result['all'] = $stmt->insert_id;

        if (!empty($img)) {
            var_dump($img);
            $stmt = $this->connect->prepare("UPDATE $this->table SET img = ? WHERE id = $id");
            $stmt->bind_param('s', $img);
            $stmt->execute();
            $result['password'] = $stmt->insert_id;
        }
        return $result; 
    }                      
}

/**
 * 
 */
class Item
{
    public $id;
    public $name;
    public $price;
    public $count;
    public $disc;
    public $description;
    public $img;
    public $category_id;


    function __construct($itemRaw)
    {
        $this->id       = $itemRaw['id'];
        $this->name     = $itemRaw['name'];
        $this->count    = $itemRaw['stock'];
        $this->disc     = $itemRaw['disc'];
        $this->img      = $itemRaw['img'];        
        $this->price    = $this->getPrice($itemRaw['price']);
        $this->description = $itemRaw['description'];   
        $this->category_id = $itemRaw['category_id'];
    }

    protected function getPrice($price)
    {   
        //  if ($this->count == 0) {
        //      $price = 'нет в наличии';
        //  } else {
        //      if ($this->count < 2) {
        //          $price = $price;
        //      } else {
        //          $price = $price * (1 - $this->disc / 100);
        //      }
        //  }
    
        return $price;
    }

}