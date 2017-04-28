<?php
	session_start();
	require_once "../lib/admin_class.php";
	$admin = new Admin();
	if(!empty($_REQUEST["email"]) && !empty($_REQUEST["password"])) {
		$cook = $_COOKIE["session"] ?? $_COOKIE["session"] ?? "";
		$email = $_REQUEST["email"];
		$password = $_REQUEST["password"];
		$password = md5($password);
		if($admin->checkAdmin($email, $password)) {
			$_SESSION["email"] = $email;
			$_SESSION["password"] = $password;
			header("Location: index.php");
			if(!empty($_REQUEST["remember"])) {
				setcookie("session", $cook, time()+5);
			}
		}	
		else echo '<h1 align="center">Error, type Admin email and password</h1>';	
	}
	else echo "Error 404";

?>