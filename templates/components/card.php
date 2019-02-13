   <div class="col-sm-4">
       <div class="card border-success mb-3" style="max-width: 18rem;">
           <div class="card-header bg-transparent border-success">Колличество товара: <?php echo $item->count ?></div>
           <div class="card-body text-success" style="min-height: 393.5px;" >
               <h5 class="card-title">
                    <a href="home?id=<?php echo $item->id ?>" ><?php echo $item->name ?></a>
                </h5>
               <img style="max-height: 200px" class="card-img-top" src="assets/images/products/<?php echo $item->img?>" alt="textNoImage">
               <p class="card-text"><?php echo cropString($item->description, 180) ?></p>
           </div>
           <div class="card-footer bg-transparent border-success">Цена - <strong><?php echo $item->price ?></strong> грн.
              <form action="/cart/add" method="post">
                  <input type="number" name="count">
                  <input hidden name="item_id" value="<?php echo $item->id ?>">
                  <input hidden name="price" value="<?php echo $item->price ?>">
                  <input type="submit" value="в корзину">
              </form>
           </div>
       </div>
   </div>