<?php

//Array Holds Title of article
$articleTitleArray = array();

//Array holds link of article
$articleLinkArray = array();

//Array Holds link to websites

//News Website
$newsUrlOne = "http://bbc.co.uk";
$newsUrlExtension = "/news";

function retrieve_links($mainUrl, $urlExtension){
	$combinedURL = $mainUrl.$urlExtension;
	$websiteLink = file_get_contents($combinedURL);
	
	//Regular Expressions
	$regexp = "<a\s[^>]*href=([\"\']??)([^\\1 >]*?)\\1[^>]*>(.*)<\/a>";
	//Checks <a href links 
	//allows room for extra attributes
	//Allows for missing quotes
	//[^\\1] used instrad of [^\">]
	
	preg_match_all("/$regexp/siU", $websiteLink, $matches );
	//"siU" matches are caseless, are ungreedy, includes line breaks
	
	newsLinks($matches, $mainUrl);
	
}

//Take links and output it
function newsLinks($matches, $mainUrl){
	$arrayPos = 0;
	//Matches[0] to just contain matched pattern
	foreach($matches[0] as $matchTitle ){
								//USED TO DETERMINE WHATS BEING LOOKED AT
		if(stripos($matchTitle, "leave" )){
			
			$urlLink = $mainUrl.$matches[2][$arrayPos]; //extract link from 2d array 
			
			enterDataArray($matchTitle, $urlLink);
			
		//	echo "<pre>";
		//	echo "<a href='$urlLink' target='_blank'>";
		//	array_push($articleTitleLink, $urlLink);
		//	echo $urlLink; 
		//	echo"</a>";
		//	echo"</pre>";	
		}
		
		$arrayPos = $arrayPos + 1;
	}
	
	printArray();
	//foreach($articleTitleLink as $articleContent){
	//echo $articleContent, '<br>';
	//}
	
}

//Enters title and link into array then outputs them
function enterDataArray($articleTitle, $articleLink){
	global $articleTitleArray, $articleLinkArray;
	
	array_push($articleTitleArray, $articleTitle );
	array_push($articleLinkArray, $articleLink);
	
}

//function print out the array
function printArray(){
	global $articleTitleArray, $articleLinkArray; //arrays should be the same size
	$arrayPos = 0;
	
	foreach($articleTitleArray as $posIndicator){
		echo "<pre>";
		echo $articleTitleArray[$arrayPos];
		echo"</pre>";
		echo"<pre>";
		echo $articleLinkArray[$arrayPos];
		echo "</pre>";
		$arrayPos = $arrayPos + 1;
	}
	
}

// function check if link exists in array

retrieve_links($newsUrlOne, $newsUrlExtension);




?>




