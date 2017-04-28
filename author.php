<?php
	require_once "lib/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="author" content="Mr CaT">
	<title>About Me</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="description" content="About author, about me, Mr CaT">
	<meta name="keywords" content="cat-engine,mrcat,cms,about-me">
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
				<div class="panel">
					<div class="panel-heading">
					<h1 class="text-center peter">About Me</h1>
					</div>
					<div class="panel-body">
					<p style="font-size: 17px;">
					<div class="col-xs-6">
					<img src="img/cat.jpg" width="200" height="200" alt="" class="img-responsive img-thumbnail img-right">
				</div>
					Hello Friends, in this page you'll get know me. I'm Mr CaT, started learning Web one year ago, know HTML, CSS, improving PHP & MYSQL, also recently started learning Javascript.
					Created two projects: "HaBlog", "Eazy English".<br />
					Recently decided to create a website, just for practice, for everyone, and created this website, for bloggers, for everyone. I'll joy you with updates, upgrade design, add new functional, upgrade Admin Panel.
					Be cleverer, join our channel in <a href="http://t.me/goodproger">Telegram</a>
					<h2 class="text-center peter">About CAT-ENGINE</h2>
					Website is for everyone who wants to create a blog, or create other websites. <a href="http://vk.com/cat_engine">Follow community, keep up to date with news</a>.
					Expect for updates, updates will be awesome! ) Such as: Upgrades in Admin Panel, updates in Design, adding new functional, adding new effects.
					You can get the website <a href="http://github.com/mrcat323/cat-engine">Here...</a> give a star, fork, watch, and follow me )
					</p>
					<i>With respect Mr CaT</i>
					<br><br><br>
					</div>
				</div>
				<h2 class="text-center peter">My contacts</h2>
					<div class="col-xs-4 col-sm-4 col-md-2">
						<div class="social telegram">
							<h1>
								<a href="http://t.me/mrcat323" title="Our useful channel in Telegram, just join" class="fa fa-paper-plane fa-lg"></a>
							</h1>
						</div>
					</div>
					<div class="col-xs-4 col-sm-4 col-md-2">
						<div class="social twitter">
						<h1>
							<a href="http://twitter.com/mrcat323" title="Follow me in Twitter" class="fa fa-twitter fa-lg"></a>
						</h1>
					</div>
					</div>
					<div class="col-xs-4 col-sm-4 col-md-2">
						<div class="social facebook">
						<h1>
							<a href="http://facebook.com/abdurahmon.hasanov.16" title="Me in Facebook" class="fa fa-facebook fa-lg"></a>
						</h1>
					</div>
					</div>
					<div class="col-xs-4 col-sm-4 col-md-2">
						<div class="social vk">
							<h1>
								<a href="http://vk.com/mrcats_empire" class="fa fa-vk"></a>
							</h1>
						</div>
					</div>
					<div class="col-xs-4 col-sm-4 col-md-2">
						<div class="social git">
							<h1>
								<a href="http://github.com/mrcat323" class="fa fa-github"></a>
							</h1>
						</div>
					</div>
					<div class="col-xs-4 col-sm-4 col-md-2">
						<div class="social pinterest">
							<h1>
								<a href="http://pinterest.com/mrcat323" class="fa fa-pinterest"></a>
							</h1>
						</div>
					</div>
					<p class="text-center"><a style="font-size: 21px;" href="http://t.me/goodproger">Our Channel in Telegram</a></p>
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