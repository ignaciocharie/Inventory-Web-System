<?php 
require_once('../class/User.php');

if(isset($_POST['un'])){
	$un = $_POST['un'];
	$up = $_POST['up'];

	$up = md5($up);
	$result = $user->user_login($un, $up);
	if($result > 0){
		$return['logged'] = true;
		$return['url'] = "home.php";
		$_SESSION['logged_id'] = $result['user_id'];
		$_SESSION['uniqid'] = uniqid();
	}else{
		$return['logged'] = false;
		$return['msg'] = "Invalid Username or Password!";
	}

	echo json_encode($return);

}

$user->Disconnect();