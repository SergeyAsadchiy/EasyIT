<?php 

	$description = "Some quick example text to build on the card title and make up the bulk of the card's content.";

	include 'templates/header.php';
    include 'templates/nav.php';
    if (!$cookiesOK) include 'components/userConfirmCookies.php';
?>

<main>

   <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Каталог</h2>
                    <div class="panel-group category-products">

                    </div>
                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Последние товары</h2>
                    

                        <div class="col-sm-4">
                        	
                        </div>
                    
                </div>
            </div>   
        </div>
    </div> 
	
</main>

<?php 
	include 'templates/components/RecentViewed.php';
    include 'templates/footer.php'; 


