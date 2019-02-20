<?php
function filter_url($param = null, $id = null) {
    $urls = [];
    $gets = $_GET;
    if ($param) {
        $gets[$param] = $id;
    }
    foreach ($gets as $key => $val) {
        $urls[] = $key.'='.$val;
    }
    $url = 'http://e-shop.local/?'.join('&', $urls);
    return $url;
}
if (!empty($_POST['priceMin'])) {
    $redirect_url = filter_url('priceMin', $_POST['priceMin']); var_dump($redirect_url);
    header("Location:" . "$redirect_url" );
    var_dump($_GET);
    var_dump($redirect_url);
}
if (!empty($_POST['priceMax'])) {
    $redirect_url = filter_url('priceMax', $_POST['priceMax']); var_dump($redirect_url);
    header("Location:" . "$redirect_url" );
    var_dump($_GET);
    var_dump($redirect_url);
}
?>


	<div class="col-sm-3">
       <div class="left-sidebar">
           <h2>Цена</h2>
           <div class="panel-group category-products">
			     <form method="post" action=" <?= filter_url() ?>">
                <input type="number" name="priceMin">
                <input type="number" name="priceMax">
                <br>
                <a href="<?= filter_url('cat', 1) ?>">Cat 1</a>
                <a href="<?= filter_url('cat', 2) ?>">Cat 2</a>
                <a href="<?= filter_url('cat', 3) ?>">Cat 3</a>
                <a href="<?= filter_url('cat', 4) ?>">Cat 4</a>
                <br>
                <a href="<?= filter_url('brand', 33) ?>">Brand 33</a>
                <a href="<?= filter_url('brand', 34) ?>">Brand 34</a>
                <br>
                <button type="submit">Submit</button>
            </form>



           </div>
        </div>
	</div>