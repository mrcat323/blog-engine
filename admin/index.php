<?php
	session_start();
	mb_internal_encoding("UTF-8");
	require_once $_SERVER["DOCUMENT_ROOT"]. "/lib/article_class.php";
	require_once $_SERVER["DOCUMENT_ROOT"]. "/lib/admin_class.php";
	$action = $_GET["action"] ?? "";
	switch ($action) {
		case 'edit':
			edit();
			break;
		case 'new':
			newpost();
			break;
		case 'delete':
			delete();
			break;
		case 'logout':
			logout();
			break;
		default:
			home();
			break;
	}

	function edit() {
		 $results = [];
		  $results['pageTitle'] = "Edit Article";
		  $results['formAction'] = "edit";

		  if ( isset( $_POST['saveChanges'] ) ) {

		    // Пользователь получил форму редактирования статьи: сохраняем изменения

		    if ( !$article = Article::getById( (int)$_POST['id'] ) ) {
		      header( "Location: index.php?error=articleNotFound" );
		      return;
		    }
		    $article->update();
		    header( "Location: index.php?status=changesSaved" );

		  } elseif ( isset( $_POST['cancel'] ) ) {

		    // Пользователь отказался от результатов редактирования: возвращаемся к списку статей
		    header( "Location: index.php" );
		  } else {

		    // Пользвоатель еще не получил форму редактирования: выводим форму
		    $results['article'] = Article::getById( (int)$_GET['id'] );
		    require( "editArticle.php" );
		  }
	}
	function newpost() {
		$results = [];
	  	$results['pageTitle'] = "New Post";
	  	$results['formAction'] = "new";

	  if ( isset( $_POST['saveChanges'] ) ) {
	  	$title = $_POST["title"];
	  	$title = htmlspecialchars($title);
	  	$title = strip_tags($title);
	  	$text = htmlspecialchars($_POST["text"]);
	    // Пользователь получает форму редактирования статьи: сохраняем новую статью
	    $article = new Article(["title" => $title, "text" => $text]);
	    $article->insert();
	    header( "Location: index.php?status=changesSaved" );

	  } elseif ( isset( $_POST['cancel'] ) ) {

	    // Пользователь сбросид результаты редактирования: возвращаемся к списку статей
	    header( "Location: index.php" );
	  } else {

	    // Пользователь еще не получил форму редактирования: выводим форму
	    $results['article'] = new Article();
	    require( "editArticle.php" );
  }
	}
	function delete() {
		if ( !$article = Article::getById( (int)$_GET['id'] ) ) {
    header( "Location: index.php?error=articleNotFound" );
    return;
  }

  $article->delete();
  header("Location: index.php?status=delete");
	}
	function logout() {
		session_destroy();
		setcookie("session", "", time());
		header("Location: ".$_SERVER["HTTP_REFERER"]);
		exit();
	}
	function home() {
		$results = [];
		$admin = new Admin();
		require("redirect.php");
		if(isset($_GET["status"])) {
		if($_GET["status"] == "changesSaved") $results["statusMessage"] = "Changes saved successfully";
		if($_GET["status"] == "delete") $results["statusMessage"] = "Article successfully deleted";
		}
	}

?>
