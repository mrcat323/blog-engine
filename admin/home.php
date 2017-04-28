<?php
	session_start();
	require_once "../lib/article_class.php";
	if(!isset($_SESSION["email"]) && !isset($_SESSION["password"])) {
		header("Location: index.php");
		exit();
	}
	else {
	$get = [];
	$result = [];
	$rows = [];
	$data = Article::getList();
	$get[] = $data["result"];
	$rows[] = $data["totalRows"];
	$result["pageTitle"] = "ADMIN | ". NAME;
	if(isset($_GET["status"])) {
		if($_GET["status"] == "changesSaved") $result["statusMessage"] = "Changes saved successfully";
		if($_GET["status"] == "delete") $result["statusMessage"] = "Article successfully deleted";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $result["pageTitle"];?></title>
	<meta name="description" content="<?php echo $h->text;?>">
	<meta name="keywords" content="<?php echo $h->title;?>">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/styles.css">
	<link rel="stylesheet" href="../css/font-awesome.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-xs-4 col-sm-6 col-md-6 col-md-offset-3">
				<div id="adminHeader">
        <h2 style="font-size: 30px;" class="text-center peter">Admin Panel</h2>
        <p style="font-size: 21px;" class="text-center fara-sans">You are logged with <b><?php echo htmlspecialchars( $_SESSION['email']) ?></b>. <a href="logout.php"?>Log out</a></p>
      </div>
      <h1>All Articles</h1>
<?php if ( isset( $result['errorMessage'] ) ) { ?>
        <div class="errorMessage"><?php echo $result['errorMessage'] ?></div>
<?php } ?>
<?php if ( isset( $result['statusMessage'] ) ): ?>
        <div class="statusMessage"><?php echo $result['statusMessage'] ?></div>
<?php endif ?>
      <table class="table table-striped table-hover">
      	<thead>
      		<tr>
      			<th class="fara-sans">Date</th>
      			<th class="fara-sans">Article</th>
      		</tr>
      	</thead>
      	<tbody>
      		<?php foreach ( $get[0] as $article ): ?>
        <tr onclick="location='index.php?action=edit&amp;id=<?php echo $article->id?>'">
          <td><?php echo date('j M Y', $article->pub_date)?></td>
          <td>
            <?php echo $article->title?>
          </td>
        </tr>
<?php endforeach ?>
      	</tbody>
      </table>
      <p><a class="btn btn-danger fara-sans" href="index.php?action=new"><i class="glyphicon glyphicon-plus"></i> New Article</a></p>
			</div>
		</div>
	</div>
</body>
</html>