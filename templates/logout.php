<?php 
	include 'templates/header.php';
    include 'templates/nav.php';
?>
<div class="container" id="login">
	<form action = "logout" method ="post">
		<label>Привет, <?php echo $user ?></label>
		<input hidden type = "text" name = "userName" value = ''>
		<input type = "submit" value ="logout">
	</form>
</div>