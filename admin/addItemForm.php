<?php 

    $description = "Some quick example text to build on the card title and make up the bulk of the card's content.";

    include 'templates/header.php';
    include 'templates/nav.php';
    //if (!$cookiesOK) include 'components/userConfirmCookies.php';
?>

<div class="container" id="itemForm">
	
	<p>Cтраница добавления нового товара </p>
	<form action = "/adminka/addItem" method ="post" enctype="multipart/form-data">	
		<div id="profile">

			<div style="text-align:right">
				<label for = "category">	категория товара</label><br>	
				<label for = "name">		наименование	</label><br>
				<label for = "description">	описание:		</label><br>
				<label for = "price">		цена:			</label><br>
				<label for = "stock">		остаток: 		</label><br>
				<label for = "disc">		скидка			</label><br>
				<label for = "userfile">	загрузка изображения товара:	</label><br>				        	 
			</div>

			<div>
				<select name="category_id">
					<?php 
						$categories = Category::categoryList();
						foreach ($categories as $category) : ?>
							<option value="<?php echo $category['id'] ?>"><?php echo $category['category'] ?></option>
					<?php endforeach  ?>
				 </select><br>
				<input type = "text"		name = "name" 			>	<br>
				<input type = "text"		name = "description"	>	<br>
				<input type = "text"		name = "price" 			>	<br>
				<input type = "text"		name = "stock" 			>	<br>
				<input type = "text"		name = "disc" 			>	<br>				
			   	<input type = "hidden" 		name = "MAX_FILE_SIZE"  value = "300000">
			   	<input type = "file"		name = "userfile" 		style = "height: 35px"><br>
			</div>

		</div>
		<br>
		<input type = "submit" value ="Сохранить">	
	</form>

</div>