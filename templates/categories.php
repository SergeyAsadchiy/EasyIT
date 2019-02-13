	<div class="col-sm-3">
       <div class="left-sidebar">
           <h2>Каталог</h2>
           <div class="panel-group category-products">
			 <?php foreach ($categories as $category) : ?>
                   <div class="panel panel-default">
                       <div class="panel-heading">
                           <h4 class="panel-title">
                              <a href="/home?category_id=<?php echo $category['id'] ?>" 
                                <?php 
                                if (!empty($_GET['category_id'])) {
                                       if ($_GET['category_id'] == $category['id']) echo ' style="background-color: #ffff99"';
                                  }        
                                ?>
                              >
                                 <?php  echo $category['category'] ?> 
                               </a>
                           </h4>
                       </div>
                   </div>
			 <?php endforeach  ?>
           </div>
        </div>
	</div>