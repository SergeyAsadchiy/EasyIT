<?php 

    $description = "Some quick example text to build on the card title and make up the bulk of the card's content.";

    include 'templates/header.php';
    include 'templates/nav.php';
    //if (!$cookiesOK) include 'components/userConfirmCookies.php';
?>

<main>
    <article>
        <div class="container">    
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Название</th>
                    <th scope="col">Цена</th>
                    <th scope="col">Остаток</th>
                    <th scope="col">Скидка</th>    
                    <th scope="col">Фото</th>
                </tr>
                </thead>
                <tbody>    <br>
            <?php
              foreach ($items as $item) {
                echo'
                <tr>
                    <th>'.$item->id.'</th>
                    <td>
                        <a href="/adminka/editItem?id='.$item->id.'">'.$item->name.'</a>
                    </td>
                    <td>'.$item->price.'</td>
                    <td>'.$item->count.'</td>
                    <td>'.$item->disc.'</td>
                    <td><img src="assets/images/'.$item->img.'" alt="noImage" Style = "width:30px"></td>
                </tr>
                ';
              }
            ?>
                </tbody>
            </table>
        </div>
    </article>

</main>