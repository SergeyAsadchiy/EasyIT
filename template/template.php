<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<?php include 'navibar.php'; ?>

<div class="container">
    <div class="row">
      <?php 
        foreach ($items as &$item) {
    	    include 'template/card1.php';
        }
      ?>
    </div>
</div> 

<?php include 'template/table.php'; ?>
