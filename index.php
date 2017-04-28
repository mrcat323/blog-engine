<?php

require_once "lib/article_class.php";
$action = isset($_GET["action"]) ?? $_GET["action"] ?? "";
$get = [];
$result = [];
switch ($action) {
  default:
      $data = Article::getList(HOME_NUM_ARTICLES);
      $get = $data["result"];
      $result["pageTitle"] = "Home | ".NAME;
      require "page.php";
      break;
  }
  
?>