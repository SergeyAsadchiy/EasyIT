<?php 

    $description = "Some quick example text to build on the card title and make up the bulk of the card's content.";

    include 'templates/header.php';
    include 'templates/nav.php';
    //if (!$cookiesOK) include 'components/userConfirmCookies.php';
?>

<div class="container" id="itemForm">
	
	<p>Cтраница редактирования товара <strong> <?php echo $item['name'		] ?> </strong></p>
	<img src="/<?=$item['img']?>" alt="" Style = "width:150px; margin-bottom:20px;"><br>

	<form action = "/adminka/edit" method ="post" enctype="multipart/form-data">	
		<div id="profile">

			<div style="text-align:right">	
				<label for = "name">		наименование	</label><br>
				<label for = "description">	описание:		</label><br>
				<label for = "price">		цена:			</label><br>
				<label for = "stock">		остаток: 		</label><br>
				<label for = "disc">		скидка			</label><br>
				<label for = "photo">		загрузка изображения товара:	</label><br>				        	 
			</div>

			<div>
				<input type = "text"		name = "name" 			value = "<?php echo $item['name'		] ?>">	<br>
				<input type = "text"		name = "description"	value = "описание товара					">	<br>
				<input type = "text"		name = "price" 			value = "<?php echo $item['price'		] ?>">	<br>
				<input type = "text"		name = "stock" 			value = "<?php echo $item['stock'		] ?>">	<br>
				<input type = "text"		name = "disc" 			value = "<?php echo $item['disc'		] ?>">	<br>				
			   	<input type = "hidden" 		name = "MAX_FILE_SIZE" value="300000">
			   	<input type = "file"		name = "photo" 	style = "height: 35px">	<br>
			</div>

		</div>
		<br>
		<input type = "submit" value ="Сохранить">	
	</form>

</div>