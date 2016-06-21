<?php require '/php/webcrawler.php'; 


//News Website
$newsUrlOne = "http://bbc.co.uk";
$newsUrlExtension = "/news/business";
$searchTerms = array('brexit', 'instagram');

retrieve_links($newsUrlOne, $newsUrlExtension, $searchTerms);

echo"<br>";
echo"<p>"; 
echo"MORE NEWS";
echo"</p>";

$newsUrlTwo = "http://uk.reuters.com/";
$newsUrlExtensionTwo = "/business";
retrieve_links($newsUrlTwo, $newsUrlExtensionTwo, $searchTerms);


?>