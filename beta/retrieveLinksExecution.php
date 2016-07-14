<?php
/**
 * Created by PhpStorm.
 * User: Myoran
 * Date: 14/07/2016
 * Time: 16:18
 */
require('dbConnection.php');


//Array Holds Title of article
$articleTitleArray = array();
//Array holds link of article
$articleLinkArray = array();


$articleGenre = null;

function retrieve_links($mainUrlArray, $urlExtensionArray, $searchTerms, $Genre){
    $arrayPos = 0;
    global $articleGenre;
    $articleGenre = $Genre;
    foreach($mainUrlArray as $mainUrl)
    {
        $combinedURL = $mainUrl.$urlExtensionArray[$arrayPos];

        //$websiteLink = file_get_contents($combinedURL); //Some websites aren't read by CURL so this can be used
                                                            //instead

        //cURL operations to read a website
        $cHandle = curl_init();
        curl_setopt($cHandle, CURLOPT_URL, $combinedURL);
        curl_setopt($cHandle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($cHandle, CURLOPT_CONNECTTIMEOUT, 0);
        $websiteLink = curl_exec($cHandle);
        curl_close($cHandle);

        //Regular Expressions
        $regexp = "<a\s[^>]*href=([\"\']??)([^\\1 >]*?)\\1[^>]*>(.*)<\/a>";
        //Checks <a href links
        //allows room for extra attributes
        //Allows for missing quotes
        //[^\\1] used instead of [^\">]

        preg_match_all("/$regexp/siU", $websiteLink, $matches );
        //"siU" matches are case less, are not greedy, includes line breaks

        //If array is empty, no news found
        if(count($matches) == 0)
        {

        }
        else{
            articleLinks($matches, $mainUrl, $searchTerms);
        }
        $arrayPos = $arrayPos + 1;

    }

}

//Take links, checks if it exists, sends it to be entered
function articleLinks($matches, $mainUrl, $searchTerms){
    $arrayPos = 0;
    global $articleGenre;
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
                        enterDataArray($matchTitle, $urlLink,$articleGenre);
                    }
                }
            }
        }
        $arrayPos = $arrayPos + 1;
    }
    //printArray();
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
    $finalLink = null;

    if($checkExtension == 'http'){
        $finalLink = $articleURL;
        return $finalLink;

    } else{
        $finalLink = $mainUrl.$articleURL;
        return $finalLink;
    }

}

//Enters title,link, an array into an sql database
function enterDataArray($articleTitle, $articleLink ,$articleGenre){
    global $articleTitleArray, $articleLinkArray;
    //array_push($articleTitleArray, removeTagSpace($articleTitle));
    $articleTitleClean = removeTagSpace($articleTitle);
    //array_push($articleLinkArray, $articleLink);
    global $conn;
    $stmtInsertArticle = $conn->prepare('INSERT into articleinformation (Article_Title, Article_Link, Article_Genre) VALUES (?,?,?)');
    $stmtInsertArticle->bind_param('sss', $articleTitleClean, $articleLink, $articleGenre);
    $stmtInsertArticle->execute();
}

//Remove html tags and whitespace
function removeTagSpace($articleTitle){
    $cleanedTitle = preg_replace('/\s+/S', ' ', strip_tags($articleTitle));
    return $cleanedTitle;
}


// function check if link exists in array
function checkLinkExists($urlLinkExists){
    global $articleLinkArray;
    foreach($articleLinkArray as $articleLink){

        $stmtCheckLinkExists = $conn->prepare('SELECT * FROM articleinformation WHERE Article_Link=?');
        $stmtCheckLinkExists->bind_param('s', $urlLinkExists);
        $stmtCheckLinkExists->execute();
        $stmtCheckLinkExists->store_result();

        if($stmtCheckLinkExists->num_rows >= 1){
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
    //returns true if title is not an img 					  No title contained
    if(strpos($articleTitle, '<img') or strpos($articleTitle, '></a>')){
        return false;
    } else {
        return true;
    }
}

//NOT CURRENTLY NEEDED function print out the array
//function printArray(){
//    global $articleTitleArray, $articleLinkArray; //arrays should be the same size
//    $arrayPos = 0;
//    foreach($articleTitleArray as $posIndicator){
//        echo '<pre>';
//        echo"<div class='contentBox'>";
//        echo"<a href='$articleLinkArray[$arrayPos]'>";
//        //If no title is found - a the link is displayed instead
//        if($articleTitleArray[$arrayPos] != ''){
//            echo'<h3>';
//            echo $articleTitleArray[$arrayPos];
//            echo'</h3>';
//        }
//        else{
//            echo '<p>';
//            echo $articleLinkArray[$arrayPos];
//            echo '</p>';
//        }
//
//        echo'</a>';
//        echo"</div>";
//        echo'</pre>';
//        $arrayPos = $arrayPos + 1;
//    }
//    $articleTitleArray = array();
//    $articleLinkArray = array();
//}
