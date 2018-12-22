   <div class="col-sm-4">
       <div class="card border-success mb-3" style="max-width: 18rem;">
           <div class="card-header bg-transparent border-success">Колличество товара: <?php echo $item['stock'] ?></div>
           <div class="card-body text-success">
               <h5 class="card-title">
                    <a href="index.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a>
                </h5>
               <img class="card-img-top" src="<?php echo $item['img']?>" alt="textNoImage">
               <p class="card-text"><?php echo $description ?></p>
           </div>
           <div class="card-footer bg-transparent border-success">Цена - <strong><?php echo $item['priceDisc'] ?></strong>грн.
              <form action="index.php" method="post">
                  <input type="number" name="count">
                  <input hidden name="id" value="<?php echo $item['id'] ?>">
                  <input type="submit" value="Save">
              </form>
           </div>
       </div>
   </div>
   


