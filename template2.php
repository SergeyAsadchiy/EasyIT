<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<?php include 'navibar.php'; ?>

<form action="" method="post">
  <input type="radio" name="choose_card" value="card.php" checked onclick="this.form.submit()">
  <input type="radio" name="choose_card" value="card2.php" onclick="this.form.submit()">
</form>

<div class="container">
    <div class="row">
      <?php  
          $cardName=$_POST['choose_card'];
          foreach ($items as $item) {
    	        include 'template/'.$cardName;
          }
      ?>
    </div>
</div> 

<?php include 'template/table.php'; ?>
