<?php 
	include 'templates/header.php';
    include 'templates/nav.php';
?>
<div class="container" id="login">
	<p>Cтраница регистрации нового пользователя</p><br>

	<form action = "/auth/register" method ="post">
		
		<div id="profile">	
			<div style="text-align:right">	
				<label for = "username">Введите login:  </label><br>
				<label for = "email">	Введите email:  </label><br>
				<label for = "password">Введите пароль: </label><br>
			</div>
			<div>
				<input type = "text"		name = "username" 	value = "<?php echo $username ?>"><br>
				<input type = "text"		name = "email" 		value = "<?php echo $email ?>"><br>
				<input type = "password" 	name = "password"	value = "<?php echo $password ?>"><br>
			</div>
		</div>
		<br>	
		<input type = "submit" value ="Сохранить">

	</form>
</div>
