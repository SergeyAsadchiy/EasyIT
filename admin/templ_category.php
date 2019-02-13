<?php 

    //$description = "Some quick example text to build on the card title and make up the bulk of the card's content.";


    include 'templates/header.php';
    include 'templates/nav.php';
    //if (!$cookiesOK) include 'components/userConfirmCookies.php';
?>

<main>
    <article>
        <div class="container">
            <div>
            </div>    
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">ID                  </th>
                    <th scope="col">Категория товара    </th>
                    <th scope="col">                    </th>
                    <th scope="col">                    </th>
                </tr>
                </thead>
                <tbody>    <br>
            <?php
              foreach ($categories as $category) {
                echo'
                <tr>
                    <th>'.$category['id'].'</th>
                    <td>'.$category['category'].'</td>
                    <td>
                        <a href="/category/edit?id='.$category['id'].'">
                            <img src="assets/images/edit.png" Style = "width:15px">
                        </a>
                    </td>
                    <td>
                        <a href="/category/delete?id='.$category['id'].'">
                            <img src="assets/images/del.jpg"  Style = "width:20px">
                        </a>
                    </td>
                </tr>
                ';
              }
            ?>
                </tbody>
            </table>
            <a href="/category/add">добавить категорию</a></p>
        </div>
    </article>

</main>