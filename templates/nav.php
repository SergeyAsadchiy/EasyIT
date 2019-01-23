<nav>	
	<div class = "container" id = "menu">
	<a href="home">Home</a>
	<?php
		if (//!empty(Auth::userId())
			!empty($_SESSION['login_user_id']) )  {
			echo 
			'<p>Привет, <a href="profile">'.Auth::user().'</a></p>						
  			<a href="logout">Logout</a>';
		} else {
			echo 
			'<a href="register">Registration</a>	
  			<a href="login">Login</a>';
		}
	?>
    </div>	
</nav>