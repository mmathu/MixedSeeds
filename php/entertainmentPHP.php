<?php
//SOME WEBSITES NOT COMPATIBLE
//Websites require that both headline of the story and story image to be hyperlinked individually
//the "removeImg" function prevents some website articles from appearing

//Entertainment
echo"<h1>"; 
echo"Entertainment:";
echo"</h1>";

$entSearchTerms = array('gintama', 'one punch man', 'one-punch', 'ghibli', 'mob');

$entUrlArray = array('http://www.animenewsnetwork.com');
$entExtensionArray = array('');

retrieve_links($entUrlArray, $entExtensionArray, $entSearchTerms);

echo "<hr>";

?>