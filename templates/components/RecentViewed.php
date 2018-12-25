<?php 
  $description = "Some quick example text to build on the card title and make up the bulk of the card's content."; 
?>
<div class="container">

  <h4 style="background-color: #eee; padding: 20px; margin-top: 40px;">
      Недавно просмотренные товары:
  </h4>
  <div style="width: 60%;">
   <div class="row">
       <?php 
         foreach ($_SESSION['recentItems'] as $value) {
              foreach ($items as $item) {
                  if ($item['id'] == $value) include 'card.php';
              }
         }
       ?>
   </div>
  </div> 
</div>