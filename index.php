<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<?php


$items = [
    ['id' => '1', 'name' => 'Монитор',      'price' => '1200.00', 'stock' => '5', 'disc' => '10'],
    ['id' => '2', 'name' => 'Компьютер',    'price' => '4200.00', 'stock' => '7', 'disc' => '10'],
    ['id' => '3', 'name' => 'Ноутбук',      'price' => '7700.00', 'stock' => '2', 'disc' => '10'],
    ['id' => '4', 'name' => 'Принтер',      'price' => '1800.00', 'stock' => '1', 'disc' => '10'],
    ['id' => '5', 'name' => 'Стол',         'price' => '1100.00', 'stock' => '0', 'disc' => '20'],
    ['id' => '6', 'name' => 'Стул',         'price' => '2200.00', 'stock' => '0', 'disc' => '20'],
    ['id' => '7', 'name' => 'Шкаф',         'price' => '1260.00', 'stock' => '8', 'disc' => '20'],
    ['id' => '8', 'name' => 'Кресло',       'price' => '4250.00', 'stock' => '9', 'disc' => '20'],
    ['id' => '9', 'name' => 'Диван',        'price' => '9800.00', 'stock' => '1', 'disc' => '30'],
];

$noImage = 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/600px-No_image_available.svg.png';

$images = [
    ['id' => '1', 'img' => 'https://24shop.by/images/cache/286/_thumb_180x180xtrim_upload_iblock_286_28645e4ca35135ed3d2b29cf1b4a62bc.jpeg'],
    ['id' => '2', 'img' => 'h___ttps://supercomp.kiev.ua/img/item_foto/bbb/08/U0106900.jpg'],
    ['id' => '3', 'img' => 'img/notebook.jpg'],
    ['id' => '4', 'img' => 'img/printer.jpg'],
    ['id' => '7', 'img' => 'img/wardrobe.jpg'],
    ['id' => '8', 'img' => 'img/armchair.jpg']
];

$description = "Some quick example text to build on the card title and make up the bulk of the card's content.";




// 1) Вывести все товары ввиде карточек - шаблон 1.
//    выводим развание, описание для всех $description и цену
// 2) Цену расчитать со скидкой указаной в % колонка 'disc'.
// 3) Если товара меньше 2-х, скидка не дается. Кол-во на складе это 'stock'.
// 4) Если товара нет, то вместо цены выводим - "нет в наличии"
$price_disc=0;
foreach ($items as $item) {
    if ($item['stock']==0) {
        $price_disc='нет в наличии';
    } else {
        if ($item['stock']<2) {
            $price_disc=$item['price'];
        } else {
            $price_disc=$item['price']*(1-$item['disc']/100);
        }
    }       
?>
    <div class="card border-success mb-3" style="max-width: 18rem;">
    <div class="card-header bg-transparent border-success">Header</div>
    <div class="card-body text-success">
        <h5 class="card-title"><?php echo $item['name'] ?></h5>
        <p class="card-text"><?php echo $description ?></p>
        <p class="card-text"><?php echo $price_disc ?></p>
    </div>
    <div class="card-footer bg-transparent border-success">Footer</div>
    </div>

<?php
}


// 5) Вывести все поля товаров в виде таблицы
echo '
<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Price</th>
        <th scope="col">Stock</th>
        <th scope="col">Discount</th>
    </tr>
    </thead>
    <tbody>
';
echo '<br>';
foreach ($items as $item) {
    echo'
    <tr>
        <th>'.$item['id'].'</th>
        <td>'.$item['name'].'</td>
        <td>'.$item['price'].'</td>
        <td>'.$item['stock'].'</td>
        <td>'.$item['disc'].'</td>
    </tr>
    ';
}
echo '
    </tbody>
</table>
';

// 6*) Вывести в карточке картинку товара, посмотреть на https://getbootstrap.com/docs/4.1/components/card/
//     Имена файлов или ссылки добавить в таблицу $images в поле 'img'. Для товара у которого нет картинки
//     в списке вывести - $noImage
foreach ($images as $image) {
echo '
<div class="card" style="width: 18rem;">
<img class="card-img-top" src="'.$image['img'].'" alt="noImage">
    <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
        <a href=" " class="btn btn-primary">Go somewhere</a>
    </div>
</div>
';
}
?>
