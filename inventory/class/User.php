<?php
require_once('../database/Database.php');
require_once('../interface/iUser.php');
class User extends Database implements iUser {

	public function user_login($email, $password)
	{
		$sql = "SELECT *
				FROM user 
				WHERE user_email = ?
				AND user_pass = ?
		";
		return $this->getRow($sql, [$email, $password]);
	}
	

}

$user = new User();


