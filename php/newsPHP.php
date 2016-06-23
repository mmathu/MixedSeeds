<?php  
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
?>