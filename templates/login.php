<?php 
	include 'templates/header.php';
    include 'templates/nav.php';
?>
<div class="container" id="login">
	<?php 
	    if (!empty($_SESSION['error_login']))  {
    	echo '<div>'.$_SESSION['error_login'].'</div><br>';
    	}
	?>
	<form action = "login" method ="post">
		<label>   Login: <input type = "text"		name = "email"></label>
		<label>Password: <input type = "password" 	name = "password"></label>
		<input type = "submit" value ="Войти">
	</form>
</div>