<?php 
	include 'templates/header.php';
    include 'templates/nav.php';
?>
<div class="container" id="login">
	<p>Cтраница редактирования профиля пользователя <?php echo $data['username']?></p>
	
	<form action = "profile" method ="post">
		<label for = "username">login: *</label>
			<input type = "text"		name = "username" value="<?php echo $data['username']?>"><br>
		<label for = "email">email: *</label>
			<input type = "text"		name = "email" value="<?php echo $data['email']?>"><br>
		<label for = "password">текущий пароль: *</label>
			<input type = "password" 	name = "password"><br>
		<label for = "passwordNew">новыйй пароль: *</label>
			<input type = "password" 	name = "passwordNew"><br>	<br>
		<input type = "submit" value ="Сохранить">
	</form>
</div>