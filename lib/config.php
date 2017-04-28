<?php
	ini_set("error_reporting", 1);
	ini_set("display_errors", 1);
	set_time_limit(0);
	define("HOST", "mysql:host=localhost; dbname=hasanov");
	define("USER", "root");
	define("PWD", "jojo");
	define("HOME_NUM_ARTICLES", 5);
	define("ADDRESS", "http://localhost/");
	define("NAME", "CAT ENGINE");
	try {
    $dbh = new PDO(HOST, USER, PWD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
	    echo 'Подключение не удалось: ' . $e->getMessage();
	}
?>