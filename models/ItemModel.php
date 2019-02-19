<?php 
/**
 * 
 */
Class ItemModel extends Model 
{
    public $table = 'products';

/*
    $filter = ['cat' => 55, 'priceM' => 100, 'ids' => [1,2,3,4]];
    $fields = ['name', 'price'];
    $fields = 'count';
    */
    public function listItems($filter = [], $fields = null)
    {
        if(!$fields) {
            //$fields = ['name', 'price'];
            $fields = ['*'];
        }
        $sql = " FROM $this->table ";
        if (!empty($filter)) {
            $sql = $sql. 'WHERE ';
            if (key_exists('cat', $filter)) {
                $sql .= 'category_id = ?';
            }
            if (key_exists('priceMin', $filter)) {
                if (key_exists('cat', $filter)) $sql .= ' AND ';
                $sql .= 'price > ?';
            }
            if (key_exists('priceMax', $filter)) {
                if (key_exists('cat', $filter) OR key_exists('priceMin', $filter)) $sql .= ' AND ';
                $sql .= 'price < ?';
            }
            if (key_exists('ids', $filter)) {
                if (key_exists('cat', $filter) OR key_exists('priceMin', $filter) OR key_exists('priceMax', $filter)) $sql .= ' AND ';
                //$sql .= 'id IN (?)';
                //$filter['ids'] = "(". join(",", $filter['ids']) .")";
                $sql .= 'id = ?';
            }
            if (key_exists('start', $filter) AND key_exists('limit', $filter)) {
                $sql .= ' LIMIT ?, ?';
            }
        }
        if ($fields) {
            if ($fields == 'count') {
                $sql = 'SELECT COUNT(*) '.$sql;
            } else {
                $sql = 'SELECT ' .join(",", $fields) .$sql;
            }
        }

        $stmt = $this->connect_PDO->prepare($sql);
        if (!empty($filter)) {
            $i = 1;
            $type = null;
            foreach ($filter as $key => $fl) {
                    $type  = (in_array($key, ['cat', 'priceMin', 'priceMax', 'ids', 'start', 'limit'])) ? PDO::PARAM_INT : PDO::PARAM_STR;
                    $stmt->bindValue($i, $fl, $type);
                    $i++;
            }
        }
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;  
    }



    public function getDataItems($filter) 
    {
        $itemsData = $this->listItems($filter);

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