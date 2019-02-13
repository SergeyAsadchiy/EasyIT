<?php 

    //$description = "Some quick example text to build on the card title and make up the bulk of the card's content.";


    include 'templates/header.php';
    include 'templates/nav.php';
    //if (!$cookiesOK) include 'components/userConfirmCookies.php';
?>

<main>
    <article>
        <div class="container">  
                <a href="/category">категории</a><br>  
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">ID      </th>
                    <th scope="col">Название</th>
                    <th scope="col">Описание</th>                    
                    <th scope="col">Цена    </th>
                    <th scope="col">Остаток </th>
                    <th scope="col">Скидка  </th>    
                    <th scope="col">Фото    </th>
                    <th scope="col">Категория    </th>
                    <th scope="col">        </th>
                    <th scope="col">        </th>
                </tr>
                </thead>
                <tbody>    <br>
            <?php
              foreach ($items as $item) {
                echo'
                <tr>
                    <th>'.$item->id.'</th>
                    <td><a href="/adminka/editItem?id='.$item->id.'">'.cropString($item->name, 30).'</a></td>
                    <td>'.cropString($item->description, 80).'</td>
                    <td>'.$item->price.'</td>                    
                    <td>'.$item->count.'</td>
                    <td>'.$item->disc.'</td>
                    <td><img src="assets/images/products/'.$item->img.'" alt="assets/images/noImage.png" Style = "width:40px"></td>
                    <td>'.$item->category_id.'</td>
                    <td>
                        <a href="/adminka/editItem?id='.$item->id.'">
                            <img src="assets/images/edit.png" Style = "width:15px">
                        </a>
                    </td>
                    <td>
                        <a href="/adminka/deleteItem?id='.$item->id.'">
                            <img src="assets/images/del.jpg"  Style = "width:20px">
                        </a>
                    </td>
                </tr>
                ';
              }
            ?>
                </tbody>
            </table>
            <a href="/adminka/addItem">добавить товар</a></p>
        </div>
    </article>

</main>