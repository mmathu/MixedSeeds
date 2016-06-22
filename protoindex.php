<!DOCTYPE html>
<html>
<head>
<title> NicheInterests Home </title>
<?php require 'php/webcrawler.php' ?>
</head>

<body>

<div id="comtentWrapper">
	<header>
	Menu will go here
	</header>
	
	<section class="infoContent" id="newsContent" >
		<?php require 'php/newsPHP.php' ?>
	</section>
	
	<section class="infoContent" id="gamesContent" >
		<?php require 'php/gamesPHP.php' ?>
	</section>
	
	<section class="infoContent" id="entertainmentContent" >
		<?php require 'php/entertainmentPHP.php' ?>
	</section>
	
	<section class="infoContent" id="musicContent" >
		<?php require 'php/musicPHP.php' ?>
	</section>
</div>

</body>

</html>