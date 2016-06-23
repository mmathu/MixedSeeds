<?php

//Array Holds Title of article
$articleTitleArray = array();

//Array holds link of article
$articleLinkArray = array();

//Array Holds link to websites

function retrieve_links($mainUrlArray, $urlExtensionArray, $searchTerms){		
	$arrayPos = 0;
	foreach($mainUrlArray as $mainUrl)
	{
		$combinedURL = $mainUrl.$urlExtensionArray[$arrayPos];
		$websiteLink = file_get_contents($combinedURL);
		
		//Regular Expressions
		$regexp = "<a\s[^>]*href=([\"\']??)([^\\1 >]*?)\\1[^>]*>(.*)<\/a>";
		//Checks <a href links 
		//allows room for extra attributes
		//Allows for missing quotes
		//[^\\1] used instrad of [^\">]
		
		preg_match_all("/$regexp/siU", $websiteLink, $matches );
		//"siU" matches are caseless, are ungreedy, includes line breaks
		
		//If array is empty, no news found
		if(count($matches) == 0)
		{
			
		}
		else{
			newsLinks($matches, $mainUrl, $searchTerms);
		}
		$arrayPos = $arrayPos + 1;
	}
	
}



//Take links and output it
function newsLinks($matches, $mainUrl, $searchTerms){
	$arrayPos = 0;
	//Matches[0] to just contain matched pattern
	foreach($matches[0] as $matchTitle ){
								//USED TO DETERMINE WHATS BEING LOOKED AT
		foreach($searchTerms as $searchTerm)
		{
			if(stripos($matchTitle, $searchTerm)){
			
				//Function to 'cleanse' URL
				$urlLink = cleanseURL($mainUrl, $matches[2][$arrayPos]); //extract link from 2d array 
				
				if(checkLinkExists($urlLink)){
					//If link is already in the array
				}
				else{
					//check if link contains comments or is an img rather then headline
					if(removeImg($matchTitle) and removeComments($urlLink)){
						enterDataArray($matchTitle, $urlLink);
					}
				}
			}
		}
		$arrayPos = $arrayPos + 1;
	}
	printArray();
}

function cleanseURL($mainUrl, $articleURL){
	//Function created as websites are formatted differently
	//eg for a link 'http://www.example.com' - one website might link to...
	//...another page as '/news/article-name' and another website...
	//...might link to it as 'http://www.example.com/news/article-name'
	//Dependant of the website
	
	//variable checks if www. is in the article link
	//if there is it does not need to be combined woth the main URL
	$checkExtension = substr($articleURL, 0, 4); //If full link, will return 'http'
	
	//variable to hold final link
	$finalLink;
	
	if($checkExtension == 'http'){ 
		$finalLink = $articleURL;
		return $finalLink;
		
	} else{
		$finalLink = $mainUrl.$articleURL;
		return $finalLink;
	}
	
}

//Enters title and link into array then outputs them
function enterDataArray($articleTitle, $articleLink){
	global $articleTitleArray, $articleLinkArray;
	array_push($articleTitleArray, strip_tags($articleTitle) );
	array_push($articleLinkArray, $articleLink);	
	
	
}


// function check if link exists in array
function checkLinkExists($urlLinkExists){
	global $articleLinkArray;
	foreach($articleLinkArray as $articleLink){
	
		if($urlLinkExists == $articleLink){
			return true;
		}
	}
	return false;
}

//Links returned should only be text no image or link to comments
function removeComments($urlLink){
	//returns true if links does not contain comments
	if(strpos($urlLink, "#")){
		return false;
	} else{
		return true;
	}
}

function removeImg($articleTitle){
	//returns true if title is not an img
	if(strpos($articleTitle, "<img")){
		return false;
	} else {
		return true;
	}
}

//function print out the array
function printArray(){
	global $articleTitleArray, $articleLinkArray; //arrays should be the same size
	$arrayPos = 0;
	foreach($articleTitleArray as $posIndicator){
		echo "<pre>";
		echo"<a href='$articleLinkArray[$arrayPos]'>";
		//If no title is found - a the link is displayed instead
		if($articleTitleArray[$arrayPos] != ''){
			echo"<h3>";
			echo $articleTitleArray[$arrayPos];
			echo"</h3>";
		} 
		else{
			echo "<p>";
			echo $articleLinkArray[$arrayPos];
			echo "</p>";
		}	

		echo "</a>";
		echo"</pre>";
		$arrayPos = $arrayPos + 1;
	}
	$articleTitleArray = array();
	$articleLinkArray = array();
}







?>




