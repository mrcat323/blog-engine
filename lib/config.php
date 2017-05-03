<?php
	set_time_limit(0);
	define("HOST", "mysql:host=; dbname=");
	define("USER", "root");
	define("PWD", "jojo");
	define("HOME_NUM_ARTICLES", 5);
	define("ADDRESS", "http://localhost/");
	define("NAME", "BLOG-ENGINE");
	define("OWNER", "");
	try {
    $dbh = new PDO(HOST, USER, PWD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
	    echo 'Подключение не удалось: ' . $e->getMessage();
	}
?>