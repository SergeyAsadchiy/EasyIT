<nav>	
	<div class = "container" id = "menu">
	<a href="/">Home</a>
	<a href="/adminka">Adminka</a>
	<a href="https://github.com/SergeyAsadchiy/PHP2" target="_blank">github.com</a>
	<a href="/cart">Корзина</a>
	<?php
		if (//!empty(Auth::userId())
			!empty($_SESSION['login_user_id']) )  {
			echo 
			'<p>Привет, <a href="/auth/profile">'.Auth::user().'</a></p>
  			<img src="\assets\images\avatar\\'.Auth::userAvatar().'" alt="" Style = "width:40px"> 
  			<a href="/auth/logout">Logout</a>';
		} else {
			echo 
			'<a href="/auth/register">Registration</a>
			<img src="\assets\images\avatar\unknown.jpg" alt="" Style = "width:30px">
  			<a href="/auth/login">Login</a>';	
		}
	?>
    </div>	
</nav>
