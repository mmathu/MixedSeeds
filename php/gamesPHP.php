<?php 
//SOME WEBSITES NOT COMPATIBLE
//Websites require that both headline of the story and story image to be hyperlinked individually
//the "removeImg" function prevents some website articles from appearing

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

?>