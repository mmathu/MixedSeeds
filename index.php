<?php require '/php/webcrawler.php'; 
//SOME WEBSITES NOT COMPATIBLE
//Websites require that both headline of the story and story image to be hyperlinked individually
//the "removeImg" function prevents some website articles from appearing

//News Website
echo"<h1>"; 
echo"NEWS";
echo"</h1>";

$newsSearchTerms = array('marks & spencer', 'M&S', 'marks&spencer', 'brexit');

$newsUrlOne = "http://bbc.co.uk";
$newsUrlExtension = "/news/business";

$newsUrlTwo = "http://uk.reuters.com/";
$newsUrlExtensionTwo = "/business";

retrieve_links($newsUrlOne, $newsUrlExtension, $newsSearchTerms);
retrieve_links($newsUrlTwo, $newsUrlExtensionTwo, $newsSearchTerms);

echo "<hr>";

// GAME Websites
echo"<h1>"; 
echo"Games:";
echo"</h1>";

$gameSearchTerms = array('Legend of Heroes: Trails in the Sky', 'Trails in the sky', 'legend of heroes', 'Monster Hunter', 'MH4G', 'MH4U', 'Stardew Valley', 'stardew', 'Overwatch');

$gameUrlOne = "http://www.pcgamer.com";
$gameUrlExtensionOne = "/news/";

$gameUrlTwo = "http://gematsu.com";
$gameUrlExtensionTwo = "/c/pc";

$gameUrlThree = "http://mmoculture.com";
$gameUrlExtensionThree = "";

retrieve_links($gameUrlOne, $gameUrlExtensionOne, $gameSearchTerms);
retrieve_links($gameUrlTwo, $gameUrlExtensionTwo, $gameSearchTerms);
retrieve_links($gameUrlThree, $gameUrlExtensionThree, $gameSearchTerms);

echo "<hr>";

//Entertainment
echo"<h1>"; 
echo"Entertainment:";
echo"</h1>";

$entSearchTerms = array('gintama', 'one punch man', 'one-punch', 'ghibli');

$entUrlOne = "http://www.tribute.ca";
$entUrlExtensionOne = "/movies/dvd/";

$entUrlTwo = "http://www.animenewsnetwork.com";
$entUrlExtensionTwo = "";

retrieve_links($entUrlOne, $entUrlExtensionOne, $entSearchTerms);
retrieve_links($entUrlTwo, $entUrlExtensionTwo, $entSearchTerms);


echo "<hr>";

//Music

echo"<h1>"; 
echo"Music:";
echo"</h1>";

$musicSearchTerms = array('Kendrick Lamar', 'jay electronica');

$musicUrlOne = "http://rap.genius.com";
$musicUrlExtensionOne = "";

retrieve_links($musicUrlOne, $musicUrlExtensionOne, $musicSearchTerms);

?>