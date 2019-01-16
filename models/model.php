<?php 

/**
 * 
 */
class Model
{
    public function getDataItems() {
        $description = "Some quick example text to build on the card title and make up the bulk of the card's content.";

        $db = Database::getInstance();  //var_dump($db);
        $db_connect = $db->connection;  //var_dump($db_connect);

        $result = $db_connect->query('SELECT * FROM products');     //var_dump($result);
        $itemsData = $result->fetch_all(MYSQLI_ASSOC);              //var_dump($itemsData); 


        $itemsDataObj = [];
        foreach ($itemsData as $item) {             // для каждого массива товара в исходном массиве
            $item['description'] = $description;    // дополняем дескрипшном 
            $itemsDataObj[] = new Item($item);      // формируем массив объектов класса Item      
        }
    
        return $itemsDataObj;                       // возвращаем массив объектов класса Item
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

    function __construct($itemRaw)
    {
        $this->id = $itemRaw['id'];
        $this->name = $itemRaw['name'];
        $this->count = $itemRaw['stock'];
        $this->disc = $itemRaw['disc'];
        $this->description = $itemRaw['description'];        
        $this->price = $this->getPrice($itemRaw['price']);
        $this->img = $itemRaw['img'];
    }

    protected function getPrice($price)
    {   
        if ($this->count == 0) {
            $price = 'нет в наличии';
        } else {
            if ($this->count < 2) {
                $price = $price;
            } else {
                $price = $price * (1 - $this->disc / 100);
            }
        }
    
            return $price;
    }

}