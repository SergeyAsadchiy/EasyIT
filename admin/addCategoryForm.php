<?php 

    include 'templates/header.php';
    include 'templates/nav.php';
    //if (!$cookiesOK) include 'components/userConfirmCookies.php';
?>

<div class="container" id="itemForm">
	
	<p>Cтраница добавления категорий товаров </p>
	<form action = "/category/add" method ="post">	
		<div id="profile">

			<div style="text-align:right">
				
				<label for = "category">категория товара</label><br>	
			</div>

			<div>
				
				<input type = "text"	name = "category"	>	<br>
			</div>
		</div>
		<br>
		<input type = "submit" value ="Сохранить">	
	</form>

</div>