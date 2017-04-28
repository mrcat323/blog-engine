<?php
	if($_SESSION["email"] && $_SESSION["password"]) {
		header("Location: home.php");
		exit();
	}
	else {
		header("Location: log.php");
	}
?>