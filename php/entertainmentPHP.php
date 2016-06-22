<?php
//SOME WEBSITES NOT COMPATIBLE
//Websites require that both headline of the story and story image to be hyperlinked individually
//the "removeImg" function prevents some website articles from appearing

//Entertainment
echo"<h1>"; 
echo"Entertainment:";
echo"</h1>";

$entSearchTerms = array('gintama', 'one punch man', 'one-punch', 'ghibli');

$entUrlOne = "http://www.tribute.ca";
$entUrlExtensionOne = "/movies/dvd/";

$entUrlTwo = "http://www.animenewsnetwork.com";
$entUrlExtensionTwo = "";

//retrieve_links($entUrlOne, $entUrlExtensionOne, $entSearchTerms);
retrieve_links($entUrlTwo, $entUrlExtensionTwo, $entSearchTerms);

echo "<hr>";

?>