<?php 
	include 'templates/header.php';
    include 'templates/nav.php';
?>
<div class="container" id="login">
	
	<p>Cтраница редактирования профиля пользователя <?php echo $data['username']?></p>
	
	<form action = "/auth/profile" method ="post">
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
<hr>
	<form enctype="multipart/form-data" action="/auth/loadAvatar" method="POST">
    	<!-- Поле MAX_FILE_SIZE должно быть указано до поля загрузки файла -->
    	<input type="hidden" name="MAX_FILE_SIZE" value="300000" />
    	<!-- Название элемента input определяет имя в массиве $_FILES -->
    	Отправить этот файл: 
    	<input name="userfile" type="file" />
    	<input type="submit" value="Отправить файл" />
    <?php 
	    if (!empty($_SESSION['error_login']))  {
    	echo '<div>'.$_SESSION['error_login'].'</div>';
    	}
	?>
	</form>

</div>