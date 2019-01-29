<?php 
	include 'templates/header.php';
    include 'templates/nav.php';
?>
<div class="container" id="login">
	<p>Cтраница регистрации нового пользователя</p><br>
	<form action = "/auth/register" method ="post">
		
		<label for = "username">Введите login:  </label>
			<input type = "text"		name = "username"><br>
		<label for = "email">Введите email:  </label>
			<input type = "text"		name = "email"><br>
		<label for = "password">Введите пароль: </label>
			<input type = "password" 	name = "password"><br>
		<label for = "admin">Админ :</label>
			<input type = "radio" 	name = "admin" value = "yes"> |
		<label for = "admin">не Админ :</label>	
			<input type = "radio" 	name = "admin" value = "no"><br><br>

			<input type = "submit" value ="Сохранить">
	</form>
</div>