<?php 
//SOME WEBSITES NOT COMPATIBLE
//Websites require that both headline of the story and story image to be hyperlinked individually
//the "removeImg" function prevents some website articles from appearing

//Music

echo"<h1>"; 
echo"Music:";
echo"</h1>";

$musicSearchTerms = array('Kendrick Lamar', 'jay electronica');

$musicUrlOne = "http://rap.genius.com";
$musicUrlExtensionOne = "";

retrieve_links($musicUrlOne, $musicUrlExtensionOne, $musicSearchTerms);
?>