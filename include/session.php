<?php 
session_start();
 if (!isset($_SESSION['logged_id'])) {
	 header("Location: index.php");
	 die('Access is Denied!');
 }

 include 'config.php';

 $query = mysqli_query($conn, "SELECT * FROM user WHERE user_email = '{$_SESSION['logged_id']}'");

 if (mysqli_num_rows($query) > 0 ){
	 $row = mysqli_fetch_assoc($query);

 } ?>