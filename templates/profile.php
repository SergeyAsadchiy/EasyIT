<?php 
	include 'templates/header.php';
    include 'templates/nav.php';
?>
<div class="container" id="login">
	
	<p>Cтраница редактирования профиля пользователя <strong><?php echo Auth::user()?></strong></p>
	<img src="\assets\images\avatar\<?=Auth::userAvatar()?>" alt="" Style = "width:150px; margin-bottom:20px;"><br>

	<form action = "/auth/profile" method ="post" enctype="multipart/form-data">	
		<div id="profile">

			<div style="text-align:right">	
				<label for = "username">	login: *						</label><br>
				<label for = "email">		email: *						</label><br>
				<label for = "password">	текущий пароль: *				</label><br>
				<label for = "passwordNew">	новыйй пароль: 					</label><br>
				<label for = "userfile">	загрузка изображения аватара:	</label><br>        	 
			</div>

			<div>
				<input type = "text"		name = "username" 	value = "<?php echo $username ?>">	<br>
				<input type = "text"		name = "email" 		value = "<?php echo $email ?>">		<br>
				<input type = "password" 	name = "password">		<br>
				<input type = "password" 	name = "passwordNew">	<br>	
			   	<input type = "hidden" 		name = "MAX_FILE_SIZE" value="300000">
			   	<input type = "file"		name = "userfile" 	style = "height: 35px">	<br>
			</div>

		</div>
		<br>
		<input type = "submit" value ="Сохранить">	
	</form>

</div>