<?php  
$newsSearchTerms = array('marks & spencer', 'M&S', 'marks&spencer', 'brexit');

//News Website
$newsUrlArray = array('http://bbc.co.uk', 'http://uk.reuters.com');
$newsUrlExtensionArray = array('/news/business', '/business');

retrieve_links($newsUrlArray, $newsUrlExtensionArray, $newsSearchTerms);


echo "<hr>";
?>