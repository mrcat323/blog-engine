<?php
	require_once "config.php";
	class Article {
		public $id;
		public $title;
		public $text;
		public $pubdate;
			public function __construct($data = []) {
				if(isset($data["id"])) $this->id = (int) $data["id"];
				if(isset($data["title"])) $this->title = $data["title"];
				if(isset($data["text"])) $this->text = $data["text"];
				if(isset($data["pub_date"])) $this->pub_date = (int) $data["pub_date"];
			}
			public static function getList($numRows = 100000) {
				$pdo = new PDO(HOST, USER, PWD);
				$sql = "SELECT  * FROM `stories` ORDER BY `id` DESC LIMIT :numRows";
				$st = $pdo->prepare($sql);
				$st->bindValue(":numRows", $numRows, PDO::PARAM_INT);
				$st->execute();
				$list = array();
				while($row = $st->fetch()) {
					$article = new Article($row);
					$list[] = $article;
				}
				$sql = "SELECT FOUND_ROWS() AS totalRows";
				$totalRows = $pdo->query($sql)->fetch();
				$pdo = null;
				return array("totalRows" => $totalRows[0], "result" => $list);
			}
			public static function getbyId($id) {
				$pdo = new PDO(HOST, USER, PWD);
				$sql = "SELECT * FROM `stories` WHERE `id` = :id";
				$st = $pdo->prepare($sql);
				$st->bindValue(":id", $id, PDO::PARAM_INT);
				$st->execute();
				$row = $st->fetch();
				$pdo = null;
				if($row) return new Article($row);
				if($row == false) header("Location: 404.php");
			}
			public function insert() {
				$pdo = new PDO(HOST, USER, PWD);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "INSERT INTO stories SET `title` = :title, `text` = :text, `pub_date` = UNIX_TIMESTAMP()";
			    $st = $pdo->prepare ( $sql );
			    $st->bindValue( ":title", $this->title, PDO::PARAM_STR );
			    $st->bindValue( ":text", $this->text, PDO::PARAM_STR );
			    $st->execute();
			    $this->id = $pdo->lastInsertId();
			    $pdo = null;
			}
			public function delete() {
				$pdo = new PDO(HOST, USER, PWD);
				$sql = "DELETE FROM `stories` WHERE `id` = :id LIMIT 1";
				$st = $pdo->prepare($sql);
				$st->bindValue(":id", $this->id, PDO::PARAM_INT);
				$st->execute();
				$pdo = null;
			}
			public function update() {
				$pdo = new PDO(HOST, USER, PWD);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "UPDATE `stories` SET `pub_date`=UNIX_TIMESTAMP(), `title`=:title, `text`=:text WHERE `id` = :id";
			    $st = $pdo->prepare ( $sql );
			    $st->bindValue( ":title", $_POST["title"], PDO::PARAM_STR );
			    $st->bindValue( ":text", $_POST["text"], PDO::PARAM_STR );
			    $st->bindValue( ":id", $this->id, PDO::PARAM_INT );
			    $st->execute();
			    $pdo = null;
			}
	}
?>