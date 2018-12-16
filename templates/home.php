
<?php 
	$description = "Some quick example text to build on the card title and make up the bulk of the card's content."; 
?>

<main>

	<article>
	<div class="container">
	    <div class="row">
	      	<?php 
	        	foreach ($items as $item) {
	    	    	include 'components/card1.php';
	        	}
	      	?>
	    </div>
	</div>
	</article>

	<aside></aside>

</main>
