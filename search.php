<?php
	require_once "lib/article_class.php";
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="author" content="Mr CaT">
	<title>Search results</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="description" content="CAT ENGINE created just for practice, but u can use it whenever u want">
	<meta name="keywords" content="CAT-ENGINE, fun, 4-u">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
</head>
<body>
	<nav class="navbar navbar-default" role="navigation">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo ADDRESS;?>">CAT ENGINE</a>
			</div>
	
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav">
					<li><a href="<?php echo ADDRESS;?>"><i class="glyphicon glyphicon-home"></i> Home</a></li>
					<li><a href="author.php"><i class="glyphicon glyphicon-user"></i> Author</a></li>
					<li><a href="blog.php"><i class="glyphicon glyphicon-book"></i> Blog</a></li>
			</ul>
			<ul class="nav search navbar-nav navbar-right">
				<form class="navbar-form pull-right" action="search.php" method="get">
					<input type="text" style="width: 200px;" name="word" placeholder="Search...">
					<button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
				</form>
			</ul>
			</div><!-- /.navbar-collapse -->
		</div>
	</nav>
	<hr class="hund">
		<?php 

		?>
		<div class="section-center">
		<div class="row row-offcanvas row-right">
		<div class="container">
				<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
				<div class="panel">
				<div class="panel-heading">
					<h2 class="text-center peter">Results for <?php echo $_REQUEST["word"];?></h2>
				</div>
				<div class="panel-body">
					<?php
					if(!empty($_REQUEST["word"])) {
					$word = $_REQUEST["word"];
					$word = htmlspecialchars($word);
					$word = strip_tags($word);
					$tag = "%$word%";
					$pdo = new PDO(HOST, USER, PWD);
					$sql = "SELECT * FROM `stories` WHERE `title` LIKE ? OR `text` LIKE ? ORDER BY `id` DESC";
					$st = $pdo->prepare($sql);
					$st->execute(array($tag, $tag));
					while($row = $st->fetch()) {
							$title = $row["title"];
							$id = $row["id"];
							echo '<p class="text-center fara-sans"><a href="article.php?id=',$id,'">',$title,'</a>';
					}
					if($st->rowCount() == "") echo '<h2 class="text-center fara-sans">Nothing found</h2>';
					$pdo = null;
				}
				else {
					echo '<h2 class="text-center fara-sans">Please type some keywords</h2>';
				}
						
							?>
				</div>
				</div>
			</div>
			</div>
		</div>
		<hr class="hund">
		</div>
	</div>
	<footer class="footer navbar-inverse">
		<p class="text-left">Copyright &copy; 2017 by Mr CaT</p>
	</footer>
	<!-- Add javascripts -->
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
