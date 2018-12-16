    <div class="col-sm-4">
        <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
            <div class="card-img-top">Колличество товара: <?php echo $item['stock'] ?></div>
            <div class="card-body">
                <h5 class="card-title"><strong><?php echo $item['name'] ?></strong></h5>
                <img class="card-img-top" src="<?php echo $item['img']?>" alt="textNoImage">
                <p class="card-text"><?php echo $description ?></p>
            </div>
            <div class="card-footer bg-transparent border-primary">Цена - <strong><?php echo $item['priceDisc'] ?></strong> грн.</div>
        </div>
    </div>