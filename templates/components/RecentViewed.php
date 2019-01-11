<?php 
  $description = "Some quick example text to build on the card title and make up the bulk of the card's content."; 
?>
<div class="container">

    <h4 style="background-color: #eee; padding: 20px; margin 40px;">
        Недавно просмотренные товары:
    </h4>
    <div style="width: 60%;">
        <div class="row">
            <?php  
                foreach ($last3Items as $item) {
                include 'templates/components/card.php';
                }
            ?>
        </div>
    </div> 
</div>