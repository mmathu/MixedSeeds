<!DOCTYPE html>
<html>
<head>
	<title> MixedSeeds Home </title>
	<?php require 'php/webcrawler.php' ?>
	<link rel="stylesheet" type="text/css" href="css/MixedSeeds.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

	<header>
		<div class="contentWrapper"> 
			<h3>MixedSeeds</h3>
			<nav>
				<ul>
					<li><a class="active">HOME</a></li>
					<li><a href="html/about.html">ABOUT</a></li>
				</ul>
			</nav>
		</div>
	</header>


	<div class="contentWrapper">	
		<section class="infoContent" id="newsContent" >
			<h2>Business</h2>
			<?php require 'php/newsPHP.php' ?>
		</section>
		
		<section class="infoContent" id="gamesContent" >
			<h2>Games</h2>
			<?php require 'php/gamesPHP.php' ?>
		</section>
		
		<section class="infoContent" id="entertainmentContent" >
			<h2>Entertainment</h2>
			<?php require 'php/entertainmentPHP.php' ?>
		</section>
		
		<section class="infoContent" id="musicContent">
			<h2>Music</h2>
			<?php require 'php/musicPHP.php' ?>
		</section>
	</div>
	
	<footer>
		<p> Designed by Myoran </p>
	</footer>	

	

</body>

</html>