<?php
	session_start();
	session_destroy();
	setcookie("session", "", time());
	header("Location: " . $_SERVER["HTTP_REFERER"]);
?>