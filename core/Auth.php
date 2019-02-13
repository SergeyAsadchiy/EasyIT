<?php 
/**
 * 
 */
class Auth
{
	public static function login($userId)	
	{
		$_SESSION['login_user_id'] = $userId;
	}

	public static function logout()	
	{
		$_SESSION['login_user_id'] = null;
	}

	public static function user()
	{
		$model = new UserModel();
		return $model->readIdUser()['username'];
	}

	public static function userId()
	{
		$model = new UserModel();
		return $model->readIdUser()['id'];
	}

	public static function isAdmin()
	{
		$model = new UserModel();
		return $model->readIdUser()['admin'];
	}

	public static function userAvatar()
	{
		$model = new UserModel();
		return $model->readIdUser()['avatar'];
	}

	public static function userPassword()
	{
		$model = new UserModel();
		return $model->readIdUser()['password'];
	}

}