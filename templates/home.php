<?php 

	$description = "Some quick example text to build on the card title and make up the bulk of the card's content.";

	include 'templates/header.php';
    include 'templates/nav.php';
    if (!$cookiesOK) include 'components/userConfirmCookies.php';
?>

<main>
    <div align="center">
        <h4>    <?php echo $pagination ?></h4>
    </div>

    <?php include 'categories.php' ?>
    <?php include 'filters.php' ?>
    <article> 
    <div class="container" id="items">
        <div class="row">
            <?php 
                foreach ($items as $item) {
                    include 'components/card.php';
                }
            ?>
        </div>
    </div>
</article>
	<div align="center">
        <h4>    <?php echo $pagination ?></h4><br>   
    </div>
</main>

<?php 
	include 'templates/components/RecentViewed.php';
    include 'templates/footer.php'; 


