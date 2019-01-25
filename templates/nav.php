<nav>	
	<div class = "container" id = "menu">
	<a href="home">Home</a>
	<?php
		if (//!empty(Auth::userId())
			!empty($_SESSION['login_user_id']) )  {
			echo 
			'<p>Привет, <a href="/auth/profile">'.Auth::user().'</a></p>						
  			<a href="/auth/logout">Logout</a>';
		} else {
			echo 
			'<a href="/auth/register">Registration</a>	
  			<a href="/auth/login">Login</a>';
		}
	?>
    </div>	
</nav>