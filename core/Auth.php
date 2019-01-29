<?php 
/**
 * 
 */
class Auth
{
	public function login($userId)	
	{
		$_SESSION['login_user_id'] = $userId;
	}

	public function logout()	
	{
		$_SESSION['login_user_id'] = null;
	}

	public function user()
	{
		$model = new UserModel();
		return $model->readIdUser()['username'];
	}

	public function userId()
	{
		$model = new UserModel();
		return $model->readIdUser()['id'];
	}

	public function isAdmin()
	{
		$model = new UserModel();
		return $model->readIdUser()['admin'];
	}

	public function userAvatar()
	{
		$model = new UserModel();
		return $model->readIdUser()['avatar'];
	}

}