
<div class = "container" style="background-color: #eee; padding: 15px; margin-top: 40px; text-align:right">
	<form action = "index.php" method ="post">
		Привет, <?php echo $_SESSION['userName'] ?>
		<input hidden type = "text" name = "userName" value = ''>
		<input type = "submit" value ="Logout">
	</form>
</div>	