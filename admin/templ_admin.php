
<article>
<div class="container">    
    <a href="../index.php">Home </a>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Stock</th>
            <th scope="col">Disc</th>    
        </tr>
        </thead>
        <tbody>    <br>
    <?php
      foreach ($items as $item) {
        echo'
        <tr>
            <th>'.$item->id.'</th>
            <td>'.$item->name.'</td>
            <td>'.$item->price.'</td>
            <td>'.$item->count.'</td>
            <td>'.$item->disc.'</td>
        </tr>
        ';
      }
    ?>
        </tbody>
    </table>
</div>
</article>