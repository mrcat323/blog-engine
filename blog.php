<?php
	require_once "lib/config.php";
	$dbh = new PDO(HOST, USER, PWD);

    $total = $dbh->query('
        SELECT
            COUNT(*)
        FROM
            stories
    ')->fetchColumn();

    $limit = 5;

    $pages = ceil($total / $limit);

    $page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array(
        'options' => array(
            'default'   => 1,
            'min_range' => 1,
        ),
    )));

    $offset = ($page - 1)  * $limit;

    $start = $offset + 1;
    $end = min(($offset + $limit), $total);


    $stmt = $dbh->prepare('
        SELECT
            *
        FROM
            stories
        ORDER BY
            id
		DESC
        LIMIT
            :limit
        OFFSET
            :offset
    ');

    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="author" content="Mr CaT">
	<title>Blog | <?php echo NAME;?></title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="description" content="CAT ENGINE created just for practice, but u can use it whenever u want">
	<meta name="keywords" content="CAT-ENGINE, fun, 4-u">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/styles.css">
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
					<li><a href=""><i class="glyphicon glyphicon-book"></i> Blog</a></li>
			</ul>
			<ul class="nav search navbar-nav navbar-right">
				<form class="navbar-form pull-right" action="search.php" method="get">
					<input type="text" style="width: 200px;" name="word" placeholder="Search..">
					<button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
				</form>
			</ul>
			</div><!-- /.navbar-collapse -->
		</div>
	</nav>
	<hr class="hund">

		<div class="section-center">
		<div class="row row-offcanvas row-right">
		<div class="container">
				<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
				<?php
				 if ($stmt->rowCount() > 0): ?>
				 <?php
			        $stmt->setFetchMode(PDO::FETCH_ASSOC);
			        $iterator = new IteratorIterator($stmt);

			        ?>
			       <?php foreach ($iterator as $row): ?>
			            <div class="panel">
			            	<div class="panel-heading">
			            		<h2 class="text-center peter"><a href="<?php echo ADDRESS . 'article.php?id='.$row["id"];?>"><?php echo $row["title"]; ?></a></h2>
			            	</div>
			            			<div class="panel-body">
										<p>
											<?php echo $row["text"]; ?>
										</p>
			            			</div>
			            </div>
			    	<?php endforeach ?>
			     <?php endif ?>
			</div>
			</div>
		</div>
		<hr class="hund">
		<div class="pagin">
		<div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-4">
		<div class="col-md-6">
		<div class="pager">

		<?php
		if($page > 1) {
			$prevlink = '<li><a href="?page=1"><i class="glyphicon glyphicon-arrow-left"></i></a></li>
			<li><a href="?page='.($page - 1). '">Prev</a></li>';
		}
		else "";
   		if($page < $pages) {
   			$nextlink = '<li><a href="?page=' . ($page + 1) . '" title="Next page">Next</a></li> <li><a href="?page=' . $pages . '" title="Last page"><i class="glyphicon glyphicon-arrow-right"></i></a></li>';
   		}
   		else "";
    // Display the paging information
    echo $prevlink , $nextlink;

		?>
	</div>
		</div>
	</div>
		</div>
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