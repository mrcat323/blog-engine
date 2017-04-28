<?php
	require_once "config.php";
	class Admin {
		private $email;
		private $password;

			public function __construct() {
				$this->email = $email;
				$this->password = $password;
			}
			public function checkAdmin($email, $password) {
				$pdo = new PDO(HOST, USER, PWD);
				$sql = "SELECT `id` FROM `admins` WHERE `email` = :email AND `password` = :password";
				$st = $pdo->prepare($sql);
				$st->bindValue(":email", $email, PDO::PARAM_STR);
				$st->bindValue(":password", $password, PDO::PARAM_STR);
				$st->execute();
				if($st->fetch()) return true;
				else return false;
				$pdo = null;
			}
	}


?>