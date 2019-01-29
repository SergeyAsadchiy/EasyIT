<?php 
	include 'templates/header.php';
    include 'templates/nav.php';
?>
<div class="container" id="login">
	
	<p>Cтраница редактирования профиля пользователя <strong><?php echo $data['username']?></strong></p>
	<img src="\assets\images\avatar\<?=Auth::userAvatar()?>" alt="" Style = "width:150px; margin-bottom:20px;"><br>

	<form action = "/auth/profile" method ="post" enctype="multipart/form-data">	
		<div id="profile">

			<div style="text-align:right">	
				<label for = "username">	login: *							</label><br>
				<label for = "email">		email: *							</label><br>
				<label for = "admin">		принадлежность к Администраторам *:	</label><br>
				<label for = "password">	текущий пароль: *					</label><br>
				<label for = "passwordNew">	новыйй пароль: 						</label><br>
				<label for = "userfile">	загрузка изображения аватара:		</label><br>        	 
			</div>

			<div>	
				<input type = "text"		name = "username" 	value="<?php echo $data['username']?>">	<br>
				<input type = "text"		name = "email" 		value="<?php echo $data['email']?>">	<br>
				<div style = "height: 35px">
					Админ :
				<input type = "radio" 		name = "admin"		value = "yes" <?php if ($data['admin'] == 'yes') echo 'checked'?> > |
					не Админ :	
				<input type = "radio" 		name = "admin" 		value = "no"  <?php if ($data['admin'] == 'no' ) echo 'checked'?> >
				</div>
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