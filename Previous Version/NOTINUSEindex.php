<?php require '/php/webcrawler.php'; 
//SOME WEBSITES NOT COMPATIBLE
//Websites require that both headline of the story and story image to be hyperlinked individually
//the "removeImg" function prevents some website articles from appearing

//News Website
echo"<h1>"; 
echo"NEWS";
echo"</h1>";

$newsSearchTerms = array('marks & spencer', 'M&S', 'marks&spencer', 'brexit');

$newsUrlArray = array('http://bbc.co.uk', 'http://uk.reuters.com');
$newsUrlExtensionArray = array('/news/business', '/business');

retrieve_links($newsUrlArray, $newsUrlExtensionArray, $newsSearchTerms);

echo "<hr>";

// GAME Websites
echo"<h1>"; 
echo"Games:";
echo"</h1>";

$gameSearchTerms = array('Trails in the sky', 'legend of heroes', 'Monster Hunter', 'MH4U', 'Stardew Valley', 'stardew', 'Overwatch');

$gameUrlArray = array('http://www.pcgamer.com', 'http://gematsu.com', 'http://mmoculture.com' );
$gameExtensionArray = array('/news/', '/c/pc', '');

retrieve_links($gameUrlArray, $gameExtensionArray, $gameSearchTerms);


echo "<hr>";

//Entertainment
echo"<h1>"; 
echo"Entertainment:";
echo"</h1>";

$entSearchTerms = array('gintama', 'one punch man', 'one-punch', 'ghibli', 'mob');

$entUrlArray = array('http://www.animenewsnetwork.com');
$entExtensionArray = array('');

retrieve_links($entUrlArray, $entExtensionArray, $entSearchTerms);

echo "<hr>";

//Music

echo"<h1>"; 
echo"Music:";
echo"</h1>";

$musicSearchTerms = array('Kendrick Lamar', 'jay electronica', 'panda');

$musicUrlArray = array('http://hiphopdx.com');
$musicExtensionArray = array('/news/');


retrieve_links($musicUrlArray, $musicExtensionArray, $musicSearchTerms);

?>