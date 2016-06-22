<?php  
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
?>